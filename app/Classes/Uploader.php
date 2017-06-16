<?php namespace App\Classes;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class Uploader
{
    protected $file,
        $request,
        $props,
        $uploadPath,
        $validationErrors = [];

    public function validate(Request $request, $file, array $rules = [])
    {
        $this->clearState();
        $validationFailed = false;
        $this->request = $request;

        if ($request->hasFile($file) && $request->file($file)->isValid()) {
            $this->file = $request->file($file);
            $this->fillProps();

            if (is_array($rules) && count($rules) > 0) {

                if(isset($rules['minSize'])) {
                    if ($this->props['size'] < $rules['minSize']) {
                        $validationFailed = true;
                        $this->validationErrors['minSize'] = 'Минимальный размер загружаемого файла - ' . $rules['minSize'];
                    }
                }

                if(isset($rules['maxSize'])) {
                    if ($this->props['size'] > $rules['maxSize']) {
                        $validationFailed = true;
                        $this->validationErrors['maxSize'] = 'Максимальный размер загружаемого файла - ' . $rules['maxSize'];
                    }
                }

                if(isset($rules['allowedExt']) && is_array($rules['allowedExt']) && count($rules['allowedExt']) > 0) {
                    if (!in_array($this->props['ext'], $rules['allowedExt'])) {
                        $validationFailed = true;
                        $this->validationErrors['allowedExt'] = 'Разрешены только следующие расширения: ' . implode(', ', $rules['allowedExt']);
                    }
                }

                if(isset($rules['allowedMime']) && is_array($rules['allowedMime']) && count($rules['allowedMime']) > 0) {
                    if (!in_array($this->props['mime'], $rules['allowedMime'])) {
                        $validationFailed = true;
                        $this->validationErrors['allowedMime'] = 'Разрешены только следующие MIME типы: ' . implode(', ', $rules['allowedMime']);
                    }
                }
            }
        } else {
            $validationFailed = true;
            $this->validationErrors['invalidUpload'] = 'Загрузка файла не удалась или файл поврежден';
        }

        return !$validationFailed;
    }

    public function upload($section = null)
    {
        $basePath = !is_null($section) ?  config('blog.uploadPath', storage_path()) . '/'. $section : config('blog.uploadPath', storage_path()) . '/' . config('blog.defaultUploadSection', 'files');
        $newName = sha1($this->props['oldname'] . microtime(true));
        $newDir = substr($newName, 0, 1) . '/' . substr($newName, 0, 3);
        $this->uploadPath = str_replace('/', '.', $newDir . '/' . $newName);
        $newPath = $basePath . '/' . $newDir;

        if (!File::exists($newPath)) {
            if (!File::makeDirectory($newPath, config('blog.storagePermissions', 0755), true)) {
                throw new \ErrorException('Не могу создать директорию ' . $newPath);
            }
        }

        if (File::isDirectory($newPath) && File::isWritable($newPath)) {
            $this->file->move($newPath, $newName);
        } else {
            throw new \ErrorException('Директория ' . $newPath . ' недоступна для записи');
        }

        return File::exists($newPath . '/' . $newName) ? $this->uploadPath : false;
    }

    public function register(Upload $uploadModel)
    {
        return $uploadModel->create([
            'path' => $this->uploadPath,
            'oldname' => $this->props['oldname'],
            'size' => $this->props['size'],
            'ext' => $this->props['ext'],
            'mime' => $this->props['mime'],
        ]);
    }

    public function getErrors()
    {
        return $this->validationErrors;
    }

    public function getProps()
    {
        return $this->props;
    }

    protected function clearState()
    {
        unset($this->file, $this->request, $this->props);
        $this->validationErrors = [];
    }

    protected function fillProps()
    {
        $this->props['size'] = $this->file->getSize();
        $this->props['oldname'] = $this->file->getClientOriginalName();
        $this->props['ext'] = mb_strtolower($this->file->getClientOriginalExtension());
        $this->props['mime'] = $this->file->getMimeType();
    }
}
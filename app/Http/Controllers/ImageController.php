<?php

namespace App\Http\Controllers;

use Image;
use File;


class ImageController extends Controller
{
    public function resize($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width, $height) {
            $image->make($imgFile)->resize($width, $height);
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function fit($width, $height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width, $height) {
            $image->make($imgFile)->fit($width, $height, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function widen($width, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $width) {
            $image->make($imgFile)->widen($width, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function heighten($height, $path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::cache(function($image) use($imgFile, $height) {
            $image->make($imgFile)->heighten($height, function ($constraint) {
                $constraint->upsize();
            });
        }, config('blog.imageCacheTime'), true);

        return $this->createResponse($img, $ext);
    }

    public function show($path)
    {
        list($imgFile, $ext) = $this->getImagePath($path);
        $img = Image::make($imgFile);

        return $this->createResponse($img, $ext, 100);
    }

    protected function getImagePath($path)
    {
        $nameArray = explode('.', $path);
        $ext = array_pop($nameArray);
        $file = str_replace('.', '/', implode('.', $nameArray));
        //"5/5d8/5d8a1e5b371dd90c0b9064c6c859603d9e640994"
        $filePath = config('blog.uploadPath') . config('blog.imageUploadSection') . '/' . $file;

        if (!File::isFile($filePath)) {
            $filePath = config('blog.imageDefaultPath');
            $ext = 'jpg';
        }

        return [$filePath, $ext];
    }

    protected function createResponse($imgObj, $ext = 'jpg', $quality = 75)
    {
        return $imgObj->response($ext, $quality)
            ->header('Cache-Control', 'public, max-age=86400');
    }
}
<?php namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Отображение страницы регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function register()
    {
        return view('layouts.secondary', [
            'page' => 'pages.register',
            'title' => 'Регистрация в блоге',
            'activeMenu' => 'register',
        ]);
    }

    /**
     * POST обработчик регистрации
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function registerPost()
    {
        $this->validate($this->request, [
            'name' => 'max:255|min:3',
            'email' => 'required|max:255|email|unique:users',
            'password' => 'required|max:255|min:6',
            'password2' => 'required|same:password',
            'phone' => 'regex:/\+\d{1}\s{1}\(\d{3}\)\s{1}\d{3}\-\d{2}\-\d{2}/',
            'is_confirmed' => 'accepted'
        ]);

        $newUserModel = User::create([
            'name' => $this->request->input('name'),
            'email' => $this->request->input('email'),
            'password' => bcrypt($this->request->input('password')),
            'phone' => $this->request->input('phone'),
        ]);

        if ($newUserModel) {
            return view('layouts.secondary', [
                'page' => 'parts.blank',
                'title' => 'Регистрация в блоге',
                'content' => 'Поздравляем, вы успешно зарегистрированы!',
                'link' => '<a href="' . route('site.auth.login') . '">Войти</a>',
                'activeMenu' => 'register',
            ]);
        } else {
            abort(500);
        }
    }

    /**
     * Отображение страницы входа в систему
     *
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function login()
    {
        return view('layouts.secondary', [
            'page' => 'pages.login',
            'title' => 'Вход в систему',
            'activeMenu' => 'login',
        ]);
    }

    public function loginPost()
    {
        $remember = $this->request->input('remember') ? true : false;

        $authResult = Auth::attempt([
            'email' => $this->request->input('email'),
            'password' => $this->request->input('password'),
        ], $remember);

        if ($authResult) {
            return redirect()->route('site.main.index');
        } else {
            return redirect()->route('site.auth.login')->with('authError', trans('custom.wrong_password'));
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect()->route('site.auth.login');
    }
}

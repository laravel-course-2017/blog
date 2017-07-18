<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class AjaxController extends Controller
{
    public function ajax()
    {
        return view('layouts.primary', [
            'page' => 'pages.ajax-upload',
            'title' => 'Загрузка через Ajax',
            'activeMenu' => 'feedback',
        ]);
    }

    public function ajaxPost(Request $request)
    {
        $name = $request->input('name');

        if ($request->hasFile('logo')) {
            if ($request->file('logo')->isValid()) {
                if ($request->file('logo')->move(storage_path('logoss'), $name)) {
                    return 'OK';
                }
            }
        }

        return 'ERROR';
    }
}

<?php
/**
 * Dynamic image resizer routes
 */

Route::get('download/{path}','FileController@download')
    ->where([
        'path' => '[\w\.]+',
    ]);

Route::get('get/{path}','FileController@get')
    ->where([
        'path' => '[\w\.]+',
    ]);
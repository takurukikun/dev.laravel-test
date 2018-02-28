<?php

Route::get('/', 'Site\SiteController@app');
Route::get('/generator', 'Site\SiteController@generator');
Route::post('/generator', 'Site\GeneratorController@generated');
Route::get('/simplifier', 'Site\SiteController@simplifier');
Route::post('/simplifier', 'Site\SimplifierController@simplied');

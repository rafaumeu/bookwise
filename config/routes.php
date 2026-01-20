<?php

declare(strict_types = 1);

use Core\Route;

Route::get('/', 'IndexController@index');
Route::get('/login', 'AuthController@index');
Route::post('/login', 'AuthController@login');
Route::get('/logout', 'AuthController@logout');
Route::post('/registrar', 'AuthController@registrar');
Route::get('/meus-livros', 'MeusLivrosController@index')->middleware('auth');
Route::post('/livro-criar', 'LivroController@store')->middleware('auth');
Route::get('/livro', 'LivroController@show');
Route::post('/avaliacao-criar', 'AvaliacaoController@store')->middleware('auth');

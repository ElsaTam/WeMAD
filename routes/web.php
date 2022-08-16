<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/',                 'PagesController@getHome');
Route::get('links/',            'PagesController@getLinks');

Route::get('contact/',          'MessagesController@getMessages');
Route::post('contact/submit',   'MessagesController@submit');

Route::get('wanted/10-most-wanted-fugitives', 'PersonController@getMostWantedFugitives');
Route::get('wanted/fugitives', 'PersonController@getFugitives');
Route::get('wanted/missings', 'PersonController@getMissings');

Route::get('agent/{id}', 'PersonController@getPerson');
Route::get('wanted/{id}', 'PersonController@getPerson');
Route::get('missing/{id}', 'PersonController@getPerson');
Route::get('civilian/{id}', 'PersonController@getPerson');



Route::get('offices', 'OfficeController@getOffices');
Route::get('offices/west-council', 'OfficeController@getWestCouncil');
Route::get('offices/center-council', 'OfficeController@getCenterCouncil');
Route::get('offices/east-council', 'OfficeController@getEastCouncil');
Route::get('offices/no-council', 'OfficeController@getNoCouncil');
Route::get('offices/{id}', 'OfficeController@getOffice');

Route::get('pack/{id}', 'GroupController@getGroup');
Route::get('clan/{id}', 'GroupController@getGroup');
Route::get('circle/{id}', 'GroupController@getGroup');

Route::get('ressources/', function() { return view('ressources/ressources'); });
Route::get('ressources/{page}', function($page) { return view('ressources/'.$page.'/'.$page); });
Route::get('ressources/{folder}/{page}', function($folder, $page) { return view('ressources/'.$folder.'/pages/'.$page); });

Route::get('database', function() { return view('database/database'); });
Route::get('database/people', function() { return view('database/database-people'); });
Route::get('database/people/search', 'PersonController@searchPeople');
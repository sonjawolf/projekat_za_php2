<?php
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
//pocetna
Route::get('/','HomeController@index')->name('home');
  //registraciona forma
  Route::get('/register','HomeController@showRegisterPage')->name('register');
//registrovanje
Route::post('/register','UserController@registerUser')->name('registerr');
//logovanje & logout
Route::post('/login','LoginController@login')->name('login');
Route::get('/logout','LoginController@logout')->name('logout');
//kontakt
Route::get('/kontakt','HomeController@showContactForm')->name('contact');
Route::post('/kontakt','ContactController@contactMsg')->name('contactPost');
//vesti
Route::get('/newsCategory{id}','HomeController@newsCategory')->name('newsCategory');
//jedna vest
Route::get('/singleNews{id}','NewsController@singleNews');
  //komentari
  Route::post('/comment','NewsController@commentInsert')->name('comment');
//adminpanel
//zabranje pristup ako nije ulogovan
Route::group(['middleware'=>'role'],function(){
    //korisnicki profil
    Route::get('/userProfile','HomeController@userProfile')->name('profile');
    //update korisnicki profil
    Route::post('/updateProfile','UserController@updateProfile')->name('updateProfile');
    //update avatar
    Route::post('/updateAvatar','UserController@updateAvatar')->name('updateAvatar');
});
  Route::group(['middleware'=>'adminRole'],function(){
  Route::get('/adminPanel','AdminController@adminIndex')->name('admin');
 //rute za komentare
  Route::get('/admin/komentari','AdminController@showComents')->name('showComents');
  Route::get('/admin/komentari/{id}','AdminController@deleteComments')->name('deleteComments');
  //rute za meni
  Route::get('/admin/meni','AdminController@showMeni')->name('showMeni');
  Route::get('/admin/delete/meni/{id}','AdminController@deleteMeni')->name('deleteMeni');
  Route::post('/admin/insert/meni','AdminController@insertMeni')->name('insertMeni');
  //rute za upravljanje korisnicima
  Route::get('/admin/korisnici','AdminController@showUsers');
  Route::post('/admin/korisnici/delete','AdminController@delete_data')->name('deleteUser');
  Route::get('/admin/korisnici/ulogaUpdate','AdminController@updateRole')->name('updateRole');
  //rute za vesti
  Route::get('/admin/vesti','AdminController@showNews')->name('showNews');
  Route::get('/admin/vesti/delete/{id}','AdminController@deleteNews')->name('deleteNews');
  Route::get('/admin/vesti/search','AdminController@search');
  Route::post('/admin/vesti','AdminController@search');
  Route::get('/admin/vesti/insertForma','AdminController@insertNewsForma')->name('insertNewsForma');
  Route::post('/admin/vesti/insert','AdminController@insertNews')->name('insertNews');
  //rute za poruke
  Route::get('admin/messages','AdminController@showMessages')->name('showMessages');
  Route::get('admin/messages/delete/{id}','AdminController@deleteMessages')->name('deleteMessage');
  //live search
  Route::get('admin/korisnici/live_search', 'AdminController@liveSearch')->name('showUsers');
  Route::get('/live_search/action', 'AdminController@action')->name('live_search.action');
 });
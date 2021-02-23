<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Models\User;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/test', function() {
    $test = new stdClass();
    $test->var1 = 'test1';
    $test->var2 = 'test2';
    return $test->var1;

});

Route::get('/post/{id}/{name}', function($id, $name) {
  return "post $id $name";
});

Route::get('/make/this/url/shorter', array('as'=>'admin.home', function() {
  return "this url is " . route('admin.home');
}));

Route::get('/post/{id}', '\App\Http\Controllers\PostsController@index');

Route::resource('/posts', '\App\Http\Controllers\PostsController');

Route::get('/contact/{id}/{name}', '\App\Http\Controllers\PostsController@contact');

Route::get('/contact2', '\App\Http\Controllers\PostsController@contact2');

Route::get('/createUserRaw', function() {
  DB::delete('delete from users');
  DB::insert('insert into users (name, password, email) values (?,?,?)',['Dave','password', 'dave@reedworld.com']);
  DB::insert('insert into users (name, password, email) values (?,?,?)',['Amy','password', 'amy@reedworld.com']);
});

Route::get('/readUserRaw', function() {
  $results = DB::select('select * from users where email IS NOT NULL');
  return $results;
});

Route::get('/updateUserRaw', function() {
  $updated =  DB::update('update users set name = ? where name = ?', ['Dave2','Dave']);
  return $updated;
});

Route::get('/allUsers', function() {
  $users = User::all();
  return $users;
});

Route::get('/user/{id}', function($id) {
//  $user = User::find($id); // knows it will only return 1 so it returns an object, not array
  $user = User::findOrFail($id); // knows it will only return 1 so it returns an object, not array
  return $user;
});

Route::get('/where', function() {
//  $users = User::where('id',3)->get();
  $users = User::where('id','<', 5)->orderBy('id','desc')->take(2)->get();
  return $users;
});

Route::get('/basicInsert', function() {
  $user = new User;
  $user->name = 'Dave3';
  $user->email ='dave3@reedworld.com';
  $user->password = 'password';
  $user->save(); // Saves or updates;
});

Route::get('/changeName/{oldName}/{newName}', function($oldName, $newName) {
  $users = User::where('name',$oldName)->get();
  $user = $users[0];
  $user->name = $newName;
  $user->save(); // Saves or updates;
});

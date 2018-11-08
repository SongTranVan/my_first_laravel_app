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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/about', function() {
  return view('about');
});

Route::get('bla', function(){
  echo "<h1> bla bla</h1";
});

//parsing argument
Route::get('Name/{name}', function($name){
  echo "Your name is: " .$name;
  echo "3 + 5 = ".(3+5);
});

Route::get('DateTime/{date}', function($date){
  echo "ABC XYZ".$date;
})->where(['date'=>'[0-9]+']);

Route::get('Say/Hello', function(){
  return view('welcome');
});

//identification
Route::get('Route1',['as'=>'myroute',function(){
  echo "Halo co ba";
}]);

Route::get('Route2',function(){
  echo "This is Route2";
})->name('myroute2');

//Call Route1
Route::get('GoiTen',function(){
  return redirect()->route('myroute2');
});

//Route Group
Route::group(['prefix'=>'MyGroup'], function(){
  Route::get('User1', function(){
    echo "User1";
  });
  Route::get('User2', function(){
    echo "User2";
  });
  Route::get('User3', function(){
    echo "User3";
  });
});

//Call controller
Route::get('CallController','MyController@Hello');

//Parsing argument to controller
Route::get('Parsing/{data}','MyController@Course');

//Url
Route::get('MyRequest','MyController@GetURL');

//Gui nhan du lieu voi request
Route::get('getForm',function(){
  return view('post_form');
});

Route::post('postForm',
  ['as'=>'mypostForm','uses'=>'MyController@PostForm']);

//Cookie
Route::get('setCk','MyController@setCookie');
Route::get('getCk','MyController@getCookie');

//UpFile
Route::get('upFile', function(){
  return view('upFile');
});

Route::post('postFile', ['as'=>'uploadFile','uses'=>'MyController@UpFile']);

//phpinfo
Route::get('phpinfo',function(){
  echo phpinfo();
});

//Json
Route::get('getJson','MyController@getJson');

//view
Route::get('View','MyController@MyView');

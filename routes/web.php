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
Route::get('/', 'FrontendController@index')->name('index');

/*Route::get('/results', function(){
    $posts = \App\Post::where('title',like, '5'. request('query') .'%')->get();
    return view('results')->with('posts', $posts)
});*/

Auth::routes();


Route::get('page/category/{id}', 'FrontendController@Category')->name('feCategory');
Route::get('page/tag/{id}', 'FrontendController@Tag')->name('feTag');
Route::get('page/{slug}', 'FrontendController@singlePost')->name('singlepost');
Route::get('results', function() {
    $posts = \App\Post::where('title','like', '%'. request('query') .'%')->get();
    return view('results')->with('posts', $posts)
                                ->with('title', 'Search for: ' . request('query'))
                                ->with('categories', \App\Category::take(5)->get())
                                ->with('query', request('query'));

})->name('seResults');

Route::post('subscribe', function() {
    $email = request('email');
    Newsletter::subscribe($email);
    \Session::flash('success', "You have successfully subscribed {$email}");
    return redirect()->back();
})->name('feSubscribe');


Route::get('/home', 'HomeController@index')->name('home');

Route::get('profile', 'ProfileController@index')->name('profile.index');
Route::post('profile/update', 'ProfileController@update')->name('profile.update');
Route::get('setting', 'SettingController@index')->name('setting.index');
Route::post('setting', 'SettingController@update')->name('setting.update');

Route::get('baptismal/printPDF/{baptismal}', 'BaptismalController@printPDF')->name('baptismal.printPDF');
Route::get('dedication/printPDF/{dedication}', 'DedicationController@printPDF')->name('dedication.printPDF');
Route::get('funeral/printPDF/{funeral}', 'FuneralController@printPDF')->name('funeral.printPDF');

Route::get('baptismal/approved', 'BaptismalController@approved')->name('baptismal.approved');
Route::get('baptismal/pending', 'BaptismalController@pending')->name('baptismal.pending');
Route::get('baptismal/all', 'BaptismalController@all')->name('baptismal.all');

Route::get('dedication/approved', 'DedicationController@approved')->name('dedication.approved');
Route::get('dedication/pending', 'DedicationController@pending')->name('dedication.pending');
Route::get('dedication/all', 'DedicationController@all')->name('dedication.all');

Route::get('funeral/approved', 'FuneralController@approved')->name('funeral.approved');
Route::get('funeral/pending', 'FuneralController@pending')->name('funeral.pending');
Route::get('funeral/all', 'FuneralController@all')->name('funeral.all');


Route::get('baptismal/{baptismal}/approve', 'BaptismalController@approve')->name('baptismal.approve');
Route::get('dedication/{dedication}/approve', 'DedicationController@approve')->name('dedication.approve');
Route::get('funeral/{funeral}/approve', 'FuneralController@approve')->name('funeral.approve');

Route::resource('post', 'PostController');
Route::resource('category', 'CategoryController');
Route::resource('tag', 'TagController');
Route::resource('user', 'UserController');
Route::resource('baptismal', 'BaptismalController');
Route::resource('dedication', 'DedicationController');
Route::resource('funeral', 'FuneralController');


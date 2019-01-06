<?php
// Routes For Any User
Route::group(['middleware' => 'web'],function(){
  Auth::routes();
  Route::get('/', 'HomeController@index')->name('home');
  Route::get('/top', 'HomeController@top')->name('top');
  Route::get('/cat/{catid}', 'HomeController@cat')->name('cat');
  Route::get('/platform/{pid}', 'HomeController@plat')->name('plat');
  Route::get('/search','HomeController@search')->name('search');
  Route::get('/game-photos','HomeController@photo')->name('photos');
  Route::get('/about','HomeController@about')->name('about');
});

// Route For Authenticate User Only
Route::group(['prefix' => 'settings', 'middleware' => 'auth'],function(){

  Route::get('/setting','SettingsController@index')->name('settings.index');

  // PlatForms Routes
  Route::get('/platforms','SettingsController@platforms')->name('settings.platform');
  Route::get('/platforms/{id}/delete','PlatformsController@destroy')->name('platforms.destroy');
  Route::post('/platforms/store','PlatformsController@store')->name('platforms.store');
  Route::get('/platforms/{id}/edit','PlatformsController@edit')->name('platforms.edit');
  Route::post('/platforms/{id}/update','PlatformsController@update')->name('platforms.update');

  // Categories Routes
  Route::get('/categories','SettingsController@categories')->name('settings.categories');
  Route::get('/categories/{id}/delete','CategoriesController@destroy')->name('categories.destroy');
  Route::post('/categories/store','CategoriesController@store')->name('categories.store');
  Route::get('/categories/{id}/edit','CategoriesController@edit')->name('categories.edit');
  Route::post('/categories/{id}/update','CategoriesController@update')->name('categories.update');

  // Users Routes
  Route::get('/users','SettingsController@users')->name('settings.users');
  Route::get('/users/{id}/delete','UsersController@destroy')->name('users.destroy');
  Route::post('users/store','UsersController@store')->name('users.store');
  Route::get('users/profile','UsersController@show')->name('users.profile');
  Route::post('users/update','UsersController@update')->name('users.update');

  // Games Routes
  Route::get('/games','GamesController@index')->name('games.index');
  Route::get('/games/game/{id}','GamesController@show')->name('games.show');
  Route::get('/games/upload','GamesController@upload_show')->name('games.upload');
  Route::post('games/store','GamesController@store')->name('games.store');
  Route::get('/games/{id}/{logo}/{file}delete','GamesController@destroy')->name('games.destroy');
  Route::get('/games/{id}/edit','GamesController@edit')->name('games.edit');
  Route::post('/games/{id}/update','GamesController@update')->name('games.update');

});

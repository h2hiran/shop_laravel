<?php

//frontend rout

//use App\menu;

Route::get('/', 'frontendcontroller@index');
Route::get('/prodoct/{prodoct}', 'frontendcontroller@show');
Route::get('/add-sabad/{prodoct}', 'frontendcontroller@store');
Route::get('/shop/last','frontendcontroller@last');
Route::get('/shop/Bestseller','frontendcontroller@Bestseller');
Route::get('/shop/Discount','frontendcontroller@Discount');
Route::get('/category/{seo}','frontendcontroller@categoey');
Route::any('/search','frontendcontroller@search');
Route::any('/about','frontendcontroller@about');

Route::any('/test','frontendcontroller@test');




//for page 404 send variable

//\View::composer('errors/404', function($view)
//{
//    $menu=menu::all();
//
//    $view->with('menu', $menu);
//});




Route::get('/account-login', 'karbarcontroller@index');
Route::post('/user_store', 'karbarcontroller@store');
Route::get('/account-logout', 'karbarcontroller@destroy');
Route::get('/account', 'karbarcontroller@show');
Route::get('/account-profile', 'karbarcontroller@profile');
Route::get('/account-orders', 'karbarcontroller@orders');
Route::get('/account-wishlist', 'karbarcontroller@wishlist');




Route::get('/cart', 'karbarcontroller@cart');
Route::post('/update_sabad', 'karbarcontroller@update_sabad');
Route::get('/checkout', 'karbarcontroller@checkout')->name('payment');;
Route::get('/callback', 'karbarcontroller@callback')->name('callback');
Route::get('/complete', 'karbarcontroller@complete');





Auth::routes();





// admin rout


Route::get('/admin', 'admincontroller@index');
Route::get('/admin/list-we', 'admincontroller@we');
Route::get('/admin/list-spe', 'admincontroller@spe');
Route::get('/admin/store-setting/{status}/{id}/{active}', 'admincontroller@store');






// menu rout
Route::get('/admin/add-menu/{id}', 'menucontroller@create');
Route::get('/admin/list-menu/{id}', 'menucontroller@show');
Route::post('/admin/add-menu/store/{id}', 'menucontroller@store');
Route::get('/admin/list-menu/delete-menu/{menu}', 'menucontroller@destroy');
Route::get('/admin/list-menu/edite-menu/{menu}', 'menucontroller@edit');
Route::post('/admin/list-menu/edite-menu/update/{menu}', 'menucontroller@update');


//ajax route
Route::post('/admin/ajaxf', 'ajaxcontroller@index');
Route::post('/admin/ajaxf2', 'ajaxcontroller@index2');

Route::post('/add_sabad', 'ajaxcontroller@sabad');
Route::post('/remove_sabad', 'ajaxcontroller@removesabad');
Route::post('/add_sabad_single', 'ajaxcontroller@addsabad');
Route::post('/add_fav', 'ajaxcontroller@addfave');
Route::post('/remove_fav', 'ajaxcontroller@removefave');
Route::post('/remove_cart', 'ajaxcontroller@removecart');



//product rout
Route::get('/admin/add-prodoct/', 'prodoctcontroller@create');
Route::post('/admin/store-prodoct/', 'prodoctcontroller@store');
Route::get('/admin/list-prodoct/', 'prodoctcontroller@show');
Route::get('/admin/edite-prodoct/{prodoct}', 'prodoctcontroller@edit');


//brand rout
Route::get('/admin/add-brand/', 'brandcontroller@create');
Route::post('/admin/store-brand/', 'brandcontroller@store');
Route::get('/admin/list-brand/', 'brandcontroller@show');
Route::get('/admin/delete-brand/{brand}', 'brandcontroller@destroy');





//slider rout
Route::get('/admin/add-slider/', 'slidercontroller@create');
Route::post('/admin/store-slider/', 'slidercontroller@store');
Route::get('/admin/list-slider/', 'slidercontroller@show');
Route::get('/admin/delete-slider/{slider}', 'slidercontroller@destroy');

// end admin rout






//Route::get('/home', 'HomeController@index')->name('home');

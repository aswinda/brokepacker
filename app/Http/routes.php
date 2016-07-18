<?php

Route::get('/', 'HomeController@index');

Route::get('home', 'frontend\FrontendController@index');

Route::controllers([
	'auth' => 'Auth\AuthController',
	'password' => 'Auth\PasswordController',
]);

Route::get('login', 'UsersController@index');
Route::get('logout', 'UsersController@logout');
Route::post('post-register', 'UsersController@postRegister');
Route::post('post-login', 'UsersController@postLogin');

//ADMIN
Route::get('admin', 'backend\AdminController@index');

Route::get('admin/user', 'backend\AdminUserController@index');
Route::get('admin/user/create', 'backend\AdminUserController@create');
Route::post('admin/user/store', 'backend\AdminUserController@store');
Route::get('admin/user/show/{id}', 'backend\AdminUserController@show');
Route::get('admin/user/edit/{id}', 'backend\AdminUserController@edit');
Route::post('admin/user/update/{id}', 'backend\AdminUserController@update');
Route::post('admin/user/delete/{id}', 'backend\AdminUserController@delete');


// Daftar provinsi
Route::get('admin/provinces', 'backend\AdminProvincesController@index');
Route::get('admin/provinces/create', 'backend\AdminProvincesController@create');
Route::post('admin/provinces/store', 'backend\AdminProvincesController@store');
Route::get('admin/provinces/show/{id}', 'backend\AdminProvincesController@show');
Route::get('admin/provinces/edit/{id}', 'backend\AdminProvincesController@edit');
Route::post('admin/provinces/update/{id}', 'backend\AdminProvincesController@update');
Route::post('admin/provinces/delete/{id}', 'backend\AdminProvincesController@delete');



// Daftar District
Route::get('admin/districts', 'backend\AdminDistrictsController@index');
Route::get('admin/districts/create', 'backend\AdminDistrictsController@create');
Route::post('admin/districts/store', 'backend\AdminDistrictsController@store');
Route::get('admin/districts/show/{id}', 'backend\AdminDistrictsController@show');
Route::get('admin/districts/edit/{id}', 'backend\AdminDistrictsController@edit');
Route::post('admin/districts/update/{id}', 'backend\AdminDistrictsController@update');
Route::post('admin/districts/delete/{id}', 'backend\AdminDistrictsController@delete');


//Daftar places dan locations --> tempat wisata

Route::get('admin/destinations', 'backend\AdminDestinationsController@index');
Route::get('admin/destinations/create', 'backend\AdminDestinationsController@create');
Route::post('admin/destinations/store', 'backend\AdminDestinationsController@store');
Route::get('admin/destinations/show/{id}', 'backend\AdminDestinationsController@show');
Route::get('admin/destinations/edit/{id}', 'backend\AdminDestinationsController@edit');
Route::post('admin/destinations/update/{id}', 'backend\AdminDestinationsController@update');
Route::post('admin/destinations/delete/{id}', 'backend\AdminDestinationsController@delete');


//Daftar Agent

Route::get('admin/agents', 'backend\AdminAgentsController@index');
Route::get('admin/agents/create', 'backend\AdminAgentsController@create');
Route::post('admin/agents/store', 'backend\AdminAgentsController@store');
Route::get('admin/agents/show/{id}', 'backend\AdminAgentsController@show');
Route::get('admin/agents/edit/{id}', 'backend\AdminAgentsController@edit');
Route::post('admin/agents/update/{id}', 'backend\AdminAgentsController@update');
Route::post('admin/agents/delete/{id}', 'backend\AdminAgentsController@delete');



//Daftar Agent Routes

Route::get('admin/agents_routes', 'backend\AdminAgents_routesController@index');
Route::get('admin/agents_routes/create', 'backend\AdminAgents_routesController@create');
Route::post('admin/agents_routes/store', 'backend\AdminAgents_routesController@store');
Route::get('admin/agents_routes/show/{id}', 'backend\AdminAgents_routesController@show');
Route::get('admin/agents_routes/edit/{id}', 'backend\AdminAgents_routesController@edit');
Route::post('admin/agents_routes/update/{id}', 'backend\AdminAgents_routesController@update');
Route::post('admin/agents_routes/delete/{id}', 'backend\AdminAgents_routesController@delete');



//Daftar Inns

Route::get('admin/inns', 'backend\AdminInnsController@index');
Route::get('admin/inns/create', 'backend\AdminInnsController@create');
Route::post('admin/inns/store', 'backend\AdminInnsController@store');
Route::get('admin/inns/show/{id}', 'backend\AdminInnsController@show');
Route::get('admin/inns/edit/{id}', 'backend\AdminInnsController@edit');
Route::post('admin/inns/update/{id}', 'backend\AdminInnsController@update');
Route::post('admin/inns/delete/{id}', 'backend\AdminInnsController@delete');






//Daftar Packages

Route::get('admin/packages', 'backend\AdminPackagesController@index');
Route::get('admin/packages/create', 'backend\AdminPackagesController@create');
Route::post('admin/packages/store', 'backend\AdminPackagesController@store');
Route::get('admin/packages/show/{id}', 'backend\AdminPackagesController@show');
Route::get('admin/packages/edit/{id}', 'backend\AdminPackagesController@edit');
Route::post('admin/packages/update/{id}', 'backend\AdminPackagesController@update');
Route::post('admin/packages/delete/{id}', 'backend\AdminPackagesController@delete');



//Daftar Bookings

Route::get('admin/bookings', 'backend\AdminBookingsController@index');
Route::get('admin/bookings/customer', 'backend\AdminBookingsController@customer');
Route::get('admin/bookings/createpackages', 'backend\AdminBookingsController@createpackages');
Route::get('admin/bookings/createuserpackages', 'backend\AdminBookingsController@createuserpackages');
Route::post('admin/bookings/storepackages', 'backend\AdminBookingsController@storepackages');
Route::post('admin/bookings/storeuserpackages', 'backend\AdminBookingsController@storeuserpackages');
Route::get('admin/bookings/show/{id}', 'backend\AdminBookingsController@show');
Route::get('admin/bookings/edit/{id}', 'backend\AdminBookingsController@edit');
Route::post('admin/bookings/update/{id}', 'backend\AdminBookingsController@update');
Route::post('admin/bookings/delete/{id}', 'backend\AdminBookingsController@delete');

//Daftar Order

Route::get('admin/orders', 'backend\AdminOrdersController@index');
Route::get('admin/orders/create', 'backend\AdminOrdersController@create');
Route::post('admin/orders/store', 'backend\AdminOrdersController@store');
Route::get('admin/orders/show/{id}', 'backend\AdminOrdersController@show');
Route::get('admin/orders/edit/{id}', 'backend\AdminOrdersController@edit');
Route::post('admin/orders/update/{id}', 'backend\AdminOrdersController@update');
Route::post('admin/orders/delete/{id}', 'backend\AdminOrdersController@delete');

// Frontend

// packages
Route::post('packages/find', 'frontend\FrontendPackagesController@find');
Route::get('packages/show/{id}', 'frontend\FrontendPackagesController@show');

// booking 
Route::get('booking', 'frontend\BookingController@index');
Route::get('booking/book/{id}', 'frontend\BookingController@book');
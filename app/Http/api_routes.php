<?php

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where all API routes are defined.
|
*/





Route::resource('customer_companies', 'CustomerCompaniesAPIController');

Route::resource('customer_users', 'CustomerUsersAPIController');


Route::resource('tickets', 'TicketAPIController');
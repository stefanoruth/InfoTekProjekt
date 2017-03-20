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

$router->get('/', 'PageController@welcome');
$router->get('posts', 'PostController@index')->name('blog');
$router->get('posts/{slug}', 'PostController@show')->name('post.show');
$router->get('teams', 'TeamController@index')->name('teams');
$router->get('teams/{id}', 'TeamController@show')->name('teams.show');
$router->auth();

$router->group(['prefix' => 'admin'], function($router){

	$router->get('users', 'UserController@index');
});


// Laravel Cashier
$router->post('stripe/webhook','\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');
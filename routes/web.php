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

$router->get('/', 'PageController@welcome')->name('home');
$router->get('about', 'PageController@about')->name('about');

$router->get('events', 'EventController@index')->name('events');
$router->get('events/{id}', 'EventController@show')->name('events.show');

$router->get('posts', 'PostController@index')->name('blog');
$router->get('posts/{slug}', 'PostController@show')->name('post.show');

$router->get('teams', 'TeamController@index')->name('teams');
$router->get('teams/{id}', 'TeamController@show')->name('teams.show');

$router->get('galleries', 'GalleryController@index')->name('galleries');
$router->get('galleries/{slug}', 'GalleryController@show')->name('galleries.show');

$router->auth();

$router->group(['middleware' => 'auth'], function($router){

	$router->get('logout', 'Auth\LoginController@logout')->name('logout');
	$router->get('profile', 'UserController@profile')->name('user.profile');
	$router->post('profile/store', 'UserController@store')->name('user.store');
	$router->get('events/{id}/join', 'EventController@toggleEvent')->name('events.join');

	$router->get('admin/posts', 'AdminController@postList')->name('admin.posts.index');
	$router->get('admin/posts/create', 'AdminController@postCreate')->name('admin.posts.create');
	$router->post('admin/posts/store', 'AdminController@postStore')->name('admin.posts.store');
	$router->get('admin/posts/{id}', 'AdminController@postEdit')->name('admin.posts.edit');

	$router->get('admin/users', 'AdminController@userList')->name('admin.users.index');

	$router->get('admin/teams', 'AdminController@teamList')->name('admin.teams.index');
	$router->get('admin/teams/create', 'AdminController@teamCreate')->name('admin.teams.create');
	$router->post('admin/teams/store', 'AdminController@teamStore')->name('admin.teams.store');
	$router->get('admin/teams/{id}', 'AdminController@teamEdit')->name('admin.teams.edit');

	$router->get('admin/galleries', 'AdminController@galleryList')->name('admin.galleries.index');
	$router->get('admin/galleries/create', 'AdminController@galleryCreate')->name('admin.galleries.create');
	$router->post('admin/galleries/store', 'AdminController@galleryStore')->name('admin.galleries.store');
	$router->get('admin/galleries/{id}', 'AdminController@galleryEdit')->name('admin.galleries.edit');
	$router->get('admin/galleries/{id}/delete-image/{image}', 'AdminController@galleryRemoveImage')->name('admin.galleries.image.remove');

	$router->get('admin/events', 'AdminController@eventList')->name('admin.events.index');
	$router->get('admin/events/create', 'AdminController@eventCreate')->name('admin.events.create');
	$router->post('admin/events/store', 'AdminController@eventStore')->name('admin.events.store');
	$router->get('admin/events/{id}', 'AdminController@eventEdit')->name('admin.events.edit');

	$router->get('admin/about', 'AdminController@pageEdit')->name('admin.about.edit');
	$router->post('admin/about/store', 'AdminController@pageStore')->name('admin.about.store');
});

// Laravel Cashier
$router->post('stripe/webhook','\Laravel\Cashier\Http\Controllers\WebhookController@handleWebhook');
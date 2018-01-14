<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

use App\Realty;
use App\User;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

$router->group(['prefix' => 'realties'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return Realty::all();
    });
    $router->get('/{id}', function ($id) use ($router) {
        return Realty::findOrFail($id);
    });

    $router->post('/', function (Request $request) use ($router) {
        $realty = App\Realty::firstOrCreate($request->json()->all());
        return response($realty, Response::HTTP_CREATED);
    });

    $router->put('/{id}', function (Request $request, $id) use ($router) {
        $realty = App\Realty::findOrFail($id);
        $realty->update($request->json()->all());
        return response($realty, Response::HTTP_ACCEPTED);
    });

    $router->delete('/{id}', function ($id) use ($router) {
        $realty = Realty::findOrFail($id);
        $realty->delete();
        return response('The resource is deleted successfully!', Response::HTTP_ACCEPTED);
    });
});

$router->group(['prefix' => 'users'], function () use ($router) {
    $router->get('/', function () use ($router) {
        return User::all();
    });
    $router->get('/{id}/addresses', function ($id) use ($router) {
        return User::findOrFail($id)->addresses;
    });
    $router->get('/{id}', function ($id) use ($router) {
        return User::findOrFail($id);
    });

    $router->post('/', function (Request $request) use ($router) {
        $user = App\User::firstOrCreate($request->json()->all());
        return response($user, Response::HTTP_CREATED);
    });

    $router->put('/{id}', function (Request $request, $id) use ($router) {
        $user = App\User::findOrFail($id);
        $user->update($request->json()->all());
        return response($user, Response::HTTP_ACCEPTED);
    });

    $router->delete('/{id}', function ($id) use ($router) {
        $user = User::findOrFail($id);
        $user->delete();
        return response('The resource is deleted successfully!', Response::HTTP_ACCEPTED);
    });
});
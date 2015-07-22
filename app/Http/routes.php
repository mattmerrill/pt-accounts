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

use App\Account;
use Illuminate\Http\Request;


$app->group(['prefix' => 'v1', 'middleware' => 'api'], function ($app) {
    $app->post('/', function (Request $request) {
        $account = Account::create($request->input());
        return $account;
    });

    $app->get('/{id}', function($id) {
        $account = Account::findOrFail($id);
        return $account;
    });

    $app->patch('/{id}', function ($id, Request $request) {
        $account = Account::findOrFail($id);
        return $account->update($request->input());
    });


    $app->delete('/{id}', function ($id) {
        $account = Account::findOrFail($id);
        return $account->delete();
    });

    $app->get('/{id}/isActive', function () {
        return "true";
    });
});

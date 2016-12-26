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

$app->get('/', function () use ($app) {
    return $app->version();
});

$app->get('/clientes/{company_id}', 'ClientCtrl@index');
$app->post('/clientes/{company_id}', 'ClientCtrl@create');

$app->get('/clientes/{company_id}/{id}', 'ClientCtrl@single');
$app->post('/clientes/{company_id}/{id}', 'ClientCtrl@update');
$app->delete('/clientes/{company_id}/{id}', 'ClientCtrl@destroy');


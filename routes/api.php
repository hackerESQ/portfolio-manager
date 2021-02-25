<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Scheb\YahooFinanceApi\ApiClient;
use Scheb\YahooFinanceApi\ApiClientFactory;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/lookup',function(Request $request) {
    if ($request->key !== env('API_KEY')) return false;

    $client = ApiClientFactory::createApiClient();

    return $client->getHistoricalData($request->symbol, ApiClient::INTERVAL_1_DAY, new \DateTime("-10 years"), new \DateTime("today"), ApiClient::FILTER_DIVIDENDS);
});

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

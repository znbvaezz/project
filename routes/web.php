<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('admin')->namespace('Admin')->group(function () {
    Route::match(['post', 'get'], '', 'AdminAuthController@login')->name('admin_login');
    Route::match(['post', 'get'], 'logout', 'AdminAuthController@logout')->name('admin_logout');

    Route::get('dashboard', 'AdminDashboardController@index')->name('admin_dashboard');

    Route::prefix('transaction')->namespace('Transaction')->group(function () {
        Route::get('list', 'TransactionListController@index')->name('admin_transaction_list');
        Route::get('{id}', 'TransactionSingleController@index')->name('admin_transaction_single');
    });

    Route::prefix('agent')->namespace('Agent')->group(function () {
        Route::match(['post', 'get'], 'list', 'AgentListController@index')->name('admin_agent_list');
        Route::match(['get', 'post'], 'add', 'AgentSingleController@add')->name('admin_agent_add');
        Route::match(['get', 'post'], 'edit/{id}', 'AgentSingleController@edit')->name('admin_agent_edit');
    });
});

Route::prefix('admin')->namespace('Agent')->group(function () {
    Route::middleware('admin_auth')->group(function () {
        Route::prefix('request')->namespace('Request')->group(function () {
            Route::get('list', 'RequestListController@index')->name('agent_request_list');
            Route::get('{id}', 'RequestSingleController@index')->name('agent_request_single');
        });

        Route::prefix('history')->namespace('History')->group(function () {
            Route::get('list', 'HistoryListController@index')->name('agent_history_list');
            Route::get('{id}', 'HistorySingleController@index')->name('agent_history_single');
        });
    });
});

Route::namespace('Web')->group(function () {
    Route::match(['post', 'get'], '/', 'WebHomeController@index');
    Route::post('/gateway', 'WebGatewayController@index')->name('gateway
    ');
});

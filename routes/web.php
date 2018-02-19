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
$this->group(['middleware' =>['auth'], 'namespace' => 'Admin', 'prefix' => 'admin'], function(){

   $this->get('withdrawn', 'BalanceController@withdrawn')->name('balance.withdrawn');
   $this->post('withdrawn', 'BalanceController@withdrawnStore')->name('withdrawn.store');

   $this->post('deposit', 'BalanceController@depositStore')->name('deposit.store');
   $this->get('deposit', 'BalanceController@deposit')->name('balance.deposit');

   $this->get('transfer', 'BalanceController@transfer')->name('balance.transfer');
   $this->post('transfer', 'BalanceController@transferStore')->name('transfer.store');

   $this->post('transfer-valor', 'BalanceController@transferValorStore')->name('transfer.valor.store');
   $this->get('transfer-valor', 'BalanceController@transferValor')->name('transfer.valor');

   $this->get('transfer-confirm', 'BalanceController@transferConfirm')->name('transfer-confirm');
   $this->get('balance', 'BalanceController@index')->name('admin.balance');
   $this->get('/', 'AdminController@index')->name('admin.home');
});
Route::get('/', 'Site\SiteController@index')->name('home');

Auth::routes();


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

Route::get('/', function () {
    return redirect()->route('home');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::prefix('pengguna')->group(function(){
    Route::prefix('petugas')->group(function(){
        Route::get('/', 'Data\PetugasController@index')->name('tampilanPetugas');
        Route::post('/prosesTambah', 'Data\PetugasController@save')->name('petugasSave');
        Route::post('/prosesEdit/{id}', 'Data\PetugasController@update')->name('petugasUpdate');
        Route::get('/getDataEdit/{id}', 'Data\PetugasController@getDataEdit');
        Route::get('/hapus/{id}', 'Data\PetugasController@delete')->name('petugasDelete');
    });
    Route::prefix('distributor')->group(function(){
        Route::get('/', 'Data\DistributorController@index')->name('tampilanDistributor');
        Route::post('/prosesTambah', 'Data\DistributorController@save')->name('distributorSave');
        Route::post('/prosesEdit/{id}', 'Data\DistributorController@update')->name('distributorUpdate');
        Route::get('/getDataEdit/{id}', 'Data\DistributorController@getDataEdit');
        Route::get('/hapus/{id}', 'Data\DistributorController@delete')->name('distributorDelete');
    });
});

Route::prefix('barang')->group(function(){
    Route::prefix('jenisBarang')->group(function(){
        Route::get('/', 'Barang\JenisBarangController@index')->name('jenisBarangIndex');
        Route::post('/prosesTambah', 'Barang\JenisBarangController@save')->name('jenisBarangSave');
        Route::post('/prosesEdit/{id}', 'Barang\JenisBarangController@update')->name('jenisBarangUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\JenisBarangController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\JenisBarangController@delete')->name('jenisBarangDelete');
    });
    Route::prefix('barangMasuk')->group(function(){
        Route::get('/', 'Barang\BarangMasukController@index')->name('barangMasukIndex');
        Route::post('/prosesTambah', 'Barang\BarangMasukController@save')->name('barangMasukSave');
        Route::post('/prosesEdit/{id}', 'Barang\BarangMasukController@update')->name('barangMasukUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\BarangMasukController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\BarangMasukController@delete')->name('barangMasukDelete');
    });
    Route::prefix('barang')->group(function(){
        Route::get('/', 'Barang\BarangController@index')->name('barangIndex');
        Route::post('/prosesTambah', 'Barang\BarangController@save')->name('barangSave');
        Route::post('/prosesEdit/{id}', 'Barang\BarangController@update')->name('barangUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\BarangController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\BarangController@delete')->name('barangDelete');
    });
    Route::prefix('detailBarang')->group(function(){
        Route::get('/', 'Barang\DetailBarangController@index')->name('detailBarangIndex');
        Route::post('/prosesTambah', 'Barang\DetailBarangController@save')->name('detailBarangSave');
        Route::post('/prosesEdit/{id}', 'Barang\DetailBarangController@update')->name('detailBarangUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\DetailBarangController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\DetailBarangController@delete')->name('detailBarangDelete');
    });
    
    Route::prefix('penjualan')->group(function(){
        Route::get('/', 'Barang\PenjualanController@index')->name('penjualanIndex');
        Route::post('/prosesTambah', 'Barang\PenjualanController@save')->name('penjualanSave');
        Route::post('/prosesEdit/{id}', 'Barang\PenjualanController@update')->name('penjualanUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\PenjualanController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\PenjualanController@delete')->name('penjualanDelete');
    });
    Route::prefix('detailPenjualan')->group(function(){
        Route::get('/', 'Barang\DetailPenjualanController@index')->name('detailPenjualanIndex');
        Route::post('/prosesTambah', 'Barang\DetailPenjualanController@save')->name('detailPenjualanSave');
        Route::post('/prosesEdit/{id}', 'Barang\DetailPenjualanController@update')->name('detailPenjualanUpdate');
        Route::get('/getDataEdit/{id}', 'Barang\DetailPenjualanController@getDataEdit');
        Route::get('/hapus/{id}', 'Barang\DetailPenjualanController@delete')->name('detailPenjualanDelete');
    });
});
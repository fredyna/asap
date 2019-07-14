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
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/auth/check', function () { })->middleware('auth', 'role');

Route::get('/home', 'HomeController@index')->name('home')->middleware(['auth', 'admin']);
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/', 'HomeController@index')->name('admin.dashboard');
    Route::resource('/user', 'UserController');
    Route::resource('soal/tipe-soal', 'BankSoal\TipeSoalController')
        ->except(['create', 'edit']);
    Route::resource('soal/kategori-soal', 'BankSoal\KategoriSoalController')
        ->except(['create', 'edit']);
    Route::resource('soal/soal', 'BankSoal\Soal\SoalController')
        ->only(['index', 'create', 'show']);
    Route::resource('ujian/kategori-ujian', 'Ujian\KategoriUjianController')
        ->except(['create', 'edit', 'update']);
    Route::resource('ujian/ujian', 'Ujian\UjianController')
        ->except(['update']);
    Route::resource('ujian/soal-ujian', 'Ujian\SoalUjianController')
        ->only(['show']);
    Route::resource('/laporan', 'LaporanController')
        ->only(['index', 'show']);
    Route::resource('log', 'LogController')
        ->only(['index', 'destroy']);
});

Route::group(['prefix' => 'member', 'middleware' => ['auth', 'verified']], function () {
    Route::get('/', 'Member\ListUjianController@index')->name('member.index');
    Route::get('/ujian/contoh', 'Member\UjianController@index');
    Route::get('/ujian/enroll/{ujian}', 'Member\UjianController@enroll')->name('member.ujian.enroll');
    Route::get('/ujian/start/{ujian}', 'Member\UjianController@enrollUjian')->name('member.ujian.start');;
    Route::resource('/pengumuman', 'Member\PengumumanController');
    Route::get('/ujian/{id}', 'Member\UjianRunController@index')->name('member.ujian');
    Route::get('/ujian/save/{id}', 'Member\UjianRunController@save')->name('member.ujian.save');
});

Route::group(['prefix' => 'banksoal', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/tipe-soal', 'BankSoal\ApiTipeSoalController@index');
    Route::get('/kategori-soal', 'BankSoal\ApiKategoriSoalController@index');
    Route::post('/simpan-soal', 'BankSoal\Soal\ApiSoalController@store');
    Route::delete('/delete-soal/{id}', 'BankSoal\Soal\ApiSoalController@destroy');
    Route::get('/soal', 'BankSoal\Soal\ApiSoalController@index');
    Route::get('/soal/{id}', 'BankSoal\Soal\ApiSoalController@show');
});

Route::group(['prefix' => 'ujian', 'middleware' => ['auth', 'admin']], function () {
    Route::get('/kategori-ujian-api', 'Ujian\ApiKategoriUjianController@index');
    Route::resource('/ujian-api', 'Ujian\ApiUjianController')
        ->only(['index', 'show', 'destroy']);
    Route::resource('/soal-ujian-api', 'Ujian\ApiSoalUjianController')
        ->only(['index', 'store', 'show', 'destroy']);
});

Route::post('/setting/password', 'SettingController@changePassword')->name('setting.password');
Route::resource('/setting', 'SettingController')
    ->only(['index', 'store']);

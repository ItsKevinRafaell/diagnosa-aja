<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\User\AdminController;
use App\Http\Controllers\API\ArticleController;
use App\Http\Controllers\API\OpenAiController;
use App\Http\Controllers\History\DiseaseHistoryController;
use App\Http\Controllers\History\DiagnosisHistoryController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::view('/', 'welcome');

Route::controller(ArticleController::class)->group(function (){
    Route::get('/artikel', 'article');
});

Route::controller(OpenAiController::class)->group(function (){
    Route::get('/diagnosa', 'diagnosa');
    Route::get('/get-diagnosa', 'getDiagnosa');
    Route::post('/store-diagnosa', 'storeDiagnosa');
});

Route::group(['middleware' => ['role:user|admin']], function(){
    Route::view('dashboard', 'dashboard')->name('dashboard');
    Route::view('profile', 'profile')->name('profile');

    Route::group(['middleware' => ['role:admin']], function(){
        Route::controller(AdminController::class)->group(function() {
            Route::get('/user', 'user')->name('user');
            Route::get('/anonymous', 'anonymous')->name('anonymous');
        });
        Route::controller(DiseaseHistoryController::class)->group(function() {
            Route::get('/riwayat-penyakit/{user_id}/user', 'userDiseaseHistory')->name('riwayat.penyakit.user');
            Route::get('/riwayat-penyakit/{anonymous_id}/anonymous', 'anonymousDiseaseHistory')->name('riwayat.penyakit.anonymous');
        });
        Route::controller(DiagnosisHistoryController::class)->group(function() {
            Route::get('/riwayat-diagnosa/{user_id}/user', 'userDiagnosisHistory')->name('riwayat.diagnosa.user');
            Route::get('/riwayat-diagnosa/{anonymous_id}/anonymous', 'anonymousDiagnosisHistory')->name('riwayat.diagnosa.anonymous');
        });
    });
});

require __DIR__.'/auth.php';

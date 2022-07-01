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
    // return login page
    // return view('auth.login');
});

Auth::routes();
Route::get('/home', 'HomeController@index')->name('home');

Route::group(['middleware' => 'auth'], function () {
    //=======================================================================
    // 物件 
    //=======================================================================
    Route::get('/property/{id}/comprehensive_edit', 'PropertyController@comprehensive_edit')->name('property.comprehensive_edit');

    Route::resource("property", "PropertyController");
    //=======================================================================
    // 拠点マスタ
    //=======================================================================
    Route::resource("sales_office", "SalesOfficesController");
    //=======================================================================
    // 協力会社マスタ
    //=======================================================================
    Route::resource("partner_company", "PartnerCompanyController");
    //=======================================================================
    // 調査
    //=======================================================================
    //menu
    Route::get('/investigation/{id}/menu', 'InvestigationsController@menu')->name('investigation.menu');

    Route::resource("investigation", "InvestigationsController");
    //=======================================================================
    // 分電盤
    //=======================================================================
    Route::get('/distribution_board/{id}/create_investigation', 'DistributionBoardsController@create_investigation')->name('distribution_board.create_investigation');
    Route::get('/distribution_board/{id}/index_investigation', 'DistributionBoardsController@index_investigation')->name('distribution_board.index_investigation');
    // edit
    Route::any('/distribution_board/{id}/edit_investigation', 'DistributionBoardsController@edit_investigation')->name('distribution_board.edit_investigation');

    Route::resource("distribution_board", "DistributionBoardsController");
    //=======================================================================

    //=======================================================================
    Route::resource("measuring_picture", "MeasuringPicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("component_picture", "ComponentPicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("other_picture", "OtherPicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("aged_rank_internal_picture", "AgedRankInternalPicturesController");
    //=======================================================================

    //=======================================================================
    // Route::resource("degradation_rank_internal1_picture", "DegradationRankInternal1PicturesController");
    Route::resource("degradation_rank_internal1", "DegradationRankInternal1PicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("degradation_rank_internal2", "DegradationRankInternal2PicturesController");
    // Route::resource("degradation_rank_internal2_picture", "DegradationRankInternal2PicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("improvement_rank_internal1", "ImprovementRankInternal1PicturesController");
    // Route::resource("improvement_rank_internal1_picture", "ImprovementRankInternal1PicturesController");
    //=======================================================================

    //=======================================================================
    Route::resource("improvement_rank_internal2", "ImprovementRankInternal2PicturesController");
    // Route::resource("improvement_rank_internal2_picture", "ImprovementRankInternal2PicturesController");
    //=======================================================================
    // resourse
    Route::resource("department", "DepartmentsController");


    //ユーザーマスタ
    Route::get('/auth/index', 'Auth\RegisterController@index')->name('register.index');
    Route::get('/auth/{id}/edit', 'Auth\RegisterController@edit')->name('register.edit');
    Route::put('/auth/{id}/destroy', 'Auth\RegisterController@destroy')->name('register.destroy');
    Route::put('/auth/{id}/update', 'Auth\RegisterController@update')->name('register.update');
});

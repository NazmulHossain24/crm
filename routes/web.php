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

Route::group(['middleware' => 'auth'], function () {


    Route::get('/', 'DashboardController@index');
    Route::get('show/notice', 'DashboardController@show');
    Route::get('del_notice/{id}', 'DashboardController@del');

    Route::get('new/site', 'NewSiteController@index');
    Route::get('new/edi/{id}', 'NewSiteController@edi');

    Route::get('my/site', 'Mysite\SiteController@index');
    Route::get('my/delete/{id}', 'Mysite\SiteController@del');
    Route::get('my/submission/{id}', 'Mysite\SiteController@submission');
    Route::get('my/data_tbl', 'Mysite\SiteController@data_table');

    Route::get('my/submissions', 'Mysite\SubmissionController@index');
    Route::get('my/show/{id}', 'Mysite\SubmissionController@show');
    Route::get('my/data_stbl', 'Mysite\SubmissionController@data_table');

    Route::get('entry', 'CompanyEntryController@index');
    Route::post('entry/save', 'CompanyEntryController@save');
    Route::post('entry/edit', 'CompanyEntryController@edit');
    Route::get('entry/del/{id}', 'CompanyEntryController@del');

    Route::post('site_details/save', 'SiteDetailsController@save');
    Route::post('site_details/notes', 'SiteDetailsController@add_note');
    Route::get('site_details/show_notes/{id}', 'SiteDetailsController@show_note');
    Route::post('site_details/status', 'SiteDetailsController@change_status');
    Route::get('site_details/show_post', 'SiteDetailsController@check_post_code');
    
    Route::post('electricity/save', 'ElectricityController@save');
    Route::post('gas/save', 'GasController@save');
    Route::post('water/save', 'WaterController@save');
    Route::post('land_line/save', 'LandLineController@save');
    Route::post('broadband/save', 'BroadBandController@save');
    Route::post('insurance/save', 'InsuranceController@save');
    Route::post('e_pos/save', 'EposController@save');
    Route::post('company/save', 'CompanyDetailsController@save');
    Route::post('billing/save', 'BillingController@save');
    Route::post('payment/save', 'PaymentController@save');

    Route::get('note', 'NoteController@index');
    Route::post('note/send', 'NoteController@send');

    Route::get('attachments', 'AttachmentController@index');
    Route::post('attachments/save', 'AttachmentController@save');
    Route::get('attachments/del/{id}/{type}', 'AttachmentController@del');

    Route::get('user', 'UserController@index');
    Route::post('user/changes', 'UserController@changes');
    Route::post('user/new_user', 'UserController@save');
    Route::post('user/edi_user', 'UserController@edite_user');
    Route::get('user/del/{id}', 'UserController@del');

    Route::get('reports', 'ReportController@index');
    Route::post('reports/warning_report', 'ReportController@warning_report');
    Route::post('reports/user_report', 'ReportController@user_report');

    Route::get('search-api', 'DashboardController@search_api');
    Route::get('search', 'DashboardController@search');

    Route::get('no-access', 'NoAccessController@index');
});

Auth::routes();

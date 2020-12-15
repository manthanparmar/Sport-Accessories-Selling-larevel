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


Route::post('/registerUser','UserDataController@create');
Route::post('/loginUser','UserDataController@login');
Route::get('/logout','UserDataController@logout');


// page calling controller
Route::get('/','PageCallerController@CallHome');

Route::get('/login','PageCallerController@CallLogin');
Route::get('/forgotpassword','PageCallerController@CallForgotPassword');
Route::get('/register','PageCallerController@CallRegister');

Route::post('/forgotPass','ForgotPasswordController@forgotPassword');

Route::get('/changepassword','PageCallerController@CallChangePassword');
Route::post('/EditUserPassword','UserDataController@changePassword')->middleware('UserSessionFilter'); 


Route::get('/contactus','PageCallerController@CallContactUs');
Route::get('/aboutus','PageCallerController@CallAboutUs');
Route::get('/viewProduct/{id}','PageCallerController@CallViewProduct');
Route::get('/myProfile','PageCallerController@CallMyProfile')->middleware('UserSessionFilter');  
Route::post('/editUserData','UserDataController@updateUserData')->middleware('UserSessionFilter');  

Route::get('/addressManage','PageCallerController@CallAddress')->middleware('UserSessionFilter');  
Route::post('/createAddress','AddressController@createAddress')->middleware('UserSessionFilter');  
Route::post('/updateAddress','AddressController@updateAddress')->middleware('UserSessionFilter');
Route::get('/deleteAddress/{id}','AddressController@destroyAddress')->middleware('UserSessionFilter');

Route::get('/viewCart','PageCallerController@CallViewCart')->middleware('UserSessionFilter');
Route::get('/deleteCart/{id}','CartController@destroyCart')->middleware('UserSessionFilter');

Route::get('/checkOut','PageCallerController@CallCheckOut')->middleware('UserSessionFilter');

Route::get('/myOrders','PageCallerController@CallMyOrders')->middleware('UserSessionFilter');

Route::post('/addToCart','CartController@create')->middleware('UserSessionFilter');
Route::post('/placeOrder','OrdersController@create')->middleware('UserSessionFilter');
Route::match(['get', 'post'],'/categoryProduct','PageCallerController@CallViewCategoryProduct');


Route::post('/createfeedback','feedbackController@createFeedback')->middleware('UserSessionFilter');

// Admin Side

Route::prefix('cpanel')->group(function () {

    Route::post('/createCategory','CategoryController@create')->middleware('sessionFilter');  
    Route::get('/deleteCategory/{id}','CategoryController@destroy')->middleware('sessionFilter');
    Route::post('/updateCategory','CategoryController@update')->middleware('sessionFilter');

    Route::post('/createSubCategory','CategoryController@createSubCategory')->middleware('sessionFilter');
    Route::get('/deleteSubCategory/{id}','CategoryController@destroySubCategory')->middleware('sessionFilter');
    Route::post('/updateSubCategory','CategoryController@updateSubCategory')->middleware('sessionFilter');

    Route::post('/createBrand','BrandController@createBrand')->middleware('sessionFilter');
    Route::get('/deleteBrand/{id}','BrandController@destroyBrand')->middleware('sessionFilter');
    Route::post('/updateBrand','BrandController@updateBrand')->middleware('sessionFilter');

    Route::post('/UploadProductFile','ProductController@UploadProductFile')->middleware('sessionFilter');
    Route::post('/createProduct','ProductController@createProduct')->middleware('sessionFilter');
    Route::get('/destroyProduct/{id}','ProductController@destroyProduct')->middleware('sessionFilter');
    Route::post('/updateProduct','ProductController@updateProduct')->middleware('sessionFilter');

    Route::get('/confirmOrder/{id}','OrdersController@confirm')->middleware('sessionFilter');
    Route::get('/cancelledOrder/{id}','OrdersController@cancelled')->middleware('sessionFilter');

    Route::get('/makeAdmin/{id}','UserDataController@makeAdmin')->middleware('sessionFilter');
    Route::get('/makeUser/{id}','UserDataController@makeUser')->middleware('sessionFilter');



Route::get('/','PageCallerController@CallAdminLayout')->middleware('sessionFilter');
Route::get('/product','PageCallerController@CallInsertProduct')->middleware('sessionFilter');
Route::get('/category','PageCallerController@CallCreateCategory')->middleware('sessionFilter');
Route::get('/subcategory','PageCallerController@CallCreateSubCategory')->middleware('sessionFilter');
Route::get('/brand','PageCallerController@CallBrand')->middleware('sessionFilter');
Route::get('/users','PageCallerController@CallManageUser')->middleware('sessionFilter');
Route::get('/manageOrder','PageCallerController@CallManageOrder')->middleware('sessionFilter');


});

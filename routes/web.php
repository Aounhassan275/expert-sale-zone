<?php

use Illuminate\Support\Facades\Artisan;
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

/******************ADMIN PANELS ROUTES****************/
Route::group(['prefix' => 'admin', 'as'=>'admin.','namespace' => 'Admin'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::view('login', 'admin.auth.index')->name('login');
    Route::post('login','AuthController@login');
    /*******************CronJob ROUTES*************/
    Route::get('add_earning', 'AuthController@add_earning');
    Route::get('block_users', 'AuthController@block_users');
    Route::get('expire_order', 'AuthController@expire_order');
     /******************MESSAGE ROUTES****************/
     Route::resource('message', 'MessageController');
    Route::group(['middleware' => 'auth:admin'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'AdminController@dashboard')->name('dashboard.index');
    Route::view('messages', 'admin.message.index')->name('messages.index');
    /******************ADMIN ROUTES****************/
      Route::resource('admin', 'AdminController');    
    /*******************Profile ROUTES*************/
    Route::view('profile', 'admin.profile.index')->name('profile.index');
    /******************PACKAGE ROUTES****************/
    Route::resource('package', 'PackageController');    
    /******************TICKER ROUTES****************/
    Route::resource('ticker', 'TickerController');   
    /******************Slider ROUTES****************/
    Route::resource('slider', 'SliderController');    
    /******************Setting ROUTES****************/
    Route::resource('setting', 'SettingController');    
    /******************Source ROUTES****************/
    Route::resource('source', 'SourceController');    
    /******************Payment Way ROUTES****************/
    Route::resource('payment', 'PaymentController');
    /******************Email ROUTES****************/
    Route::resource('email', 'EmailController');
    /******************User ROUTES****************/
    Route::view('user', 'admin.user.index')->name('user.index');  
    Route::view('user/actives', 'admin.user.active')->name('user.actives');  
    Route::view('user/pendings', 'admin.user.pending')->name('user.pendings');  
    Route::view('user/blocks', 'admin.user.block')->name('user.blocks');  

    Route::get('user/detail/{id}','UserController@showDetail')->name('user.detail');
    Route::get('user/tree/{id}','UserController@showTree')->name('user.show_tree');
    Route::get('user/activation/{id}','UserController@activation')->name('user.activation');
    Route::get('user/delete/{id}','UserController@delete')->name('user.delete');
    Route::get('user/block/{id}','UserController@block')->name('user.block');
    Route::post('user/update','UserController@update')->name('user.update');
    Route::post('change_placement','UserController@changePlacement')->name('change.placement');
    Route::get('user/{user}/fake/login', 'UserController@fakeLogin')->name('login.fake');
    /******************Deposit ROUTES****************/
    Route::view('deposit', 'admin.deposit.index')->name('deposit.index');
    Route::view('deposit/show', 'admin.deposit.show')->name('deposit.show');
    Route::view('deposit/perfect_money', 'admin.deposit.perfect_money')->name('deposit.PerfectMoney');
    Route::view('deposit/today_perfect_money', 'admin.deposit.today_perfect_money')->name('deposit.TodayPerfectMoney');
    Route::view('deposit/own_balance', 'admin.deposit.own_balance')->name('deposit.ownBalance');
    Route::view('deposit/today_own_balance', 'admin.deposit.today_own_balance')->name('deposit.TodayownBalance');
    Route::get('user/active/{id}', 'DepositController@active')->name('user.active');   
    // Route::get('mactching_income', 'DepositController@ManageMatchingEarning')->name('user.matchinf');   
    Route::get('deposit/delete/{id}', 'DepositController@delete')->name('deposit.delete');   
       /******************Withdraw ROUTES****************/
       Route::view('withdraw', 'admin.withdraw.index')->name('withdraw.index');
	Route::view('withdraw/on_hold', 'admin.withdraw.hold')->name('withdraw.holds');
       Route::view('withdraw/history', 'admin.withdraw.complete')->name('withdraw.complete');

       Route::get('withdraw/hold/{id}', 'WithdrawController@hold')->name('withdraw.hold');   
       Route::get('withdraw/completed/{id}', 'WithdrawController@completed')->name('withdraw.completed');   
       Route::get('withdraw/delete/{id}', 'WithdrawController@delete')->name('withdraw.delete');   
	
        /******************CATEGORY ROUTES****************/
        Route::resource('category', 'CategoryController');
        /******************BRAND ROUTES****************/
        Route::resource('brand', 'BrandController');
        /******************PRODUCTS ROUTES****************/
        Route::post('product/get_category_brand', 'ProductController@getCategoryBrand')->name('product.brands');     
        Route::resource('product', 'ProductController');
        Route::resource('product_image', 'ProductImageController');
        /******************ORDER ROUTES****************/
        Route::get('order/deliver/{id}', 'OrderController@orderDelivers')->name('order.deliver');  
        Route::get('order/onhold/{id}', 'OrderController@orderonHolds')->name('order.onhold');  
        Route::resource('order', 'OrderController');  
        /******************EARNING ROUTES****************/
       Route::view('earning/direct_income', 'admin.earning.direct')->name('earning.direct_income');
       Route::view('earning/matching_income', 'admin.earning.matching')->name('earning.matching_income');
});
});
/******************USER PANELS ROUTES****************/
Route::group(['prefix' => 'user', 'as'=>'user.','namespace' => 'User'], function () {
 
    /*******************LOGIN ROUTES*************/
    Route::get('login', 'AuthController@loginView')->name('login');
    Route::post('login','AuthController@login');
     /******************REGISTERED ROUTES****************/
    Route::get('register', 'AuthController@registerView')->name('register');
    Route::view('verification', 'user.auth.forget')->name('verification');
    Route::view('reset', 'user.auth.reset')->name('reset');
    Route::post('register','AuthController@register')->name('register');
    Route::post('verification','AuthController@sendVerification')->name('verification');
    Route::post('resetPassword','AuthController@resetPassword')->name('resetPassword');
    Route::get('register/{code}', 'AuthController@code');
    Route::group(['middleware' => 'auth:user'], function () { 
    /*******************Logout ROUTES*************/       
    Route::get('logout','AuthController@logout')->name('logout');
    /*******************Dashoard ROUTES*************/
    Route::get('dashboard', 'DashboardController@index')->name('dashboard.index');
    /******************PACKAGE ROUTES****************/
    Route::get('package', 'PackageController@index')->name('package.index');
    Route::get('package/upgrade', 'PackageController@upgrade')->name('package.upgrade');
    Route::get('select_payment/{id}', 'PackageController@payment')->name('package.payment');
    Route::get('{payment}/deposit/{package}', 'DepositController@deposit')->name('deposits.index');    
    Route::get('package/direct_deposit/{package}', 'DepositController@directDeposit')->name('package.direct_deposit');    
    /******************REFRRAK ROUTES****************/
    Route::get('refer', 'UserController@refer')->name('refer.index');
    Route::get('refferral_detail/{id}','UserController@refferral_detail')->name('refer.detail');
    Route::get('left_refferal/{id}','UserController@left_refferal');
    Route::get('right_refferal/{id}','UserController@right_refferal');
    Route::get('tree/{id}','ReferralController@showTree')->name('tree.show');
    /******************Deposit  ROUTES****************/
    Route::resource('deposit', 'DepositController');
    /******************Withdraw  ROUTES****************/
    Route::resource('withdraw', 'WithdrawController');  
    /******************USER PROFILE  ROUTES****************/
    Route::resource('user', 'UserController');  
    /*******************Balance Transfer ROUTES*************/
    Route::get('balance_transfer', 'TranscationController@balance_transfer')->name('balance_transfer.index');
     /*******************Referral ROUTES*************/ 
    Route::get('direct_earning', 'EarningController@directEarning'); 
    Route::get('indirect_earning', 'EarningController@indirectEarning'); 
    
    Route::get('products', 'ProductController@showProducts')->name('product.index');
    Route::get('product/{name}', 'ProductController@showProductDetails')->name('product.show');
    Route::get('product/order/{id}', 'ProductController@orderProducts')->name('product.order');
    /******************ORDER ROUTES****************/
    Route::resource('order', 'OrderController');  



    
});
});

// Route::post('user/deposit', 'User\DepositController@store')->name('user.deposit.store');
/******************FRONTEND ROUTES****************/
Route::get('/', 'FrontendController@home')->name('home.index');
Route::get('categories', 'FrontendController@showCategory')->name('category.index');
Route::get('category/{name}', 'FrontendController@showCategoryDetails')->name('category.show');
Route::get('brands', 'FrontendController@showBrands')->name('brand.index');
Route::get('brand/{name}', 'FrontendController@showBrandDetails')->name('brand.show');
Route::get('products', 'FrontendController@showProducts')->name('product.index');
Route::get('product/{name}', 'FrontendController@showProductDetails')->name('product.show');
Route::get('autoship_cronjob', 'FrontendController@autoship_cronjob');
Route::get('contact_us', 'FrontendController@contact_us')->name('contact.index');
Route::get('packages', 'FrontendController@packages')->name('packages.index');
Route::get('about_us', 'FrontendController@about_us')->name('about_us.index');
Route::get('terms_&_condition', 'FrontendController@term')->name('term.index');
/******************FUNCTIONALITY ROUTES****************/
Route::get('/cd', function() {
    Artisan::call('config:cache');
    Artisan::call('migrate:refresh');
    Artisan::call('db:seed', [ '--class' => DatabaseSeeder::class]);
    Artisan::call('view:clear');
    return 'DONE';
});
Route::get('/migrate', function() {
    Artisan::call('migrate');
    return 'Migration done';
});
Route::get('/cache_clear', function() {
    Artisan::call('config:cache');
    Artisan::call('view:clear');
    Artisan::call('cache:clear');
    return 'Cache Clear DOne';
});
Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');


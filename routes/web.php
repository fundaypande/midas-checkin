<?php

// const LARAVEL VERSION = '5.8.35';

Route::get('/', function()
{
    return redirect('/login');
});

Route::get('/page/privacy-policy-midnersi', function()
{
    return view('midnersi.page.privacy-policy');
});

Route::get('/page/upgrade', function()
{
    return view('midnersi.page.upgrade');
});

Route::get('/mobile', function()
{
  $data = array();
  $data = [
    'header' => 'Midnersi',
    'url' => 'admin.midnersi.com',
    'owner' => 'Dian',
    'title' => 'Midnersi',
    'description' => 'Midnersi adalah aplikasi tryout online',
    'image' => 'https://admin.midnersi.com/images/system/logo_600x393.png'
  ];
  return $data;
});

// Login Section
Route::get('/home', function()
{
    return redirect('/admin/dashboard');
});
Auth::routes();
// Route::get('auth/{provider}', 'Auth\AuthController@redirectToProvider');
// Route::get('auth/{provider}/callback', 'Auth\AuthController@handleProviderCallback');
// forget password step
Route::post('reset_password_without_token', 'AccountsController@validatePasswordRequest');
Route::post('reset_password_with_token', 'AccountsController@resetPassword');
Route::get('password/reset/{token}', 'AccountsController@getReset');

// ==== VERIFIVATION EMAIL
Route::get('email/{userId}/{token}', 'MailCont@verifyAt')->name('email.verify.link');


// ===== *SETTING MODULE
Route::get('/setting', 'SettingCont@show')->name('setting.show');
Route::post('/setting/password/save', 'SettingCont@savePassword')->name('setting.password.save');


// ############# ADMIN ROLE ############# //
Route::group(['middleware' => ['auth']], function(){



    Route::prefix('admin')->group(function () {



        Route::prefix('dashboard')->group(function () {
            Route::get('/', 'HomeController@index')->name('home');
            Route::get('/f/users', 'HomeController@fUser')->name('f.user');
            Route::get('/f/resonden', 'HomeController@fResponden')->name('f.responden');
            Route::get('/f/group', 'HomeController@fGroup')->name('f.group');
            Route::get('/f/feature-category', 'HomeController@fFeatureCategory')->name('f.feature-category');
            Route::get('/f/feature-master', 'HomeController@fFeatureMaster')->name('f.feature-master');
            Route::get('/f/history', 'HomeController@history')->name('f.history');
            Route::get('/f/admin-notif', 'HomeController@adminNotif')->name('f.admin.notif');
        });


            // ===== *PROFILE MODULE
            //       * Middleware in controller
            Route::get('/profile', 'ProfileCont@show')->name('profile.show');
            Route::get('/profile/tes', 'ProfileCont@tes');
            Route::post('/profile/save', 'ProfileCont@save')->name('profile.save');
            Route::post('/profile/photo/save', 'ProfileCont@photoSave')->name('profile.photo');
            Route::post('/profile/photo/ajax', 'ProfileCont@upload')->name('profile.ajax');
            Route::get('/ajax/cek-username', 'ProfileCont@cekUsername')->name('profile.username');
            Route::get('/ajax/cek-email', 'ProfileCont@cekEmail')->name('profile.email');
            Route::get('/profile/password/reset', 'ProfileCont@viewReset')->name('profile.password.view');
            Route::post('/profile/password/reset', 'ProfileCont@storeReset')->name('profile.password.store');

            // ===== *USERS MODULE
        Route::prefix('email')->group(function () {
            Route::get('verify', 'MailCont@sendVerify')->name('email.verify');
        });



        // ===== *USERS MODULE
        Route::prefix('users')->group(function () {
            Route::get('/', 'UserCont@show')->name('users.show');
            Route::get('/ajax/role/{id?}', 'UserCont@ajaxRole')->name('user.role');
            Route::get('/datatable', 'UserCont@dtUsers')->name('users.show.dt');
            Route::post('/store', 'UserCont@store')->name('users.store');
            Route::post('/update/role/{id}', 'UserCont@updateRole')->name('users.update.role');
            Route::delete('delete/{id}', 'UserCont@destroy')->name('users.delete');
            Route::post('reset/{id}', 'UserCont@resetPassword')->name('users.reset');
        });

        Route::prefix('history')->group(function () {
            Route::get('/', 'HistoryCont@show')->name('history.show');
            Route::get('/detail/{id}', 'HistoryCont@detail')->name('history.detail');
            Route::get('/datatable/{userId?}/{action?}/{featureId?}/{startDate?}/{endDate?}', 'HistoryCont@data')->name('history.show.dt');
            Route::post('restore/{id}', 'HistoryCont@restore')->name('history.restore');

            // DATAMINING Example SES metode
            Route::get('/single', 'HistoryCont@single');
        });

        Route::prefix('feature-cat')->group(function () {
            Route::get('/', 'FeatureCatCont@show')->name('feature-cat.show');
            Route::get('/detail/ajax/{id}', 'FeatureCatCont@detail')->name('feature-cat.detail');
            Route::get('/datatable', 'FeatureCatCont@data')->name('feature-cat.data');
            Route::post('/store', 'FeatureCatCont@store')->name('feature-cat.store');
            Route::post('/update/{id}', 'FeatureCatCont@update')->name('feature-cat.update');
            Route::delete('delete/{id}', 'FeatureCatCont@destroy')->name('feature-cat.delete');
        });

        // ************************
        // MIDNERSI
        // ************************

        // bank soal
        Route::prefix('bank-soal')->group(function () {
            Route::get('/', 'MBankController@show')->name('bank.show');
            Route::get('/detail/ajax/{id}', 'MBankController@detail')->name('bank.detail');
            Route::get('/datatable', 'MBankController@data')->name('bank.data');
            Route::post('/store', 'MBankController@store')->name('bank.store');
            Route::post('/update/{id}', 'MBankController@update')->name('bank.update');
            Route::delete('delete/{id}', 'MBankController@destroy')->name('bank.delete');
        });

         // test
         Route::prefix('test')->group(function () {
            Route::get('/', 'MTestController@show')->name('test.show');
            Route::get('/detail/ajax/{id}', 'MTestController@detail')->name('test.detail');
            Route::get('/datatable', 'MTestController@data')->name('test.data');
            Route::post('/store', 'MTestController@store')->name('test.store');
            Route::post('/update/{id}', 'MTestController@update')->name('test.update');
            Route::delete('delete/{id}', 'MTestController@destroy')->name('test.delete');

            Route::get('/soal/{id}', 'MTestController@soal')->name('test.soal');
            Route::post('/store/soal', 'MTestController@soalStore')->name('test.store.soal');
        });

        // diskusi
        Route::prefix('discussion')->group(function () {
            // for user
            Route::get('/user', 'MDiscussionController@showUser')->name('disccusion.show.user');
            Route::get('/user/ajax', 'MDiscussionController@showIdUserAjax')->name('disccusion.ajax.user');
            Route::post('/store/user', 'MDiscussionController@storeUser')->name('disccusion.store.user');

            Route::get('/', 'MDiscussionController@show')->name('disccusion.show');
            Route::get('/datatable', 'MDiscussionController@data')->name('disccusion.data');
            Route::get('/detail/ajax/{id}', 'MDiscussionController@detail')->name('disccusion.detail');
            Route::get('/{id}', 'MDiscussionController@showId')->name('disccusion.show.id');
            Route::post('/store', 'MDiscussionController@store')->name('disccusion.store');
        });

        // result
        Route::prefix('result')->group(function () {
            Route::get('/', 'MResultController@show')->name('result.show');
            Route::get('/user', 'MResultController@showUser')->name('result.show.user');
            Route::get('/datatable', 'MResultController@data')->name('result.data');
        });

        Route::prefix('start')->group(function () {
            Route::get('/{id}', 'MStartController@show')->name('start.show');
            Route::post('/store', 'MStartController@store')->name('result.store');
            Route::get('pembahasan/{id}', 'MStartController@pembahasan')->name('start.pembahasan');
        });

        // ************************
        // END MIDNERSI
        // ************************

        Route::prefix('feature')->group(function () {
            Route::get('/', 'FeatureCont@show')->name('feature.show');
            Route::get('/{id}', 'FeatureCont@detail')->name('feature.detail');
            Route::get('/datatable/master-feature', 'FeatureCont@data')->name('feature.data');
            Route::post('feature-master/store', 'FeatureCont@storeMaster')->name('feature.store.master');
            Route::get('/ajax-master/{id}', 'FeatureCont@ajaxFeatureMaster')->name('feature.ajax.master');
            Route::post('/update-master/{id}', 'FeatureCont@updateMaster')->name('feature.update.master');
            Route::delete('delete-master/{id}', 'FeatureCont@destroyMaster')->name('feature.delete.master');

            // detail feature
            Route::get('/datatable/feature/{id}', 'FeatureCont@dataDetail')->name('feature.data.detail');
            Route::post('/store', 'FeatureCont@store')->name('feature.store');
            Route::get('/ajax/{id}', 'FeatureCont@ajaxFeature')->name('feature.ajax');
            Route::post('/update/{id}', 'FeatureCont@update')->name('feature.update');
            Route::delete('delete/{id}', 'FeatureCont@destroy')->name('feature.delete');
        });

        Route::prefix('groups')->group(function () {
            Route::get('/', 'GroupCont@show')->name('group.show');
            Route::get('/detail/ajax/{id}', 'GroupCont@detail')->name('group.detail');
            Route::get('/datatable', 'GroupCont@data')->name('group.data');
            Route::post('/store', 'GroupCont@store')->name('group.store');
            Route::post('/update/{id}', 'GroupCont@update')->name('group.update');
            Route::delete('delete/{id}', 'GroupCont@destroy')->name('group.delete');
            Route::get('/access/{id}', 'GroupCont@access')->name('group.access');
            Route::post('/update-access/{id}', 'GroupCont@updateAccess')->name('group.update.access');
        });

        // ===== *POSTS MODULE
        Route::prefix('/manage/post')->group(function () {
            Route::get('/', 'PostCont@show')->name('post.show');
            Route::get('/ajax', 'PostCont@ajax')->name('post.ajax');
            Route::get('/create', 'PostCont@create')->name('post.create');
            Route::get('/create/{id}', 'PostCont@update')->name('post.update');
            Route::post('/save/{id}', 'PostCont@save')->name('post.save');
            Route::post('/publish/{id}', 'PostCont@publish')->name('post.publish');
            Route::post('/update/{id}', 'PostCont@updateWithoutStatus')->name('post.update');
            Route::post('/thumbnail/{id}', 'PostCont@thumbnail');
            Route::delete('delete/{id}', 'PostCont@destroy');
            Route::get('/{category}/{slug}', 'PostCont@articlePreview');
        });

        // ===== *PAGES MODULE
        Route::prefix('/manage/page')->group(function () {
            Route::get('/', 'PageCont@show')->name('page.show');
            Route::get('/ajax', 'PageCont@ajax')->name('page.ajax');
            Route::get('/create', 'PageCont@create')->name('page.create');
            Route::get('/create/{id}', 'PageCont@update')->name('page.update');
            Route::post('/save/{id}', 'PageCont@save')->name('page.save');
            Route::post('/publish/{id}', 'PageCont@publish')->name('page.publish');
            Route::post('/update/{id}', 'PageCont@updateWithoutStatus')->name('page.update');
            Route::post('/thumbnail/{id}', 'PageCont@thumbnail');
            Route::delete('delete/{id}', 'PageCont@destroy');
            Route::get('/{category}/{slug}', 'PageCont@articlePreview');
        });

    });

});


// ############# ADMIN MEMBER ROLE ############# //
Route::group(['middleware' => ['AdminMember']], function(){

    // ===== *ADD PRODUCT MODULE
    Route::prefix('/manage/product')->group(function () {
        Route::get('user/{id}', 'ProductCont@show')->name('product.show');
        Route::get('/ajax/{id}', 'ProductCont@ajax')->name('product.ajax');
        Route::get('/create', 'ProductCont@create')->name('product.create');
        Route::get('/create/{id}', 'ProductCont@update')->name('product.update');
        Route::post('/save/{id}', 'ProductCont@save')->name('product.save');
        Route::post('/publish/{id}', 'ProductCont@publish')->name('product.publish');
        Route::post('/update/{id}', 'ProductCont@updateWithoutStatus')->name('product.update');
        Route::post('/thumbnail/{id}', 'ProductCont@thumbnail');
        Route::post('/photo/{id}', 'ProductCont@photo');
        Route::delete('delete/{id}', 'ProductCont@destroy');
        Route::get('review/{category}/{slug}', 'ProductCont@articlePreview');
        Route::get('ajax/media/{id}', 'ProductCont@ajaxMedia');
        Route::post('/photo/delete/{id}', 'ProductCont@photoDelete');
    });


});


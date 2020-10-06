<?php

use App\Http\Controllers\Bookings\BookingServiceController;
use App\Http\Controllers\Settings\SettingController;
use Illuminate\Support\Facades\Auth;
    use Illuminate\Support\Facades\Route;

    Route::get('/', function () {
        return view('welcome');
    });

    Auth::routes(['verify' => true]);

    /** Ajax routes */

    Route::group(['middleware' => ['auth'], 'namespace' => 'Ajax'], function () {

        Route::get('userStatus','AjaxController@userStatus')->name('auth.userStatus');

    });


    /** Basic Routes */

    Route::group(['middleware' => ['verified']], function () {

        Route::group(['namespace' => 'SuperAdmin'], function () {

            Route::get('/dashboard','SuperAdminController@index')->name('dashboard');

            Route::group(['middleware' => ['role:superadmin|admin']], function () {
                # user create only by superADMIN and admin

                Route::get('auth/create', 'SuperAdminController@create')->name('auth.create')->middleware('permission:user-create');

                Route::post('auth/create', 'SuperAdminController@store')->name('auth.store')->middleware('permission:user-create');

                Route::get('/all-users','SuperAdminController@getAllUsers')->name('all-users')->middleware('permission:all-users');
            });


        }); /** SuperAdmin route group End Here */

        /** User Profile Routes */
        Route::group(['namespace' => 'Profile'], function () {

            Route::resource('auth_profile', 'UserProfileController');

        });

        /** Post Category Tag routes Rolemanagement */
        Route::group(['namespace' => 'Posts'], function () {
            Route::resource('posts', 'PostController');
            Route::put('posts/isactive/{isActive}','PostController@isActive')->name('posts.status');
        });

        Route::group(['namespace' => 'Category'], function () {
            Route::resource('category', 'CategoryController');

            Route::resource('subcategory', 'SubCategoryController');
        });

        Route::group(['namespace' => 'Tag'], function () {
            Route::resource('tag', 'TagController');
        });

        Route::group(['namespace' => 'RoleManagement'], function () {
            Route::resource('permission', 'PermissionController');
            Route::resource('role', 'RoleController');
        });

    }); /** verfied Routes End Here */


/*##############################################################################################
                            Booking Routes
###############################################################################################*/

Route::group(['namespace' => 'Bookings'], function () {

        /* Booking Services routes */
        Route::resource('bookservices', 'BookingServiceController')->except([
            'create', 'store', 'update', 'destroy', 'show', 'edit',
        ]);

        /* Booking Create Events routes*/
        Route::resource('bookevents', 'BookingEventController');

    });

    /* Setting controller invokable */

    Route::group(['namespace' => 'Settings'], function () {
        Route::get('settings', 'SettingController')->name('settings');
    });



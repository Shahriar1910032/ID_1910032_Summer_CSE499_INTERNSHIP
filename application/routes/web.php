<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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


Route::namespace('Frontend')->group(function () {
    Route::controller('SiteController')->group(function () {
        Route::get('/', 'templates')->name('templates');
        Route::get('property-details/{slug}', 'property_details')->name('property.details');
        Route::get('property-categories', 'propertyCategories')->name('property.categories');
        Route::post('property-message', 'message')->name('property.message');
        Route::get('agent-details/{slug}', 'agentDetails')->name('agent.details');
        Route::post('agent-message', 'agentMessage')->name('agent.message');

        Route::get('rent-properties', 'rentProperty')->name('all.rent.property');
        Route::get('buy-properties', 'buyProperty')->name('all.buy.property');

        Route::get('property-type-category/{id}', 'propertyType')->name('property.type.category');
        Route::get('properties-list', 'propertyList')->name('property.list');
        Route::get('palace-details/{id}', 'palaceDetails')->name('palace.details');

        Route::post('buy-property-search', 'buySearch')->name('buy.property.search');
        Route::post('rent-property-search', 'rentSearch')->name('rent.property.search');
        Route::post('property-search', 'propertySearch')->name('property.search');

        Route::get('blog-details/{slug}', 'blog_details')->name('blog.details');
        Route::get('blog-type-category/{slug}', 'blogType')->name('blog.type.category');
        Route::get('blog-list/', 'blogs')->name('blog.list');

        Route::post('blog-comment.store', 'blogComment')->name('blog.comment.store');

        Route::get('Contact-Us', 'contact')->name('contact');
        Route::post('contact-message', 'contactMessage')->name('contact.message');
    });
 
    Route::controller('WishlistController')->group(function () {
        Route::post('/add-to-wishlist/{property_id}', 'addToWishlist')->name('addToWishlist');
       
    });
 
    Route::controller('CompareController')->group(function() {
        Route::post('add-to-compare/{property_id}', 'addToCompare')->name('add.to.compare');
    });

    Route::middleware(['auth', 'roles:user'])->group(function () {
        Route::controller('UserController')->prefix('user')->name('user.')->group(function () {
            Route::get('dashboard', 'dashboard')->name('dashboard');
            Route::get('logout', 'logout')->name('logout');
            Route::get('settings', 'profile')->name('profile');
            Route::post('settings-update', 'profileUpdate')->name('profile.update');
            Route::get('security', 'security')->name('security');
            Route::post('security-update', 'securityUpdate')->name('security.update');
        });

        //User Wishlist All Routes
        Route::controller('WishlistController')->group(function () {
            Route::get('wishlist', 'wishList')->name('wishlist');
            Route::get('wishlist-property', 'wishlistProperty')->name('wishlist.property');
            Route::get('wish-list-remove/{id}', 'wishListRemove')->name('wish.list.remove');
        });

        //User Compare All Routes
        Route::controller('CompareController')->group(function () {
            Route::get('compare', 'compare')->name('compare.property');
            Route::get('get-compare-property', 'getCompare')->name('get.compare.property');
            Route::get('compare-list-remove/{id}', 'compareRemove')->name('compare.list.remove');
        });
    });

});




Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

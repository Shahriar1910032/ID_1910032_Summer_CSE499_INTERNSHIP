<?php

use Illuminate\Support\Facades\Route;


// Admin Auth
Route::namespace('Auth')->group(function () {
    Route::controller('LoginController')->group(function () {
        Route::get('login', 'showLoginForm')->name('login');
    });
});


// admin group middleware
Route::middleware(['auth', 'roles:admin'])->group(function () {

    Route::controller('AdminController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('logout', 'logout')->name('logout');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile-update', 'profileUpdate')->name('profile.update');
        Route::get('password', 'password')->name('password');
        Route::post('password-update', 'passwordUpdate')->name('password.update');

        Route::get('blog-comment', 'blogComment')->name('blog.comment');
        Route::get('blog-comment-check/{id}', 'commentCheck')->name('comment.check');
        Route::post('reply-comment', 'replyComment')->name('blog.reply.comment');

        Route::get('contact-message-index', 'contactMessageIndex')->name('contact.message.index');
        Route::get('contact-message-index/{id}', 'viewCommentCheck')->name('view.contact.message');
    });

    Route::controller('PropertyTypeController')->group(function () {
        Route::get('all-type', 'allType')->name('all.type');
        Route::get('add-proerty-type', 'addType')->name('add.property.type');
        Route::post('store-proerty-type', 'storeType')->name('store.property.type');
        Route::get('edit-proerty-type/{id}', 'editType')->name('edit.property.type');
        Route::post('update-proerty-type/{id}', 'updateType')->name('update.property.type');
        Route::get('delete-proerty-type/{id}', 'deleteType')->name('delete.property.type');
    });

    Route::controller('AmenitiesController')->group(function () {
        Route::get('all-amenities', 'index')->name('index.amenities');
        Route::get('add-amenities', 'addAminites')->name('add.amenities');
        Route::post('store-amenities', 'storeAminites')->name('store.amenities');
        Route::get('edit-amenities/{id}', 'editAminites')->name('edit.amenities');
        Route::post('update-amenities/{id}', 'updateAminites')->name('update.amenities');
        Route::get('delete-amenities/{id}', 'deleteAminites')->name('delete.amenities');
    });

    Route::controller('PropertyController')->group(function () {
        Route::get('property-index', 'propertyIndex')->name('property.index');
        Route::get('property-create', 'propertyCreate')->name('property.create');
        Route::post('property-store', 'propertyStore')->name('property.store');
        Route::get('property-view/{id}', 'propertyView')->name('property.view');
        Route::get('property-details/{id}', 'propertyDetails')->name('property.details');
        Route::post('property-update', 'propertyUpdate')->name('property.update');

        Route::post('property-update-thumbnail', 'updateThumbnail')->name('property.update.thumbnail');
        Route::post('property-update-multi-image', 'updateMultiImage')->name('property.update.multi.image');
        Route::get('property-update-multi-delete/{id}', 'multiImageDelete')->name('property.update.multi.delete');
        Route::post('property-store-new-multi-image', 'storeNewMultiImage')->name('property.store.new.multi.image');
        Route::post('property-update-facilites', 'updateFacilites')->name('property.update.facilites');

        Route::get('property-delete/{id}', 'propertyDelete')->name('property.delete');

        Route::post('property-inactive', 'inactiveProperty')->name('property.inactive');
        Route::post('property-active', 'activeProperty')->name('property.active');

        Route::get('property-message', 'propertyMessage')->name('property.message');
        Route::get('property-message-details/{id}', 'messageDetails')->name('property.message.details');
    });

    Route::controller('StateController')->group(function () {
        Route::get('property-state', 'index')->name('property.state.index');
        Route::get('state-create', 'createState')->name('property.state.create');
        Route::post('state-store', 'storeState')->name('property.state.store');
        Route::get('state-edit/{id}', 'editState')->name('property.state.edit');
        Route::post('state-update/{id}', 'updateState')->name('property.state.update');
        Route::get('state-delete/{id}', 'deleteState')->name('property.state.delete');
    });

    Route::controller('ManageAgentControlller')->group(function () {
        Route::get('all-agent', 'index')->name('all.agent');
        Route::get('add-agent', 'addAgent')->name('add.agent');
        Route::post('store-agent', 'storeAgent')->name('store.agent');
        Route::get('edit-agent/{id}', 'editAgent')->name('edit.agent');
        Route::post('update-agent/{id}', 'updateAgent')->name('update.agent');
        Route::get('delete-agent/{id}', 'deleteAgent')->name('delete.agent');

        Route::get('agent-change-status', 'changestatus')->name('agent.change.status');
    });

    Route::controller('ManagePackageController')->group(function () {
        Route::get('package-history', 'packageHistory')->name('package.history');
        Route::get('package-invoice/{id}/pdf', 'packageInvoice')->name('package.invoice.pdf');
    });

    Route::controller('TestimonialController')->group(function () {
        Route::get('testimonials-index', 'index')->name('testimonials.index');
        Route::get('testimonials-create', 'create')->name('testimonials.create');
        Route::post('testimonials-store', 'store')->name('testimonials.store');
        // Route::get('testimonials-view/{id}', 'propertyView')->name('testimonials.view');
        Route::get('testimonials-details/{id}', 'details')->name('testimonials.details');
        Route::post('testimonials-update/{id}', 'update')->name('testimonials.update');
        Route::get('testimonials-delete/{id}', 'delete')->name('testimonials.delete');
    });

    Route::controller('BlogCategoryController')->prefix('blog-category')->group(function () {
        Route::get('index', 'index')->name('blog.category.index');
        Route::post('store', 'store')->name('blog.category.store');
        Route::get('edit/{id}', 'edit')->name('blog.category.edit');
        Route::post('update', 'update')->name('blog.category.update');
        Route::get('delete/{id}', 'delete')->name('blog.category.delete');
    });

    Route::controller('BlogController')->prefix('blog')->group(function () {
        Route::get('index', 'index')->name('blog.index');
        Route::get('create', 'create')->name('blog.create');
        Route::post('store', 'store')->name('blog.store');
        Route::get('edit/{id}', 'edit')->name('blog.edit');
        Route::post('update/{id}', 'update')->name('blog.update');
        Route::get('delete/{id}', 'delete')->name('blog.delete');

        Route::post('change/status', 'changeStatus')->name('blog.change.status');
    });

    Route::controller('SettingController')->prefix('settings')->group(function () {
        Route::get('general', 'general')->name('setting.general');
    });
});

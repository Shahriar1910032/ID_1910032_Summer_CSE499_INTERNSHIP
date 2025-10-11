<?php

use Illuminate\Support\Facades\Route;


//Agent group middleware
Route::middleware(['auth', 'roles:agent'])->group(function () {
    Route::controller('AgentController')->group(function () {
        Route::get('dashboard', 'dashboard')->name('dashboard');
        Route::get('profile', 'profile')->name('profile');
        Route::post('profile-update', 'profileUpdate')->name('profile.update');
        Route::get('security', 'security')->name('security');
        Route::post('security-update', 'securityUpdate')->name('security.update');
        Route::get('logout', 'logout')->name('logout');
    });

    Route::controller('PropertyController')->group(function () {
        Route::get('agent-all-property', 'allPropety')->name('all.property');
        Route::get('agent-create-property', 'createPropety')->name('create.property');
        Route::post('agent-store-property', 'storePropety')->name('store.property');
        Route::get('agent-edit-property/{id}', 'editPropety')->name('edit.property');
        Route::post('property-update', 'propertyUpdate')->name('property.update');

        Route::post('property-update-thumbnail', 'updateThumbnail')->name('property.update.thumbnail');
        Route::post('property-update-multi-image', 'updateMultiImage')->name('property.update.multi.image');
        Route::get('property-update-multi-delete/{id}', 'multiImageDelete')->name('property.update.multi.delete');
        Route::post('property-store-new-multi-image', 'storeNewMultiImage')->name('property.store.new.multi.image');
        Route::post('property-update-facilites', 'updateFacilites')->name('property.update.facilites');
        Route::get('property-delete/{id}', 'propertyDelete')->name('property.delete');

        Route::get('property-message', 'propertyMessage')->name('property.message');
        Route::get('property-message-details/{id}', 'messageDetails')->name('property.message.details');
    });

    Route::controller('BuyPackageController')->group(function () {
        Route::get('buy-package', 'buyPackage')->name('buy.package');
        Route::get('buy-buisness-plan', 'buyBuisnessPlan')->name('buy.buisness.plan');
        Route::post('store-buisness-plan', 'storeBuisnessPlan')->name('store.buisness.plan');
        Route::get('buy-professional-plan', 'buyProfessionalPlan')->name('buy.professional.plan');
        Route::post('store-professional-plan', 'storeProfessionalPlan')->name('store.professional.plan');

        Route::get('package-history', 'packageHistory')->name('package.history');
        Route::get('package-invoice/{id}/pdf', 'packageInvoice')->name('package.invoice.pdf');
    });
});


Route::controller('AgentController')->group(function () {
    Route::get('login', 'login')->name('login');
    Route::post('register', 'register')->name('register');
});

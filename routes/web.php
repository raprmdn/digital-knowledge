<?php

use App\Http\Controllers\Dashboard\Permissions\{RoleController, PermissionController, PermissionToRoleController, 
    RoleToUserController};
use App\Http\Controllers\Dashboard\{AccountController, DashboardController, ArticleController, CategoryController, ListDataController, RecycleBinController, TagController};
use App\Http\Controllers\Dashboard\ManageMenu\ManageMenuController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
})->middleware(['active_user']);

Route::put('/', [AccountController::class, 'updateEmail'])->name('update.email.index');

Auth::routes(['verify' => true]);

Route::prefix('menu/dashboard')->namespace('Dashboard')->middleware('has.role', 'verified', 'active_user')->group( function() {
    Route::get('panel', [DashboardController::class, 'index'])->name('menu.dashboard');

    Route::prefix('articles')->middleware('permission:create article')->group( function() {
        Route::get('list-article', [ArticleController::class, 'index'])->name('menu.article.index');
        Route::get('create', [ArticleController::class, 'create'])->name('menu.article.create');
        Route::post('create', [ArticleController::class, 'store']);
        Route::get('{article:article_slug}/edit', [ArticleController::class, 'edit'])->name('menu.article.edit');
        Route::put('{article:article_slug}/edit', [ArticleController::class, 'update']);
        Route::delete('{article:article_slug}/edit', [ArticleController::class, 'destroy'])->name('menu.article.delete');
        Route::post('/image-content/delete', [ArticleController::class, 'deleteContentImage'])->name('menu.delete.content.image');
    });

    Route::prefix('categories')->middleware('permission:create category')->group( function() {
        Route::get('list-category', [CategoryController::class, 'index'])->name('menu.category.index');
        Route::get('create', [CategoryController::class, 'create'])->name('menu.category.create');
        Route::post('create', [CategoryController::class, 'store']);
        Route::get('{category:category_slug}/edit', [CategoryController::class, 'edit'])->name('menu.category.edit');
        Route::put('{category:category_slug}/edit', [CategoryController::class, 'update']);
        Route::delete('{category:category_slug}/edit', [CategoryController::class, 'destroy'])->name('menu.category.delete');
    });

    Route::prefix('tags')->middleware('permission:create tag')->group( function() {
        Route::get('list-tag', [TagController::class, 'index'])->name('menu.tag.index');
        Route::get('create', [TagController::class, 'create'])->name('menu.tag.create');
        Route::post('create', [TagController::class, 'store']);
        Route::get('{tag:tag_slug}/edit', [TagController::class, 'edit'])->name('menu.tag.edit');
        Route::put('{tag:tag_slug}/edit', [TagController::class, 'update']);
        Route::delete('{tag:tag_slug}/edit', [TagController::class, 'destroy'])->name('menu.tag.delete');
    });

    Route::prefix('role-and-permission')->namespace('Permissions')->middleware('permission:assign permission')->group( function () {
        // Roles
        Route::get('role/create', [RoleController::class, 'create'])->name('menu.role.create');
        Route::post('role/create', [RoleController::class, 'store']);
        Route::get('role/{role}/edit', [RoleController::class, 'edit'])->name('menu.role.edit');
        Route::put('role/{role}/edit', [RoleController::class, 'update']);
        Route::delete('role/{role}/edit', [RoleController::class, 'destroy'])->name('menu.role.delete');
        // Permissions
        Route::get('permission/create', [PermissionController::class, 'create'])->name('menu.permission.create');
        Route::post('permission/create', [PermissionController::class, 'store']);
        Route::get('permission/{permission}/edit', [PermissionController::class, 'edit'])->name('menu.permission.edit');
        Route::put('permission/{permission}/edit', [PermissionController::class, 'update']);
        Route::delete('permission/{permission}/edit', [PermissionController::class, 'destroy'])->name('menu.permission.delete');
        // Permission to Role
        Route::get('assign/permission-role/create', [PermissionToRoleController::class, 'create'])->name('menu.permission.role.create');
        Route::post('assign/permission-role/create', [PermissionToRoleController::class, 'store']);
        Route::get('assign/permission-role/{role}/sync', [PermissionToRoleController::class, 'edit'])->name('menu.permission.role.sync')->middleware('permission:permission to role');
        Route::put('assign/permission-role/{role}/sync', [PermissionToRoleController::class, 'sync']);
        // Role to User
        Route::get('assign/role-user/create', [RoleToUserController::class, 'create'])->name('menu.role.user.create');
        Route::post('assign/role-user/create', [RoleToUserController::class, 'store']);
        Route::get('assign/role-user/{user}/sync', [RoleToUserController::class, 'edit'])->name('menu.role.user.sync')->middleware('permission:role to user');
        Route::put('assign/role-user/{user}/sync', [RoleToUserController::class, 'sync']);
        
    });

    Route::prefix('menu-management')->namespace('ManageMenu')->middleware('permission:menu management')->group( function() {
        Route::get('list-menu', [ManageMenuController::class, 'index'])->name('menu.menu.list');
        Route::get('menu/create', [ManageMenuController::class, 'create'])->name('menu.menu.create');
        Route::post('menu/create', [ManageMenuController::class, 'store']);
        Route::get('sub-menu/{menu}/update', [ManageMenuController::class, 'edit'])->name('menu.menu.edit');
        Route::put('sub-menu/{menu}/update', [ManageMenuController::class, 'update']);
        Route::get('main-menu/{menu}/update', [ManageMenuController::class, 'editMainMenu'])->name('main.menu.edit');
        Route::put('main-menu/{menu}/update', [ManageMenuController::class, 'updateMainMenu']);
        Route::delete('menu/{menu}/delete', [ManageMenuController::class, 'destroy'])->name('menu.delete');
    });

    Route::prefix('data-article-and-user')->middleware('permission:list all')->group( function() {
        Route::get('article-list', [ListDataController::class, 'indexDataArticles'])->name('data.article.index');
        Route::get('user-list', [ListDataController::class, 'indexDataUsers'])->name('data.user.index');
        Route::put('user/detail', [ListDataController::class, 'userDetail'])->name('data.user.detail');
        Route::put('user/suspend', [ListDataController::class, 'suspend'])->name('data.user.suspend');
        Route::put('{user}/recovery', [ListDataController::class, 'recovery'])->name('data.user.recovery');
    });

    Route::prefix('recycle-bin')->middleware('permission:list all')->group( function() {
        Route::get('article', [RecycleBinController::class, 'articleTrash'])->name('trash.article.index');
        Route::post('article/{article:article_slug}/restore', [RecycleBinController::class, 'articleRestore'])->name('trash.article.restore');
    });

    Route::prefix('profile')->group( function() {
        Route::get('', [AccountController::class, 'personalInformation'])->name('profile.personal.information');
        Route::put('', [AccountController::class, 'updatePhotoProfile'])->name('update.photo.profile');
        Route::get('/p/edit', [AccountController::class, 'editPersonalInformation'])->name('edit.personal.information');
        Route::put('/p/edit', [AccountController::class, 'updatePersonalInformation'])->name('update.personal.information');
        Route::get('/p/security', [AccountController::class, 'securitySettings'])->name('profile.personal.settings');
        Route::get('/p/security/change-password', [AccountController::class, 'editPassword'])->name('profile.edit.password');
        Route::put('/p/security/change-password', [AccountController::class, 'updatePassword'])->name('profile.update.password');
        Route::get('/p/security/change-email', [AccountController::class, 'editEmail'])->name('profile.edit.email');
        Route::put('/p/security/change-email', [AccountController::class, 'updateEmail'])->name('profile.update.email');
    });

});

// Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('verified');

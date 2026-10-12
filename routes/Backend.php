<?php

use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\backend\BlogPostController;
use App\Http\Controllers\backend\CommentController;
use App\Http\Controllers\backend\ContactUsController;
use App\Http\Controllers\backend\HeroController;
use App\Http\Controllers\backend\PasswordController;
use App\Http\Controllers\backend\PortfolioController;
use App\Http\Controllers\backend\ProfileController;
use App\Http\Controllers\backend\ResumeEducationController;
use App\Http\Controllers\backend\ResumeExperienceController;
use App\Http\Controllers\backend\ServicesController;
use App\Http\Controllers\backend\SiteSettingsController;
use App\Http\Controllers\backend\TestimonialController;
use Illuminate\Support\Facades\Route;

/* --------------------- Public Routes --------------------- */

Route::middleware('guest:admin')->group(function () {

    Route::get('/login/admin', [AdminController::class, 'create'])
        ->name('admin.login');

    Route::post('/login/admin', [AdminController::class, 'store'])
        ->name('admin.login.store');

});

/* --------------------- Protected Routes --------------------- */

Route::middleware('auth:admin')->group(function () {

    Route::get('/dashboard/admin', function () {
        return view('admin.admin_dashboard');
    })->name('dashboard');

    /*  --- Profile Routes --- */
    Route::get('profile/admin', [ProfileController::class, 'index'])
        ->name('profile.index');

    Route::put('update/profile/admin', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::put('profile/change-password', [PasswordController::class, 'updatePassword'])
        ->name('profile.change-password');

    Route::get('profile/admin/show', [ProfileController::class, 'show'])
        ->name('profile.show');

    Route::get('Hero/admin', [HeroController::class, 'index'])
        ->name('hero.index');
    Route::put('Hero/admin/update', [HeroController::class, 'update'])
        ->name('hero.update');

    /*  --- Services Routes --- */

    Route::get('services/admin', [ServicesController::class, 'index'])
        ->name('services.index');
    Route::get('services/admin/create', [ServicesController::class, 'create'])
        ->name('services.create');
    Route::post('services/admin/store', [ServicesController::class, 'store'])
        ->name('services.store');
    Route::get('services/admin/edit/{id}', [ServicesController::class, 'edit'])
        ->name('services.edit');
    Route::put('services/admin/update/{id}', [ServicesController::class, 'update'])
        ->name('services.update');

    Route::delete('services/admin/delete/{id}', [ServicesController::class, 'destroy'])
        ->name('services.destroy');

    /*  --- End Services Routes --- */

    /*  --- Portfolio Routes --- */
    Route::get('portfolio/admin', [PortfolioController::class, 'all_recent_works'])
        ->name('portfolio.all_recent_works');

    Route::get('portfolio/admin/add', [PortfolioController::class, 'add_work'])
        ->name('portfolio.add_work');

    Route::get('portfolio/admin/edit/{id}', [PortfolioController::class, 'edit_work'])
        ->name('portfolio.edit_work');

    Route::post('portfolio/admin/store', [PortfolioController::class, 'store'])
        ->name('portfolio.store');

    Route::put('portfolio/admin/update/{id}', [PortfolioController::class, 'update_work'])
        ->name('portfolio.update_work');

    Route::delete('portfolio/admin/delete/{id}', [PortfolioController::class, 'delete_work'])
        ->name('portfolio.delete_work');
    /*  --- End Portfolio Routes --- */

    /*  --- Experience Routes --- */
    Route::resource('experience', ResumeExperienceController::class)->only(['index', 'store', 'update', 'destroy']);
    /*  --- End Experience Routes --- */

    /*  --- Education Routes --- */
    Route::resource('education', ResumeEducationController::class)->only(['index', 'store', 'update', 'destroy']);
    /*  --- End Education Routes --- */

    /*  --- Skill Routes --- */
    Route::get('skills/admin', [\App\Http\Controllers\backend\SkillsController::class, 'index'])
        ->name('all.skills');
    Route::get('skills/admin/add', [\App\Http\Controllers\backend\SkillsController::class, 'create'])
        ->name('add.skill');
    Route::post('skills/admin/store', [\App\Http\Controllers\backend\SkillsController::class, 'store'])
        ->name('store.skill');
    Route::get('skills/admin/edit/{id}', [\App\Http\Controllers\backend\SkillsController::class, 'edit'])
        ->name('edit.skill');
    Route::put('skills/admin/update/{id}', [\App\Http\Controllers\backend\SkillsController::class, 'update'])
        ->name('update.skill');
    Route::delete('skills/admin/delete/{id}', [\App\Http\Controllers\backend\SkillsController::class, 'destroy'])
        ->name('delete.skill');
    /*  --- End Skill Routes --- */

    /*  --- Skill Routes --- */
    Route::resource('testimonial', TestimonialController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    /*  --- End Skill Routes --- */

    /*  --- Skill Routes --- */
    Route::resource('blog', BlogPostController::class)->only(['index', 'create', 'store', 'edit', 'update', 'destroy']);
    /*  --- End Skill Routes --- */
    /*  --- Comment Routes --- */

    Route::patch(
        'comments/{comment}/toggle-status',
        [CommentController::class, 'toggleStatus']
    )->name('comments.toggle-status');

    Route::patch(
        'comments/{comment}/toggle-read',
        [CommentController::class, 'toggleRead']
    )->name('comments.toggle-read');
    Route::resource('commentBackend', CommentController::class)->only(['index', 'show', 'destroy']);

    /*  --- End Comment Routes --- */

    /*  --- Contact Routes --- */
    Route::get('contact/admin',[ContactUsController::class,'index'])->name('contact.admin');
    Route::delete('contact/admin/deleted/{id}',[ContactUsController::class,'destroy'])->name('contact.admin.destroy');
    /*  --- End Contact Routes --- */

    /*  --- Setting Routes --- */
    Route::resource('setting',SiteSettingsController::class)->only('index','update');
    /*  --- End Setting Routes --- */


});
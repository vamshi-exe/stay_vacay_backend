<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/',[UserController::class,'home'])->name('admin.home');
Route::get('/addIcons',[UserController::class,'addIcons'])->name('admin.addIcons');
Auth::routes();

Route::middleware('auth')->group(function(){
    Route::get('/my-account',[UserController::class,'index'])->name('user.index');
});

Route::middleware(['auth','auth.admin'])->group(function(){
    Route::get('/admin/home',[AdminController::class,'home'])->name('admin.home');
    //Country
    Route::get('/admin/country/addcountry',[AdminController::class,'addcountry'])->name('admin.addcountry');
    Route::post('/admin/country/savecountry',[AdminController::class,'savecountry'])->name('admin.savecountry');
    Route::get('/admin/country/viewcountry',[AdminController::class,'viewcountry'])->name('admin.viewcountry');
    Route::get('/admin/country/editcountry/{getId}',[AdminController::class,'editcountry'])->name('admin.editcountry');
    Route::post('/admin/country/updatecountry',[AdminController::class,'updatecountry'])->name('admin.updatecountry');
    Route::post('/admin/country/deletecountry/{id}', [AdminController::class, 'deletecountry'])->name('admin.deletecountry');

    //State
    Route::get('/admin/state/addstate',[AdminController::class,'addstate'])->name('admin.addstate');
    Route::post('/admin/state/savestate',[AdminController::class,'savestate'])->name('admin.savestate');
    Route::get('/admin/state/viewstate',[AdminController::class,'viewstate'])->name('admin.viewstate');
    Route::get('/admin/state/editstate/{getId}',[AdminController::class,'editstate'])->name('admin.editstate');
    Route::post('/admin/state/updatestate',[AdminController::class,'updatestate'])->name('admin.updatestate');
    Route::post('/admin/icons/deleteicons/{id}', [AdminController::class, 'deleteicons'])->name('admin.deleteicons');

    // Icons
    Route::get('/admin/IconsCategory/addicons',[AdminController::class,'addicons'])->name('admin.addicons');
    Route::post('/admin/IconsCategory/saveicons',[AdminController::class,'saveicons'])->name('admin.saveicons');
    Route::get('/admin/IconsCategory/viewicons',[AdminController::class,'viewicons'])->name('admin.viewicons');
    // Route::get('/admin/icons/getviewicons',[AdminController::class,'getviewicons'])->name('admin.getviewicons');
    Route::get('/admin/IconsCategory/editicons/{getId}',[AdminController::class,'editicons'])->name('admin.editicons');
    Route::post('/admin/IconsCategory/updateicons',[AdminController::class,'updateicons'])->name('admin.updateicons');
    Route::post('/admin/IconsCategory/deleteicons/{id}', [AdminController::class, 'deleteicons'])->name('admin.deleteicons');

    //Hosted

    //State
    Route::get('/admin/hosted/addhosted',[AdminController::class,'hostedstate'])->name('admin.hostedstate');
    Route::post('/admin/hosted/savehosted',[AdminController::class,'savehosted'])->name('admin.savehosted');
    Route::get('/admin/hosted/viewhosted',[AdminController::class,'viewhosted'])->name('admin.viewhosted');
    Route::get('/admin/hosted/edithosted/{getId}',[AdminController::class,'edithosted'])->name('admin.edithosted');
    Route::post('/admin/hosted/updatehosted',[AdminController::class,'updatehosted'])->name('admin.updatehosted');
    Route::post('/admin/hosted/deletehosted/{id}', [AdminController::class, 'deletehosted'])->name('admin.deletehosted');

    //Icons Button Click show next page

    Route::get('/admin/IconsButtonClick/addnextpageshow',[AdminController::class,'addnextpageshow'])->name('admin.addnextpageshow');
    Route::post('/admin/IconsButtonClick/savenextpageshow',[AdminController::class,'savenextpageshow'])->name('admin.savenextpageshow');
    Route::get('/admin/IconsButtonClick/viewnextpageshow',[AdminController::class,'viewnextpageshow'])->name('admin.viewnextpageshow');
    Route::get('/admin/IconsButtonClick/editnextpageshow/{getId}',[AdminController::class,'editnextpageshow'])->name('admin.editnextpageshow');
    Route::post('/admin/IconsButtonClick/updatenextpageshow',[AdminController::class,'updatenextpageshow'])->name('admin.updatenextpageshow');
    Route::post('/admin/IconsButtonClick/deletnextpageshow/{id}', [AdminController::class, 'deletnextpageshow'])->name('admin.deletnextpageshow');

    // Icons Button click image show and image click and next page show
    Route::get('/admin/IconsButtonClick/addimageclicknextpage', [AdminController::class, 'addimageclicknextpage'])->name('admin.addnextpageshow');

    Route::post('/admin/IconsButtonClick/saveimageclicknextpage',[AdminController::class,'saveimageclicknextpage'])->name('admin.saveimageclicknextpage');
    Route::get('/admin/IconsButtonClick/viewimageclicknextpage',[AdminController::class,'viewimageclicknextpage'])->name('admin.viewimageclicknextpage');
    Route::get('/admin/IconsButtonClick/getviewimageclicknextpage',[AdminController::class,'getviewimageclicknextpage'])->name('admin.getviewimageclicknextpage');
    Route::get('/admin/IconsButtonClick/editimageclicknextpage/{getId}',[AdminController::class,'editimageclicknextpage'])->name('admin.editimageclicknextpage');
    Route::post('/admin/IconsButtonClick/updateimageclicknextpage',[AdminController::class,'updateimageclicknextpage'])->name('admin.updateimageclicknextpage');
    Route::delete('/admin/IconsButtonClick/deletimageclicknextpage/{getId}', [AdminController::class, 'deletimageclicknextpage'])->name('admin.deletimageclicknextpage');




    // Past experiences

    Route::get('/admin/Pastexperiences/addPastexperiences',[AdminController::class,'addPastexperiences'])->name('admin.addPastexperiences');
    Route::post('/admin/Pastexperiences/savePastexperiences',[AdminController::class,'savePastexperiences'])->name('admin.savePastexperiences');
    Route::get('/admin/Pastexperiences/viewPastexperiences',[AdminController::class,'viewPastexperiences'])->name('admin.viewPastexperiences');
    Route::get('/admin/Pastexperiences/editPastexperiences/{getId}',[AdminController::class,'editPastexperiences'])->name('admin.editPastexperiences');
    Route::post('/admin/Pastexperiences/updatePastexperiences',[AdminController::class,'updatePastexperiences'])->name('admin.updatePastexperiences');
    Route::post('/admin/Pastexperiences/deletPastexperiences/{id}', [AdminController::class, 'deletPastexperiences'])->name('admin.deletPastexperiences');


});

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

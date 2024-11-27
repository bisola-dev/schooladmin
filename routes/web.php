<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Models\Admin;
use App\Models\classrm;
use App\Models\subby;


Route::get('/', function () {
    return view('welcome');
});

Route::get('login', [AdminController::class, 'showLoginForm'])->name('admin.login');
Route::get('register', [AdminController::class, 'showAdminregister'])->name('admin.register');
Route::post('login', [AdminController::class, 'login'])->name('admin.login.submit');

   Route::prefix('admin')->middleware('auth:admin')->group(function () {
   Route::get('passreset', [AdminController::class, 'passreset'])->name('admin.passreset'); 
   Route::post('passresetprocess', [AdminController::class, 'passresetprocess'])->name('admin.passresetprocess'); 
   Route::get('createclass', [AdminController::class, 'createclass'])->name('admin.createclass');
   Route::post('createclassprocess', [AdminController::class, 'createclassprocess'])->name('admin.createclassprocess'); 
   Route::post('createclassedit/{id}', [AdminController::class, 'createclassedit'])->name('admin.createclassedit');
   Route::get('deleteclass/{id}', [AdminController::class, 'deleteclass'])->name('admin.deleteclass');

   Route::get('createsubject', [AdminController::class, 'createsubject'])->name('admin.createsubject');
   Route::post('createsubjectprocess', [AdminController::class, 'createsubjectprocess'])->name('admin.createsubjectprocess'); 
   Route::post('createsubjectedit/{id}', [AdminController::class, 'createsubjectedit'])->name('admin.createsubjectedit');
   Route::get('deletesubject/{id}', [AdminController::class, 'deletesubject'])->name('admin.deletesubject');

   Route::get('viewclass', [AdminController::class, 'viewclass'])->name('admin.viewclass');
   Route::post('addstudentnew', [AdminController::class, 'addstudentnew'])->name('admin.addstudentnew');

   Route::get('subclasslink/{id}', [AdminController::class, 'subclasslink'])->name('admin.subclasslink');
   Route::get('siderd2', [AdminController::class, 'siderd2'])->name('admin.siderd2'); 
   Route::post('import', [AdminController::class, 'import'])->name('admin.import');
   Route::post('export', [AdminController::class, 'export'])->name('admin.export');
   Route::post('logout', [AdminController::class, 'logout'])->name('admin.logout');

   Route::get('viewstudents', [AdminController::class, 'viewstudents'])->name('admin.viewstudents');
   Route::get('deleteaddstudent/{id}', [AdminController::class, 'deleteaddstudent'])->name('admin.deleteaddstudent');
   Route::post('addstudentpageedit/{id}', [AdminController::class, 'addstudentpageedit'])->name('admin.addstudentpageedit');
   Route::post('uploadlogostud/{id}', [AdminController::class, 'uploadlogostud'])->name('admin.uploadlogostud');


   Route::get('payment', [AdminController::class, 'payment'])->name('admin.payment');
   Route::post('importpay', [AdminController::class, 'importpay'])->name('admin.importpay');
   Route::get('viewpay', [AdminController::class, 'viewpay'])->name('admin.viewpay');
   Route::post('addstudentpay', [AdminController::class, 'addstudentpay'])->name('admin.addstudentpay');

   Route::get('createpayment', [AdminController::class, 'createpayment'])->name('admin.createpayment');
   Route::post('createpaymentprocess', [AdminController::class, 'createpaymentprocess'])->name('admin.createpaymentprocess'); 
   Route::post('createpaymentedit/{id}', [AdminController::class, 'createpaymentedit'])->name('admin.createpaymentedit');
   Route::get('deletepayment/{id}', [AdminController::class, 'deletepayment'])->name('admin.deletepayment');

   Route::post('updatepay/{id}', [AdminController::class, 'updatepay'])->name('admin.updatepay');
   Route::get('deleteupdatepay/{id}', [AdminController::class, 'deleteupdatepay'])->name('admin.deleteupdatepay');
   

   Route::get('createseszion', [AdminController::class, 'createseszion'])->name('admin.createseszion');
   Route::post('createseszionprocess', [AdminController::class, 'createseszionprocess'])->name('admin.createseszionprocess'); 
   Route::post('createseszionedit/{id}', [AdminController::class, 'createseszionedit'])->name('admin.createseszionedit');
   Route::get('deleteseszion/{id}', [AdminController::class, 'deleteseszion'])->name('admin.deleteseszion');

   Route::get('uploadtest', [AdminController::class, 'uploadtest'])->name('admin.uploadtest');
   Route::post('updatetestscore/{id}', [AdminController::class, 'updatetestscore'])->name('admin.updatetestscore');
   Route::post('importtest', [AdminController::class, 'importtest'])->name('admin.importtest');
   Route::post('addtestscore', [AdminController::class, 'addtestscore'])->name('admin.addtestscore');
   Route::get ('viewtest', [AdminController::class, 'viewtest'])->name('admin.viewtest');
   Route::get('deletetest/{id}', [AdminController::class, 'deletetest'])->name('admin.deletetest');
 
   Route::get ('selectresults', [AdminController::class, 'selectresults'])->name('admin.selectresults');

   Route::get('getstudents', [AdminController::class, 'getstudents'])->name('admin.getstudents');
   Route::get('viewoverall', [AdminController::class, 'viewoverall'])->name('admin.viewoverall');

   Route::get('uploadexam', [AdminController::class, 'uploadexam'])->name('admin.uploadexam');
   Route::get('generateCsv', [AdminController::class,'generateCsv'])->name('admin.generateCsv');
   Route::post('generatepayexcel', [AdminController::class,'generatepayexcel'])->name('admin.generatepayexcel');
   Route::post('generatetestexcel', [AdminController::class,'generatetestexcel'])->name('admin.generatetestexcel');
   Route::post('generateexamexcel', [AdminController::class,'generateexamexcel'])->name('admin.generateexamexcel');

   Route::post('updateexamscore/{id}', [AdminController::class, 'updateexamscore'])->name('admin.updateexamscore');
   Route::post('importexam', [AdminController::class, 'importexam'])->name('admin.importexam');
   Route::post('addexamscore', [AdminController::class, 'addexamscore'])->name('admin.addexamscore');
   Route::get ('viewexam', [AdminController::class, 'viewexam'])->name('admin.viewexam');
   Route::get('viewselexam', [AdminController::class, 'viewselexam'])->name('admin.viewselexam');
   Route::get('deleteexam/{id}', [AdminController::class, 'deleteexam'])->name('admin.deleteexam');

   Route::get('viewselresult', [AdminController::class, 'viewselresult'])->name('admin.viewselresult');
   Route::get('createoverall', [AdminController::class, 'createoverall'])->name('admin.createoverall');
   Route::post('storeoverallscore', [AdminController::class, 'storeoverallscore'])->name('admin.storeoverallscore');

   Route::get('createadmin', [AdminController::class, 'createadmin'])->name('admin.createadmin');
  

   Route::get('viewscorebyclass', [AdminController::class, 'viewscorebyclass'])->name('admin.viewscorebyclass');
    Route::put('editoverallscore', [AdminController::class, 'editoverallscore'])->name('admin.editoverallscore');
    Route::delete('deleteoverallscore', [AdminController::class, ' deleteoverallscore'])->name('admin.deleteoverallscore');

    Route::get('createuser', [AdminController::class, 'createuser'])->name('admin.createuser');
    Route::post('storeuser', [AdminController::class, 'storeuser'])->name('admin.storeuser');

    Route::get('edituser/{id}', [AdminController::class, 'edituser'])->name('admin.edituser');
    Route::put('updateuser/{id}', [AdminController::class, 'updateuser'])->name('admin.updateuser');
    Route::put('adminreset/{id}', [AdminController::class, 'adminreset'])->name('admin.adminreset');
    Route::delete('deleteuser/{id}', [AdminController::class, 'deleteuser'])->name('admin.deleteuser');


    Route::post('generatestudcsv', [AdminController::class, 'generatestudcsv'])->name('admin.generatestudcsv');


   Route::get('/', [AdminController::class, 'index'])->name('admin.dashboard');
   Route::get('dashboardsuper', [AdminController::class, 'Dashboardsuperadmin'])->name('admin.dashboardsuper');
   Route::get('dashboardapp', [AdminController::class, 'dashboardapp'])->name('admin.dashboardapp');
   Route::get('createsch', [AdminController::class, 'createsch'])->name('admin.createsch');
   Route::post('createschprocess', [AdminController::class, 'createschprocess'])->name('admin.createschprocess');
   Route::get('createschview', [AdminController::class, 'createschview'])->name('admin.createschview');
   Route::post('editschool/{id}', [AdminController::class, 'editschool'])->name('admin.editschool');
   Route::post('uploadlogosch/{id}', [AdminController::class, 'uploadlogosch'])->name('admin.uploadlogosch');

});
   





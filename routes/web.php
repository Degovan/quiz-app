<?php

use App\Http\Controllers\UserController;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(["register" => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::middleware(['auth:admin'])->group(function () {
    Route::get("/dashboard", [App\Http\Controllers\DashboardController::class, "index"])->name("admin.dashboard");
    Route::get("/bank-soal", [App\Http\Controllers\DashboardController::class, "bank"])->name("admin.bank-soal");
    Route::get("/peringkat", [App\Http\Controllers\DashboardController::class, "peringkat"])->name("admin.peringkat");
    Route::get("/hasil-ujian", [App\Http\Controllers\DashboardController::class, "hasil"])->name("admin.hasil");
    Route::get("/account/user", [App\Http\Controllers\UserController::class, "index"])->name("account.user");
    Route::get("/account/user/create", [App\Http\Controllers\UserController::class, "create"])->name("account.user.create");
    Route::post("/account/user/store", [App\Http\Controllers\UserController::class, "store"])->name("account.user.store");
    Route::get("/account/user/edit/{id}", [App\Http\Controllers\UserController::class, "edit"])->name("account.user.edit");
    Route::put("/account/user/update/{id}", [App\Http\Controllers\UserController::class, "update"])->name("account.user.update");
    Route::delete("/account/user/delete/{id}", [App\Http\Controllers\UserController::class, "destroy"])->name("account.user.delete");

    Route::get("/account/admin", [App\Http\Controllers\AdminController::class, "index"])->name("account.admin");
    Route::get("/account/admin/create", [App\Http\Controllers\AdminController::class, "create"])->name("account.admin.create");
    Route::post("/account/admin/store", [App\Http\Controllers\AdminController::class, "store"])->name("account.admin.store");
    Route::get("/account/admin/edit/{id}", [App\Http\Controllers\AdminController::class, "edit"])->name("account.admin.edit");
    Route::put("/account/admin/update/{id}", [App\Http\Controllers\AdminController::class, "update"])->name("account.admin.update");
    Route::delete("/account/admin/delete/{id}", [App\Http\Controllers\AdminController::class, "destroy"])->name("account.admin.delete");

    Route::get('/attendance', [App\Http\Controllers\AttendanceController::class, 'index'])->name('attendance.index');
    Route::get('/attendance/{id}', [App\Http\Controllers\AttendanceController::class, 'show'])->name('attendance.show');
    Route::get('/attendance/{id}/pdf', [App\Http\Controllers\AttendanceController::class, 'createPDF'])->name('attendance.pdf');

    Route::get("/quiz/create", [App\Http\Controllers\QuizController::class, "create"])->name("quiz.create");
    Route::post("/quiz/store", [App\Http\Controllers\QuizController::class, "store"])->name("quiz.store");
    Route::get("/quiz/show/{id}", [App\Http\Controllers\QuizController::class, "show"])->name("quiz.show");
    Route::get("/quiz/edit/{id}", [App\Http\Controllers\QuizController::class, "edit"])->name("quiz.edit");
    Route::put("/quiz/update/{id}", [App\Http\Controllers\QuizController::class, "update"])->name("quiz.update");
    Route::delete("/quiz/delete/{id}", [App\Http\Controllers\QuizController::class, "destroy"])->name("quiz.delete");
    Route::put("/quiz/open-access/{id}", [App\Http\Controllers\QuizController::class, "open"])->name("quiz.open");

    Route::post("/question/store/{quiz_id}", [App\Http\Controllers\QuestionController::class, "store"])->name("question.store");
    Route::get("/question/edit/{quiz_id}/{id}", [App\Http\Controllers\QuestionController::class, "edit"])->name("question.edit");
    Route::put("/question/update/{quiz_id}/{id}", [App\Http\Controllers\QuestionController::class, "update"])->name("question.update");
    Route::delete("/question/delete/{quiz_id}/{id}", [App\Http\Controllers\QuestionController::class, "destroy"])->name("question.delete");

    Route::get("/quiz/ranking/{id}", [App\Http\Controllers\QuizRankingController::class, "index"])->name("quiz.ranking");
    Route::get("/quiz/hasil/{id}", [App\Http\Controllers\QuizRankingController::class, "hasil"])->name("quiz.hasil");
    Route::get('/quiz/pdf/{id}', [App\Http\Controllers\QuizRankingController::class, 'createPDF'],)->name('quiz.pdf');
});

Route::middleware(['auth:web'])->group(function () {
    Route::get("/user/dashboard", [App\Http\Controllers\HomeController::class, "index"])->name("user.dashboard");
    Route::get("/user/quiz/{id}", [App\Http\Controllers\UserQuizController::class, "show"])->name("user.quiz.show");
    Route::post("/user/quiz-attempt/{id}", [App\Http\Controllers\UserQuizController::class, "attempt"])->name("quiz.attempt");
    Route::post("/user/quiz-result/{id}", [App\Http\Controllers\UserQuizController::class, "result"])->name("quiz.result");
});

Route::get('/user/pdf', [UserController::class, "createPDF"])->name("user.pdf");

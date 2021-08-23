<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $quizzes = Quiz::all();
        $jumlah_quiz =  Quiz::all()->count('id');
        $jumlah_peserta =  User::all()->count('id');
        $avg_result =  QuizResult::all()->AVG('point');


        return view("admin.dashboard",[
            "quizzes" => $quizzes,
            "jumlah_quiz" => $jumlah_quiz,
            "jumlah_peserta" => $jumlah_peserta,
            "avg_result" => $avg_result

        ]);
    }
    public function bank()
    {
        // $quizzes= DB::table('quizzes')->orderBy('id','DESC')
        // ->paginate(10);
        $quizzes = Quiz::orderBy('created_at','desc')->paginate(10);
        return view("admin.bank-soal",[
            "quizzes" => $quizzes
        ]);
    }
    public function peringkat()
    {
        $quizzes = Quiz::paginate(10);
        return view("admin.peringkat",[
            "quizzes" => $quizzes
        ]);
    } 
    public function hasil()
    {
        $quizzes = Quiz::paginate(10);
        return view("admin.hasil-ujian",[
            "quizzes" => $quizzes
        ]);
    }
}

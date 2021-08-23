<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizResult;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class QuizRankingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $quizzes = Quiz::findOrFail($id);
        $results = QuizResult::with("user")->orderBy("point", "DESC")->where("quiz_id", $quizzes->id)->get();
        return view("admin.quiz.ranking", [
            "quizzes" => $quizzes,
            "results" => $results
        ]);
    }
    public function hasil($id)
    {
        $quizzes = Quiz::findOrFail($id);
        $results = QuizResult::with("user")->orderBy("point", "DESC")->where("quiz_id", $quizzes->id)->get();
        return view("admin.quiz.hasil", [
            "quizzes" => $quizzes,
            "results" => $results
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function createPDF($id)
    {
        $quiz = Quiz::findOrFail($id);
        $results = QuizResult::with("user")->orderBy("point", "DESC")->where("quiz_id", $quiz->id)->get();
        $pdf = PDF::loadView('pdf.quiz_rank', compact('results', 'quiz'))
            ->setPaper('a4', 'landscape');

        return $pdf->download("Hasil Ujian {$quiz->title}.pdf");
    }
}

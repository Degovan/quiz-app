<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\QuizAttempt;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quizzes = Quiz::paginate(10);
        return view("admin.attendance.index", compact('quizzes'));
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
        $quiz = Quiz::findOrFail($id);
        $attempts = QuizAttempt::where('quiz_id', $quiz->id)
            ->groupBy('user_id')
            ->paginate(10);

        return view('admin.attendance.show', [
            'quiz' => $quiz,
            'attempts' => $attempts
        ]);
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
        $attempts = QuizAttempt::where('quiz_id', $quiz->id)->groupBy('user_id')->get();
        $pdf = PDF::loadView('pdf/attendance', [
            'quiz' => $quiz,
            'attempts' => $attempts
        ])->setPaper('a4', 'landscape');

        return $pdf->download("Daftar Hadir {$quiz->title}.pdf");
    }
}

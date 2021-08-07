<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Answer;
use App\Models\Question;
use App\Models\QuizResult;
use App\Models\QuizAttempt;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserQuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function attempt(Request $request,$id)
    {
        $user_id = Auth::user()->id;
        $quiz = Quiz::findOrFail($id);

        QuizAttempt::create([
            'quiz_id' => $quiz->id,
            "user_id" => $user_id,
            "attempt_at" => date("Y-m-d H:i:s")
        ]);
        $questions = Question::where("quiz_id",$id)->get();
        $take = false;

        return view("user.quiz.attempt",compact('questions','quiz','take'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function result(Request $request,$id)
    {
        $quiz = Quiz::findOrFail($id);
        $nilai = 0;
        $correct = 0;
        $max_point = 0;
        $siswa_id = Auth::guard("web")->user()->id;
        foreach ($quiz->question as $val) {
            if ($request->input("options".$val->id) == $val->key) {
                $nilai += $val->score;
                $correct++;
            }
            $max_point += $val->score;
            Answer::create([
                "quiz_id" => $quiz->id,
                "question_id" => $val->id,
                "user_id" => $siswa_id,
                "option" => $request->input("options".$val->id)
            ]);
        }

        QuizResult::create([
            "quiz_id" => $quiz->id,
            "user_id" => $siswa_id,
            "point" => $nilai,
            "correct_answer" => $correct,
            "max_points" => $max_point
        ]);

        return redirect()->route("user.quiz.show",["id" => $quiz->id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user_id = Auth::user()->id;

        $quiz = Quiz::with(["attempt" => function($q) use($user_id){
            $q->where("user_id",$user_id);
        }, "answer" => function($q) use($user_id){
            $q->where('user_id',$user_id);
        },"result" => function($q) use($user_id){
            $q->where("user_id",$user_id);
        }])->findOrFail($id);
        return view("user.quiz.show",[
            "quiz" => $quiz
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
}

<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use App\Models\Question;
use Illuminate\Http\Request;

class QuestionController extends Controller
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
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,$quiz_id)
    {
        $request->validate([
            "pertanyaan" => "required",
            "option_a" => "required",
            "option_b" => "required",
            "option_c" => "required",
            "option_d" => "required",
            "key" => "required",
            "nilai" => "required"
        ]);   
        $quiz = Quiz::findOrFail($quiz_id);
        $data = $request->all();
        $nilai = str_replace(",",".",$request->nilai);
        $valid_nilai = (double) $nilai;
        $data["question_title"] = $request->pertanyaan;
        $data["score"] = $valid_nilai;
        $data["quiz_id"] = $quiz->id;
        $data["key"] = strtoupper($request->key);
        $data["number"] = $request->nomor;

        Question::create($data);
        return redirect()->back()->with("question_create","Berhasil membuat pertanyaan baru");
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function show(Question $question)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function edit($quiz_id , $id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::where("id",$id)->where("quiz_id",$quiz->id)->first();

        return view("admin.question.edit",["question" => $question]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $quiz_id , $id)
    {
        $request->validate([
            "pertanyaan" => "required",
            "option_a" => "required",
            "option_b" => "required",
            "option_c" => "required",
            "option_d" => "required",
            "key" => "required",
            "nilai" => "required"
        ]);
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::findOrFail($id);
        $data = $request->all();
        $nilai = str_replace(",",".",$request->nilai);
        $valid_nilai = (double) $nilai; 
        $data["question_title"] = $request->pertanyaan;
        $data["score"] = $valid_nilai;
        $data["quiz_id"] = $quiz->id;
        $data["key"] = strtoupper($request->key);

        $question->update($data);
        return redirect()->route("quiz.show",["id" => $quiz_id])->with("question_update","Berhasil mengupdate pertanyaan!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Question  $question
     * @return \Illuminate\Http\Response
     */
    public function destroy($quiz_id,$id)
    {
        $quiz = Quiz::findOrFail($quiz_id);
        $question = Question::findOrFail($id);
        $question->delete();

        return redirect()->back()->with("deleted","Pertanyaan berhasil dihapus");
    }
}

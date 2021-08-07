<?php

namespace App\Http\Controllers;

use App\Models\Quiz;
use Illuminate\Http\Request;

class QuizController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.quiz.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|max:50",
            "jumlah" => "required|integer",
            "date" => "required|date",
            "time" => "required"
        ]);

        $time = date("H:i:s",strtotime($request->time));
        $date = $request->date." ".$time;
        Quiz::create([
            "title" => $request->title,
            "instructions" => $request->instruksi,
            "number_of_question" => $request->jumlah,
            "due_date" => $date
        ]);

        return redirect()->route("admin.dashboard")->with("quiz_create","Berhasil membuat quiz baru!");
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $quiz = Quiz::with("question")->findOrFail($id);
        return view("admin.quiz.show",[
            "quiz" => $quiz
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $quiz = Quiz::findOrFail($id);
        return view("admin.quiz.edit",[
            "quiz" => $quiz
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            "title" => "required|max:50",
            "jumlah" => "required|integer",
            "date" => "required|date",
            "time" => "required"
        ]);

        $quiz = Quiz::findOrFail($id);
        $time = date("H:i:s",strtotime($request->time));
        $date = $request->date." ".$time;
        $quiz->update([
        "title" => $request->title,
            "instructions" => $request->instruksi,
            "number_of_question" => $request->jumlah,
            "due_date" => $date
        ]);

        return redirect()->route("quiz.show",["id" => $id])->with("updated","Berhasil mengupdate quiz!");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Quiz  $quiz
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->delete();

        return redirect()->route("admin.dashboard")->with("delete","Berhasil menghapus quiz!");
    }

    public function open($id)
    {
        $quiz = Quiz::findOrFail($id);
        $quiz->update([
            "access_type" => true
        ]);

        return redirect()->back()->with("opened","Berhasil membuka akses quiz!");
    }
}

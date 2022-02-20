<?php

namespace App\Http\Controllers\admins;

use App\Models\Question;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Http\Requests\QuestionCreateRequest;
use App\Http\Requests\QuestionUpdateRequest;

class QuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $questions = Question::all();
        return view('admin.questions.index', compact('questions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.questions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(QuestionCreateRequest $request)
    {
        try {
            $question = Question::create(
                $request->validated()
            );
            return redirect()->route('admin.questions.index')->with('info', 'Question Created Successfully..!');
        } catch (\Exception $e) {
            abort(500);
            Log::error($e);
        }
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
    public function edit(Question $question)
    {
        return view('admin.questions.edit', compact('question'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(QuestionUpdateRequest $request, Question $question)
    {
        try {
            $question->update($request->validated());
            return redirect()->route('admin.questions.index')->with('info', 'Question Updated Successfully..!');
        } catch (\Exception $e) {
            abort(500);
            Log::error($e);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Question $question)
    {
        try {
            $question->destroy($question->id);
            return redirect()->route('admin.questions.index')->with('info', 'Question Deleted Successfully');
        } catch (\Exception $e) {
            abort(500);
            Log::error($e);
        }
    }
}

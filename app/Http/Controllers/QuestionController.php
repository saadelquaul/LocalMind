<?php

namespace App\Http\Controllers;

use App\Models\Question;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class QuestionController extends Controller
{
    public function index() {
        $questions = Question::all();
        return view('questions.index', compact('questions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'content' => 'required',
        ]);

        $question = new Question();
        $question->title = $validated['title'];
        $question->location = $validated['location'];
        $question->content = $validated['content'];
        $question->user_id = Auth::id();
        $question->save();

        return redirect()->route('questions.index');
    }

    public function show($id)
    {
        $question = Question::findOrFail($id);
        $answers = $question->answers;

        return view('questions.show', compact('question', 'answers'));
    }

    public function edit($id)
    {
        $question = Question::findOrFail($id);
        return view('questions.edit', compact('question'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'title' => 'required',
            'location' => 'required',
            'content' => 'required',
        ]);

        $question = Question::findOrFail($id);
        $question->title = $validated['title'];
        $question->location = $validated['location'];
        $question->content = $validated['content'];
        $question->save();

        return redirect()->route('questions.index');
    }

    public function destroy($id)
    {
        Question::destroy($id);
        return redirect()->route('questions.index');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class ResponseController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'content' => 'required',
        ]);

        $response = new Response();
        $response->content = $validated['content'];
        $response->question_id = $request->question_id;
        $response->user_id = Auth::id();
        $response->save();

        return redirect()->route('questions.show', ['id' => $request->question_id]);
    }

    public function show(Response $answer)
    {
        //
    }

    public function update(Request $request, Response $answer)
    {
        //
    }

    public function destroy(Response $answer)
    {
        //
    }
}

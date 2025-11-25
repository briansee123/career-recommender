<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestQuestion;

class TestQuestionController extends Controller
{
    // Show all questions
    public function index()
    {
        $questions = TestQuestion::all();
        return view('admin.test_questions.index', compact('questions'));
    }

    // Show create form
    public function create()
    {
        return view('admin.test_questions.create');
    }

    // Store new question
    public function store(Request $request)
    {
        TestQuestion::create([
            'question'   => $request->question,
            'option_a'   => $request->option_a,
            'option_b'   => $request->option_b,
            'option_c'   => $request->option_c,
            'option_d'   => $request->option_d,
            'category'   => $request->category
        ]);

        return redirect()->route('admin.tests')->with('success', 'Question added successfully!');
    }

    // Show edit form
    public function edit($id)
    {
        $question = TestQuestion::findOrFail($id);
        return view('admin.test_questions.edit', compact('question'));
    }

    // Update question
    public function update(Request $request, $id)
    {
        $question = TestQuestion::findOrFail($id);

        $question->update([
            'question'   => $request->question,
            'option_a'   => $request->option_a,
            'option_b'   => $request->option_b,
            'option_c'   => $request->option_c,
            'option_d'   => $request->option_d,
            'category'   => $request->category
        ]);

        return redirect()->route('admin.tests')->with('success', 'Question updated successfully!');
    }

    // Delete question
    public function destroy($id)
    {
        TestQuestion::findOrFail($id)->delete();

        return redirect()->route('admin.tests')->with('success', 'Question deleted.');
    }
}

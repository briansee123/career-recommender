<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\TestQuestion;

class UserTestController extends Controller
{
    // Show all questions at once
    public function start()
    {
        $questions = TestQuestion::all();
        return view('user.test_all_questions', compact('questions'));
    }

    // Handle all answers at once
    public function answer(Request $request)
    {
        $questions = TestQuestion::all();

        // MBTI scoring box
        $scores = [
            "E" => 0,
            "I" => 0,
            "S" => 0,
            "N" => 0,
            "T" => 0,
            "F" => 0,
            "J" => 0,
            "P" => 0,
        ];

        // Loop through all questions
        foreach ($questions as $q) {

            $answer = $request->input("q" . $q->id);

            if (!$answer) {
                continue; // skip if user skipped (normally impossible because required)
            }

            // category is like "E/I", "S/N"
            [$left, $right] = explode("/", $q->category);

            if ($answer === "A") {
                $scores[$left]++;
            } else {
                $scores[$right]++;
            }
        }

        // Generate final MBTI
        $mbti =
            ($scores["E"] >= $scores["I"] ? "E" : "I") .
            ($scores["S"] >= $scores["N"] ? "S" : "N") .
            ($scores["T"] >= $scores["F"] ? "T" : "F") .
            ($scores["J"] >= $scores["P"] ? "J" : "P");

        // Save to session
        session(['mbti_result' => $mbti]);
        session(['mbti_scores' => $scores]);

        return redirect()->route('user.test.result');
    }

// Show result page
public function result()
{
    $mbti = session('mbti_result');
    $scores = session('mbti_scores');

    // === 1. Basic career suggestion (fallback) ===
    $careerList = [
        "INTJ" => "Scientist, Engineer, Software Architect, Strategic Planner",
        "INTP" => "Professor, Programmer, Analyst, Researcher",
        "ENTJ" => "CEO, Manager, Business Consultant, Lawyer",
        "ENTP" => "Entrepreneur, Marketing Strategist, Creative Director",

        "INFJ" => "Counselor, Writer, Psychologist, Social Worker",
        "INFP" => "Artist, Therapist, Author, Musician",
        "ENFJ" => "Teacher, Coach, HR Manager, Motivational Speaker",
        "ENFP" => "Media Creator, Designer, Public Relations, Performer",

        "ISTJ" => "Accountant, Police Officer, Auditor, Administrator",
        "ISFJ" => "Nurse, Librarian, Customer Support, Organizer",
        "ESTJ" => "Project Manager, Military Officer, Supervisor",
        "ESFJ" => "Nurse, Teacher, Hospitality Manager",

        "ISTP" => "Technician, Mechanic, Pilot, Problem Solver",
        "ISFP" => "Artist, Photographer, Chef, Designer",
        "ESTP" => "Sales, Real Estate Agent, Emergency Responder",
        "ESFP" => "Entertainer, Event Planner, Influencer",
    ];

    $basicCareer = $careerList[$mbti] ?? "Career data not available.";

    // === 2. AI Career Suggestion ===
    $aiService = new \App\Services\GeminiAIService();
    $aiSuggestion = $aiService->generateCareerAdvice($mbti);

    return view('user.test_result', [
        'mbti' => $mbti,
        'scores' => $scores,
        'career' => $basicCareer,
        'ai' => $aiSuggestion
    ]);
}

}
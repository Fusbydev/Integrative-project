<?php

namespace App\Http\Controllers;

use App\Models\Feedback;
use Illuminate\Http\Request;

class FeedbackController extends Controller
{
    public function store(Request $request)
    {
        $validated = $request->validate([
            'feedback' => 'required|string|max:500',
            'rating' => 'required|integer|min:1|max:5',
            'anonymous' => 'required|boolean',
            'guest_id' => 'required|exists:guests,id',
        ]);

        Feedback::create([
            'feedback' => $validated['feedback'],
            'rating' => $validated['rating'],
            'anonymous' => $validated['anonymous'],
            'guest_id' => $validated['guest_id'],
        ]);

        return redirect('/');
    }
} 
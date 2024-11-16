<?php

namespace App\Http\Controllers;

use App\Models\IncomeTracker;
use Illuminate\Http\Request;

class IncomeTrackerController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function addincome(Request $request)
    {
        {
            // Validate the incoming data
            $validatedData = $request->validate([
                
                'customer_name' => 'required|string|max:255',
                'availed_service' => 'required|string|max:255',
                'price' => 'required|numeric',
            ]);
    
            try {
                // Insert the data into the database
                    IncomeTracker::create([
                    'customer_name' => $validatedData['customer_name'],
                    'availed_service' => $validatedData['availed_service'],
                    'price' => $validatedData['price'],
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
    
                return response()->json(['success' => true, 'message' => 'Income record added successfully.']);
            } catch (\Exception $e) {
                return response()->json(['success' => false, 'message' => 'Failed to add income record.', 'error' => $e->getMessage()], 500);
            }
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(IncomeTracker $incomeTracker)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(IncomeTracker $incomeTracker)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, IncomeTracker $incomeTracker)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(IncomeTracker $incomeTracker)
    {
        //
    }
}

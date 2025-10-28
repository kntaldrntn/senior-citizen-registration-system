<?php

namespace App\Http\Controllers;

use App\Models\SeniorCitizen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SeniorCitizenController extends Controller
{
    public function index()
    {
        $seniorcitizens = SeniorCitizen::latest()->paginate(10);
        return view('seniorcitizen.index', compact('seniorcitizens'));
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:senior_citizen',
            'contact_number' => 'required|numeric|digits:11', 
            'email' => 'required|email|unique:senior_citizen',
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'photo_image' => 'nullable|image',
        ]);

        if ($request->hasFile('photo_image')) {
            $imagePath = $request->file('photo_image')->store('photos', 'public');
            $validatedData['photo_image'] = $imagePath;
        }

        SeniorCitizen::create($validatedData);
        return redirect()->route('senior-citizen.index')->with('success', 'Senior Citizen added successfully!');
    }
    public function show(SeniorCitizen $seniorCitizen)
    {
        return response()->json($seniorCitizen);
    }
    public function update(Request $request, SeniorCitizen $seniorCitizen)
    {
        $validatedData = $request->validate([
            'name' => 'required|string|max:255|unique:senior_citizen,name,' . $seniorCitizen->id,
            'contact_number' => 'required|numeric|digits:11',
            'email' => 'required|email|unique:senior_citizen,email,' . $seniorCitizen->id,
            'address' => 'required|string',
            'birth_date' => 'required|date',
            'photo_image' => 'nullable|image',
        ]);

        if ($request->hasFile('photo_image')) {
            if ($seniorCitizen->photo_image) {
                Storage::disk('public')->delete($seniorCitizen->photo_image);
            }
            $imagePath = $request->file('photo_image')->store('photos', 'public');
            $validatedData['photo_image'] = $imagePath;
        }


        $seniorCitizen->update($validatedData);
        return redirect()->route('senior-citizen.index')->with('success', 'Senior Citizen updated successfully!');
    }
    public function destroy(SeniorCitizen $seniorCitizen)
    {
        if ($seniorCitizen->photo_image) {
            Storage::disk('public')->delete($seniorCitizen->photo_image);
        }
        $seniorCitizen->delete();
        return redirect()->route('senior-citizen.index')->with('success', 'Senior Citizen deleted successfully.');
    }
        public function showQrProfile(SeniorCitizen $seniorCitizen)
    {
        // We just return a new view, passing the citizen data
        return view('seniorcitizen.qr-profile', compact('seniorCitizen'));
    }
}
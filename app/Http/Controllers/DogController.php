<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Dog;
use Illuminate\Support\Facades\Auth;


class DogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dogs = Dog::all();

        return view('dogs.index', compact('dogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dogs.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Dog::create([
            'name' => $request->name,
            'age' => $request->age,
            'breed' => $request->breed,
            'user_id' => Auth::user()->id,
        ]);

        return redirect()->route('dogs.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $dog = Dog::find($id);

        return view('dogs.show', compact('dog'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $dog = Dog::find($id);

        if (Auth::user()->id !== $dog->user_id) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        return view('dogs.edit', compact('dog'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $dog = Dog::find($id);

        $dog->update([
            'name' => $request->name,
            'age' => $request->age,
            'breed' => $request->breed,
        ]);

        return redirect()->route('dogs.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $dog = Dog::find($id);

        if (Auth::user()->id !== $dog->user_id) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }
        $dog->delete();

        return redirect()->route('dogs.index');
    }
}

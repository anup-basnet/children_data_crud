<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Child;

class ChildController extends Controller
{
    public function index(){
        $children = Child::all();
        return view('children.index', ['children' => $children]);
    }

    // Create table row
    public function create(){
        return view('children.create');
    }

    // store table row
    public function store(Request $request){
        $data = $request->validate([
            'childFirstName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childMiddleName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childLastName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childAge' => 'required|numeric',
            'gender' => 'required', 
            'differentAddress' => 'nullable',
            'childAddress' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childCity' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childState' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childCountry' => 'nullable',
            'childZipCode' => 'nullable|numeric',
        ]);

        $newRow = Child::create($data);

        return redirect(route('child.index'));
    }

    // Edit table row
    public function edit(Child $child){
        return view('children.edit', ['child' => $child]);
    }

    // Update table row
    public function update(Child $child, Request $request){
        $data = $request->validate([
            'childFirstName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childMiddleName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childLastName' => 'required|regex:/^[a-zA-Z]+$/u',
            'childAge' => 'required|numeric',
            'gender' => 'required', 
            'differentAddress' => 'nullable',
            'childAddress' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childCity' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childState' => 'nullable|regex:/^[a-zA-Z]+$/u',
            'childCountry' => 'nullable',
            'childZipCode' => 'nullable|numeric',
        ]);

        $child->update($data);

        return redirect(route('child.index'))->with('success', 'Row updated successfully.');
    }

    // Delete table row
    public function delete(Child $child){
        $child->delete();
        return redirect(route('child.index'))->with('success', 'Row deleted successfully.');
    }
    
}

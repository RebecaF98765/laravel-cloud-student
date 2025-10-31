<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    
    public function index()
    {
        return view('index', ['students' => Student::all()]);
    }

    public function create()
    {
        //
        return view('create');
    }

    public function new(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|max:255',
            'address' => 'required|string|max:255',
        ]);

        Student::create([
            'name' => $request->name,
            'address' => $request->address,
            'email' => $request->email
        ]);

        return redirect()->route('index');
       
    }

    public function edit(string $id)
    {
        //
        return view('edit', ['students' => Student::findOrFail($id), 'id' => $id]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'address' => 'required|string|max:255',
        ]);

        $student = Student::findOrFail($id);
        $student->name = $request->input('name');
        $student->email = $request->input('email');
        $student->address = $request->input('address');
        $student->save();

        return redirect()->route('index');
    }

    public function destroy($id)
    {
        $student = Student::findOrFail($id);
        $student->delete();

        return redirect()->route('index');
    }


}

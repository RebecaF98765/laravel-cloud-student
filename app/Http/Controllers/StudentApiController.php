<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class StudentApiController extends Controller
{
    /**
     * Mostrar tots els estudiants
     */
    public function index()
    {
        return Student::all();
    }

    /**
     * Crear un nou estudiant
     */
    public function store(Request $request)
    {
        // Regles de validació
        $rules = [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:students',
            'address' => 'required|string|max:255',
        ];

        // Validació
        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return [
                'created' => false,
                'errors' => $validator->errors()->all(),
            ];
        }

        // Crear estudiant
        Student::create($request->all());

        return ['created' => true];
    }

    /**
     * Mostrar un estudiant concret
     */
    public function show($id)
    {
        return Student::findOrFail($id);
    }

    /**
     * Actualitzar un estudiant
     */
    public function update(Request $request, $id)
    {
        $student = Student::find($id);

        if (!$student) {
            return ['updated' => false, 'message' => 'Estudiant no trobat'];
        }

        $student->update($request->all());

        return ['updated' => true];
    }

    /**
     * Eliminar un estudiant
     */
    public function destroy($id)
    {
        $student = Student::find($id);

        if (!$student) {
            return ['deleted' => false, 'message' => 'Estudiant no trobat'];
        }

        $student->delete();

        return ['deleted' => true];
    }
}


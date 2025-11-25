<?php

use App\Models\Student;
use function Pest\Laravel\{get, post, delete};

//
// La pàgina principal es carrega
//
it('loads student list page', function () {
    get('/')->assertStatus(200);
});

//
// Mostra estudiants a la llista
//
it('shows students on the list', function () {
    Student::factory()->create([
        'name' => 'Joan Test',
        'email' => 'test@test.com',
        'address' => 'Carrer Test 123',
    ]);

    get('/')->assertSee('Joan Test');
});

//
// Crea un estudiant
//
it('can create a student', function () {
    $response = post('/new', [
        'name' => 'Maria Test',
        'email' => 'maria@test.com',
        'address' => 'Avinguda Test 55',
    ]);

    $response->assertRedirect('/index');

    expect(Student::where('email', 'maria@test.com')->exists())->toBeTrue();
});

//
// Elimina un estudiant
//
it('can delete a student', function () {
    $student = Student::factory()->create();

    $response = delete('/delete/' . $student->id);

    $response->assertRedirect('/index');

    expect(Student::find($student->id))->toBeNull();
});

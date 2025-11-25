<?php

namespace Tests\Feature;

use App\Models\Student;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class StudentTest extends TestCase
{
    use RefreshDatabase;

    protected function setUp(): void
    {
        parent::setUp();

        // Configurem SQLite in-memory
        config()->set('database.default', 'sqlite');
        config()->set('database.connections.sqlite.database', ':memory:');

        // Executar migracions
        $this->artisan('migrate');
    }

    /** @test */
    public function it_loads_student_list_page()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }

    /** @test */
    public function it_shows_students_on_the_list()
    {
        Student::factory()->create([
            'name' => 'Joan Prova',
            'email' => 'joan@test.com',
            'address' => 'Carrer Test'
        ]);

        $response = $this->get('/');

        $response->assertStatus(200);
        $response->assertSee('Joan Prova');
    }

    /** @test */
    public function it_can_create_a_student()
    {
        $response = $this->post('/new', [
            'name' => 'Maria Test',
            'email' => 'maria@test.com',
            'address' => 'Avinguda Prova 55',
        ]);

        // El teu controlador redirigeix a /index
        $response->assertRedirect('/index');

        $this->assertDatabaseHas('students', [
            'email' => 'maria@test.com'
        ]);
    }

    /** @test */
    public function it_can_update_a_student()
    {
        $student = Student::factory()->create([
            'name' => 'Nom Antic',
            'email' => 'antic@test.com',
            'address' => 'Adreça Antiga'
        ]);

        $response = $this->put("/update/{$student->id}", [
            'name' => 'Nom Nou',
            'email' => 'antic@test.com',
            'address' => 'Adreça Nova'
        ]);

        $response->assertRedirect('/index');

        $this->assertDatabaseHas('students', [
            'id' => $student->id,
            'name' => 'Nom Nou'
        ]);
    }

    /** @test */
    public function it_can_delete_a_student()
    {
        $student = Student::factory()->create();

        $response = $this->delete("/delete/{$student->id}");

        $response->assertRedirect('/index');

        $this->assertDatabaseMissing('students', [
            'id' => $student->id
        ]);
    }
}

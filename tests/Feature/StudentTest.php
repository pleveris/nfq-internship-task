<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use App\Models\Project;
use App\Models\Group;
use App\Models\Student;

class StudentTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function test_students() {
        // Project with groups should be created
        $project = factory(Project::class)->create();
       // posting request to create a new student
        $student = factory(Student::class)->create();
        //Post request to student creation
        $this->post('/students/create/1', $student->toArray());
        // Check if student creation is successful
        $this->assertEquals(1,Student::all()->count());
        // post request to remove student from students, group and project
        $stud = Student::findOrFail(1);
$this->post('/students/destroy/1', $stud->toArray());
        $project = Project::findOrFail(1);
$this->assertEquals(0,$project->studentsTotal);

    }
}
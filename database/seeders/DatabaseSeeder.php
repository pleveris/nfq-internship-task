<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        // Projects

        DB::table('projects')->insert([
            'title' => 'Test',
            'numGroups' => 3,
            'numStudentsInEach' => 3,
                'studentsTotal' => 5
        ]);

        // Groups

        DB::table('groups')->insert([
        [
            'title' => 'Test [group 1]',
            'project_id' => 1,
            'stud_count' => 3
        ],
        [
            'title' => 'Test [group 2]',
            'project_id' => 1,
            'stud_count' => 2
        ],
        [
            'title' => 'Test [group 3]',
            'project_id' => 1,
            'stud_count' => 0
        ]
        ]);

        // Students

        DB::table('students')->insert([
        [
            'name' => 'Rokas',
            'project_id' => 1,
            'group_id' => 1
        ],
        [
            'name' => 'Romas',
            'project_id' => 1,
            'group_id' => 1
        ],
        [
            'name' => 'Rimas',
            'project_id' => 1,
            'group_id' => 1
        ],
        [
            'name' => 'Saulius',
            'project_id' => 1,
            'group_id' => 2
        ],
        [
            'name' => 'Darius',
            'project_id' => 1,
            'group_id' => 2
        ]
        ]);

    }
}

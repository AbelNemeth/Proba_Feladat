<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Project;
use App\Models\Contact;
use Illuminate\Support\Facades\DB;

class MainSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Create 3 projects
        $projects = Project::insert([
            ['name' => 'Project 1', 'description' => 'Description for Project 1', 'status' => 'kész'],
            ['name' => 'Project 2', 'description' => 'Description for Project 2', 'status' => 'folyamatban'],
            ['name' => 'Project 3', 'description' => 'Description for Project 3', 'status' => 'fejlesztésre vár'],
        ]);

        // Create 3 contacts
        $contacts = Contact::insert([
            ['name' => 'Contact 1', 'email' => 'contact1@example.com'],
            ['name' => 'Contact 2', 'email' => 'contact2@example.com'],
            ['name' => 'Contact 3', 'email' => 'contact3@example.com'],
        ]);

        // Attach random contacts to random projects
        $projectIds = Project::pluck('id')->toArray();
        $contactIds = Contact::pluck('id')->toArray();

        // Creating random connections
        foreach ($projectIds as $projectId) {
            // Attach 1 to 3 random contacts to each project
            $randomContactIds = array_rand(array_flip($contactIds), rand(1, 3));
            foreach ((array)$randomContactIds as $contactId) {
                DB::table('project_contact')->insert([
                    'project_id' => $projectId,
                    'contact_id' => $contactId,
                ]);
            }
        }
    }
}

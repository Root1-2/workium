<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Job;
use App\Models\User;


class BookmarkSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get Test User
        $testUser = User::where("email", "test@test.com")->firstOrFail();

        // Get all job ids
        $jobIds = Job::pluck("id")->toArray();

        // Randomly select jobs to bookmarks
        $randomJobIds = array_rand($jobIds, 3);

        // Attach the selected jobs as bookmars for the test user
        foreach ($randomJobIds as $jobId) {
            $testUser->bookmarkedJobs()->attach($jobIds[$jobId]);
        }
    }
}

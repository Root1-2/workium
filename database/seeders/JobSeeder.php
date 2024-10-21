<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class JobSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Load Job Listings from File
        $jobListings = include database_path("seeders/data/job_listings.php");

        // Get User ids from User Model
        $userIds = User::pluck("id")->toArray();
        foreach ($jobListings as &$listing) {
            // Assign user id to listing
            $listing['user_id'] = $userIds[array_rand($userIds)];

            // Add Timestamp
            $listing['created_at'] = now();
            $listing['updated_at'] = now();
        }

        // Insert Job listings
        DB::table("job_listings")->insert($jobListings);
        echo "Jobs created Successfully";
    }
}

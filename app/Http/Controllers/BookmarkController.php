<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class BookmarkController extends Controller
{
    public function index(): View
    {
        $user = Auth::user();

        $bookmarks = $user->bookmarkedJobs()->orderBy("job_user_bookmarks.created_at", "desc")->paginate(9);

        return view("jobs.bookmarks")->with("bookmarks", $bookmarks);
    }

    public function store(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the job is already bookmarked
        if ($user->bookmarkedJobs()->where("job_id", $job->id)->exists()) {
            return back()->with("error", "Job is already Bookmarked");
        }

        // Create new bookmarked
        $user->bookmarkedJobs()->attach($job->id);

        return back()->with("success", "Job bookmarked Successfully");
    }

    public function destroy(Job $job): RedirectResponse
    {
        $user = Auth::user();

        // Check if the job is not bookmarked
        if (!$user->bookmarkedJobs()->where("job_id", $job->id)->exists()) {
            return back()->with("error", "Job is not bookmarked");
        }

        // Delete Bookmark
        $user->bookmarkedJobs()->detach($job->id);

        return back()->with("success", "Bookmark removed successfully");
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class ApplicantController extends Controller
{
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Validate data
        $validatedData = $request->validate([
            "full_name" => "required|string",
            "contact_phone" => "string",
            "contact_email" => "required|string|email",
            "message" => "string",
            "location" => "string",
            "resume" => "required|file|mimes:pdf|max:2048",
        ]);

        // Handle Resume upload
        if ($request->hasFile("resume")) {
            $path = $request->file('resume')->store("resumes", "public");
            $validatedData["resume_path"] = $path;
        }

        // Store The Application
        $application = new Applicant($validatedData);
        $application->job_id = $job->id;
        $application->user_id = auth()->id();
        $application->save();

        return redirect()->back()->with("success", "Your application has been submitted");
    }
}

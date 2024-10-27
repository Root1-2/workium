<?php

namespace App\Http\Controllers;

use App\Models\Applicant;
use App\Models\Job;
use App\Mail\JobApplied;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ApplicantController extends Controller
{
    public function store(Request $request, Job $job): RedirectResponse
    {
        // Checck if the user has already applied
        $existingApplication = Applicant::where("job_id", $job->id)->where("user_id", auth()->id())->exists();
        if ($existingApplication) {
            return redirect()->back()->with("error", "You have already applied for this job. Wait for someone to get in touch...");
        }

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

        // Send email to owner
        // Mail::to($job->user->email)->send(new JobApplied($application, $job));

        return redirect()->back()->with("success", "Your application has been submitted");
    }

    public function destroy($id): RedirectResponse
    {
        $applicant = Applicant::findOrFail($id);
        $applicant->delete();

        return redirect()->route("dashboard")->with("success", "Application Deleted Successfully");
    }
}

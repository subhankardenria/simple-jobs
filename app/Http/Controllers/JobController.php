<?php

namespace App\Http\Controllers;

use App\Mail\JobPosted;
use App\Models\Job;
use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Mail;

class JobController extends Controller
{
    /**
     * Display a paginated list of jobs.
     *
     * Retrieves jobs along with their associated employer data,
     * orders them by the most recent, and paginates the results 
     * to show six jobs per page. Returns the jobs data to the 'jobs.index' view.
     *
     * @return View
     */
    public function index(): View
    {
        $jobs = Job::with('employer')->latest()->simplePaginate(6);
        return view('jobs.index', [
            'jobs' => $jobs,
        ]);
    }

    /**
     * Displays the job creation form.
     *
     * Renders the 'jobs.create' view without passing any data to it.
     *
     * @return View
     */
    public function create(): View
    {
        return view('jobs.create');
    }

    /**
     * Display a job.
     *
     * Retrieves the specified job and returns it to the 'jobs.show' view.
     *
     * @param Job $job
     * @return View
     */
    public function show(Job $job): View
    {
        return view('jobs.show', [
            'job' => $job,
        ]);
    }

    /**
     * Creates a new job from the request data and redirects to the jobs page.
     *
     * Validates the request data against the rules defined in the job request
     * validator, and if the data is valid, creates a new job using Job::create()
     * and redirects to the jobs page. The 'employer_id' key is set to 1 to assign
     * the job to the first employer.
     *
     * @return RedirectResponse
     */
    public function store(): RedirectResponse
    {
        request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'location' => 'required',
        ]);

        $job = Job::create([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
            'type' => request('type'),
            'locations' => json_encode(explode(',', request('location'))),
            'employer_id' => 1,
        ]);

        Mail::to($job->employer->user)->queue(new JobPosted($job));

        return redirect('/jobs');
    }

    /**
     * Show the form for editing the specified job.
     *
     * Displays the 'jobs.edit' view with the specified job data.
     *
     * @param Job $job
     * @return mixed
     */
    public function edit(Job $job): mixed
    {
        // Gate::authorize('edit-job', $job);

        return view('jobs.edit', [
            'job' => $job,
        ]);
    }

    /**
     * Updates the specified job.
     *
     * Validates the request data against the rules defined in the job request
     * validator, and if the data is valid, updates the specified job using
     * Job::update() and redirects to the job page.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function update(Job $job): RedirectResponse
    {
        // validate
        request()->validate([
            'title' => 'required|min:3',
            'description' => 'required',
            'salary' => 'required',
            'type' => 'required',
            'location' => 'required',
        ]);

        // authorize (On hold)

        // update the job
        $job->update([
            'title' => request('title'),
            'description' => request('description'),
            'salary' => request('salary'),
            'type' => request('type'),
            'locations' => json_encode(explode(', ', request('location'))),
        ]);

        // redirect to the job page
        return redirect('/jobs' . '/' . $job->id);
    }


    /**
     * Deletes the specified job.
     *
     * Removes the job from the database and redirects to the jobs list.
     *
     * @param Job $job
     * @return RedirectResponse
     */
    public function destroy(Job $job): RedirectResponse
    {
        $job->delete();
        return redirect('/jobs');
    }
}

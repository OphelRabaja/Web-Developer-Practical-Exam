<?php

namespace App\Http\Controllers;

use App\Models\PaintJob;
use Illuminate\Http\Request;

class PaintJobController extends Controller
{
  public function index()
  {
    $queuedJobs = PaintJob::queued()->orderBy('created_at')->get();
    $activeJobs = PaintJob::active()->get();

    return view('paint_jobs.index', compact('queuedJobs', 'activeJobs'));
  }

  public function store(Request $request)
  {
    $request->validate([
      'car_details' => 'required',
      'customer_name' => 'required',
            'paint_color' => 'required|in:red,green,blue',
        ]);

    $queuedJobsCount = PaintJob::queued()->count();

    if ($queuedJobsCount >= 5) 
    {
      return redirect()->back()->with('error', 'The maximum number of queued paint jobs has been reached.');
    }

    PaintJob::create([
      'car_details' => $request->car_details,
      'customer_name' => $request->customer_name,
      'paint_color' => $request->paint_color,
      'status' => $queuedJobsCount < 5 ? 'active' : 'queued',
    ]);

    return redirect()->route('paint_jobs.index')->with('success', 'Paint job added successfully.');
  }

    public function markAsDone(PaintJob $paintJob)
    {
      $paintJob->update(['status' => 'completed']);

      return redirect()->route('paint_jobs.index')->with('success', 'Paint job marked as done.');
    }
}

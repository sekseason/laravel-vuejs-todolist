<?php

namespace App\Http\Controllers;

use App\Category;
use App\Job;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        //$jobs = Job::where('assign_to', $request->user()->id);
        $jobs = Job::all();

        return view('home', ['jobs' => $jobs]);
    }

    public function edit(Request $request, $id) {
        $job = Job::find($id);

        if ($job) {
            $categories = Category::all()
            ->pluck('name', 'id');

            if ($job->assign_to === $request->user()->id) {
                return view('edit', [
                    'categories' => $categories,
                    'job' => $job
                ]);
            } else {
                return redirect('/home')->with('notify', ['type' => 'error', 'message' => 'Access denied!']);
            }
        }

        return redirect('/home')->with('notify', ['type' => 'error', 'message' => 'Job not found!']);
    }
}

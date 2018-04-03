<?php

namespace App\Http\Controllers\Admin;

use App\Category;
use App\Job;
use App\User;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JobController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'role:admin']);
    }

    public function index()
    {
        $jobs = Job::all();

        return view('admin.job.index', ['jobs' => $jobs]);
    }

    public function create(Request $request)
    {
        $users = User::where('id', '!=', $request->user()->id)
            ->pluck('name', 'id');
        $categories = Category::all()
            ->pluck('name', 'id');

        return view('admin.job.create', [
            'users' => $users,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        $input = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'assignTo' => 'required',
            'category' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $job = Job::create([
            'title' => $input['title'],
            'description' => $input['description'],
            'category' => $input['category'],
            'user' => $request->user()->id,
            'assign_to' => $input['assignTo'],
            'start_date' => Carbon::createFromFormat('d/m/Y', $input['startDate'])->toDateTimeString(),
            'end_date' => Carbon::createFromFormat('d/m/Y', $input['endDate'])->toDateTimeString(),
        ]);
        
        if ($job) {
            if ($input['attache']) {
                $file = $request->file('attache')->store('job/' . $job->id);
                $job->attache = $file;
            }

            if ($input['link']) {
                $job->link = $input['link'];
            }

            $job->save();
        }

        return redirect('/admin/job')->with('notify', ['type' => 'success', 'message' => 'Created successfully!']);
    }

    public function edit(Request $request, $id)
    {
        $users = User::where('id', '!=', $request->user()->id)
            ->pluck('name', 'id');
        $categories = Category::all()
            ->pluck('name', 'id');
        $job = Job::find($id);

        return view('admin.job.edit', [
            'categories' => $categories,
            'job' => $job,
            'users' => $users
        ]);
    }

    public function update(Request $request, $id)
    {
        $input = $request->all();
        $this->validate($request, [
            'title' => 'required',
            'description' => 'required',
            'assignTo' => 'required',
            'category' => 'required',
            'startDate' => 'required',
            'endDate' => 'required'
        ]);

        $job = Job::find($id);
        
        if ($job) {
            $job->title = $input['title'];
            $job->description = $input['description'];
            $job->category = $input['category'];
            $job->assign_to = $input['assignTo'];
            $job->start_date = Carbon::createFromFormat('d/m/Y', $input['startDate'])->toDateTimeString();
            $job->end_date = Carbon::createFromFormat('d/m/Y', $input['endDate'])->toDateTimeString();

            if ($input['attache']) {
                $file = $request->file('attache')->store('job/' . $job->id);
                $job->attache = $file;
            }

            if ($input['link']) {
                $job->link = $input['link'];
            }

            $job->save();
        }

        return redirect('/admin/job')->with('notify', ['type' => 'success', 'message' => 'Updated successfully!']);
    }

    public function destroy($id)
    {
        $job = Job::find($id);
        Storage::deleteDirectory('job/' . $job->id);
        $job->delete();

        return redirect('/admin/job')->with('notify', ['type' => 'success', 'message' => 'Deleted successfully!']);
    }
}

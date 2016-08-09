<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Resume;

class ResumeController extends Controller
{

	public function index(Request $request)
    {
    	$resumes = Resume::orderBy('created_at', 'asc')->get();

    	return view('resume.index', [
    		'resumes' => $resumes
    	]);
    }

    public function store(Request $request)
    {
    	$this->middleware('auth');

		$this->validate($request, [
			'rname' => 'required|max:255',
			'rposition' => 'required|max:255',
			'rsalary' => 'required|integer',
		]);

		$request->user()->resume()->create([
			'rname' => $request->rname,
			'rposition' => $request->rposition,
			'rdesc' => $request->rdesc,
			'rsalary' => $request->rsalary,
		]);

		return redirect('/resume');
    }

   	public function destroy(Request $request, Resume $resume)
	{
		$this->middleware('auth');

		$this->authorize('destroy', $resume);

		$resume->delete();

    	return redirect('/resume');
	}

	public function show(Request $request, Resume $resume)
	{

    	return view('resume.show', [
    		'resume' => $resume
    	]);

	}

}

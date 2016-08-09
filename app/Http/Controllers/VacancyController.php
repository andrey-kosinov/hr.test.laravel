<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Vacancy;
use App\User;
use Mail;

class VacancyController extends Controller
{
    
   	public function __construct()
    {
        //
    }

    public function index(Request $request)
    {
    	$vacancies = Vacancy::orderBy('created_at', 'asc')->get();

    	return view('vacancy.index', [
    		'vacancies' => $vacancies
    	]);
    }

    public function store(Request $request)
    {
    	$this->middleware('auth');

		$this->validate($request, [
			'vname' => 'required|max:255',
			'vcomp' => 'required|max:255',
			'vsalary' => 'required|integer',
		]);

		$data = $request->user()->vacancy()->create([
			'vname' => $request->vname,
			'vcomp' => $request->vcomp,
			'vreqs' => $request->vreqs,
			'vsalary' => $request->vsalary,
		]);


		/**
		 * Notifying vacancy owner
		 */
		if ($request->user()->role == 2 && !$request->user()->notified)
		{
			Mail::send('vacancy.first_notfication',['user'=>$request->user(),'vacancy'=>$data],function($m) {
				global $request;
				$m->from('noreply@hr.local')->to($request->user()->email,$request->user()->name)->subject('Your vacancy status: On Moderation');
			});
		}

		/**
		 * Notifying moderator
		 */
		
		Mail::send('vacancy.moderator_notfication',['vacancy'=>$data],function($m) {
			$user = User::find(1);
			$m->from('noreply@hr.local')->to($user->email,$user->name)->subject('New vacancy to moderate');
		});


		return redirect('/vacancy');
    }

   	public function destroy(Request $request, Vacancy $vacancy)
	{
		$this->middleware('auth');

		$this->authorize('destroy', $vacancy);

		$vacancy->delete();

    	return redirect('/vacancy');
	}

   	public function delete(Request $request, Vacancy $vacancy)
	{
		$this->middleware('auth');

		$this->authorize('destroy', $vacancy);

		$vacancy->delete();

    	return redirect('/vacancy');
	}


	public function show(Request $request, Vacancy $vacancy)
	{
    	return view('vacancy.show', [
    		'vacancy' => $vacancy
    	]);

	}

	public function approve(Request $request, Vacancy $vacancy)
	{
		$this->authorize('approve', $vacancy);

		$vacancy->proved = 1;
		$vacancy->save();

		return redirect('/vacancy');	
	}
}

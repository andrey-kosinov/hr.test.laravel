@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $vacancy->vname }}</div>

                <div class="panel-body">
                    <p><b>Position</b>: {{ $vacancy->vname }}</p>
                    <p><b>Company</b>: {{ $vacancy->vcomp }}</p>
                    <p><b>Requirements</b>: {{ $vacancy->vreqs }}</p>
                    <p><b>Salary</b>: ${{ $vacancy->vsalary }}</p>
                    <p><br>
                        <a href="/vacancy">&laquo; back to list</a>
                    @if (!Auth::guest() && Auth::user()->role == 1)
                        @if ( !$vacancy->proved )
                            <a href="/vacancy/approve/{{ $vacancy->id }}" style='color:green; margin:0 10px;'>approve</a>
                        @endif
                        <a href="/vacancy/delete/{{ $vacancy->id }}" style='color:red; margin:0 10px;'>delete</a>
                    @endif
                    </p>
                </div>

            </div>
        </div>
    </div>
</div>
		                        
@endsection

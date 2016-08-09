@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">{{ $resume->rname }}</div>

                <div class="panel-body">
                    <p><b>Name</b>: {{ $resume->rname }}</p>
                    <p><b>Position</b>: {{ $resume->rposition }}</p>
                    <p><b>Experience</b>: {{ $resume->rdesc }}</p>
                    <p><b>Salary</b>: ${{ $resume->rsalary }}</p>
                    <p><br><a href="/resume">&laquo; back to list</a></p>
                </div>

            </div>
        </div>
    </div>
</div>
		                        
@endsection

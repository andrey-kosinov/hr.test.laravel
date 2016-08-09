@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All resume list</div>

                <div class="panel-body">

		            @if (count($resumes) > 0)
		                        <table class="table table-striped task-table">
		                            <thead>
		                                <th>Name, Position</th>
		                                <th>Salary</th>
		                                <th>&nbsp;</th>
		                            </thead>
		                            <tbody>
		                                @foreach ($resumes as $res)
		                                    <tr>
		                                        <td class="table-text"><div><a href='/resume/show/{{ $res->id }}'>{{ $res->rname }}, {{ $res->rposition }}</div></td>
		                                        <td class="table-number"><div>${{ $res->rsalary }}</div></td>

		                                        <!-- Task Delete Button -->
		                                        <td>
		                                        @if (!Auth::guest() && Auth::user()->id == $res->user_id)
		                                            <form action="{{url('resume/' . $res->id)}}" method="POST">
		                                                {{ csrf_field() }}
		                                                {{ method_field('DELETE') }}

		                                                <button type="submit" id="delete-resume-{{ $res->id }}" class="btn btn-danger">
		                                                    <i class="fa fa-btn fa-trash"></i>Delete
		                                                </button>
		                                            </form>
		                                           @endif
		                                        </td>
		                                    </tr>
		                                @endforeach
		                            </tbody>
		                        </table>
		            @endif                                      

                </div>                

            </div>

			@if (Auth::user() && Auth::user()->role == 3)
			<div class="panel panel-default">
                <div class="panel-heading">
                    Add New Resume
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <form action="{{ url('resume') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Name -->
                        <div class="form-group">
                            <label for="rname" class="col-sm-3 control-label">Name</label>

                            <div class="col-sm-6">
                                <input type="text" name="rname" id="rname" class="form-control" value="{{ old('rname') }}">
                            </div>
                        </div>

                        <!-- Position -->
                        <div class="form-group">
                            <label for="rposition" class="col-sm-3 control-label">Position</label>

                            <div class="col-sm-6">
                                <input type="text" name="rposition" id="rposition" class="form-control" value="{{ old('rposition') }}">
                            </div>
                        </div>

						<!-- Desc -->
                        <div class="form-group">
                            <label for="rdesc" class="col-sm-3 control-label">Experience, <br>Description</label>

                            <div class="col-sm-6">
                                <textarea name="rdesc" id="rdesc" class="form-control">{{ old('rdesc') }}</textarea>
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="form-group">
                            <label for="rsalary" class="col-sm-3 control-label">Salary</label>

                            <div class="col-sm-3">
                                <input type='text' name="rsalary" id="rsalary" class="form-control" value="{{ old('rsalary') }}">
                            </div>
                        </div>

                        <!-- Add  Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Resume
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            @endif

        </div>
    </div>
</div>
@endsection

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            <div class="panel panel-default">
                <div class="panel-heading">All vacancies list</div>

                <div class="panel-body">

		            @if (count($vacancies) > 0)
                    <table class="table table-striped task-table">
                        <thead>
                            <th>Vacancy</th>
                            <th>Salary</th>
                            <th>&nbsp;</th>
                        </thead>
                        <tbody>
                            @foreach ($vacancies as $vac)
                                <tr>
                                    <td class="table-text"><div><a href='/vacancy/show/{{ $vac->id }}'>{{ $vac->vname }} @if ($vac->proved) <small style='color:green; margin-left:5px;'>proved</small> @else <small style='color:#aaa; margin-left:5px;'>not proved</small> @endif</div></td>
                                    <td class="table-number"><div>${{ $vac->vsalary }}</div></td>

                                    <!-- Task Delete Button -->
                                    <td>
                                    @if (!Auth::guest() && (Auth::user()->id == $vac->user_id || Auth::user()->role == 1))
                                        <form action="{{url('vacancy/' . $vac->id)}}" method="POST">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}

                                            <button type="submit" id="delete-vacancy-{{ $vac->id }}" class="btn btn-danger">
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

            @if (Auth::user() && Auth::user()->role == 2)
			<div class="panel panel-default">
                <div class="panel-heading">
                    Add New Vacancy
                </div>

                <div class="panel-body">
                    <!-- Display Validation Errors -->
                    @include('common.errors')

                    <form action="{{ url('vacancy') }}" method="POST" class="form-horizontal">
                        {{ csrf_field() }}

                        <!-- Name -->
                        <div class="form-group">
                            <label for="vname" class="col-sm-3 control-label">Name (Position)</label>

                            <div class="col-sm-6">
                                <input type="text" name="vname" id="vname" class="form-control" value="{{ old('vname') }}">
                            </div>
                        </div>

						<!-- Comp -->
                        <div class="form-group">
                            <label for="vcomp" class="col-sm-3 control-label">Company</label>

                            <div class="col-sm-6">
                                <input type='text' name="vcomp" id="vcomp" class="form-control" value="{{ old('vcomp') }}">
                            </div>
                        </div>

						<!-- Requirements -->
                        <div class="form-group">
                            <label for="vreqs" class="col-sm-3 control-label">Requirements</label>

                            <div class="col-sm-6">
                                <textarea name="vreqs" id="vreqs" class="form-control">{{ old('vreqs') }}</textarea>
                            </div>
                        </div>

                        <!-- Salary -->
                        <div class="form-group">
                            <label for="vsalary" class="col-sm-3 control-label">Salary</label>

                            <div class="col-sm-3">
                                <input type='text' name="vsalary" id="vsalary" class="form-control" value="{{ old('vsalary') }}">
                            </div>
                        </div>

                        <!-- Add  Button -->
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn btn-default">
                                    <i class="fa fa-btn fa-plus"></i>Add Vacancy
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

@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Create New User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{ route('register') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autofocus>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="email" class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label for="password" class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="password-confirm" class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label">Status</label>

                            <div class="col-md-6">
                                <label class="radio-inline"><input type="radio" name="status" value="1">Active</label>
                                <label class="radio-inline"><input type="radio" name="status" value="0">Inactive</label>


                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>
                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="designation">
                                    <option value="It manager">It manager</option>
                                    <option value="Project Manager">Project Manager</option>
                                    <option value="Team Leader">Team Leader</option>
                                    <option value="Developer">Developer</option>
                                </select>
                            </div>

                        </div>
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Add user
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="panel panel-default">

            <div class="panel-body">
                <h2><code>Users</code></h2>
                @if(count($users) > 0)
                    <table class="table table-bordered">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Designation</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        @foreach($users as $user)
                        <tbody>
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->designation}}</td>
                            <td>{{ $user->status == 1 ? 'Active' : 'Inactive'}}</td>
                            <td><a href="{{route('user.edit',$user->id)}}" class="btn btn-info">Edit</a>
                                <form class="form-group pull-left" method="POST" action="{{route('user.destroy',$user->id)}}">
                                {{ csrf_field() }}
                                    <div class="form-group">
                                        <input type="submit" value="DELETE" class="btn btn-danger">

                                    </div>
                                </form>
                            </td>
                        </tr>

                        </tbody>
                        @endforeach
                    </table>
                @endif
                <h2>No Users</h2>
            </div>
        </div>
    </div>

@endsection
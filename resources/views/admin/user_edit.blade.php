@extends('layouts.master')

@section('content')

    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Update User</div>

                <div class="panel-body">
                    <form class="form-horizontal" method="POST" action="{{route('user.update',$user->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label for="name" class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ $user->name }}" required autofocus>

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
                                <input id="email" type="email" class="form-control" name="email" value="{{ $user->email }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>




                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="status" class="col-md-4 control-label" >Status</label>

                            <div class="col-md-6">

                                <label class="radio-inline"><input type="radio" name="status" value="1" {{$user->status == 1 ? 'checked' : ""}} >Active</label>
                                <label class="radio-inline"><input type="radio" name="status" value="0" {{$user->status == 0 ? 'checked' : ""}}>Inactive</label>


                            </div>
                        </div>
                        <div class="form-group{{ $errors->has('status') ? ' has-error' : '' }}">
                            <label for="designation" class="col-md-4 control-label">Designation</label>
                            <div class="col-md-6">
                                <select class="form-control" id="sel1" name="designation" >
                                    <option value="{{$user->designation}}" selected >{{$user->designation}}</option>
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
                                    Update user
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
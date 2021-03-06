@extends('layouts.masterAdmin')
@section('content')
    <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">User
                            <small>Edit</small>
                        </h1>
                    </div>

                    <!-- /.col-lg-12 -->
                    <div class="col-lg-7" style="padding-bottom:120px">
                        <div>
                            @if (Session::has('edit'))
                            <div class="alert alert-success">
                              {{ Session::get('edit') }}
                            </div>
                        @endif
                        </div>
                        <form action="{{url('admin/user/edit_user/'.$user->id)}}" method="POST">
                            <input type="hidden" name="_token" value="{{csrf_token()}}">
                            <div class="form-group">
                                <label>Username</label>
                                <input class="form-control" name="name" placeholder="Please Enter Username" value="{{$user->name}}" />
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" name="email" placeholder="Please Enter Email" disabled="" value="{{$user->email}}" value="{{$user->email}}"/>
                                @if($errors->has('email'))
                                <p class="control text-danger">{{$errors->first('email')}}</p>
                                @endif
                            </div>
                            <div class="form-group">
                                <label>Address</label>
                                <input class="form-control" name="address" placeholder="Please Enter Address" value="{{$user->address}}" />
                                @if($errors->has('address'))
                                <p class="text-danger">{{$errors->first('address')}}</p>
                                @endif
                            </div>
                            <div class="form-block">
                                <label for="phone">Phone Number:</label>
                                <input type="text" class="form-control" id="phone" name="phone_number" value="{{$user->phone_number}}" placeholder="Please Enter Phone">
                                @if($errors->has('phone_number'))
                                    <p  class="text-danger">{{$errors->first('phone_number')}}</p>
                                @endif
                                <label>User Level</label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="0" type="radio">Admin
                                </label>
                                <label class="radio-inline">
                                    <input name="is_admin" value="1" checked="" type="radio">Member
                                </label>
                            </div>
                            <button type="submit" class="btn btn-default">User Add</button>
                            <button type="reset" class="btn btn-default">Reset</button>
                        <form>
                    </div>
                </div>
                <!-- /.row -->
            </div>
            <!-- /.container-fluid -->
        </div>
@stop
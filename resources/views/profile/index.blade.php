@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card card-block d-flex">
                <div class="card-header">Profile</div>
                    
                <div class="card-body align-items-center justify-content-center">
                    <div class="profilelist">
                        <a href="{{ url('/profile') }}"><strong class="profile">{{ Auth::user()->name }}</strong></a>
                        <p>{{ Auth::user()->bio }}</p>
                        <hr>
                        <p>{{ Auth::user()->location}}</p>
                        
                        <a href="{{ url('/home') }}" class="btn btn-primary"><- Back to Home</a>
                    </div>
                </div>

                <div class="card-body align-items-center d-flex justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Your full profile</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                        <form method="POST" enctype="multipart/form-data" action="/profile">
                            @csrf

                            <label for="profile_picture" class="form-label"><strong>Set Profile Photo</strong></label>
                            <input type="file" name="profile_picture">

                            <p><strong>Name: </strong><br><hr> 
                                <input type="text" class="form-control" name="name" value="{{ Auth::user()->name }}"><span class="float-right">Edit</span>
                            </p>

                            <p><strong>Bio: </strong><br><hr> 
                                <input type="text" class="form-control" name="bio" value="{{ Auth::user()->bio }}"><span class="float-right">Edit</span>
                            </p>

                            <p><strong>Gender: </strong><br><hr> 
                                <select class="form-control" name="gender">
                                    <option>Male</option>
                                    <option>Female</option>
                                </select>
                            </p>

                            <p><strong>Location: </strong><br><hr> 
                                <input type="text" class="form-control" name="location" value="{{ Auth::user()->location }}"><span class="float-right">Edit</span>
                            </p>

                            <p><strong>Contact: </strong><br><hr> 
                                <input type="text" class="form-control" name="phone_number" value="{{ Auth::user()->phone_number}}"><span class="float-right">Edit</span>
                            </p>

                            <button type="submit" class="btn btn-primary">Submit</button>
                        </form>

                        <hr>
                </div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Events</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Event stream
                </div>
            </div>
        </div>

    </div>
</div>
@endsection

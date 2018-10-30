@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card card-block d-flex">
                <div class="card-header">Profile</div>
                    
                <div class="card-body align-items-center justify-content-center">
                    <div class="profilelist">
                        <div><img class="rounded-circle adams" src="{{asset('storage/profilepics/profilepic'.Auth::user()->id.'.jpg')}}" alt="profile pic" onerror="this.src='{{asset('img/user_icon.png')}}'" ></div>
                        <a href="{{ url('/profile') }}"><strong class="profile">{{ Auth::user()->name }}</strong></a>
                        <p>{{ Auth::user()->bio }}</p>
                        <hr>
                        <p>{{ Auth::user()->location}}</p>
                        
                        <button class="btn btn-sm btn-primary" style="margin: 2px" data-toggle="modal" data-target="#ProfileViewModal">View Profile</button>
                        <button class="btn btn-sm btn-success" style="margin: 2px">Create a Tree</button>
                    </div>
                </div>

                <div class="card-body align-items-center d-flex justify-content-center">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <!-- Modal -->
                    <div class="modal fade" id="ProfileViewModal" tabindex="-1" role="dialog" aria-labelledby="ProfileViewModal" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="exampleModalLongTitle">Your MUNA Profile</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">

                                <form method="POST" action="/profile">
                                @csrf

                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right">Name</label>

                                    <div class="col-md-6">
                                        <p id="name">{{ Auth::user()->name }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="bio" class="col-md-4 col-form-label text-md-right">Bio</label>

                                    <div class="col-md-6">
                                        <p id="bio">{{ Auth::user()->bio }}</p>
                                    </div>
                                </div> 
                                
                                <div class="form-group row">
                                    <label for="location" class="col-md-4 col-form-label text-md-right">Location</label>

                                    <div class="col-md-6">
                                        <p id="location">{{ Auth::user()->location }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="gender" class="col-md-4 col-form-label text-md-right">Gender</label>

                                    <div class="col-md-6">
                                        <p id="location">{{ Auth::user()->gender }}</p>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="contact" class="col-md-4 col-form-label text-md-right">Contact</label>

                                    <div class="col-md-6">
                                        <p id="contact">{{ Auth::user()->phone_number }}</p>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <a href="{{ url('/profile') }}" class="btn btn-primary">Edit Profile</a>
                                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                    </div>
                                </div>
                                </form>

                                </div>
                                <div class="modal-footer">
                                    
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="card">
                <div class="card-header">Activity Stream</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
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

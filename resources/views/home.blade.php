@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">

        <div class="col-md-3">
            <div class="card card-block d-flex">
                <div class="card-header text-white bg-primary">Profile</div>
                    
                <div class="card-body align-items-center justify-content-center">
                    <div class="profilelist">
                        <div><img class="rounded-circle adams" src="{{asset('storage/profilepics/profilepic'.Auth::user()->id.'.jpg')}}" alt="profile pic" onerror="this.src='{{asset('img/user_icon.png')}}'" ></div>
                        <a href="{{ url('/profile') }}"><strong class="profile">{{ Auth::user()->name }}</strong></a>
                        <p>{{ Auth::user()->bio }}</p>
                        <hr>
                        <p><i class="fas fa-map-marker-alt"></i> &nbsp {{ Auth::user()->location}}</p>
                        
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
            <div class="card cardspacing">
                <div class="card-header text-white bg-primary">Activity Stream</div>
                <div class="card-body text-white bg-dark">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @include('layouts.errors')

                    <div class="form-group">
                        <form method="POST" action="/post" autocomplete="off">
                            {{ csrf_field() }}
                            <input autocomplete="false" name="hidden" type="text" style="display:none;">
                            <textarea name="body" class="form-control" placeholder="share your thoughts..." rows="2"></textarea>
                            <button type="submit" class="btn btn-sm btn-success post-btn">Post</button>
                        </form>
                    </div>
                </div>
            </div>

            @foreach($posts as $post)
                <div class="card cardspacing">
                    <div class="card-body cardtopborder">

                        <div class="post_image"><img class="rounded-circle adams2" src="{{asset('storage/'.$post->user->picture)}}" alt="profile pic" onerror="this.src='{{asset('img/user_icon.png')}}'" >

                        <span class="userpost">{{ $post->body }} <em><small>by <strong class="profile">{{ $post->user->name }}</strong></small></em></span></div>

                            <div>
                                <form class="form-group" autocomplete="off" method="POST" action="/comment/{{ $post->id }}">
                                    {{ csrf_field() }}
                                    <input autocomplete="false" name="hidden" type="text" style="display:none;">
                                    <div class="input-group input-group-sm mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text" id="inputGroup-sizing-sm"><i class="far fa-comment-alt"></i></span>
                                        </div>
                                        <input type="text" name="body" class="form-control" aria-label="Sizing example input" aria-describedby="inputGroup-sizing-sm">
                                        <button class="btn btn-sm btn-outline-default float-right" type="submit">comment</button>
                                    </div>
                                </form>
                            </div>
                            <p> 
                            <i class="fas fa-thumbs-up"></i>
                                <span><small>like</small></span>&nbsp
                            <i class="fas fa-share-alt"></i>
                                <span><small>share</small></span>
                            <br>
                            <em><small>at - {{ $post->created_at->diffForHumans() }}</small></em></p></div>

                            @if(count($post->comments))
                            <a class="btn btn-secondary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">View all comments</a>

                            <div class="collapse" id="collapseExample">
                                <div class="card-header">
                                    <ul class="list-group">
                                        @foreach($post->comments as $comment)
                                        <li class="list-group-item">
                                        {{ $comment->body }} <em><small> - {{ $comment->created_at->diffForHumans() }} by <strong class="profile">{{ $comment->user->name }}</strong></small></em>
                                        </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                            @endif
                </div> 
            @endforeach
        </div>

        <div class="col-md-3">
            <div class="card">
                <div class="card-header text-white bg-primary">Events</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <ul class="list-group">
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Notifications
                            <span class="badge badge-primary badge-pill">14</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Family requests
                            <span class="badge badge-primary badge-pill">2</span>
                        </li>
                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            Events
                            <span class="badge badge-primary badge-pill">1</span>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

    </div>
</div>
@endsection

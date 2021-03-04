@extends('layouts.app')

@section('content')





 <div class="container">
<div class="row">
    <div class="col-3 p-5">
    <img src="/storage/{{ $user->profile->image }}" class="rounded-circle w-100" />
    </div>
    <div class="col-9 pt-5">
       <div class="d-flex justify-content-between align-items-baseline">
           <div class="d-flex align-items-center pb-3">
            <div class="h4"><b>{{ $user->username }}</b></div>
           <follow-button
           user-id="{{ $user->id }}"
           follows="{{ $follows }}"></follow-button>

           </div>
           @can('update', $user->profile)

         <a href="/p/create">Add New Post</a>
         @endcan
        </div>
         @can('update', $user->profile)
         <a href="/profile/{{ $user->id }}/edit">Edit Profile</a>

         @endcan
         <div class="d-flex">
            <div class="pr-5"><strong>{{ $postCount }}</strong> posts</div>
            <div class="pr-5"><strong>{{ $followersCount }}</strong> followers</div>
            <div class="pr-5"><strong>{{ $followingCount }}</strong> following</div>
        </div>
        <div class="pt-4"><strong>{{ $user->profile->title }}</strong></div>
        <div>{{ $user->profile->description }}
        </div>
        <div class="pt-4"><strong><a href="#">{{ $user->profile->url }}</a></strong></div>
    </div>
</div>
<div class="row pt-5">

     @foreach ($user->posts as $post)
         <div class="col-4 pb-4">
         <a href="/p/{{ $post->id }}">
             <img src="/storage/{{ $post->image }}" alt="" class="w-100"/>
            </a>
          </div>
     @endforeach







</div>



   {{--  @foreach ( App\User(); as $pos)
         <div class="col-4 pb-4">test
         <a href="/p/{{ $post->id }}">
             <img src="/storage/{{ $post->image }}" alt="" class="w-100"/>
            </a>
          </div>
     @endforeach

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>--}}
</div>
@endsection

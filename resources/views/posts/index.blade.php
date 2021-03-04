@extends('layouts.app')

@section('content')

 <div class="container">
     <div class="d-flex pl-3 pr-3" style="overflow-x: auto">

            @foreach ($postss as $pos)




<div style="border: 2px solid grey; text-align:center;border-radius:20px" class="pl-3 pr-3">

    <div style="text-align">
        <a href="/profile/{{ $pos->user->id }}"><img src="/storage/{{ $pos->image }}" class="rounded-circle w-50"  /></a>
    </div>


<br>
            <b> <a href="/profile/{{ $pos->user->id }}">
                <span class="text-dark">{{ $pos->user->username }}
              </span>
            </a></b>
<br>


         @can('update', $pos->user->profile)
         <a href="/profile/{{ $pos->user->id }}/edit">Edit Profile</a>

         @endcan
</div>


             @endforeach

            </div>













     @foreach ($posts as $post)

    <div class="row pt-2 pb-6">
        <div class="col-6 offset-3">
            <a href="/profile/{{ $post->user->id }}">
                <img src="/storage/{{ $post->image }}" class="w-100">
            </a>
        </div></div>
        <div class="row">
        <div class="col-6 offset-3">
            <div>



        <p>
            <span class="font-weight-bold">
                         <a href="/profile/{{ $post->user->id }}">
                            <span class="text-dark">{{ $post->user->username }}
                    </span>
                </a>
            </span>{{ $post->caption }}
        </p>
            </div>
        </div>
    </div>
     @endforeach




  <div class="row col-12 d-flex justify-content-center">

    {{ $posts->links() }}
  </div>
</div>
@endsection

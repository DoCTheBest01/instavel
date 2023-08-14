@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-8 center mx-auto">
            <div class="card">
              <div class="card-body">
                <blockquote class="blockquote mb-0">
                  <h1 class="text-center">{{$post->title}}</h1>
                  {{-- <footer class="blockquote-footer">Footer <cite title="Source title">Source title</cite></footer> --}}
                  <img class="card-img" src="{{asset($post->pic)}}" alt="">
                  <hr>
                  <div class="card-header">
                    <a href="/cc/{{App\Models\User::getUserUserNameByID($post->creator)}}" class="linktoprofile"><img src="{{ asset(App\Models\User::getUserPicByID($post->creator)) }}" class="img-fluid rounded-circle me-1" style="width:45px;height:45px;overflow: hidden;" alt=""><span class="px-3 text-dark" >{{App\Models\User::getUserUserNameByID($post->creator)}}</span>@if(App\Models\User::getUserVerificationById($post->creator)) <span class="badge rounded-pill bg-primary">Verified</span> @endif</a>
                  </div>
                  <div style="height: 20px;"></div>
                  <p>{{$post->description}}</p>
                </blockquote>
              </div>
            </div>
        </div>
    </div>
@endsection
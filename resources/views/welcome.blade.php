@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-6 center mx-auto" dir="rtl">
            @foreach ($posts as $post)
            
                <div class="card">
                    <div class="card-header">
                        <a href="cc/{{App\Models\User::getUserUserNameByID($post->creator)}}" class="linktoprofile"><img src="{{ asset(App\Models\User::getUserPicByID($post->creator)) }}" class="img-fluid rounded-circle me-1" style="width:45px;height:45px;overflow: hidden;" alt=""><span class="px-3 text-dark" >{{App\Models\User::getUserUserNameByID($post->creator)}}</span>@if(App\Models\User::getUserVerificationById($post->creator)) <span class="badge rounded-pill bg-primary">Verified</span> @endif</a>
                    </div>
                    <img src="{{asset($post->pic)}}" class="card-img-top" alt="{{$post->title}}">
                    <div class="card-body">
                        <h4 class="card-title">{{$post->title}}</h4>
                        <p class="card-text">{{$post->description}}</p>
                        <a href="p/{{$post->url}}">بیشتر...</a>
                    </div>
                </div>
                <div style="height: 50px"></div>
            @endforeach
        </div>
    </div>
@endsection
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="col-md-10 center mx-auto" style="position: relative;bottom: 56px;">
            <div class="row">
                <div class="col-md-4">
                    <span><img src="{{asset($user->pic)}}" style="width: 190px;
                    height: 190px;
                    overflow: hidden;
                    object-fit: cover;
                    border-radius: 50%;" alt="">
                    <h1>{{$user->username}}</h1>
                    <h2 class="text-muted">{{$user->name}}</h2><span>
                </div>
                <div class="col-md-4" style="position: relative; top:84px;">
                    <strong>Posts</strong>
                    <span>{{$posts->count()}}</span>
                </div>
            </div>
            <hr>
            <div>
                @if($posts->count() == 0)
                    
                @else
                <div class="row">
							
                    @foreach ($posts as $item)
                        
                    <div class="col-lg-4 col-md-6 col-sm-6 col-8 center mx-auto">
                        <div class="card" style="width: 16rem;">
                            <img src="{{asset($item->pic)}}" class="card-img-top" alt="">
                            <div class="card-body center">
                                <div class="woo_title">
                                    <h4 class="card-title"><a href="/p/{{$item->url}}">{{$item->title}}</a></h4>
                                </div>
                                <div class="woo_price">
                                    <a href="/p/{{$item->url}}">بیشتر...</a>
                                </div>
                            </div>						
                        </div>
                    </div>
                    @endforeach
                    
                </div>
                @endif
            </div>
        </div>
    </div>
@endsection
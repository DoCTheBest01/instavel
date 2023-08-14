@extends('layouts.app')

@section('content')
<div class="container">
    <div class="col-md-8 center mx-auto">
        <div class="card">
          <div class="card-body">
            <h4 class="card-title">ویرایش پست</h4>
            <form action="/postlist/{{$post->id}}" method="post" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <img src="{{asset($post->pic)}}" class="card-img" alt="" title="تصویر کنونی پست">
                    <label for="file">تصویر</label>
                    <input type="file" name="file" class="form-control form-control-file" id="file" value="{{$post->pic}}">
                    <p>اگر تصویری انتخاب نکنید به طور پیش فرض تصویر قبل تغییری نمیکند</p>
                </div>
                <br>
                <div class="form-group">
                    <label for="title">عنوان</label>
                    <input type="text" name="title" class="form-control" id="title" value="{{$post->title}}">
                </div>
                <br>
                <div class="form-group">
                    <label for="description">توضیحات</label>
                    <textarea class="form-control" name="description" id="description" rows="4">{{$post->description}}</textarea>
                </div>
                <br>
                <div class="d-grid gap-2">
                    <button class="btn btn-outline-primary" type="submit">ویرایش</button>
                </div>
            </form>
          </div>
        </div>
    </div>
</div>
@endsection
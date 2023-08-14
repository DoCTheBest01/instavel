@extends('layouts.adm')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
            <div class="card-body">
                <h4 class="card-title">ساخت پست</h4>
                <form action="" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="pic">تصویر</label>
                        <input type="file" name="pic" class="form-control form-control-file" id="pic">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="title">عنوان</label>
                        <input type="text" name="title" class="form-control" id="title">
                    </div>
                    <br>
                    <div class="form-group">
                        <label for="description">توضیحات</label>
                        <textarea class="form-control" name="description" id="description" rows="4"></textarea>
                    </div>
                    <br>
                    <div class="d-grid gap-2">
                        <button class="btn btn-outline-primary" type="submit">ارائه</button>
                    </div>
                </form>
            </div>
            </div>
        </div>
    </div>
@endsection
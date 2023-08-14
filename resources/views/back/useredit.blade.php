@extends('layouts.adm')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                  <h4 class="card-title">ویرایش کاربر</h4>
                  <form action="/admin/allusers/{{$user->id}}" method="post" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="form-group">
                          <img src="{{asset($user->pic)}}" class="card-img mx-auto center" alt="" style="width: auto;height:250px;" title="تصویر کنونی کاربر">
                          <p></p>
                          <label for="file">تصویر</label>
                          <input type="file" name="file" class="form-control form-control-file" id="file" value="{{$user->pic}}">
                          <p>اگر تصویری انتخاب نکنید به طور پیش فرض تصویر قبل تغییری نمیکند</p>
                      </div>

                        <div class="form-group">
                            <label for="title">نام</label>
                            <input type="text" name="name" class="form-control" id="name" value="{{$user->name}}">
                        </div>

                        <div class="form-group">
                            <label for="title">نام کاربر</label>
                            <input type="text" name="username" class="form-control" id="username" value="{{$user->username}}">
                        </div>

                        <div class="form-group">
                            <label for="title">ایمیل</label>
                            <input type="email" name="email" class="form-control" id="email" value="{{$user->email}}">
                        </div>

                        <div class="form-group">
                            <label for="title">شماره تلفن</label>
                            <input type="tel" name="phone" class="form-control" id="phone" value="{{$user->phone}}">
                        </div>

                        <div class="form-group">
                            <label for="title">آیا ادمین است</label>
                            {{-- <div class="btn-group" role="group" aria-label="Basic checkbox toggle button group">
                              <input type="radio" class="btn-check" name="btnradio" id="btncheck1" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btncheck1">First One</label>
                            
                              <input type="radio" class="btn-check" name="btnradio" id="btncheck2" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btncheck2">Second One</label>
                            
                              <input type="radio" class="btn-check" name="btnradio" id="btncheck3" autocomplete="off">
                              <label class="btn btn-outline-primary" for="btncheck3">Third One</label>
                            </div> --}}

                            <!-- radio -->
                            
                            <div class="btn-group" data-bs-toggle="buttons">
                                <label class="btn btn-success">
                                    <input type="radio" class="me-2" name="isadmin" id="isadmin" value="1" autocomplete="off" @if($user->isadmin) @checked(true) @endif> بله
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="isadmin" id="isadmin" value="0" autocomplete="off" @if(!$user->isadmin) @checked(true) @endif> خیر
                                </label>
                            </div>                            
                        </div>

                        <div class="form-group">
                            <label for="title">آیا مورد تایید است</label>
                            <div class="btn-group" data-bs-toggle="buttons">
                                <label class="btn btn-success">
                                    <input type="radio" class="me-2" name="verified" id="verified" value="1" autocomplete="off" @if($user->verified) @checked(true) @endif> بله
                                </label>
                                <label class="btn btn-danger">
                                    <input type="radio" name="verified" id="verified" value="0" autocomplete="off" @if(!$user->verified) @checked(true) @endif> خیر
                                </label>
                            </div> 
                        </div>

                        <div class="form-group">
                            <label for="title">کلمه عبور</label>
                            <input type="text" name="password" class="form-control" id="password" autocomplete="new-password">
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
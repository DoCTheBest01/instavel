@extends('layouts.adm')

@section('content')
    <div class="container">
        <div class="col-md-12">
            <table class="table">
                <thead class="table-primary">
                    <td>نام</td>
                    <td>نام کاربری</td>
                    <td>ایمیل</td>
                    <td>شماره تلفن</td>
                    <td>دسترسی ادمین</td>
                    <td>ایمیل تایید شده</td>
                    <td>کاربر مورد تایید</td>
                    <td>تصویر کاربر</td>
                    <td>ویرایش کاربر</td>
                    <td>حذف کاربر</td>
                </thead>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td><a href="/cc/{{$user->username}}" target="blank">{{$user->username}}</a></td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->phone }}</td>

                        <td>@if($user->isadmin) <span class="badge badge-success">بله</span>@else <span class="badge badge-danger">خیر</span>@endif</td>
                        <td>@if($user->email_verified_at != null) <span class="badge badge-primary">بله</span>@else <span class="badge badge-danger">خیر</span>@endif</td>
                        <td>@if($user->verified) <span ><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check-circle-fill" viewBox="0 0 16 16">
                            <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z"/>
                          </svg></span>@endif</td>

                        
                          <td><a href="/{{$user->pic}}" target="blank">
                                <svg version="1.1" id="Layer_1" width="16" height="16" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px"
                                    viewBox="0 0 460.002 460.002" style="enable-background:new 0 0 460.002 460.002;" xml:space="preserve">
                                    <g>
                                        <g>
                                            <g>
                                                <path d="M427.137,0H32.865C14.743,0,0,14.743,0,32.865v394.272c0,18.151,14.714,32.865,32.865,32.865h394.272
                                                    c18.151,0,32.865-14.714,32.865-32.865V32.865C460.002,14.743,445.259,0,427.137,0z M430.002,427.137
                                                    c0,1.58-1.285,2.865-2.865,2.865H32.865c-1.582,0-2.865-1.283-2.865-2.865V32.865C30,31.283,31.283,30,32.865,30h394.272
                                                    c1.58,0,2.865,1.285,2.865,2.865V427.137z"/>
                                                <path d="M292.33,201.531c-2.754-4.323-7.524-6.939-12.65-6.939c-5.126,0-9.896,2.617-12.65,6.939l-72.346,113.536l-37.029-58.111
                                                    c-2.754-4.322-7.524-6.939-12.65-6.939s-9.896,2.617-12.65,6.939L55.263,377.94c-2.943,4.618-3.135,10.473-0.501,15.275
                                                    c2.634,4.801,7.675,7.786,13.151,7.786h324.176c5.477,0,10.518-2.984,13.151-7.786s2.442-10.657-0.501-15.275L292.33,201.531z
                                                    M95.258,371.001l49.747-78.07l37.029,58.11c2.754,4.323,7.524,6.939,12.65,6.939c5.126,0,9.896-2.617,12.65-6.939
                                                    l72.346-113.536l85.064,133.496H95.258z"/>
                                                <path d="M139.001,198.001c39.149,0,71-31.851,71-71c0-39.149-31.851-71-71-71c-39.149,0-71,31.851-71,71
                                                    C68.001,166.15,99.852,198.001,139.001,198.001z M139.001,86.001c22.607,0,41,18.393,41,41s-18.393,41-41,41s-41-18.393-41-41
                                                    S116.394,86.001,139.001,86.001z"/>
                                            </g>
                                        </g>
                                    </g>
                                </svg>
                            </a></td>
                        
                            <td><a href="/admin/edituser/{{ $user->id }}">
                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-pencil-square" viewBox="0 0 16 16">
                                <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                                <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                            </svg></a></td>
                        <td><a href="/admin/allusers/{{ $user->id }}" onclick="event.preventDefault();document.getElementById('deluser').submit()"><svg class="align-center" xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 448 512"><path d="M135.2 17.7L128 32H32C14.3 32 0 46.3 0 64S14.3 96 32 96H416c17.7 0 32-14.3 32-32s-14.3-32-32-32H320l-7.2-14.3C307.4 6.8 296.3 0 284.2 0H163.8c-12.1 0-23.2 6.8-28.6 17.7zM416 128H32L53.2 467c1.6 25.3 22.6 45 47.9 45H346.9c25.3 0 46.3-19.7 47.9-45L416 128z"/></svg></a></td>
                        <form action="/admin/allusers/{{ $user->id }}" method="post" id="deluser">
                            @csrf
                            @method('DELETE')
                        </form>
                    </tr>
                @endforeach
            </table>
        </div>
    </div>
@endsection
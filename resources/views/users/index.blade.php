@extends('admin.main-layout')
@livewireStyles
@section('body')
    <div class="container pt-2">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-5 d-flex justify-content-between">
                <div class="pull-right">
                    <h4>جميع المستخدمين</h4>
                </div>
{{--               <form class="d-flex col-4">--}}
{{--                <input class="form-control me-1" name="search" type="search" placeholder="بحث " aria-label="Search">--}}
{{--                <button class="btn btn-outline-primary" type="submit">--}}
{{--بحث                </button>--}}
{{--                </form>--}}
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="pull-right mb-2 mr-2">
                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#form">اضافة مستخدم جديد
                    </button>
                </div>

                <div class="modal fade" id="form" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header border-bottom-0">
                                <h5 class="modal-title" id="exampleModalLabel">اضافة مستخدم جديد</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <form action="{{route('store.user')}}" method="post">
                                @csrf
                                <div class="modal-body">
                                    @if(session('error'))
                                        <div class="text-danger text-center">{{session('error')}}</div>
                                    @endif
                                    @if(session('success'))
                                        <div class="text-success text-center">{{session('success')}}</div>
                                    @endif
                                    <div class="form-group">
                                        <label for="name">اسم المستخدم</label>
                                        <input type="name" class="form-control" name="name" id="name" placeholder="اسم المستخدم">
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="email">البريد الالكترونى</label>
                                        <input type="email" class="form-control" name="email" id="email" aria-describedby="emailHelp" placeholder=" البريد الالكترونى">
                                    </div>
                                    @error('email')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror
                                    <div class="form-group">
                                        <label for="password">كلمة المرور</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="كلمة المرور">
                                    </div>
                                    @error('password')
                                    <div class="text-danger">{{$message}}</div>
                                    @enderror

                                </div>
                                <div class="modal-footer border-top-0 d-flex justify-content-center">
                                    <button type="submit" class="btn btn-success">حفظ</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <table id="example" class="table table-bordered">
            <thead>
            <tr>
                <th class="text-right">التسلسل</th>
                <th class="text-right">الاسم </th>
                <th class="text-right"> الايميل</th>
                <th class="text-right"> الحالة</th>

                <th width="180px" class="text-right">اجراء</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id }}</td>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
{{--                        {{$user->is_admin}}--}}
                        @livewire('toggle-button',[
                         'user'=>$user,
                         'field'=>'is_admin'
                                     ])
                    </td>
                    <td>
                        <form action="{{ route('delete.user',$user->id) }}" method="Post">
                            <a class="btn btn-primary" href="{{ route('edit.user',$user->id) }}">
                                <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 512 512" fill="#fff"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M441 58.9L453.1 71c9.4 9.4 9.4 24.6 0 33.9L424 134.1 377.9 88 407 58.9c9.4-9.4 24.6-9.4 33.9 0zM209.8 256.2L344 121.9 390.1 168 255.8 302.2c-2.9 2.9-6.5 5-10.4 6.1l-58.5 16.7 16.7-58.5c1.1-3.9 3.2-7.5 6.1-10.4zM373.1 25L175.8 222.2c-8.7 8.7-15 19.4-18.3 31.1l-28.6 100c-2.4 8.4-.1 17.4 6.1 23.6s15.2 8.5 23.6 6.1l100-28.6c11.8-3.4 22.5-9.7 31.1-18.3L487 138.9c28.1-28.1 28.1-73.7 0-101.8L474.9 25C446.8-3.1 401.2-3.1 373.1 25zM88 64C39.4 64 0 103.4 0 152V424c0 48.6 39.4 88 88 88H360c48.6 0 88-39.4 88-88V312c0-13.3-10.7-24-24-24s-24 10.7-24 24V424c0 22.1-17.9 40-40 40H88c-22.1 0-40-17.9-40-40V152c0-22.1 17.9-40 40-40H200c13.3 0 24-10.7 24-24s-10.7-24-24-24H88z"/></svg>
                            </a>
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                            <svg xmlns="http://www.w3.org/2000/svg" height="1em" viewBox="0 0 448 512" fill="#fff"><!--! Font Awesome Free 6.4.2 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2023 Fonticons, Inc. --><path d="M170.5 51.6L151.5 80h145l-19-28.4c-1.5-2.2-4-3.6-6.7-3.6H177.1c-2.7 0-5.2 1.3-6.7 3.6zm147-26.6L354.2 80H368h48 8c13.3 0 24 10.7 24 24s-10.7 24-24 24h-8V432c0 44.2-35.8 80-80 80H112c-44.2 0-80-35.8-80-80V128H24c-13.3 0-24-10.7-24-24S10.7 80 24 80h8H80 93.8l36.7-55.1C140.9 9.4 158.4 0 177.1 0h93.7c18.7 0 36.2 9.4 46.6 24.9zM80 128V432c0 17.7 14.3 32 32 32H336c17.7 0 32-14.3 32-32V128H80zm80 64V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16zm80 0V400c0 8.8-7.2 16-16 16s-16-7.2-16-16V192c0-8.8 7.2-16 16-16s16 7.2 16 16z"/></svg>
                            </button>
                        </form>
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
{{--        <div class="d-flex justify-content-center">--}}
{{--         {{$users->links()}}--}}
{{--        </div>--}}
    </div>
    @livewireScripts

@endsection

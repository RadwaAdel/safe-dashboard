@extends('admin.main-layout')
@section('body')

    <div class="container mt-2">
        @if(session('error'))
            <div class="text-danger text-center">{{session('error')}}</div>
        @endif
        @if(session('success'))
            <div class="text-success text-center">{{session('success')}}</div>
        @endif
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <h2>اضافة مستخدم جديد</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href='{{route('all.users')}}'> رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
            <form action="store-user" method="post">
                @csrf
                <div class="input-group mb-1">
                    <input name="name" type="text" class="form-control" placeholder="Name">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('name')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="input-group mb-1">
                    <input name="email" type="email" class="form-control" placeholder="Email">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-envelope"></span>
                        </div>
                    </div>
                </div>
                @error('email')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="input-group mb-1">
                    <input name="password" type="password" class="form-control" placeholder="Password">
                    <div class="input-group-append">
                        <div class="input-group-text">
                            <span class="fas fa-lock"></span>
                        </div>
                    </div>
                </div>
                @error('password')
                <div class="text-danger">{{$message}}</div>
                @enderror
                <div class="row">

                    <!-- /.col -->
                    <div class="col-2">
                        <button type="submit" class="btn btn-primary btn-block"> اضافة</button>
                    </div>
                    <!-- /.col -->
                </div>
            </form>
    </div>
@endsection


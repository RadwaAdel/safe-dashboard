@extends('admin.main-layout')
@section('body')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>تعديل بيانات المستخدم </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('all.users') }}" enctype="multipart/form-data">
                        رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('update.user',$user->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الاسم </strong>
                        <input type="text" name="name" value="{{ $user->name }}" class="form-control" placeholder="الاسم">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>البريد الالكترونى</strong>
                        <input type="email" name="email" value="{{ $user->email }}" class="form-control" placeholder="البريد الالكترونى">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>الرقم السرى</strong>
                        <input type="password" name="password" value="{{ $user->password }}" class="form-control" placeholder="الرقم السرى ">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </form>
    </div>
@endsection

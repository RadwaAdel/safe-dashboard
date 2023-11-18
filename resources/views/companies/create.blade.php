@extends('admin.main-layout')
@section('body')

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <h2>اضافة شركة</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href='{{route('dashboard')}}'> رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('company.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم الشركة:</strong>
                        <input type="text" name="company" class="form-control" placeholder=" اسم الشركة">
                        @error('company')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <strong> الموظف المسؤول:</strong>
                        <input type="text" name="employee" class="form-control" placeholder=" الموظف المسؤول ">
                        @error('employee')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <button type="submit" class="btn btn-primary ml-3">حفظ</button>
            </div>
        </form>
    </div>
@endsection

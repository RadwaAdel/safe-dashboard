@extends('admin.main-layout')
@section('body')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>تعديل بيانات الشركة </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('company.index') }}" enctype="multipart/form-data">
                        رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('company.update',$company->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم الشركة</strong>
                        <input type="text" name="company" value="{{ $company->company }}" class="form-control" placeholder="اسم الشركة">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم الموظف المسؤول</strong>
                        <input type="text" name="employee" value="{{ $company->employee }}" class="form-control" placeholder="اسم الموظف المسؤول">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </form>
    </div>
@endsection

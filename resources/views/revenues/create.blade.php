@extends('admin.main-layout')
@section('body')

<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right mb-2">
                <h2>اضافة الايراد</h2>
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
    <form action="{{ route('revenues.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>اسم الايراد:</strong>
                    <input type="text" name="revenue_name" class="form-control" placeholder=" اسم الايراد">
                    @error('revenue_name')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </div>
    </form>
</div>
@endsection

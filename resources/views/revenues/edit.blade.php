@extends('admin.main-layout')
@section('body')
<div class="container mt-2">
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>تعديل الايراد</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('revenues.index') }}" enctype="multipart/form-data">
                    رجوع</a>
            </div>
        </div>
    </div>
    @if(session('status'))
        <div class="alert alert-success mb-1 mt-1">
            {{ session('status') }}
        </div>
    @endif

    <form action="{{ route('revenues.update',$revenues->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>اسم الايراد</strong>
                            <input type="text" name="revenue_name" value="{{ $revenues->revenue_name }}" class="form-control" placeholder="اسم الايراد">
                        </div>
                    </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
    </form>
</div>
@endsection

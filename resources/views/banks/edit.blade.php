@extends('admin.main-layout')
@section('body')
    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>تعديل البيانات البنكية </h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('bank.index') }}" enctype="multipart/form-data">
                        رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('bank.update',$bank->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم البنك</strong>
                        <input type="text" name="bank" value="{{ $bank->bank }}" class="form-control" placeholder="اسم البنك">
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم الفرع</strong>
                        <input type="text" name="branch" value="{{ $bank->branch }}" class="form-control" placeholder="اسم الفرع ">
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>رقم الحساب</strong>
                        <input type="text" name="account_num" value="{{ $bank->account_num }}" class="form-control" placeholder="رقم الفرع ">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </form>
    </div>
@endsection

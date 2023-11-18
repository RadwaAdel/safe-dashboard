@extends('admin.main-layout')
@section('body')

    <div class="container pt-2">
        <div class="row">
            <div class="col-lg-12 margin-tb mt-3 mb-5 d-flex justify-content-between">
                <div class="pull-right mb-2">
                    <h4>اضافة بيانات بنكية</h4>
                </div>
                <div class="pull-right">
                    <a class="btn btn-secondary" href='{{route('dashboard')}}'> رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('bank.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم البنك:</strong>
                        <input type="text" name="bank" class="form-control" placeholder=" اسم البنك">
                        @error('bank')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <strong>  اسم الفرع</strong>
                        <input type="text" name="branch" class="form-control" placeholder="اسم الفرع ">
                        @error('branch')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="form-group">
                    <strong>رقم الحساب </strong>
                    <input type="number" name="account_num" class="form-control" placeholder="رقم الحساب  ">
                    @error('account_num')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>

                <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </form>
    </div>
@endsection

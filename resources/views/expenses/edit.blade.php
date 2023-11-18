@extends('admin.main-layout')
@section('body')
    <div class="container mt-2">
        <div class="p-3 bg-white rounded-lg" style="border: 1px solid #ddd; min-height: 100vh">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-left">
                    <h2>تعديل المصروف</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href="{{ route('expenses.index') }}" enctype="multipart/form-data">
                        رجوع</a>
                </div>
            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif

        <form action="{{ route('expense.update',$expense->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="row">
                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="form-group">
                        <strong>اسم المصروف</strong>
                        <input type="text" name="expense_name" value="{{ $expense->expense_name }}" class="form-control" placeholder="اسم الايراد">
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary ml-3">حفظ</button>
        </form>
        </div>
    </div>
@endsection

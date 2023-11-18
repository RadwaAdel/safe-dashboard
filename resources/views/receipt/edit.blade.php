@extends('admin.main-layout')
<style>
    .search-dropdown {
        position: relative;
        display: inline-block;
    }

    .search-dropdown input {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }

    .search-dropdown select {
        width: 100%;
        padding: 8px;
        border: 1px solid #ccc;
        border-radius: 4px;
    }
</style>
@section('body')

    <div class="container mt-2">
        <div class="p-3 bg-white rounded-lg" style="border: 1px solid #ddd; min-height: 100vh">
        <div class="row">
            <div class="col-lg-12 margin-tb">
                <div class="pull-right mb-2">
                    <h2>تعديل ايصال ايراد</h2>
                </div>
                <div class="pull-right">
                    <a class="btn btn-primary" href='{{route('revenues.index')}}'> رجوع</a>
                </div>

            </div>
        </div>
        @if(session('status'))
            <div class="alert alert-success mb-1 mt-1">
                {{ session('status') }}
            </div>
        @endif
        <form action="{{ route('receipt.update', $transaction->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
           <div class="pull-left col-xs-4 col-sm-4 col-md-4 mt-4">
            <button type="submit" class="btn btn-primary ml-3">تعديل</button>
    </div>
            <div class="row">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>تاريخ الدفع :</strong>
                        <input type="date" value="{{$transaction->receipt_date}}" name="receipt_date" class="form-control" placeholder=" تاريخ الدفع ">
                        @error('receipt_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong> قيمة الدفع :</strong>
                            <input type="number" value="{{$transaction->pay}}" name="pay" class="form-control" placeholder="  قيمة الدفع  ">
                            @error('pay')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>اسم الشركة:</strong>
                        <select class="form-control m-bot15 main_select" name="company_id">
                            <option disabled selected value="">بحث او اختيار الشركة</option>
                            @if ($companies->count() > 0)
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}" {{ $company->id == $company->id ? 'selected' : '' }}>                                        {{$company->company}}
                                    </option>
                                @endforeach
                            @else
                                <option disabled selected>لا يوجد سجلات</option>
                            @endif
                        </select>
                    </div>
                </div>
                @error('company_id')
                <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong> اسم الايراد :</strong>
                    <select class="form-control m-bot15 main_select" name="revenue_id" >
                        <option disabled selected value="">بحث او اختيار اسم الايراد</option>
                        @if ($revenues->count() > 0)
                            @foreach ($revenues as $revenue)
                                <option value="{{$revenue->id}}" {{$revenue->id==$transaction->revenue_id ? 'selected' : ''}}>
                                    {{ $transaction->revenues->revenue_name}}
                                </option>
                            @endforeach
                        @else
                            <option disabled selected>لا يوجد سجلات</option>
                        @endif
                    </select>
                    @error('revenue_id')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}
                    </div>
                    @enderror
                </div>
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                    <strong>طريقة الدفع:</strong>
                    <select class="form-control" name="revenue_type" id="revenue_type">
                        <option disabled selected value="">اختر طريقة الدفع</option>
                        <option value="1" @selected($transaction->revenue_type==1)>كاش</option>
                        <option value="2" @selected($transaction->revenue_type==2)>شيك</option>
                    </select>
                    @error('revenue_type')
                    <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <div id="cash_inputs" @if ($transaction->revenue_type !== 1) style="display:none;" @endif>
                <div class="col-xs-8 col-sm-8 col-md-8">
                    <div class="form-group">
                        <strong> قيمة الايراد المدفوعة :</strong>
                        <input type="number" name="value"  value="{{$transaction->value}}" class="form-control" placeholder="  قيمة الدفع ">
                        @error('value')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
            </div>
            <div id="check_inputs" @if ($transaction->revenue_type !== 2) style="display:none;" @endif>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong> رقم الشيك :</strong>
                        <input type="number" value="{{$transaction->check_num}}"  name="check_num" class="form-control" placeholder="  رقم الشيك ">
                        @error('check_num')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-6 col-sm-6 col-md-6">
                    <div class="form-group">
                        <strong> تاريخ الاستحقاق:</strong>
                        <input type="date" name="due_date" value="{{$transaction->due_date}}" class="form-control" placeholder=" تاريخ الاستحقاق ">
                        @error('due_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            </div>
        </form>
        </div>
    </div>
@endsection
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function () {
        $('#revenue_type').on('change', function () {
            var selectedValue = $(this).val();

            if (selectedValue == 1) {
                $('#cash_inputs').show();
                $('#check_inputs').hide();
            } else if (selectedValue == 2) {
                $('#cash_inputs').hide();
                $('#check_inputs').show();
            } else {
                $('#cash_inputs').hide();
                $('#check_inputs').hide();
            }
        });
    });
</script>


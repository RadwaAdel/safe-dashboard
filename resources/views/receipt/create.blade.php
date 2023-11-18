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

    <div class="container pt-4 " >
        <div class="p-3 bg-white rounded-lg" style="border: 1px solid #ddd; min-height: 100vh">
            <div class="row">
                <div class="col-lg-12 margin-tb p-3 d-flex justify-content-between">
                    <div class="pull-right mb-2">
                        <h4>اضافة ايصال ايراد</h4>
                    </div>
                    <div class="pull-right">
                        <a class="btn bg-gray-dark" href='{{route('revenues.index')}}'> رجوع</a>
                    </div>
                </div>
            </div>
            @if(session('status'))
                <div class="alert alert-success mb-1 mt-1">
                    {{ session('status') }}
                </div>
            @endif
            <form action="{{ route('receipt.store') }}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="row">
                <input hidden="" name="type" value="1">
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong>تاريخ الدفع :</strong>
                        <input type="date" name="receipt_date" class="form-control" placeholder=" تاريخ الدفع ">
                        @error('receipt_date')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-4 col-sm-4 col-md-4">
                        <div class="form-group">
                            <strong> قيمة الدفع :</strong>
                            <input type="number"  name="pay" class="form-control" placeholder="  قيمة الدفع  ">
                            @error('pay')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                <div class="form-group">
                        <strong> اسم الشركة :</strong>
                        <select class="form-control m-bot15 main_select" name="company_id" >
                            <option disabled selected value="">بحث او اختيار الشركة</option>
                            @if ($companies->count() > 0)
                                @foreach ($companies as $company)
                                    <option value="{{$company->id}}">
                                        {{$company->company}}
                                    </option>
                                @endforeach
                            @else
                                <option disabled selected>لا يوجد سجلات</option>
                            @endif
                        </select>
                        @error('company_id')
                        <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4">
                    <div class="form-group">
                        <strong> اسم الايراد :</strong>
                        <select class="form-control m-bot15 main_select" name="revenue_id" >
                            <option disabled selected value="">بحث او اختيار اسم الايراد</option>
                            @if ($revenues->count() > 0)
                                @foreach ($revenues as $revenue)
                                    <option value="{{$revenue->id}}">
                                        {{$revenue->revenue_name}}
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
                        <select class="form-control revenue_type " name="revenue_type" id="revenue_type">
                            <option disabled selected value="">اختر طريقة الدفع</option>
                            <option value="1" >كاش</option>
                            <option value="2" >شيك</option>
                        </select>
                        @error('revenue_type')
                        <div class="alert alert-danger mt-1 mb-1"
                        >{{ $message }}</div>
                        @enderror
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4" id="cash_inputs" @if ($revenueType !== 1) style="display:none;" @endif>
                    <div class="col-xs-8 col-sm-8 col-md-8">
                        <div class="form-group">
                            <strong> قيمة الايراد المدفوعة :</strong>
                            <input type="number" name="value" class="form-control"  placeholder="  قيمة الدفع ">
                            @error('value')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-8 row" id="check_inputs" @if ($revenueType !== 2) style="display:none;" @endif>
                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group">
                            <strong> رقم الشيك :</strong>
                            <input type="number" id="test-radwa" name="check_num"  class="form-control" placeholder="  رقم الشيك ">
                            @error('check_num')
                            <div class="alert alert-danger mt-1 mb-1" id="error-radwa">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group">
                            <strong> تاريخ الاستحقاق:</strong>
                            <input type="date"  required_if:revenue_type,check name="due_date" class="form-control" placeholder=" تاريخ الاستحقاق ">
                            @error('due_date')
                            <div class="alert alert-danger mt-1 mb-1">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>

                    <div class="col-xs-6 col-sm-6 col-md-4">
                        <div class="form-group d-flex flex-column">
                            <strong> اسم البنك:</strong>
                            <select class="form-control m-bot15 main_select" id="bank_id" name="bank_id" >
                                <option disabled selected value="">بحث او اختيار البنك</option>
                                @if ($banks->count() > 0)
                                    @foreach ($banks as $bank)
                                        <option  value="{{$bank->id}}">
                                            {{$bank->bank}}
                                        </option>
                                    @endforeach
                                @else
                                    <option disabled selected>لا يوجد سجلات</option>
                                @endif
                            </select>
                            @error('bank_id')
{{--                            <div class="alert alert-danger mt-1 mb-1" id="bank_id">{{ $message }}</div>--}}
                            <div class="alert alert-danger mt-1 mb-1" id="bank_id">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>

                </div>
            <div class="col-xs-4 col-sm-4 col-md-4 mt-4">
                <button type="submit" class="btn btn-primary px-4 ml-3">حفظ</button>

            </div>
        </form>
        </div>
        </div>
@endsection
<script src="{{asset('admin-assets/plugins/jquery/jquery.min.js')}}"></script>

<script>
    $(document).ready(function () {
        $('.revenue_type').on('change', function () {
            var selectedValue = this.value;
            console.log(selectedValue)
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



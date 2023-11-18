@extends('admin.main-layout')


@section('body')

    @include('Reports.search.searchBank')

<div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-5 d-flex justify-content-between">
                <div class="pull-left">
                    <h4>تقرير حركة البنك </h4>
                </div>
            </div>
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="d-flex flex-column">
        <table id="kt_datatable_example_1" style="width: 100%" class="table table-bordered">
            <thead>
            <tr>
                <th>رقم المستند</th>
                <th> تاريخ الدفع</th>
                <th> البيان</th>
                <th>الشركة</th>
                <th>طريقة الدفع</th>
                <th>القيمة</th>
            </tr>
            </thead>
            <tbody>

            </tbody>
        </table>

        <div class="d-flex mt-2 justify-content-center " style="gap: 10px">
            <div class="d-flex col-md-4 bg-blue text-center p-2 rounded-sm">
                <p class="w-100 mt-auto mb-auto">اجمالى الايرادات:{{ $totalRevenue }}</p>
            </div>
            <div class="d-flex col-md-4 bg-success text-center mt-auto p-2 rounded-sm">
                <p class="w-100 mt-auto mb-auto">اجمالى المصروف: {{ $totalExpense }}</p>
            </div>

            <div class="d-flex col-md-4 bg-warning text-center mt-auto p-2 rounded-sm">
                <p class="w-100 mt-auto mb-auto">الرصيد الحالى: {{ $totalDifference }}</p>
            </div>

        </div>
    </div>
    {{--        <div class="d-flex justify-content-center">--}}
    {{--            {{$revenues->links()}}--}}
    {{--        </div>--}}
    </div>
@endsection

@section('js')
@include('Reports.DataTableBank')
@endsection


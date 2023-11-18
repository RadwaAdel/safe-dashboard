@extends('admin.main-layout')


@section('body')

{{--    @include('Reports.search.searchBank')--}}

    <div class="container mt-2">
        <div class="row">
            <div class="col-lg-12 mt-3 mb-5 d-flex justify-content-between">
                <div class="pull-left">
                    <h4>تقرير اجمالى حركة البنك</h4>
                </div>
            </div>
        </div>

    </div>
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
    <table id="kt_datatable_example_1" class="table table-bordered">
        <thead>
        <tr>
            <th> تاريخ الدفع</th>
            <th>اجمالى المصروف</th>
            <th>اجمالى الوارد</th>
        </tr>
        </thead>
        <tbody>

        </tbody>
    </table>
    {{--        <div class="d-flex justify-content-center">--}}
    {{--            {{$revenues->links()}}--}}
    {{--        </div>--}}
    </div>
@endsection

@section('js')
    @include('Reports.DataTableAllBank')
@endsection


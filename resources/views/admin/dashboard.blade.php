@extends('admin.main-layout')
<style>
    .app-main {
        position: relative;
        max-width: 100vw;}

    .breadcrumb {
        padding: 0;
        margin-bottom: 0;
        line-height: 2.5rem;

    }

</style>
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css"
    integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0="
    crossorigin="anonymous"
/>

<!-- jsvectormap -->
<link
    rel="stylesheet"
    href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css"
    integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4="
    crossorigin="anonymous"
/>
@section('content-header')
    <div class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="m-0">لوحة التحكم </h1>
                </div>
            </div>
            <div class="row mb-2 text-center">
                <div class="card-body">
                    <h1>اهلا بك , {{ Auth::user()->name }}</h1>
                    <p>هذه لوحة التحكم الخاصه بك</p>
                </div>
                </div>
            </div>
        </div>
    </div>
@endsection

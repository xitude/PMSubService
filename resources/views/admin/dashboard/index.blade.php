@extends('layouts.admin.admin')
@section('title', 'Dashboard')

@push('styles')
@endpush

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@yield('title')</h2>
        </div>
        <div class="col-lg-2">
            <div class="title-action">

            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Subscriptions</h5>
                        <h1 class="no-margins">{{number_format($subscriptions->count(), 0, ',', '.')}}</h1>
                        <small>Total MSISDN subscriptions</small>
                    </div>
                </div>
            </div>
            <div class="col-lg-3">
                <div class="ibox">
                    <div class="ibox-content">
                        <h5>Products</h5>
                        <h1 class="no-margins">{{number_format($products->count(), 0, ',', '.')}}</h1>
                        <small>Total products</small>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
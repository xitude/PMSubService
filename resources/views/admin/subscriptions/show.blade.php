@extends('layouts.admin.admin')
@section('title', 'Subscription for '.$subscription->msisdn)

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
            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Attached Products</h5>
                    </div>
                    <div class="ibox-content">
                        <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Slug</th>
                                <th>Attached At</th>
                            </tr>
                            </thead>
                            @foreach($subscription->products as $product)
                                <tr>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">#{{$product->id}}</a></td>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">{{$product->name}}</a></td>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">{{$product->slug}}</a></td>
                                    <td><abbr title="{{$product->pivot->created_at}}">{{$product->pivot->created_at->diffForHumans()}}</abbr></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Subscribers</h5>
                    </div>
                    <div class="ibox-content">
                        <table id="subscribers" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Subscribed At</th>
                            </tr>
                            </thead>
                            @foreach($subscription->subscribers as $subscriber)
                                <tr>
                                    <td>#{{$subscriber->id}}</td>
                                    <td>{{$subscriber->name}}</td>
                                    <td><abbr title="{{$subscriber->pivot->created_at}}">{{$subscriber->pivot->created_at->diffForHumans()}}</abbr></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#products').DataTable();
            $('#subscribers').DataTable();
        } );
    </script>
@endpush
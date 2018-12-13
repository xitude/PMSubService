@extends('layouts.admin.admin')
@section('title', 'Products')

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
            <div class="col-xs-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Products ({{number_format($products->count(), 0, '.', ',')}})</h5>
                    </div>
                    <div class="ibox-content">
                        <table id="products" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Attached Subscriptions</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                            </thead>
                            @foreach($products as $product)
                                <tr>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">#{{$product->id}}</a></td>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">{{$product->name}}</a></td>
                                    <td><a href="{{route('admin.product.show', $product->slug)}}">{{$product->subscriptions->count()}}</a></td>
                                    <td><abbr title="{{$product->created_at}}">{{$product->created_at->diffForHumans()}}</abbr></td>
                                    <td><abbr title="{{$product->updated_at}}">{{$product->updated_at->diffForHumans()}}</abbr></td>
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
        } );
    </script>
@endpush
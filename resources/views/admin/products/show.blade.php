@extends('layouts.admin.admin')
@section('title', $product->name)

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
                        <h5>Attached Subscriptions</h5>
                    </div>
                    <div class="ibox-content">
                        <table id="subscriptions" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>MSISDN</th>
                                <th>Attached At</th>
                            </tr>
                            </thead>
                            @foreach($product->subscriptions as $subscription)
                                <tr>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">#{{$subscription->id}}</a></td>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">{{$subscription->msisdn}}</a></td>
                                    <td><abbr title="{{$subscription->pivot->created_at}}">{{$subscription->pivot->created_at->diffForHumans()}}</abbr></td>
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
            $('#subscriptions').DataTable();
        } );
    </script>
@endpush
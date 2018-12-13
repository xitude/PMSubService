@extends('layouts.admin.admin')
@section('title', 'Subscriptions')

@push('styles')
@endpush

@section('content')
    <div class="row wrapper border-bottom white-bg page-heading">
        <div class="col-lg-10">
            <h2>@yield('title')</h2>
        </div>
        <div class="col-lg-2">
            <div class="title-action">
                <button type="button" class="btn btn-danger btn-block" data-toggle="modal" data-target="#truncateModal">
                    <i class="fa fa-trash"></i> Truncate All
                </button>
            </div>
        </div>
    </div>
    <div class="wrapper wrapper-content animated fadeInRight">
        <div class="row">
            <div class="col-xs-12">
                <div class="ibox">
                    <div class="ibox-title">
                        <h5>Subscriptions ({{number_format($subscriptions->count(), 0, '.', ',')}})</h5>
                    </div>
                    <div class="ibox-content">
                        <table id="subscriptions" class="table table-striped table-bordered" cellspacing="0" width="100%">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>MSISDN</th>
                                <th>Attached Products</th>
                                <th>Subscribers</th>
                                <th>Created At</th>
                                <th>Updated At</th>
                            </tr>
                            </thead>
                            @foreach($subscriptions as $subscription)
                                <tr>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">#{{$subscription->id}}</a></td>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">{{$subscription->msisdn}}</a></td>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">{{$subscription->products->count()}}</a></td>
                                    <td><a href="{{route('admin.subscription.show', $subscription->msisdn)}}">{{$subscription->subscribers->count()}}</a></td>
                                    <td><abbr title="{{$subscription->created_at}}">{{$subscription->created_at->diffForHumans()}}</abbr></td>
                                    <td><abbr title="{{$subscription->updated_at}}">{{$subscription->updated_at->diffForHumans()}}</abbr></td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('modals')
    <div class="modal inmodal" id="truncateModal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content animated bounceInRight">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">×</span><span class="sr-only">Close</span></button>
                    <i class="fa fa-trash modal-icon"></i>
                    <h4 class="modal-title">Truncate All Subscriptions</h4>
                    <small class="font-bold">This option will permanently delete all subscriptions including their attachments to products/services</small>
                </div>
                <div class="modal-body">
                    <p><strong>Are you sure you wish to do this?</strong></p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-white" data-dismiss="modal">Close</button>
                    {!! Form::open(['route' => 'admin.subscription.truncate']) !!}
                    <button type="submit" class="btn btn-primary">Truncate</button>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
    </div>
@endpush

@push('scripts')
    <script>
        $(document).ready( function () {
            $('#subscriptions').DataTable({
               /* ajax: '/api/subscriptions',
                columns: [
                    { data: 'id' },
                    { data: 'msisdn' }
                ]*/
            });

            axios.get('/api/subscriptions')
                .then(function (response) {
                    console.log(response);
                })
                .catch(function (error) {
                    // handle error
                    console.log(error);
                })
        } );
    </script>
@endpush
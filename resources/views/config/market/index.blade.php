@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">thị trường</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách thị trường</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(!empty($MarketInfo)) Cập nhật @else Thêm mới @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>thị trường</th>
                                            <th>Ghi chú</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div id="addtab" class="tab-pane row tab2"><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                        @include('layout.validate_error')
                        <form action="@if(!empty($MarketInfo)){{route('editmarket', $MarketInfo->id)}}@else{{route('addmarketaction')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name'))has_error @endif">
                                    <label for="name">thị trường</label>
                                    <input value="@if(!empty($MarketInfo)){{$MarketInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <input value="@if(!empty($MarketInfo)){{$MarketInfo->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif" type="text" id="remark" name="remark" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($MarketInfo))
                                        <button class="btn btn-info">Update</button>
                                        @else
                                        <button class="btn btn-success">Add</button>
                                        @endif
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
@push('custom-css')
<link rel="stylesheet" href="{{asset('admin/assets/plugins/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script>
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{!! route('marketlist') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'remark', name: 'remark' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush
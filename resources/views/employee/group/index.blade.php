@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Nhân sự</li>
                <li class="breadcrumb-item active">User Group</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách Group</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(!empty($GroupEmployeeInfo)) Cập nhật @else Thêm mới @endif</a>
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
                                            <th>Tên Group</th>
                                            <th>Member</th>
                                            <th>Trạng thái</th>
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
        <div id="addtab" class="tab-pane tab2"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                        @include('layout.validate_error')
                        <form action="@if(!empty($GroupEmployeeInfo)){{route('editgroup',$GroupEmployeeInfo->id)}}@else{{route('addgroupemployee')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên Group</label>
                                        <input value="@if(!empty($GroupEmployeeInfo)){{$GroupEmployeeInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('status'))has_error @endif">
                                        <label for="status">Trạng Thái</label>
                                        <select name="status" class="form-control">
                                            <option value="1">Hoạt động</option>
                                            <option value="0">Không HĐ</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi Chú</label>
                                    <textarea name="remark" class="form-control">@if(!empty($GroupEmployeeInfo)){{$GroupEmployeeInfo->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($GroupEmployeeInfo))
                                        <button class="btn btn-info">Cập nhật</button>
                                        @else
                                        <button class="btn btn-success">Thêm</button>
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
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script>
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{!! route('groupemployeelist') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'member', name: 'member' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush

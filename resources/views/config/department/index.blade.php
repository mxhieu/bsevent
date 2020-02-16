@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Phòng ban</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item active">Phòng ban</li>
            </ol>
        </div>
        
    </div>

    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách phòng ban</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(!empty($DepartmentInfo)) Cập nhật @else Thêm mới @endif</a>
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
                                            <th>Phòng ban</th>
                                            <th>Member</th>
                                            <th>Chú thích</th>
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
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                        @include('layout.validate_error')
                        <form action="@if(!empty($DepartmentInfo)){{route('editdepartment', $DepartmentInfo->id)}}@else{{route('adddepartmentaction')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name'))has_error @endif">
                                    <label for="name">Tên phòng ban</label>
                                    <input value="@if(!empty($DepartmentInfo)){{$DepartmentInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Chú thích</label>
                                    <input value="@if(!empty($DepartmentInfo)){{$DepartmentInfo->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif" type="text" name="remark" id="remark" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($DepartmentInfo))
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
{{-- End Jquery Data table --}}
<script>
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: true,
        ajax: '{!! route('listdatadepartment') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name', name: 'name' },
            { data: 'member', name: 'member' },
            { data: 'remark', name: 'remark' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>

@endpush

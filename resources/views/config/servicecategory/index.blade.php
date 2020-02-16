@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Loại dịch vụ</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="tab1" class="nav-link" data-toggle="tab" href="#listtab">Danh sách loại dịch vụ</a>
        </li>
        <li class="nav-item">
            <a id="tab2" class="nav-link" data-toggle="tab" href="#addtab">@if(!empty($ServiceCategoryInfo)) Cập nhật @else Thêm mới @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
            <div class="row">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-block">
                            {{-- <h4 class="card-title dp-inline-block">Danh sách hạng mục dịch vụ</h4> --}}
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Hạng mục dịch vụ</th>
                                            <th>Ghi chú</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>hạng mục dịch vụ 1</td>
                                            <td>
                                                hạng mục dịch vụ 1
                                            </td>
                            
                                            <td>
                                                <a title="Cập nhật" href="{{route('editservicecategoryview',1)}}" class="btn btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                                </a>
                                                <button title="Xóa" id="2" type="button" class="btn btn-danger btn-delete-item" data-url="" data-toggle="modal" data-target="#confirmBox" data-id="2" data-name="phòng ban 1">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> 
                                                </button>
                                            </td>
                                        </tr>
                                        
                                    </tbody> --}}
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
                            <form action="@if(!empty($ServiceCategoryInfo)){{route('editservicecategory', $ServiceCategoryInfo->id)}}@else{{route('addservicecategory')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name'))has_error @endif">
                                    <label for="name">Hạng mục dịch vụ</label>
                                    <input value="@if(!empty($ServiceCategoryInfo)){{$ServiceCategoryInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <input value="@if(!empty($ServiceCategoryInfo)){{$ServiceCategoryInfo->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif" type="text" id="remark" name="remark" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($ServiceCategoryInfo))
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
        ajax: '{!! route('servicecategorylist') !!}',
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
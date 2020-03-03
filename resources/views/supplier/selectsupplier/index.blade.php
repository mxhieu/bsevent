@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dự án</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách dự án</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(empty($requestformInfo))Thêm mới @else Cập nhật @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
            <div class="row">
                {{-- <code>Nội dung ở button Dichvu/HangHoa e tham khao form ở mục NCC/Danh Muc Hàng Hóa và NCC/Danh Mục dịch vụ</code> --}}
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive-lg">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Phiếu yêu cầu</th>
                                            <th>Mã</th>
                                            <th>Dự Án</th>
                                            <th>Hạn mua</th>
                                            <th>Duyệt phiếu</th>
                                            <th>Số hạng mục</th>
                                            <th>Số đáp ứng</th>
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
                            <form action="@if(!empty($requestformInfo)){{route('editrequestform', $requestformInfo->id)}}@else{{route('addrequestformaction')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên phiếu</label>
                                        <input value="@if(!empty($requestformInfo)){{$requestformInfo->name}}@else{{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Code</label>
                                        <input type="text" value="@if(!empty($requestformInfo)){{$requestformInfo->code}}@else{{old('code')}}@endif" id="code" name="code" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-3 @if($errors->has('project_id'))has_error @endif">
                                        <label for="project_id">Dự án</label>
                                        {{-- <select name="project_id" id="project_id" class="form-control">
                                            @foreach($listProject as $row)
                                            <option @if(!empty($requestformInfo) && $row->id == $requestformInfo->project_id ) selected @elseif(old('project_id ') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                    <div class="form-group col-md-3 @if($errors->has('deadline'))has_error @endif">
                                        <label for="deadline">Hạn mua</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input value="@if(!empty($requestformInfo)){{$requestformInfo->deadline}}@endif" name="deadline" id="deadline" readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-3 @if($errors->has('employee_id'))has_error @endif">
                                        <label for="employee_id">Người Duyệt</label>
                                        {{-- <select name="employee_id" id="employee_id" class="form-control">
                                            @foreach($listEmployee as $row)
                                            <option @if(!empty($requestformInfo) && $row->id == $requestformInfo->supplier_category_id) selected @elseif(old('supplier_category_id') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select> --}}
                                    </div>
                                    <div class="form-group col-md-3 @if($errors->has('status'))has_error @endif">
                                        <label for="status">Trạng thái</label>
                                        {{-- <select name="status" id="status" class="form-control">
                                            <option @if(!empty($requestformInfo) && 0 == $requestformInfo->status) selected @elseif(old('status') == 0) selected @endif value="0">Hoạt động</option>
                                            <option @if(!empty($requestformInfo) && 1 == $requestformInfo->status) selected @elseif(old('status') == 1) selected @endif value="1">Ngừng hoạt động</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <textarea name="remark" id="remark" class="form-control">@if(!empty($requestformInfo)){{$requestformInfo->remark}}@else{{old('remark')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(empty($requestformInfo))
                                        <button class="btn btn-success">Thêm</button>
                                        @else
                                        <button class="btn btn-info">Cập nhật</button>
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
<link rel="stylesheet" href="{{asset('admin/css/select2.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd/mm/yyyy",
        })
        $('.init_select2').select2();
        $('#dataTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{!! route('requestformlist') !!}',
            columns: [
                { data: 'stt', name: 'stt' },
                { data: 'name', name: 'name' },
                { data: 'code', name: 'code' },
                { data: 'project.name', name: 'project.name' },
                { data: 'deadline', name: 'deadline' },
                { data: 'employee.name', name: 'employee.name' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
        @include('layout.alert',['SessionResult' => session()->get('result')])
    })
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush
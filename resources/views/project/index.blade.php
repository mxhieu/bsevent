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
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(empty($SupplierInfo))Thêm mới @else Cập nhật @endif</a>
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
                                            <th>Tên dự án</th>
                                            <th>Hạn</th>
                                            <th>Trạng Thái</th>
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
                            <form action="@if(!empty($SupplierInfo)){{route('editsupplier', $SupplierInfo->id)}}@else{{route('addprojectaction')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên dự án</label>
                                        <input value="@if(!empty($SupplierInfo)){{$SupplierInfo->name}}@else{{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Code</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->code}}@else{{old('code')}}@endif" id="code" name="code" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('item_group_id'))has_error @endif">
                                        <label for="item_group_id">Biểu mẫu hạn mục</label>
                                        <select name="item_group_id" id="item_group_id" class="form-control">
                                             @foreach($ListItemGroups as $row)
                                            <option @if(!empty($SupplierInfo) && $row->id == $SupplierInfo->supplier_category_id) selected @elseif(old('supplier_category_id') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('task_group_id'))has_error @endif">
                                        <label for="task_group_id">Biểu mẫu công việc</label>
                                        <select name="task_group_id" id="task_group_id" class="form-control">
                                            @foreach($ListTaskGroups as $row)
                                            <option @if(!empty($SupplierInfo) && $row->id == $SupplierInfo->supplier_category_id) selected @elseif(old('supplier_category_id') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="form-group col-md-4 @if($errors->has('status'))has_error @endif">
                                        <label for="status">Trạng thái duyệt</label>
                                        <select name="status" id="status" class="form-control">
                                            <option @if(!empty($SupplierInfo) && 0 == $SupplierInfo->status) selected @elseif(old('status') == 0) selected @endif value="0">Hoạt động</option>
                                            <option @if(!empty($SupplierInfo) && 1 == $SupplierInfo->status) selected @elseif(old('status') == 1) selected @endif value="1">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('stackholder'))has_error @endif">
                                        <label for="stackholder">Stackholder</label>
                                        <input value="@if(!empty($SupplierInfo)){{$SupplierInfo->stackholder}}@else{{old('stackholder')}}@endif" type="text" id="stackholder" name="stackholder" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('attact_file'))has_error @endif">
                                        <label for="attact_file">Chi tiết</label>
                                        <div class="input-group date">
                                            <input type="file" id="attact_file" name="attact_file" class="form-control">
                                        </div>
                                        @if(!empty($ItemSupplierInfo->attact_file))
                                        <a href="{{route('downloadattachfile', $ItemSupplierInfo->attact_file)}}" target="blank">{{$ItemSupplierInfo->attact_file}}</a>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('in_range'))has_error @endif">
                                    <label for="in_range">Trong phạm vi</label>
                                    <textarea name="in_range" id="in_range" class="form-control">@if(!empty($SupplierInfo)){{$SupplierInfo->in_range}}@else{{old('in_range')}}@endif</textarea>
                                </div>
                                <div class="form-group @if($errors->has('out_range'))has_error @endif">
                                    <label for="out_range">Ngoài phạm vi</label>
                                    <textarea name="out_range" id="out_range" class="form-control">@if(!empty($SupplierInfo)){{$SupplierInfo->out_range}}@else{{old('out_range')}}@endif</textarea>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <textarea name="remark" id="remark" class="form-control">@if(!empty($SupplierInfo)){{$SupplierInfo->remark}}@else{{old('remark')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(empty($SupplierInfo))
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
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/select2.full.min.js')}}"></script>
<script type="text/javascript">
    $(function(){
        $('.init_select2').select2();
        $('#dataTable').DataTable({
            processing: true,
            serverSide: false,
            ajax: '{!! route('projectlist') !!}',
            columns: [
                { data: 'stt', name: 'stt' },
                { data: 'name', name: 'name' },
                { data: 'code', name: 'code' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
        @include('layout.alert',['SessionResult' => session()->get('result')])
    })
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush
@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Dach mục hàng hóa</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="tab1" class="nav-link" data-toggle="tab" href="#listtab">Danh mục hàng hóa</a>
        </li>
        <li class="nav-item">
            <a id="tab2" class="nav-link" data-toggle="tab" href="#addtab">@if(!empty($ItemInfo)) Cập nhật @else Thêm mới @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group text-right">
                        <table style="width: 100%">
                            <td style="width: 100%">
                                <input type="" name="" class="form-control">
                            </td>
                            <td>
                                <a href="" class="btn btn-info">Filter</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-primary">Import</a>
                            </td>
                            <td>
                                <a href="" class="btn btn-warning">Export</a>
                            </td>
                        </table>
                    </div>
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên hàng hóa</th>
                                            <th>Loại hàng Hóa</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn vị</th>
                                            <th>Leadtime</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    {{-- <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td><a href="">Ten hàng</a></td>
                                            <td><a href="">Loại 1</a></td>
                                            <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                            <td>kg</td>
                                            <td>6</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="">Chi tiết</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
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
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            @include('layout.validate_error')
                            <form action="@if(!empty($ItemInfo)){{route('edititem', $ItemInfo->id)}}@else{{route('additem')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-6 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên hàng</label>
                                        <input value="@if(!empty($ItemInfo)){{$ItemInfo->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('itemcategory_id'))has_error @endif">
                                        <label for="itemcategory_id">Loại hàng hóa</label>
                                        <select name="itemcategory_id" class="form-control">
                                            @foreach($ItemCategoryList as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Mã</label>
                                        <input value="@if(!empty($ItemInfo)){{$ItemInfo->code}}@elseif(!empty(old('code'))){{old('code')}}@endif" type="text" id="code" name="code" class="form-control">
                                    </div> 
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-6 @if($errors->has('image'))has_error @endif">
                                        <label for="image">Hình Ảnh</label>
                                        <input type="file" id="image" name="image" class="form-control">
                                    </div>

                                    <div class="form-group col-md-4 @if($errors->has('unit_id'))has_error @endif">
                                        <label for="unit_id">Unit</label>
                                        <select name="unit_id" class="form-control">
                                            @foreach($UnitList as $row)
                                            <option value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2 @if($errors->has('lead_time'))has_error @endif">
                                        <label for="lead_time">Lead time</label>
                                        <input value="@if(!empty($ItemInfo)){{$ItemInfo->lead_time}}@elseif(!empty(old('lead_time'))){{old('lead_time')}}@endif" name="lead_time" type="number" min="0" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('attach_file'))has_error @endif">
                                    <label for="attach_file">Chi tiết</label>
                                    <input type="file" name="attach_file" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <textarea name="remark" class="form-control">@if(!empty($ItemInfo)){{$ItemInfo->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($ItemInfo))
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
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('custom-scripts')
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
$('.datepicker').datepicker({
    autoclose: true
})
$(function() {
    $('#dataTable').DataTable({
        processing: true,
        serverSide: false,
        ajax: '{!! route('itemlist') !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'name_link', name: 'name_link' },
            { data: 'category_link', name: 'category_link' },
            { data: 'image', name: 'image' },
            { data: 'unit_name', name: 'unit_name' },
            { data: 'lead_time', name: 'lead_time' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush
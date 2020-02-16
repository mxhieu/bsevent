@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Danh sách hạng mục</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách hạng mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(empty($ItemSupplierInfo))Thêm mới @else Cập nhật @endif</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="listtab" class="tab-pane tab1"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            <div class="table-responsive-lg">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Mã</th>
                                            <th>Tên hàng</th>
                                            <th>Giá(Min-Max)</th>
                                            <th>Đơn vị</th>
                                            <th>Khả năng</th>
                                            <th>Chuẩn bị</th>
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
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            @include('layout.validate_error')
                            <form action="@if(!empty($ItemSupplierInfo)){{route('edititemsupplier', ['supplierId' => $SupplierInfo->id, 'itemId' => $ItemSupplierInfo->id])}}@else{{route('additemsupplieraction', $SupplierInfo->id)}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label for="name">Nhà Cung cấp</label>
                                        <input readonly value="{{$SupplierInfo->name}}" type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('item_id'))has_error @endif">
                                        <label for="item_id">Hạng mục</label>
                                        <select name="item_id" id="item_id" class="form-control init_select2" style="width:100%;">
                                            @foreach($ItemCategoryList as $row)
                                            <optgroup label="{{$row->name}}">
                                            @foreach($row->Items as $item)
                                            <option @if(!empty($ItemSupplierInfo) && $item->id == $ItemSupplierInfo->item_id) selected @elseif(old('item_id') == $item->id) selected @endif value="{{$item->id}}">{{$item->name}}</option>
                                            @endforeach
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên hạng mục</label>
                                        <input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->name}}@else{{old('name')}}@endif" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Mã</label>
                                        <input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->code}}@else{{old('code')}}@endif" id="code" name="code" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('image'))has_error @endif">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="image">Hình ảnh</label>
                                                <div class="input-group date">
                                                    <input type="file" id="imagefile" name="image" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 img_right">
                                            <img accept="image/*" id="imagepreview" src="@if(!empty($ItemSupplierInfo)){{url('/upload/supplier/item').'/'.$ItemSupplierInfo->image}}@else{{url('/upload/default/no-image.jpg')}}@endif" alt="">
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('min_price') || $errors->has('max_price') || $errors->has('unit_price'))has_error @endif">
                                        <label for="name">Giá(Min|Max|Đơn vị)</label>
                                        <table>
                                            <td><input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->min_price}}@else{{old('min_price')}}@endif" name="min_price" class="form-control @if(!$errors->has('min_price')) success_input @endif"></td>
                                            <td><input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->max_price}}@else{{old('max_price')}}@endif" name="max_price" class="form-control @if(!$errors->has('max_price')) success_input @endif"></td>
                                            <td style="width: 100px">
                                                <select name="unit_price" class="form-control @if(!$errors->has('unit_price')) success_input @endif">
                                                    <option value="VND">VND</option>
                                                </select>
                                            </td>
                                        </table>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('discount'))has_error @endif">
                                        <label for="discount">Chiết khẩu(%)</label>
                                        <input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->discount}}@else{{old('discount')}}@endif" id="discount" name="discount" class="form-control">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('attact_file'))has_error @endif">
                                        <label for="attact_file">Chi tiết</label>
                                        <div class="input-group date">
                                            <input type="file" id="attact_file" name="attact_file" class="form-control">
                                        </div>
                                        @if(!empty($ItemSupplierInfo->attact_file))
                                        <a href="{{route('downloadattachfile', $ItemSupplierInfo->attact_file)}}" target="blank">{{$ItemSupplierInfo->attact_file}}</a>
                                        @endif
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('min_capacity') || $errors->has('max_capacity') || $errors->has('unit_capacity'))has_error @endif">
                                        <label for="name">Khả năng(Min|Max|Đơn vị)</label>
                                        <table>
                                            <td><input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->min_capacity}}@else{{old('min_capacity')}}@endif" name="min_capacity" class="form-control @if(!$errors->has('min_capacity')) success_input @endif"></td>
                                            <td><input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->max_capacity}}@else{{old('max_capacity')}}@endif" name="max_capacity" class="form-control @if(!$errors->has('max_capacity')) success_input @endif"></td>
                                            <td style="width: 100px">
                                                <select name="unit_capacity" class="form-control @if(!$errors->has('unit_capacity')) success_input @endif">
                                                    @foreach($UnitCapacity as $key => $row)
                                                    <option value="{{$key}}">{{$row}}</option>
                                                    @endforeach
                                                </select>
                                            </td>
                                        </table>
                                    </div>
                                    <div class="form-group col-md-2 @if($errors->has('preparation_time'))has_error @endif">
                                        <label for="preparation_time">Chuẩn bị</label>
                                        <input type="text" value="@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->preparation_time}}@else{{old('preparation_time')}}@endif" id="preparation_time" name="preparation_time" class="form-control">
                                    </div>
                                    <div class="form-group col-md-2 @if($errors->has('status'))has_error @endif">
                                        <label for="status">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option @if(!empty($ItemSupplierInfo) && 0 == $ItemSupplierInfo->status) selected @elseif(old('status') == 0) selected @endif value="0">Hoạt động</option>
                                            <option @if(!empty($ItemSupplierInfo) && 1 == $ItemSupplierInfo->status) selected @elseif(old('status') == 1) selected @endif value="1">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <textarea name="remark" id="remark" class="form-control">@if(!empty($ItemSupplierInfo)){{$ItemSupplierInfo->remark}}@else{{old('remark')}}@endif</textarea>
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(empty($ItemSupplierInfo))
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
            ajax: '{!! route('itemsupplierlist', $SupplierInfo->id) !!}',
            columns: [
                { data: 'stt', name: 'stt' },
                { data: 'code', name: 'code' },
                { data: 'name', name: 'name' },
                { data: 'price', name: 'price' },
                { data: 'unit_item.name', name: 'unit_item.name' },
                { data: 'capacity', name: 'capacity' },
                { data: 'preparation_time', name: 'preparation_time' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
        @include('layout.alert',['SessionResult' => session()->get('result')])
    })
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush
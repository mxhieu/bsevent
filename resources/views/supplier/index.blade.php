@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Nhà cung cấp</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách Nhà cung cấp</a>
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
                                            <th>Tên NCC</th>
                                            <th>Mã</th>
                                            <th>Phân Loại</th>
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
                <div class="col-md-9">
                    <div class="card">
                        <div class="card-block">
                            @include('layout.validate_error')
                            <form action="@if(!empty($SupplierInfo)){{route('editsupplier', $SupplierInfo->id)}}@else{{route('addsupplieraction')}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('name'))has_error @endif">
                                        <label for="name">Tên</label>
                                        <input value="@if(!empty($SupplierInfo)){{$SupplierInfo->name}}@else{{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('logo'))has_error @endif">
                                        <div class="row">
                                            <div class="col-md-8">
                                                <label for="logo">Logo</label>
                                                <div class="input-group date">
                                                    <input type="file" id="imagefile" name="logo" class="form-control">
                                                </div>
                                            </div>
                                            <div class="col-md-4 img_right">
                                            <img accept="image/*" id="imagepreview" src="@if(!empty($SupplierInfo)){{url('/upload/supplier').'/'.$SupplierInfo->logo}}@else{{url('/upload/default/no-image.jpg')}}@endif" alt="">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Code</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->code}}@else{{old('code')}}@endif" id="code" name="code" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('supplier_category_id'))has_error @endif">
                                        <label for="supplier_category_id">Nhóm Nhà cung cấp</label>
                                        <select name="supplier_category_id" id="supplier_category_id" class="form-control">
                                            @foreach($SupplierCategoryList as $row)
                                            <option @if(!empty($SupplierInfo) && $row->id == $SupplierInfo->supplier_category_id) selected @elseif(old('supplier_category_id') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                     <div class="form-group col-md-4 @if($errors->has('status'))has_error @endif">
                                        <label for="status">Trạng thái</label>
                                        <select name="status" id="status" class="form-control">
                                            <option @if(!empty($SupplierInfo) && 0 == $SupplierInfo->status) selected @elseif(old('status') == 0) selected @endif value="0">Hoạt động</option>
                                            <option @if(!empty($SupplierInfo) && 1 == $SupplierInfo->status) selected @elseif(old('status') == 1) selected @endif value="1">Ngừng hoạt động</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('bank_id'))has_error @endif">
                                        <label for="bank_id">Ngân hàng</label>
                                        <select name="bank_id" id="bank_id" class="form-control">
                                            @foreach($BankList as $row)
                                            <option @if(!empty($SupplierInfo) && $row->id == $SupplierInfo->bank_id) selected @elseif(old('bank_id') == $row->id) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('bankaccount'))has_error @endif">
                                        <label for="bankaccount">STK</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->bankaccount}}@else{{old('bankaccount')}}@endif" class="form-control" name="bankaccount" id="bankaccount">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('email'))has_error @endif">
                                        <label for="email">Email</label>
                                        <input type="email" value="@if(!empty($SupplierInfo)){{$SupplierInfo->email}}@else{{old('email')}}@endif" id="email" name="email" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('phone'))has_error @endif">
                                        <label for="phone">Phone</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->phone}}@else{{old('phone')}}@endif" id="phone" name="phone" class="form-control">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('fax'))has_error @endif">
                                        <label for="fax">Fax</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->fax}}@else{{old('fax')}}@endif" id="fax" name="fax" class="form-control">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="form-group col-md-8 @if($errors->has('address'))has_error @endif">
                                        <label for="address">Địa chỉ</label>
                                        <input type="text" value="@if(!empty($SupplierInfo)){{$SupplierInfo->address}}@else{{old('address')}}@endif" class="form-control" id="address" name="address">
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('market_id'))has_error @endif">
                                        <label for="market_id">Thị trường</label>
                                        <select style="width:100%" name="market_id[]" id="market_id" class="form-control init_select2" multiple="multiple">
                                            @foreach($MarketList as $row)
                                            <option @if(!empty($SupplierInfo) && in_array($row->id, json_decode($SupplierInfo->market_id))) selected @elseif(!empty(old('market_id')) && in_array($row->id, old('market_id'))) selected @endif value="{{$row->id}}">{{$row->name}}</option>
                                            @endforeach
                                        </select>
                                    </div>
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
            ajax: '{!! route('supplierlist') !!}',
            columns: [
                { data: 'stt', name: 'stt' },
                { data: 'name', name: 'name' },
                { data: 'code', name: 'code' },
                { data: 'supplier_category.name', name: 'supplier_category.name' },
                { data: 'status', name: 'status' },
                { data: 'action', name: 'action' },
            ]
        });
        @include('layout.alert',['SessionResult' => session()->get('result')])
    })
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
</script>
@endpush
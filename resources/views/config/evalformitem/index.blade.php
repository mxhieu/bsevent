@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Hạng mục Đánh Giá</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a id="tab1" class="nav-link" data-toggle="tab" href="#listtab">Danh sách hạng mục đánh giá</a>
        </li>
        <li class="nav-item">
            <a  id="tab2" class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
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
                                            <th>Code</th>
                                            <th>Name</th>
                                            <th>Content</th>
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
        <div id="addtab" class="tab-pane tab2"><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            @include('layout.validate_error')
                            <form action="{{route('addevalformitem', $EvalFormInfo->id)}}" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name'))has_error @endif">
                                    <label for="name">Name</label>
                                    <input type="text" id="name" name="name" class="form-control">
                                </div>
                                <div class="row">
                                    <div class="form-group col-md-4 @if($errors->has('code'))has_error @endif">
                                        <label for="code">Code</label>
                                        <div class="input-group date">
                                            <input type="text" id="code" name="code" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('parent_id'))has_error @endif">
                                        <label for="parent_id">Parent</label>
                                        <select name="parent_id" class="form-control">
                                            <option value="0">Danh mục cha</option>
                                            {!!$HtmlOptionItem!!}
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4 @if($errors->has('type'))has_error @endif">
                                        <label for="type">Loại</label>
                                        <select name="type" class="form-control">
                                            @foreach($EvalFormItemType as $key => $row)
                                            <option value="{{$key}}">{{$row}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('content'))has_error @endif">
                                    <label for="content">Content</label>
                                    <input type="text" id="content" name="content" class="form-control">
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <input type="text" id="remark" name="remark" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        <button class="btn btn-success">Thêm</button>
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
        "aaSorting": [],
        processing: true,
        serverSide: false,
        ajax: '{!! route('evalitemlist', $EvalFormInfo->id) !!}',
        columns: [
            { data: 'id', name: 'id' },
            { data: 'code', name: 'code' },
            { data: 'name', name: 'name' },
            { data: 'content', name: 'content' },
            { data: 'remark', name: 'remark' },
            { data: 'action', name: 'action' },
        ]
    });
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush
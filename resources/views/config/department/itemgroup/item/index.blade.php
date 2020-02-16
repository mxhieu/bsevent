@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Nhóm hạng mục</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" id="tab1" data-toggle="tab" href="#listtab">Danh sách nhóm hạng mục</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" id="tab2" data-toggle="tab" href="#addtab">@if(!empty($EditDetailItemGroupCategory)) Cập nhật @else Thêm mới @endif</a>
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
                                            <th>Tên hạng mục</th>
                                            <th>Loại hạng mục</th>
                                            <th>Hình ảnh</th>
                                            <th>Đơn vị</th>
                                            <th>Chuẩn bị</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($DetailItemGroupCategory as $key => $row)
                                        <tr style="background-color: #e6ff99">
                                            <td>{{++$key}}</td>
                                            <td colspan="5"><h4>{{$row->name}}</h4></td>
                                            <td>
                                            <a title="Cập nhật" href="{{route('detailitemgroupcategoryview', [$ItemGroupInfo->id, $row->id])}}" class="btn btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn bg-danger delete_confirm" style="color: white" href="{{route('deletedetailitemgroupcategory',$row->id)}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                                <a title="Thêm" href="{{route('additemlist', $row->id)}}" class="btn btn-success">
                                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @if(!empty($row->Items))
                                        @foreach($row->Items as $key => $item)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td><a href="{{route('edititem', $item->id)}}">{{$item->name}}</a></td>
                                            <td><a href="{{route('edititemcategory', $item->ItemCategory->id)}}">{{$item->ItemCategory->name}}</a></td>
                                            <td><img style="width: 60px;height: 60px;" src="{{url('/upload/item/'.$item->image)}}"></td>
                                            <td>{{$item->Unit->name}}</td>
                                            <td>{{$item->lead_time}}</td>
                                            <td>
                                                <a title="Cập nhật" href="{{route('edititem', $item->id)}}" class="btn btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                                </a>
                                                <a class="btn bg-danger delete_confirm" style="color: white" href="{{route('deletedetailitemgroup',[$item->id, $row->id])}}"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @endif
                                        @endforeach
                                    </tbody>
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
                        <form action="@if(empty($EditDetailItemGroupCategory)){{route('adddetailitemgroupcategoryaction', $ItemGroupInfo->id)}}@else {{route('editdetailitemgroupcategory',$EditDetailItemGroupCategory->id)}}@endif" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group @if($errors->has('name'))has_error @endif">
                                    <label for="name">Tên cấp hạng mục</label>
                                    <div class="input-group date">
                                        <input value="@if(!empty($EditDetailItemGroupCategory)){{$EditDetailItemGroupCategory->name}}@elseif(!empty(old('name'))){{old('name')}}@endif" type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group @if($errors->has('remark'))has_error @endif">
                                    <label for="remark">Ghi chú</label>
                                    <input value="@if(!empty($EditDetailItemGroupCategory)){{$EditDetailItemGroupCategory->remark}}@elseif(!empty(old('remark'))){{old('remark')}}@endif" type="text" id="remark" name="remark" class="form-control">
                                </div>
                                <div class="form-group">
                                    <div class="col-sm-12 padding-unset">
                                        @if(!empty($EditDetailItemGroupCategory))
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
@push('custom-scripts')
<script>
$(function() {
    @include('layout.tab_active',['SessionResult' => session()->get('result')])
});
</script>
@endpush
@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Danh sách hạng mục</li>
            </ol>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                <form action="{{route('adddetailitemgroupaction', $DetailItemGroupCategoryInfo->id)}}" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Sel</th>
                                        <th>Tên hạng mục</th>
                                        <th>Loại hạng mục</th>
                                        <th>Hình ảnh</th>
                                        <th>Đơn vị</th>
                                        <th>Leadtime</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($ItemList as $key => $row)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td><input value={{$row->id}} type="checkbox" name="item_id[]"></td>
                                        <td><a href="{{route('edititem', $row->id)}}">{{$row->name}}</a></td>
                                        <td><a href="{{route('edititemcategory', $row->ItemCategory->id)}}">{{$row->ItemCategory->name}}</a></td>
                                        <td><img style="width: 60px;height: 60px;" src="{{url('/upload/item/'.$row->image)}}"></td>
                                        <td>{{$row->Unit->name}}</td>
                                        <td>{{$row->lead_time}}</td>
                                    </tr>
                                    @endforeach                                       
                                </tbody>
                            </table>
                            <div class="form-group">
                                <div class="col-sm-12 padding-unset">
                                    <button class="btn btn-success">Thêm</button>
                                </div>
                            </div>
                        </div>
                    </form>
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
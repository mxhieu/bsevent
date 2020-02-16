@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Khấu trừ</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Cấu hình</a></li>
                <li class="breadcrumb-item">Khấu trừ</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách Khấu trừ</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            {{-- <h4 class="card-title">Thêm Khấu trừ</h4> --}}
                            <form action="" method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                <div class="row">
                                    <div class="form-group col-md-8">
                                        <label for="name">Tên khấu trừ</label>
                                        <div class="input-group date">
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">%</label>
                                        <div class="input-group date">
                                            <input type="text" id="name" name="name" class="form-control">
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label for="name">Ghi chú</label>
                                    <input type="text" id="name" name="name" class="form-control">
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
        <div id="listtab" class="tab-pane active"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            {{-- <h4 class="card-title dp-inline-block">Danh sách Khấu trừ</h4> --}}
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên khấu trừ</th>
                                            <th>%</th>
                                            <th>Ghi chú</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Khấu trừ 1</td>
                                            <td>10%</td>
                                            <td>
                                                Các Khấu trừ 1
                                            </td>
                                           
                                            <td>
                                                <a title="Cập nhật" href="{{route('editdiscountview',1)}}" class="btn btn-info">
                                                    <i class="fa fa-pencil-square-o" aria-hidden="true"></i> 
                                                </a>
                                                <button title="Xóa" id="2" type="button" class="btn btn-danger btn-delete-item" data-url="" data-toggle="modal" data-target="#confirmBox" data-id="2" data-name="phòng ban 1">
                                                    <i class="fa fa-trash" aria-hidden="true"></i> 
                                                </button>
                                            </td>
                                        </tr>
                                      
                                    </tbody>
                                </table>
                            </div>
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

@endpush
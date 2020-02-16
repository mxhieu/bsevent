@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            <h3 class="text-themecolor m-b-0 m-t-0">Đánh giá</h3>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Khách hàng</li>
                <li class="breadcrumb-item">Đánh giá</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#listtab">Danh sách đánh giá</a>
        </li>
    </ul>
    <div class="tab-content">
        <div id="addtab" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-block">
                            <h4 class="card-title">KH: KH001</h4>
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-6">
                                        <label for="name">Tên</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="name">Chọn form</label>
                                        <select class="form-control">
                                            <option>From A</option>
                                            <option>From B</option>
                                            <option>From C</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Ghi chú</label>
                                    <textarea class="form-control"></textarea>
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
                            <h4 class="card-title dp-inline-block">Khách hàng: KH001</h4>
                            <div class="table-responsive">
                                <table class="table" id="dataTable">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Mẫu Form</th>
                                            <th>Đánh giá</th>
                                            <th>Người tạo</th>
                                            <th>Chú thích</th>
                                            <th>Ngày tạo</th>
                                            <th>Tùy chỉnh</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>1</td>
                                            <td>Đánh giá 1</td>
                                            <td>Form A</td>
                                            <td>15</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Chú thích 1</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('addevalcustomer')}}">Đánh giá</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Đánh giá 2</td>
                                            <td>Form B</td>
                                            <td>10</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Chú thích 1</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('addevalcustomer')}}">Đánh giá</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Đánh giá 3</td>
                                            <td>Form C</td>
                                            <td>11</td>
                                            <td>Xuân Hiếu</td>
                                            <td>Chú thích 1</td>
                                            <td>{{date('d-m-Y',time())}}</td>
                                            <td>
                                                <a class="btn bg-warning" style="color: white" href="{{route('addevalcustomer')}}">Đánh giá</a>
                                                <a class="btn bg-danger" style="color: white" href="">Xóa</a>
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
<link rel="stylesheet" href="{{asset('admin/css/bootstrap-datepicker.min.css')}}">
@endpush
@push('custom-scripts')
{{-- Jquery Data table --}}
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net/js/jquery.dataTables.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/assets/plugins/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
<script type="text/javascript"  src="{{asset('admin/js/bootstrap-datepicker.min.js')}}"></script>
<script type="text/javascript">
    $('.datepicker').datepicker({
      autoclose: true
    })
</script>
@endpush
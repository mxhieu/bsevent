@extends('layout.master')
@section('content')
<div class="container-fluid">
    <div class="row page-titles">
        <div class="col-md-6 col-8 align-self-center">
            {{-- <h3 class="text-themecolor m-b-0 m-t-0">Bán cho khách hàng</h3> --}}
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">Home</a></li>
                <li class="breadcrumb-item">Danh sách mua</li>
            </ol>
        </div>
    </div>
    <ul class="nav nav-tabs">
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#infosale">Thông tin mua</a>
        </li>
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#tablistsale">Danh sách mua</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#dkchi">ĐK Thanh Toán</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#dkgiao">ĐK Giao Hàng</a>
        </li>
        
    </ul>
    <div class="tab-content">
        <div id="tablistsale" class="tab-pane active"><br>
            <ul class="nav nav-tabs">
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#addtab">Thêm mới</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link active" data-toggle="tab" href="#listitemtab">Dach sách Hàng hóa</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" data-toggle="tab" href="#listservicetab">Dach sách Dịch vụ</a>
                </li>
            </ul>
            <div class="tab-content">
                <div id="addtab" class="tab-pane fade"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Hàng hóa</h4>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                            <div class="table-responsive">
                                                                <table class="table" id="dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Chọn</th>
                                                                            <th>Mã</th>
                                                                            <th>Tên</th>
                                                                            <th>Hình</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Đơn vị</th>
                                                                            <th>Đơn giá</th>
                                                                            <th>TG chuẩn bị</th>  
                                                                            <th>Địa điểm Giao</th>
                                                                            <th>Ghi chú</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><input type="checkbox" name="checkbox"></td>
                                                                            <td><a href="">SP001</a></td>
                                                                            <td><a href="">SP: SP1</a></td>
                                                                            <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn btn-success">Thêm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}

                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Dịch vụ</h4>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                            <div class="table-responsive">
                                                                <table class="table" id="dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Chọn</th>
                                                                            <th>Mã</th>
                                                                            <th>Tên</th>
                                                                            <th>Hình</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Đơn vị</th>
                                                                            <th>Số lượng</th>
                                                                            <th>TG chuẩn bị</th>  
                                                                            <th>Địa điểm giao</th>
                                                                            <th>Ghi chú</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><input type="checkbox" name="checkbox"></td>
                                                                            <td><a href="">SP001</a></td>
                                                                            <td><a href="">SP: SP1</a></td>
                                                                            <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row">
                                                                <button class="btn btn-success">Thêm</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="listitemtab" class="tab-pane active"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Hàng Hóa</h4>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                            <div class="table-responsive">
                                                                <table class="table" id="dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Mã</th>
                                                                            <th>Tên</th>
                                                                            <th>Hình</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Đơn vị</th>
                                                                            <th>Đơn giá</th>
                                                                            <th>Tổng</th>
                                                                            <th>TG chuẩn bị</th>  
                                                                            <th>Địa điểm giao</th>
                                                                            <th>Ghi chú</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><a href="">SP001</a></td>
                                                                            <td><a href="">SP: SP1</a></td>
                                                                            <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>

                                                            <div class="row">
                                                                <p>Tổng tiền: <span style="color: red;font-weight: bold">240000 vnđ</span></p>
                                                            </div>

                                                            <div class="row text-left"> 
                                                                <button class="btn btn-success">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div id="listservicetab" class="tab-pane"><br>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-block">
                                    <form action="" method="post" enctype="multipart/form-data">
                                        {{ csrf_field() }}
                                        <div class="row">
                                            <div class="col-md-12">
                                                <div class="card">
                                                    <div class="card-block">
                                                        <h4 class="card-title">Dịch vụ</h4>
                                                        <form action="" method="post" enctype="multipart/form-data">
                                                            <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                                            <div class="table-responsive">
                                                                <table class="table" id="dataTable">
                                                                    <thead>
                                                                        <tr>
                                                                            <th>#</th>
                                                                            <th>Mã</th>
                                                                            <th>Tên</th>
                                                                            <th>Hình</th>
                                                                            <th>Số lượng</th>
                                                                            <th>Đơn vị</th>
                                                                            <th>Đơn giá</th>
                                                                            <th>Tổng</th>
                                                                            <th>TG chuẩn bị</th>  
                                                                            <th>Địa điểm giao</th>
                                                                            <th>Ghi chú</th>
                                                                        </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td>1</td>
                                                                            <td><a href="">SP001</a></td>
                                                                            <td><a href="">SP: SP1</a></td>
                                                                            <td><img style="width: 60px;height: 60px;" src="{{asset('upload/images/oFFA_shopping.png')}}"></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type=""  class="form-control" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td><input style="width: 100px" type="number" class="form-control" min="0" name=""></td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                            <td>
                                                                                <input type="" name="" class="form-control">
                                                                            </td>
                                                                        </tr>

                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                            <div class="row">
                                                                <p>Tổng tiền: <span style="color: red;font-weight: bold">240000 vnđ</span></p>
                                                            </div>

                                                            <div class="row text-left"> 
                                                                <button class="btn btn-success">Update</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
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

        <div id="dkchi" class="tab-pane fade"><br>
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-block">
                            {{-- <h4 class="card-title">ĐK CHI</h4> --}}
                            <form action="" method="post" enctype="multipart/form-data">
                                <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                                <div class="row">
                                    <div class="form-group col-md-2">
                                        <label for="name">Số tiền</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="name">Ngày</label>
                                        <div class="input-group date">
                                            <div class="input-group-addon">
                                                <i class="fa fa-calendar"></i>
                                            </div>
                                            <input readonly type="text" class="form-control pull-right datepicker">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="name">HTTT</label>
                                        <select class="form-control">
                                            <option>Tiền mặt</option>
                                            <option>Ngân Hàng</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-4">
                                        <label for="name">Bank</label>
                                        <select class="form-control">
                                            <option>Ngan hàng A</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-md-2">
                                        <label for="name">STK</label>
                                        <input type="text" id="name" name="name" class="form-control">
                                    </div>
                                </div>

                                <div class="form-group">
                                   <label for="name">Nội dung</label>
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

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="table-responsive">
                            <table class="table" id="dataTable">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Số tiền</th>
                                        <th>Ngày</th>
                                        <th>HTTT</th>
                                        <th>Nội dung</th>
                                        <th>Tùy chọn</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>10000</td>
                                        <td>{{date('d-m-Y',time())}}</td>
                                        <td>Tiền mặt</td>
                                        <td></td>
                                        <td>
                                            <a class="btn bg-warning" style="color: white" href="">Chi tiết</a>
                                            <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                        </td>
                                    </tr>

                                </tbody>
                            </table>
                        </div>
                        <div><p>Tổng tiền: <span style="color: red;font-weight: bold">240000 vnđ</span></p></div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="dkgiao" class="tab-pane fade"><br>
    <div class="row">
        <div class="col-md-8">
            <code>chú thích: To là thông tin các cty đại diện của config/company; From là thông tin của cty đại diện NCC</code>
            <div class="card">
                <div class="card-block">
                    {{-- <h4 class="card-title">ĐK Giao</h4> --}}
                    <form action="" method="post" enctype="multipart/form-data">
                        <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                        <div class="row">
                            <div class="form-group col-md-8">
                                <label for="name">Địa chi</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Ngày</label>
                                <div class="input-group date">
                                    <div class="input-group-addon">
                                        <i class="fa fa-calendar"></i>
                                    </div>
                                    <input readonly type="text" class="form-control pull-right datepicker">
                                </div>
                            </div>  
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">From</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Email</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Phone</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">To</label>
                                <select class="form-control">
                                    <option>Đại diện A</option>
                                    <option>Đại diện B</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Email</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Phone</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>

                        <div class="row">
                            <div class="form-group col-md-12">
                                <label for="name">Ghi Chú</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="table-responsive">
                        <table class="table" id="dataTable">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Đại chỉ</th>
                                    <th>Ngày</th>
                                    <th>From</th>
                                    <th>To</th>
                                    <th>Tùy chọn</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Lân 1</td>
                                    <td>424/4/3, Quốc lộ 1A, Bình Hưng Hòa, Quận Bình Tân, Tp.HCM</td>
                                    <td>{{date('d-m-Y',time())}}</td>
                                    <td>Cty A</td>
                                    <td><a href="">Cty B</a></td>
                                    <td>
                                        <a class="btn bg-warning" style="color: white" href="">Chi Tiết</a>
                                        <a class="btn bg-danger" style="color: white" href="">Xóa</a>
                                    </td>
                                </tr>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>

<div id="infosale" class="tab-pane fade"><br>
    <div class="row">
        <div class="col-md-8">
            <div class="card">
                <div class="card-block">
                    <form action="" method="post" enctype="multipart/form-data">
                        <input name="_token" value="zXwnTfILpeLyKZacB4xpaGdjcoIloqEurPreUYiR" type="hidden">
                        <div class="form-group">
                            <label for="name">Nhà Cung Cấp</label>
                            <select class="form-control">
                                <option value="">NCC 1</option>
                                <option value="">NCC 2</option>
                                <option value="">NCC 3</option>
                            </select>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">Tên</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Mã</label>
                                <input type="text" id="name" name="name" class="form-control">
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Tổng vnđ</label>
                                <input readonly type="text" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">Request Form</label>
                                <select class="form-control">
                                    <option value="">Rq Form 1</option>
                                    <option value="">Rq Form 2</option>
                                    <option value="">Rq Form 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name"><a href="">Dự án 1</a></label>
                                <select class="form-control">
                                    <option value=""><a href="">Dự án 1</a> 1</option>
                                    <option value=""><a href="">Dự án 1</a> 2</option>
                                    <option value=""><a href="">Dự án 1</a> 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Giảm</label>
                                <table>
                                    <td style="width: 50%">
                                        <select class="form-control">
                                            <option>10%</option>
                                            <option>20%</option>
                                        </select>
                                    </td>
                                    <td>+</td>
                                    <td><input type="text" id="name" name="name" class="form-control" value="0"></td>
                                </table>

                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">Người duyệt</label>
                                <select class="form-control">
                                    <option value="">Nhân viên 1</option>
                                    <option value="">Nhân viên 2</option>
                                    <option value="">Nhân viên 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Trang thái duyệt</label>
                                <select class="form-control">
                                    <option value="">open</option>
                                    <option value="">accepted</option>
                                    <option value="">rejected</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Thuế</label>
                                <select class="form-control">
                                    <option>10%</option>
                                    <option>20%</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-4">
                                <label for="name">Giám sát</label>
                                <select class="form-control">
                                    <option value="">Nhân viên 1</option>
                                    <option value="">Nhân viên 2</option>
                                    <option value="">Nhân viên 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Trạng thái xử lý</label>
                                <select class="form-control">
                                    <option value="">trạng thái 1</option>
                                    <option value="">trạng thái 2</option>
                                    <option value="">trạng thái 3</option>
                                </select>
                            </div>
                            <div class="form-group col-md-4">
                                <label for="name">Thanh Toán</label>
                                <input readonly type="number" id="name" name="name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="">Ghi chú</label>
                            <textarea class="form-control"></textarea>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-12 padding-unset">
                                <button class="btn btn-success">Save</button>
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
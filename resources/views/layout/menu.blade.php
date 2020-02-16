<aside class="left-sidebar">
    <div class="scroll-sidebar">
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                @if(strpos(\Request::route()->getPrefix(), 'supplier') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-cart-arrow-down m-r-10" aria-hidden="true"></i>Nhà Cung Cấp</a>
                    <ul style="list-style-type: none" id="side-menu">
                        <li>
                            <a href="{{ route('supplier') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách</a>
                        </li>
                        <li>
                            <a href="{{ route('scmitem') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Hạng mục</a>
                        </li>
                        <li>
                            <a href="{{ route('scmitem') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Yêu cầu mua</a>
                        </li>
                        <li>
                            <a href="{{ route('scmservice') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách dịch vụ</a>
                        </li>
                         <li>
                            <a href="{{ route('requestform') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách đơn yêu cầu</a>
                        </li>
                        <li>
                            <a href="{{ route('purchaselist') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách mua</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(strpos(\Request::route()->getPrefix(), 'customer') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-address-card m-r-10" aria-hidden="true"></i>Khách hàng</a>
                    <ul style="list-style-type: none" id="side-menu">
                        <li>
                            <a href="{{ route('customer') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách KH</a>
                        </li>
                        <li>
                            <a href="{{ route('saleitem') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách Đề xuất</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(strpos(\Request::route()->getPrefix(), 'project') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-calendar-check-o m-r-10" aria-hidden="true"></i>Dự án</a>
                    <ul style="list-style-type: none" id="side-menu">
                        <li>
                            <a href="{{ route('projectview') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh sách Dự Án</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(strpos(\Request::route()->getPrefix(), 'project') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-money m-r-10" aria-hidden="true"></i>Tài Chính</a>
                    <ul style="list-style-type: none" id="side-menu">
                        <li>
                            <a href="{{ route('projectview') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Dòng tiền Dự Án</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(strpos(\Request::route()->getPrefix(), 'employee') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-users m-r-10" aria-hidden="true"></i>Nhân Sự</a>
                    <ul style="list-style-type: none" id="side-menu">
                        {{-- <li>
                            <a href="{{ route('employeeconfig') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Config</a>
                        </li> --}}
                        <li>
                            <a href="{{ route('employee') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - User List</a>
                        </li>
                        <li>
                            <a href="{{ route('employeegroup') }}" class="waves-effect active">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Group</a>
                        </li>
                    </ul>
                </li>
                @endif
                @if(strpos(\Request::route()->getPrefix(), 'config') !== false)
                <li>
                    <a class="waves-effect"><i class="fa fa-cog m-r-10" aria-hidden="true"></i>Cấu hình</a>
                    <ul style="list-style-type: none" id="side-menu">
                        <li>
                            <a href="{{ route('company') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Company</a>
                        </li>
                        <li>
                            <a href="{{ route('department') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Phòng ban</a>
                        </li>
                        <li>
                            <a href="" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Biểu mẫu hạng mục</a>
                        </li>
                        <li>
                            <a href="{{ route('position') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Chức vụ</a>
                        </li>
                        <li>
                            <a href="{{ route('evalform') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Eval Form</a>
                        </li>
                        <li>
                            <a href="{{ route('costcategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Loại chi phi</a>
                        </li>                      
                        <li>
                            <a href="{{ route('revenuecategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Revenue Category</a>
                        </li>
                        <li>
                            <a href="{{ route('profitsharecategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - ProfitShare Category</a>
                        </li> 
                        <li>
                            <a href="{{ route('paymentmethod') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - PT Thanh toán</a>
                        </li>
                        <li>
                            <a href="{{ route('bank') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Ngân hàng</a>
                        </li>
                        <li>
                            <a href="{{ route('taxcategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Các mức thuế</a>
                        </li>
                        <li>
                            <a href="{{ route('discount') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Các mức khấu trừ</a>
                        </li>
                        <li>
                            <a href="{{ route('unit') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Đơn vị</a>
                        </li>

                        <li>
                            <a href="{{ route('itemcategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Loại hàng hóa</a>
                        </li>

                        <li>
                            <a href="{{ route('item') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh mục hàng hóa</a>
                        </li>

                        <li>
                            <a href="{{ route('servicecategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Loại dịch vụ</a>
                        </li>

                        <li>
                            <a href="{{ route('service') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Danh mục dịch vụ</a>
                        </li>

                        <li>
                            <a href="{{ route('approve') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Trạng thái duyệt</a>
                        </li>
                        <li>
                            <a href="{{ route('taskstatus') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Trạng thái công việc</a>
                        </li>
                        <li>
                            <a href="{{ route('suppliercategory') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Loại NCC</a>
                        </li>
                        <li>
                            <a href="{{ route('market') }}" class="waves-effect">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; - Thị trường</a>
                        </li>
                    </ul>
                </li>
                @endif
            </ul>
        </nav>
    </div>
</aside>

@extends('admin.adminLayout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Danh sách món ăn</h3>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
            <div id="example2_wrapper" class="dataTables_wrapper dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12 col-md-6"></div>
                    <div class="col-sm-12 col-md-6"></div>
                </div>
                <div class="row">
                    <div class="col-sm-12">
                        <?php
                        $message = session()->get("message");
                        if($message){
                            echo "<span class='text-alert' style='color: green'>$message</span>";
                            $message = session()->put("message","");
                        }
                        ?>
                        <table id="example2" class="table table-bordered table-hover dataTable dtr-inline"
                            aria-describedby="example2_info">
                            <thead>
                                <tr>
                                    <th class="sorting sorting_asc" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-sort="ascending" aria-label="ID">ID
                                    </th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Name Category">Tên món ăn</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Name Category">Hình ảnh</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Name Category">Danh mục</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Name Category">Địa phương</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Desc Category">Loại</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Desc Category">Mô tả</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Name Category">Giá bán</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Status">
                                        Trạng thái</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Date">Tùy chọn</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($allFood as $key => $Data)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            {{ $Data->dishes_id }}</td>
                                        <td>{{ $Data->dishes_name }}</td>
                                        <td> <img src="public/upload/food/{{ $Data->dishes_image }}" height="100" width="120"></td>
                                        <td>{{ $Data->category_name }}</td>
                                        <td>{{ $Data->local_name }}</td>
                                        <td>{{ $Data->dishes_desc }}</td>
                                        <td>{{ $Data->dishes_content }}</td>
                                        <td>{{ $Data->dishes_price }}</td>
                                        <td>
                                            <?php
                                            if($Data->dishes_status == 0){
                                                echo "<a href='/Hide-Dishes/$Data->dishes_id'><i class='fa-solid fa-toggle-off'></i> Ẩn</a>";
                                            }else {
                                                echo "<a href='/Show-Dishes/$Data->dishes_id'><i class='fa-solid fa-toggle-on'></i>Hiển thị</a>";
                                            }
                                            ?>
                                        </td>
                                        
                                        <td>
                                            <a href="{{URL::to('/Edit-Dishes/'.$Data->dishes_id)}}">
                                                <button class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i>Sửa</button>
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this category?')" href="/Delete-Dishes/{{$Data->dishes_id}}">
                                                <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i> Xóa</button>
                                            </a>
                                            
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-12 col-md-5">
                        <div class="dataTables_info" id="example2_info" role="status" aria-live="polite">Showing 1 to 10 of
                            57 entries</div>
                    </div>
                    <div class="col-sm-12 col-md-7">
                        <div class="dataTables_paginate paging_simple_numbers" id="example2_paginate">
                            <ul class="pagination">
                                <li class="paginate_button page-item previous disabled" id="example2_previous"><a
                                        href="#" aria-controls="example2" data-dt-idx="0" tabindex="0"
                                        class="page-link">Previous</a></li>
                                <li class="paginate_button page-item active"><a href="#" aria-controls="example2"
                                        data-dt-idx="1" tabindex="0" class="page-link">1</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="2" tabindex="0" class="page-link">2</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="3" tabindex="0" class="page-link">3</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="4" tabindex="0" class="page-link">4</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="5" tabindex="0" class="page-link">5</a></li>
                                <li class="paginate_button page-item "><a href="#" aria-controls="example2"
                                        data-dt-idx="6" tabindex="0" class="page-link">6</a></li>
                                <li class="paginate_button page-item next" id="example2_next"><a href="#"
                                        aria-controls="example2" data-dt-idx="7" tabindex="0"
                                        class="page-link">Next</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /.card-body -->
    </div>
@endsection

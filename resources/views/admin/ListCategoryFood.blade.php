@extends('admin.adminLayout')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">List Category Food</h3>
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
                                        colspan="1" aria-label="Name Category">Name Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Desc Category">Desc Category</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Status">
                                        Status</th>
                                    <th class="sorting" tabindex="0" aria-controls="example2" rowspan="1"
                                        colspan="1" aria-label="Date">Action</th>

                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($ListCategoryFood as $key => $listCategoryFoods)
                                    <tr class="odd">
                                        <td class="dtr-control sorting_1" tabindex="0">
                                            {{ $listCategoryFoods->category_id }}</td>
                                        <td>{{ $listCategoryFoods->category_name }}</td>
                                        <td>{{ $listCategoryFoods->category_desc }}</td>
                                        <td>
                                            <?php
                                            if($listCategoryFoods->category_status == 0){
                                                echo "<a href='/Hide-Category-Food/$listCategoryFoods->category_id'><i class='fa-solid fa-toggle-off'></i> Hide</a>";
                                            }else {
                                                echo "<a href='/Show-Category-Food/$listCategoryFoods->category_id'><i class='fa-solid fa-toggle-on'></i>Show</a>";
                                            }
                                            ?>
                                        </td>
                                        
                                        <td>
                                            <a href="{{URL::to('/Edit-Category/'.$listCategoryFoods->category_id)}}">
                                                <button class="btn btn-warning"><i class="fa-regular fa-pen-to-square"></i>Edit</button>
                                            </a>
                                            <a onclick="return confirm('Are you sure you want to delete this category?')" href="/Delete-Category/{{$listCategoryFoods->category_id}}">
                                                <button class="btn btn-danger"><i class="fa-regular fa-trash-can"></i> Delete</button>
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

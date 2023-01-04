@extends('admin.adminLayout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Cập nhật món ăn</h3>
        </div>
        <?php
        $message = session()->get("message");
        if($message){
            echo "<span class='text-alert' style='color: green'>$message</span>";
            $message = session()->put("message","");
        }
        ?>
        <!-- /.card-header -->
        <!-- form start -->
        @foreach($editFood as $key => $data)
        <form action="{{URL::to('/Update-Dishes/'.$data->dishes_id)}}" method="POST" enctype = "multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="food_name">Tên món ăn</label>
                    <input type="text" name="foodName" class="form-control" id="name_dish"
                        value="{{$data->dishes_name}}">
                </div>
                <div class="form-group">
                    <label for="foodPrice">Giá</label>
                    <input type="text" name="foodPrice" class="form-control" id="foodPrice"
                        value="{{$data->dishes_price}}">
                </div>
                <div class="form-group">
                    <label for="food_name">Hình ảnh món ăn</label>
                    <input type="file" name="foodImage" class="form-control" id="name_dish">
                    <br>
                    <img src="{{URL::to('public/upload/food/'.$data->dishes_image)}}" height="100px" width="120px">
                </div>
                <div class="form-group">
                    <label for="Describe">Loại</label>
                    <textarea name="foodDescribe" style="resize: none" rows="8" type="text" class="form-control" id="Describe" placeholder="Mô tả">{{$data->dishes_desc}}</textarea>
                </div>
                <div class="form-group">
                    <label for="Food_Content">Mô tả món ăn</label>
                    <textarea name="foodContent" style="resize: none" rows="8" type="text" class="form-control" id="Food_Content" placeholder="Nội dung">{{$data->dishes_content}}</textarea>
                </div>
                <!-- Select category -->
                <div class="form-group">
                    <label>Danh mục</label>
                    <select name="categoryFood" class="form-control">
                        @foreach($categoryFood as $key => $item)
                            @if($item->category_id == $data->category_id)
                                <option selected value="{{$item->category_id}}">{{$item->category_name}}</option>
                            @else
                                <option value="{{$item->category_id}}">{{$item->category_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <!-- Select local -->
                <div class="form-group">
                    <label>Địa danh</label>
                    <select name="localFood" class="form-control">
                        @foreach($localFood as $key => $item)
                            @if($item->local_id == $data->local_id)
                                <option selected value="{{$item->local_id}}">{{$item->local_name}}</option>
                            @else
                                <option value="{{$item->local_id}}">{{$item->local_name}}</option>
                            @endif
                        @endforeach
                    </select>
                </div>
                <!-- Select status -->
                <div class="form-group">
                    <label>Chọn trạng thái</label>
                    <select name="foodStatus" class="form-control">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="SaveFood" class="btn btn-primary">Cập nhật món ăn</button>
            </div>
        </form>
        @endforeach
    </div>
@endsection

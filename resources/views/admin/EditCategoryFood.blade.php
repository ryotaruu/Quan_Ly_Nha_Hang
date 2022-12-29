@extends('admin.adminLayout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Edit Category Food</h3>
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
        @foreach($EditCategoryFood as $key => $Data)
        <form action='{{ URL::to("/Update-Category/".$Data->category_id) }}' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="NameCategory">Name Category</label>
                    <input type="text" name="NameCategory" class="form-control" id="NameCategory" placeholder="Name Category" value="{{$Data->category_name}}">
                </div>
                <div class="form-group">
                    <label for="Describe">Describe</label>
                    <textarea name="DescribeCategory" style="resize: none" rows="8" type="text" class="form-control" id="Describe" placeholder="Describe">{{$Data->category_desc}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="AddCategoryFood" class="btn btn-primary">Save</button>
            </div>
        </form>
        @endforeach
    </div>
@endsection
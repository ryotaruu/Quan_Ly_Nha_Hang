@extends('admin.adminLayout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Category Food</h3>
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
        <form action="{{ route("Category.Add.Save") }}" method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="NameCategory">Name Category</label>
                    <input type="text" name="NameCategory" class="form-control" id="NameCategory"
                        placeholder="Name Category">
                </div>
                <div class="form-group">
                    <label for="Describe">Describe</label>
                    <textarea name="DescribeCategory" style="resize: none" rows="8" type="text" class="form-control" id="Describe" placeholder="Describe"></textarea>
                </div>
                <div class="form-group">
                    <label>Select Status</label>
                    <select name="CategoryStatus" class="form-control">
                        <option value="0">Hide</option>
                        <option value="1">Show</option>
                    </select>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="AddCategoryFood" class="btn btn-primary">Add</button>
            </div>
        </form>
    </div>
@endsection

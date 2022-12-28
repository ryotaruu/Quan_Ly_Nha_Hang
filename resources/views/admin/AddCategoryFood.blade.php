@extends('admin.adminLayout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Add Category Food</h3>
        </div>
        <!-- /.card-header -->
        <!-- form start -->
        <form>
            <div class="card-body">
                <div class="form-group">
                    <label for="NameCategory">Name Category</label>
                    <input type="text" name="Name-Category" class="form-control" id="NameCategory"
                        placeholder="Name Category">
                </div>
                <div class="form-group">
                    <label for="Describe">Describe</label>
                    <textarea style="resize: none" rows="8" type="text" class="form-control" id="Describe" placeholder="Describe"></textarea>
                </div>
                <div class="form-group">
                    <label>Select Status</label>
                    <select class="form-control">
                        <option>Hide</option>
                        <option>Show</option>
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

@extends('admin.adminLayout')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            <h3 class="card-title">Local Editing</h3>
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
        @foreach($LocalEditing as $key => $Data)
        <form action='{{ URL::to("/Update-Local/".$Data->local_id) }}' method="POST">
            @csrf
            <div class="card-body">
                <div class="form-group">
                    <label for="NameCategory">Local Name</label>
                    <input type="text" name="LocalName" class="form-control" id="LocalName" placeholder="Local Name" value="{{$Data->local_name}}">
                </div>
                <div class="form-group">
                    <label for="Describe">Local Description</label>
                    <textarea name="LocalDescription" style="resize: none" rows="8" type="text" class="form-control" id="LocalDescription" placeholder="Local Description">{{$Data->local_desc}}</textarea>
                </div>
            </div>
            <!-- /.card-body -->
            <div class="card-footer">
                <button type="submit" name="SaveLocal" class="btn btn-primary">Save Local</button>
            </div>
        </form>
        @endforeach
    </div>
@endsection
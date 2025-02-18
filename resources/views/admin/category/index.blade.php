@extends('admin.master')
@section('body')
<div class="row mt-9">
    <div class="col-lg-2"></div>
    <div class="col-lg-8">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Sample Horizontal Form with Icons</h4>
                <h6 class="card-subtitle">Use Bootstrap's predefined grid classes for horizontal form</h6>
                <h4 class="text-center text-success">{{session('message')}} </h4>
                <form class="form-horizontal p-t-20" action="{{route('category.new')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label for="exampleInputuname3" class="col-sm-3 control-label">Add Product</label>
                        {{-- <div class="col-sm-9">
                            <div class="input-group">
                                <span class="input-group-text"><i class="ti-user"></i></span>
                                <input type="text" class="form-control" id="exampleInputuname3" placeholder="Username">
                            </div>
                        </div> --}}
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Category Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" id="exampleInputEmail3" placeholder="Category Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label col-sm-3 control-label" for="web">Category Description<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <textarea  class="form-control" name="description" placeholder="Category Description"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Category Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" id="exampleInputpwd4" placeholder="Enter pwd">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword5" class="col-sm-3 control-label">Publication Status</label>
                        <div class="col-sm-9">
                            <div class="input-group">

                                <level class="me-3"> <input type="radio" name="status" value="1" checked> Published </level>
                                <level> <input type="radio" name="status" value="0"> Un-Published </level>

                                </div>
                        </div>
                    </div>
                    {{-- <div class="form-group row">
                        <div class="offset-sm-3 col-sm-9">
                            <label class="form-check m-b-0">
                                <input type="checkbox" class="form-check-input">
                                <span class="form-check-label">Check me out !</span>
                            </label>
                        </div>
                    </div> --}}
                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Category</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



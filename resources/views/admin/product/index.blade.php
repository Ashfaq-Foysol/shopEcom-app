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
                <form class="form-horizontal p-t-20" action="{{route('product.new')}}" method="POST" enctype="multipart/form-data" >
                    @csrf
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Category Name</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="category_id" id="">
                            <option value="" disabled selected >--Select Category</option>
                            @foreach ($categories as $category )
                                <option value="{{$category->id}}" >{{$category->name}} </option>
                            @endforeach
                        </select>
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="category_name" id="" placeholder="Category Name"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Sub-Category Name</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="sub_category_id" id="">
                            <option value="" disabled selected >--Select Sub-Category</option>
                            @foreach ($sub_categories as $sub_category )
                                <option value="{{$sub_category->id}}" >{{$sub_category->name}} </option>
                            @endforeach
                        </select>
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="category_name" id="" placeholder="Category Name"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Brand Name</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="brand_id" id="">
                            <option value="" disabled selected >--Select Brand Category</option>
                            @foreach ($brands as $brand )
                                <option value="{{$brand->id}}" >{{$brand->name}} </option>
                            @endforeach
                        </select>
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="category_name" id="" placeholder="Category Name"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="" class="col-sm-3 control-label">Unit Name</label>
                        <div class="col-sm-9">
                        <select class="form-control" name="unit_id" id="">
                            <option value="" disabled selected >--Select Unit</option>
                            @foreach ($units as $unit )
                                <option value="{{$unit->id}}" >{{$unit->name}} </option>
                            @endforeach
                        </select>
                            <div class="input-group">
                                {{-- <input type="text" class="form-control" name="category_name" id="" placeholder="Category Name"> --}}
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Name<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="name" id="exampleInputEmail3" placeholder="Product Name">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Code<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="code" id="exampleInputEmail3" placeholder="Product code">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Model<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="model" id="exampleInputEmail3" placeholder="Product Model">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Product Stock Amount<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="text" class="form-control" name="stock_amount" id="exampleInputEmail3" placeholder="Stock">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Regular Price<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" name="regular_price" id="exampleInputEmail3" placeholder="Regular Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">selling Price<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="number" class="form-control" name="selling_price" id="exampleInputEmail3" placeholder="Offer Price">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Short Description<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="textarea" class="form-control" name="short_description" id="exampleInputEmail3" placeholder="Short Description">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="exampleInputEmail3" class="col-sm-3 control-label">Long Description<span class="text-danger">*</span></label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="textarea" class="form-control" name="long_description" id="exampleInputEmail3" placeholder="Long Description">
                            </div>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Featured Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="image" class="form-control" id="exampleInputpwd4" accept="image/*" placeholder="Featured Image">
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label for="inputPassword4" class="col-sm-3 control-label">Other Image</label>
                        <div class="col-sm-9">
                            <div class="input-group">
                                <input type="file" name="other_image" class="form-control" multiple id="exampleInputpwd4" placeholder="Other Image">
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

                    <div class="form-group row m-b-0">
                        <div class="offset-sm-3 col-sm-9">
                            <button type="submit" class="btn btn-success waves-effect waves-light text-white">Create New Product</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection



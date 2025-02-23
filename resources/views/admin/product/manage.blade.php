
@extends('admin.master')
@section('body')
<div class="row">
<div class="col-lg-2"></div>
<div class="col-lg">
    <div class="card">
        <div class="card-body">
            <h4 class="card-title">Data Table</h4>
            <h6 class="card-subtitle">Data table example</h6>
            <div class="table-responsive m-t-40">
                <p class="text-center text-success">{{Session::get('message')}} </p>
                <table id="myTable" class="table table-striped border">
                    <thead>
                        <tr>
                            <th>SL No</th>
                            <th>Category Name</th>
                            <th>product Name</th>

                            <th>Description</th>
                            <th> Selling price</th>
                            <th>Image</th>
                            <th> Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($products as $product )


                        <tr>
                            <td>{{$loop->iteration}} </td>
                            <td>{{$product->category->name}} </td>
                            <td>{{$product->name}} </td>
                            <td>{{$product->description}}</td>
                            <td>{{$product->selling_price}}</td>

                            <td><img src="{{asset($product->image)}}" alt="{{$product->name}}" height="50" width="80"> </td>
                            <td>{{$product->status== 1? 'published' : 'Unpublished'}}</td>
                            <td>
                             <a href="{{route('product.edit',['id'=>$product->id])}}" class="btn btn-success btn-sm">
                                <i class="ti-agenda"></i>
                             </a>
                             <a href="{{route('product.delete',['id'=>$product->id])}}" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure to delete');">
                                <i class="ti-trash"></i>
                             </a>
                            </td>
                        </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
</div>
@endsection



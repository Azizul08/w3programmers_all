@extends('products.default')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <form action="{{ route('products.create.step.three.post') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="card">
                    <div class="card-header">Step 3: Review Details</div>
    
                    <div class="card-body">
   
                            <table class="table">
                                <tr>
                                    <td>Product Name:</td>
                                    <td><strong>{{$product->name}}</strong></td>
                                </tr> 
                                <tr>
                                    <td>Product Description:</td>
                                    <td><strong>{{$product->description}}</strong></td>
                                </tr>
                                <tr>
                                    <td>Product Image:</td>
                                    <td><img src="{{$product->image}}" width="70" height="60"/></td>
                                </tr>
                                <tr>
                                    <td>Product Price:</td>
                                    <td><strong>{{$product->price}}</strong></td>
                                </tr>
                            </table>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6 text-left">
                                <a href="{{ route('products.create.step.two') }}" class="btn btn-danger pull-right">Previous</a>
                            </div>
                            <div class="col-md-6 text-right">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
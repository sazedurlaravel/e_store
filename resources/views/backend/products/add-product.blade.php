@extends('backend.layouts.master')

@section('content')

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">          
                            <div class="modal-content">
                                <div class="modal-header" style="border-top:5px solid green;">
                                    <h5 class="modal-title" id="addT">
                                        @if (isset($editData))
                                            Edit Product
                                        @else
                                            Add Product
                                        @endif
                                       
                                    </h5>
                                    <a href="{{route('product.view')}}" class="btn btn-success float-right btn-sm">View Products</a>
                                  
                                    </div>
                                   
                                        <div class="card">
                                            <div class="card-body">
                                             
                                                <form action="{{(@$editData)? route('product.update',$editData->id):route('product.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Product Title</label>
                                                            <input  name="title" type="text" class="form-control  @error('title') is-invalid @enderror" value="{{(@$editData)? $editData->title:""}}">
                                                            @error('title')
                                                                <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">Product Price</label>
                                                            <input name="price" type="text" class="form-control @error('title') is-invalid @enderror" value="{{(@$editData)? $editData->price:""}}">
                                                            @error('price')
                                                            <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                    </div>
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Size</label>
                                                            <select class="form-control @error('title') is-invalid @enderror" name="size[]" id="" multiple>
                                                                <option value="small" {{(@$editData->size== "small")? "selected":""}}>Small</option>
                                                                <option value="medium" {{(@$editData->size == "medium")? "selected":""}}>Medium</option>
                                                                <option value="large" {{(@$editData->size == "large")? "selected":""}}>Large</option>
                                                                <option value="xtra_large" {{(@$editData->size == "xtra_large")? "selected":""}}>Extra Large</option>
                                                                <option value="xtra_small" {{(@$editData->size == "xtra_small")? "selected":""}}>Extra Small</option>
                                                            </select>
                                                            @error('size')
                                                            <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                            <label for="">Color</label>
                                                            <select class="form-control @error('title') is-invalid @enderror" name="color[]" id="" multiple>
                                                                <option value="green">Green</option>
                                                                <option value="red">Red</option>
                                                                <option value="black">Black</option>
                                                                <option value="yellow">Yellow</option>
                                                                <option value="white">White</option>
                                                            </select>
                                                            @error('color')
                                                            <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                       
                                                    </div>

                                                    <div class="form-group">
                                                        <label for="">description</label>
                                                       <textarea name="description" class="form-control @error('title') is-invalid @enderror" id="" cols="20" rows="5">{{(@$editData)? $editData->description:""}}</textarea>
                                                       @error('description')
                                                       <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                       @enderror
                                                    </div>
                                                   <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Quantity</label>
                                                            <input  name="quantity" type="text" class="form-control @error('title') is-invalid @enderror" value="{{(@$editData)? $editData->quantity:""}}">
                                                            @error('quantity')
                                                            <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                 
                                                    <div class="form-group col-md-6">
                                                        <label for="">Product Image</label>
                                                        <input name="image[]" type="file" class="form-control @error('image') is-invalid @enderror" multiple>
                                                        @error('image')
                                                        <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                   </div>
                                                   
                                                    
                                                    <div class="form-group">
                                                        <label for="">Category</label>
                                                    <select class="form-control @error('title') is-invalid @enderror" name="category_id" id="">
                                                        <option value="">Select Category</option>
                                                        @foreach ($categories as $category)
                                                            <option value="{{$category->id}}" {{(@$editData->categoty_id== $category->id)? "selected":""}}>{{$category->name}}</option>
                                                        @endforeach
                                                    </select>
                                                    @error('category_id')
                                                    <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Brand</label>
                                                    <select class="form-control @error('title') is-invalid @enderror" name="brand_id" id="">
                                                        <option value="">Select Brand</option>
                                                        @foreach ($brands as $brand)
                                                        <option value="{{$brand->id}}" {{(@$editData->brand_id== $brand->id)? "selected":""}}>{{$brand->name}}</option>
                                                    @endforeach
                                                    </select>
                                                    @error('brand_id')
                                                    <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                    @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">offer Price</label>
                                                        <input name="offer_price" type="text" class="form-control @error('offer_price') is-invalid @enderror" value="{{(@$editData)?$editData->offer_price:""}}">
                                                        @error('offer_price')
                                                        <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                    <div class="form-group">
                                                        <label for="">Is Featured</label>
                                                        <select name="is_featured" id="">
                                                          <option value="0">No</option>
                                                          <option value="1">Yes</option>
                                                        </select>
                                                        @error('is_featured')
                                                        <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                    </div>
                                                 
                                            </div>
                                        </div>
                                    
                                    <button type="submit"  id="saveBtn" class="btn btn-primary">Save Product</button>
                                    
                                   
                                </form> 
                            </div>
                       
                        </div>

                       
                   
               
  
           
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    
@endsection

@section('scripts')


  <script>
      $('#addT').show();
      $('#updateT').hide();
      $('#saveBtn').show();
      $('#updateBtn').hide();
  </script>
 
@endsection
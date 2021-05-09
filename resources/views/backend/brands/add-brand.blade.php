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
                                            Edit Brand
                                        @else
                                            Add Brand
                                        @endif
                                        
                                    </h5>
                                    <a href="{{route('brand.index')}}" class="btn btn-success float-right btn-sm">View brand</a>
                                  
                                    </div>
                                   
                                        <div class="card">
                                            <div class="card-body">
                                             
                                                <form action="{{(@$editData)? route('brand.update',$editData->id):route('brand.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">brand Title</label>
                                                            <input  name="name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{(@$editData)?$editData->name:""}}">
                                                            @error('name')
                                                                <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                        <div class="form-group col-md-6">
                                                        <label for="">brand Image</label>
                                                        <input name="image" type="file" class="form-control @error('image') is-invalid @enderror" multiple>
                                                        @error('image')
                                                        <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                        @enderror
                                                        </div>
                                                    </div>
                                                   

                                                    <div class="form-group">
                                                        <label for="">Description</label>
                                                       <textarea name="description" class="form-control @error('Description') is-invalid @enderror" id="" cols="20" rows="5">{{(@$editData)?$editData->description:""}}</textarea>
                                                       @error('description')
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
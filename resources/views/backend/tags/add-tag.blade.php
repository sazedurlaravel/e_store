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
                                            Edit Tag
                                        @else
                                            Add Tag
                                        @endif
                                        
                                    </h5>
                                    <a href="{{route('tag.index')}}" class="btn btn-success float-right btn-sm">View tag</a>
                                  
                                    </div>
                                   
                                        <div class="card">
                                            <div class="card-body">
                                             
                                                <form action="{{(@$editData)? route('tag.update',$editData->id):route('tag.store')}}" method="POST" enctype="multipart/form-data">
                                                    @csrf
                                                    <div class="form-row">
                                                        <div class="form-group col-md-6">
                                                            <label for="">Tag Title</label>
                                                            <input  name="name" type="text" class="form-control  @error('name') is-invalid @enderror" value="{{(@$editData)?$editData->name:""}}">
                                                            @error('name')
                                                                <div class="alert alert" style="color:red;">{{ $message }}</div>
                                                            @enderror
                                                        </div>
                                                      
                                               
                                                    </div>
                                        </div>
                                    
                                    <button type="submit"  id="saveBtn" class="btn btn-primary">Save Tag</button>
                                    
                                   
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
@extends('backend.layouts.master')

@section('content')

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">View All Products</h3>
                  <a href="{{route('product.add')}}"  class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"></i>Add Product</a>
                  <!-- Button trigger modal -->
                   
                
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Product Name</th>
                      <th>Description</th>
                      <th>image</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      
                    @foreach ($products as $key=>$product)
                        <tr>
                          <td>{{$key+1}}</td>
                          <td>{{$product->title}}</td>
                          <td>{{$product->description}}</td>
                          <td>
                            @foreach ($product->images as $item)
                            @php
                                $arr = json_decode($item->image, true);
                            @endphp
                               @foreach ($arr as $val)
                                   <img src="{{asset('uploads/'.$val)}}" width="50" alt="">
                               @endforeach
                            @endforeach
                          </td>
                          <td>
                            <a href="{{route('product.edit',$product->id)}}" class="btn btn-success btn-sm">Edit</a>
                            <a href="{{route('product.delete',$product->id)}}" class="btn btn-danger btn-sm">Delete</a>
                          </td>
                      </tr>
                    @endforeach
                      
                    </tbody>
                    <tfoot>
                    </tfoot>
                  </table>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
  
           
            </div>
            <!-- /.col -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
      </section>
    
@endsection

@section('scripts')

      <!-- DataTables -->
<script src="{{asset('backend/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('backend/plugins/datatables-responsive/js/responsive.bootstrap4.min.js')}}"></script>

<script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true,
        "autoWidth": false,
      });
      $('#example2').DataTable({
        "paging": true,
        "lengthChange": false,
        "searching": false,
        "ordering": true,
        "info": true,
        "autoWidth": false,
        "responsive": true,
      });
    });
  </script>
  <script>
      $('#addT').show();
      $('#updateT').hide();
      $('#saveBtn').show();
      $('#updateBtn').hide();
  </script>
 
@endsection
@extends('backend.layouts.master')

@section('content')

      <!-- Main content -->
      <section class="content">
        <div class="container-fluid">
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h3 class="card-title">View All Tags</h3>
                  <a href="{{route('tag.create')}}"  class="btn btn-success btn-sm float-right"><i class="fa fa-plus-circle"></i>Add tag</a>
                  <!-- Button trigger modal -->
                   
                    
                   
                </div>
                <!-- /.card-header -->
                <div class="card-body">
                  <table id="example2" class="table table-bordered table-hover">
                    <thead>
                    <tr>
                      <th>ID</th>
                      <th>Tag Title</th>
                      <th>Action</th>
                    </tr>
                    </thead>
                    <tbody>
                      @foreach ($tags as $tag)
                        <tr>
                        <td>{{$loop->index+1}}</td>
                        <td>{{$tag->name}}</td>
                        <td>
                          <a href="{{route('tag.edit',$tag->id)}}" class="btn btn-success btn-sm">Edit</a>
                          <a href="{{route('tag.delete',$tag->id)}}" class="btn btn-danger btn-sm">Delete</a>
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

    
// //=============== start clear data=============
// function clearData(){
//                $('#name').val('');
//                $('#description').val('');
//                $('#image').val('');
              
//            }
//  //=============== end clear data=============
//       $.ajaxSetup({
//       headers: {
//           'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
//       }
//     }); 
  
//     //=============== start reading data=============
//     function allData(){
//       $.ajax({
//           type:"GET",
//           dataType:"json",
//           url:"/admin/catData",
//           success:function(response){
//             var html=""
//             $.each(response,function(key,value){
//                 html= html+"<tr>";
//                 html= html+"<th scope='row'>"+value.id+"</th>";
//                 html= html+ "<td>"+value.name+"</td>";
//                 html= html+ "<td>"+value.description+"</td>";
//                 html = html+ '<td>';
//                 html = html+ '<img width="50" src='+"{{asset('backend/images/categories/')}}"+"/"+value.image+ ">";
//                 html = html+ '</td>';
//                 html= html+ "<td>";
//                 html= html+ "<button class='btn btn-success' onclick='editData("+value.id+")'>Edit</button>";
//                 html= html+ "<button class='btn btn-danger' onclick='dataDelete("+value.id+")'>Delete</button>";
//                 html= html+ "</td>";
//                 html= html+"</tr>";
//             })
//             $('#tbd').html(html);
//           }
//       })
      
//     }
//     allData();
//      //=============== start store data=============

//     function storeData(){
//         var name =$('#name').val();
//         var description =$('#description').val();
//         var image =$('#image').val();

//         $.ajax({
//           type:"POST",
//           dataType:"json",
//           data:{name:name,description:description,image:image},
//           url:"category/store",
//           success:function(data){
//             clearData();
//             allData();
//           }
//         })
//      }
    


  </script>
  
    
@endsection
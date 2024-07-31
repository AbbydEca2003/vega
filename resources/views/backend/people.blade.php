
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" 
integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 
    <title>Vega | People</title>

</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        
               @include('backend.topSidebar')
               <main class="app-main p-3">
                <button class=" btn btn-primary" data-toggle="modal" data-target="#addUser">+ Add User</button>
                <br><br>

                                     <!-- new table  -->
       <section class="content">
      <div class="container-fluid">
        <h2>{!! \Session::get('success') !!}</h2>
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h3 class="card-title">Users</h3>
              </div>
              <!-- /.card-header -->
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>S.N</th>
                    <th>username</th>
                    <th>email</th>
                    <th>Status</th>
                    <th>edit</th>
                  </tr>
                  </thead>
                  @foreach($users as $user)
                  <tr>
                    <td>{{$user->id}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->status}}</td>
                    <td><div class="row">
                             <div class="col">
                                <button class=" btn btn-primary" data-toggle="modal" data-target="#editUser" onclick="change({{$user->id}})">Edit</button>
                            </div>
                        </div></td>
                  </tr>
                  @endforeach
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>


         <!-- Modal Edit user model-->
         <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="editUser">Edit User {{$user->name}}</h5>
            </div>
            <div class="modal-body">
            <form action="/editUser" method="post">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="username" value="{{$user->name[1]}}">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="input-group mb-3">Active Status<input type="radio" name="status"><input type="radio" name="status">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="edit_user"name="user_id">
                    <input type="submit" value="Update" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>
        </div>


        
         <!-- Modal -->
         <div class="modal fade" id="addUser" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUser">Add new User</h5>
            </div>
            <div class="modal-body">
                <form action="/setUser" method="post" id="{{$user->id}}">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="username">
                        <div class="input-group-text" > <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
            </div>
            <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" value="Register" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>
        </div>
                                           
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>

    <script src="js/adminlte.js"></script> 
    <script>
        function change(x){
            alert(x);
        document.getElementById('user_id').value = x;
        document.getElementById('edit_user').value = x;
        document.getElementById('username').value = x;
        }
    </script>
    </section>


    <!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<script>
  $(function () {
    $("#example1").DataTable({
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
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

</body>
</html>
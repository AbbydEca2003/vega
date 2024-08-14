
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Vega | People</title>
    @include('backend.dependency')

</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        
               @include('backend.topSidebar')
               <main class="app-main p-3">
                

            <!-- new table  -->
       <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <div class="col">
                <div class="card-title"><h1>Users</h1></div>
                </div>
                <div class="col d-flex justify-content-end">
                    <a class=" btn btn-primary" data-toggle="modal" data-target="#addUser"><i class="fas fa-user-plus" title="Add New User"> Add User</i></a>
                </div>
                
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
                <!-- Define i variable -->
                  @php 
                    $rownum=1
                  @endphp
                  @foreach($users as $user)
                  <tr>
                    <td>{{$rownum++}}</td>
                    <td>{{$user->name}}</td>
                    <td>{{$user->email}}</td>
                    <td>
                        @if($user->is_active==1)
                        
                        <span class="badge bg-success">Active</span>
                        @else
                        <span class="badge bg-warning">Inactive</span>
                        @endif
                        </td>
                    <td><div class="row">
                             <div class="col">
                                <a class=" btn btn-secondary" data-toggle="modal" data-target="#user_{{$user->id}}" onclick="change({{$user->id}})"><i class="fas fa-pen" title="Edit User data"></i></a>
                            </div>
                        </div></td>
                  </tr>
                   <!-- Modal Edit user model-->
         <div class="modal fade" id="user_{{$user->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="editUser">Edit User {{$user->name}}</h5>
            </div>
            <div class="modal-body">
            <form action="/editUser" method="post">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="username" value="{{$user->name}}">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email" value="{{$user->email}}">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
                    <div class="input-group mb-3">
                           
                        <div class="form-check form-switch">
                        Active Status
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $user->is_active == 1 ? 'checked' : '' }}>
                               
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="edit_user"value="{{$user->id}}" name="user_id">
                    <input type="submit" value="Update" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>
        </div>
                  @endforeach
                  </tbody>
                  <tfoot>
                  </tfoot>
                </table>


        
         <!-- New user model -->
         <div class="modal fade" id="addUser" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addUser">Add new User</h5>
            </div>
            <div class="modal-body">
                <form action="/setUser" method="post" id="{{$user->id}}">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="username" autocomplete="off">
                        <div class="input-group-text" > <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email" autofill="off" onfocus="this.value=''">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password" >
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

    <script>
        function change(x){
        document.getElementById('user_id').value = x;
        document.getElementById('edit_user').value = x;
        document.getElementById('username').value = x;
        }
    </script>
    </section>



@include('backend.successMessage')  

</body>
</html>
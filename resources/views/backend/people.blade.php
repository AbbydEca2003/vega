<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@fontsource/source-sans-3@5.0.12/index.css" integrity="sha256-tXJfXfp6Ewt1ilPzLDtQnJV4hclT9XuaZUKyUvmyr+Q=" crossorigin="anonymous"><!--end::Fonts--><!--begin::Third Party Plugin(OverlayScrollbars)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/overlayscrollbars@2.3.0/styles/overlayscrollbars.min.css" integrity="sha256-dSokZseQNT08wYEWiz5iLI8QPlKxG+TswNRD8k35cpg=" crossorigin="anonymous"><!--end::Third Party Plugin(OverlayScrollbars)--><!--begin::Third Party Plugin(Bootstrap Icons)-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.0/font/bootstrap-icons.min.css" integrity="sha256-Qsx5lrStHZyR9REqhUF8iQt73X06c8LGIUPzpOhwRrI=" crossorigin="anonymous"><!--end::Third Party Plugin(Bootstrap Icons)--><!--begin::Required Plugin(AdminLTE)-->
    <link rel="stylesheet" href="/css/adminlte.css"><!--end::Required Plugin(AdminLTE)--><!-- apexcharts -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/apexcharts@3.37.1/dist/apexcharts.css" integrity="sha256-4MX+61mt9NVvvuPjUWdUdyfZfxSB1/Rf9WtqRHgG5S0=" crossorigin="anonymous"><!-- jsvectormap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/jsvectormap@1.5.3/dist/css/jsvectormap.min.css" integrity="sha256-+uGLJmmTKOqBr+2E6KDYs/NRsHxSkONXFHUL0fy2O/4=" crossorigin="anonymous">
    <script>
        let global;
    </script>
  <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"
integrity="sha384q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo"
crossorigin="anonymous"></script> 
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" 
integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k"
crossorigin="anonymous"></script> 
    <title>Vega | About</title>
</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        
               @include('backend.topSidebar')
               <main class="app-main p-3">
                <button class=" btn btn-primary" data-toggle="modal" data-target="#addUser">+ Add User</button>
                <br><br>
                <div class="card">
                <div class="card-header">
                                    <h3 class="card-title"><h1>All Users</h1></h3>
                                    <div class="input-group">
                                        <input type="search" class="form-control rounded" placeholder="Search" aria-label="Search" aria-describedby="search-addon" />
                                        <button type="button" class="btn btn-outline-primary" data-mdb-ripple-init><i class="bi bi-search"></i> search</button>
                                    </div>
                                </div> <!-- /.card-header -->
                                <div class="card-body">{!! \Session::get('success') !!}
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Edit</th>
                                        </thead>
                                        <tbody>
                                        @foreach($users as $user)
                                            <tr class="align-middle">
                                                <td id="sn">{{$user->id}}.</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>{{$user->phone}}</td>
                                                <td>
                                                    <div class="row">
                                                        <div class="col">
                                                            <button class=" btn btn-primary" data-toggle="modal" data-target="#editUser">Edit</button>
                                                        </div>
                                                        <div class="col">
                                                            <button class="btn btn-danger" data-toggle="modal" data-target="#removeUser" onclick="disp({{$user->id}})">Delete</button>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>
                                            <!-- Modal -->
            <div class="modal fade" id="removeUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Remove this user from the system?</h5>
            </div>
            <div class="modal-body">
                User: {{$user->name}} <br>email: {{$user->email}}
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/removeUser" method="post" >
                    @csrf
                    <div id="row"></div>
                    <input type="submit" value="Delete" class="btn btn-danger" onclick="find()">
                </form>
            </div>
            </div>
        </div>
        </div>
         <!-- Modal -->
         <div class="modal fade" id="editUser" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="editUser">Edit User {{$user->name}}</h5>
            </div>
            <div class="modal-body">
            <form action="/editUser" method="post">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="username">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" placeholder="Email" name="email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="password" class="form-control" placeholder="Password" name="password">
                        <div class="input-group-text"> <span class="bi bi-lock-fill"></span> </div>
                    </div> <!--begin::Row-->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" value="qw">
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
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- /.card-body -->
                                </div>
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>
    <script src="js/adminlte.js"></script> 
    <script>
        function disp(n){
            
            global = n;
            document.getElementById('row').innerHTML = "<input type='hidden' id='row' name='row' value="+global+">";
        }
        function t(){
            return global;
        }
    </script>
        
        

</body>
</html>
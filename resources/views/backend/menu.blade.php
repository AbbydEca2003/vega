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
              
          <!-- Default box -->
<div class="card container">
  <div class="card-header">
    <div class="row">
        <div class="col">
            <div class="card-title"><h1>Menu</h1></div>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addMenu">+ Add</button>
                </div>
        </div>
    

  </div>
  <div class="card-body p-0">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 3%">
                    #
                </th>
                <th style="width: 20%">
                    Menu Name
                </th>
                <th style="width: 30%">
                    Created Date
                </th>
                <th style="width: 30%">
                    Updated Date
                </th>
                <th>
                    Status
                </th>
                <th style="width: 20%" class="text-center">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody> 
            @foreach($menu as $menus)
                <td>
                {{$menus->id}}
                </td>
                <td>
                {{$menus->menu_name}}
                </td>
                <td>
                    <small>
                    {{$menus->created_at}}
                    </small>
                </td>
                <td>
                    <small>
                    {{$menus->updated_at}}
                    </small>
                </td>
                <td class="project-state">
                    Publish
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#menu_{{$menus->id}}">Edit</button>
                <button class="btn btn-danger" data-toggle="modal" data-target="#removePage" onclick="change({{$menus->id}})">Delete</button>
                </td>
            </tr>
            <!-- model edit menu -->
    <div class="modal fade" id="menu_{{$menus->id}}" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addService">Edit menu item</h5>
            </div>
            <div class="modal-body">
            <form action="/editMenu" method="post">
                    @csrf
                    <div class="row">
                    <label for="name">Menu Title: </label>
                    <input type="text" placeholder="Name" value=" {{$menus->menu_name}}" name="menu_name" class="form-control">
                    <label for="name">Menu Link: </label>
                    <input type="text" placeholder="Link" value="{{$menus->link}}" name="menu_link" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="user_id" value="{{$menus->id}}" name="menu_id">
                    <input type="submit" value="Set" class="btn btn-primary">
                </form>
            </div>
            </div>
        </div>        
    </div>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
</div>
</main>

<div class="modal fade" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addMenu">Add new menu item</h5>
            </div>
            <div class="modal-body">
            <form action="/setMenu" method="post">
                    @csrf
                    <div class="row">
                    <label for="name">Menu Title: </label>
                    <input type="text" placeholder="Name" value="" name="title" class="form-control">
                    <label for="name">Menu Link: </label>
                    <input type="text" placeholder="Link" value="" name="link" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="submit" value="Add" class="btn btn-primary">
                </form>
            </div>
            </div>
        </div>        
    </div>
   

    <!-- Modal delete page-->
    <div class="modal fade" id="removePage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Remove this menuu from the system?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/removeMenu" method="post" >
                    @csrf
                    <input type="hidden" id="menu_id" name="menu_id">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
        </div>

        <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addService">Add new menu item</h5>
            </div>
            <div class="modal-body">
            <form action="/setMenu" method="post">
                    @csrf
                    <div class="row">
                    <label for="name">Menu Title: </label>
                    <input type="text" placeholder="Name" value="" name="title" class="form-control">
                    <label for="name">Menu Link: </label>
                    <input type="text" placeholder="Link" value="" name="link" class="form-control">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="user_id" name="user_id">
                    <input type="submit" value="Add" class="btn btn-primary">
                </form>
            </div>
            </div>
        </div>        
    </div>
    
    


 <script src="js/adminlte.js"></script> 
 <script>
        function change(x){
        document.getElementById('menu_id').value = x;
        document.getElementById('edit_menu').value = x;
        }
    </script>
        @include('backend.footer')  
        @include('backend.successMessage')  
    </body>
</html>
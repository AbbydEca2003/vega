<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vega | Menu</title>
    @include('backend.dependency')
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
            <button class="btn btn-primary" data-toggle="modal" data-target="#addMenu"><i class="fas fa-plus" title="Add new Menu"> Add Menu</i></button>
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
                <th style="width: 20%">
                    Created Date
                </th>
                <th style="width: 20%">
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
        <tbody> @php 
                    $rownum=1
                  @endphp
            @foreach($menu as $menus)
                <td>
                {{$rownum++}}
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
                @if($menus->is_active==1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#menu_{{$menus->id}}"><i class="fas fa-pen" title="Edit Menu"></i></button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#removePage" onclick="change({{$menus->id}})"><i class="fas fa-trash" title="Delete Menu"></i></button>
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
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="menu_name" value="{{$menus->menu_name}}">
                        <div class="input-group-text"> <span class="bi bi"></span> </div>
                    </div>
                    <label for="name">Menu Link: </label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Full Name" name="menu_link" value="{{$menus->link}}">
                        <div class="input-group-text"> <span class="bi bi-link"></span> </div>
                    </div>
                    <div class="form-check form-switch m-1">
                        <label for="active">Active Status</label>
                            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $menus->is_active == 1 ? 'checked' : '' }}>
                    </div>
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
            
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
</div>
</main>

<div class="modal fade p-3" id="addMenu" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
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
            <div class="form-check form-switch m-1">
                        <label for="active">Active Status</label>
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
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
   
    @endforeach
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
<!-- edit -->
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

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Vega | Slider</title>
    @include('backend.dependency')
</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
               @include('backend.topSidebar')
               <main class="app-main p-3">
               <div class="card container">
  <div class="card-header">
    <div class="row">
        <div class="col">
            <div class="card-title"><h1>Slides</h1></div>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addSlide"><i class="fas fa-plus" title="Add new Menu"> Add Slider</i></button>
                </div>
        </div>
        <hr>
  </div>
  <div class="card-body p-0">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 3%">
                    S.N
                </th>
                <th style="width: 20%">
                    Slider Name
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
            @foreach($slider as $slide)
                <td>
                {{$rownum++}}
                </td>
                <td>
                {{$slide->slide_title}}
                </td>
                <td>
                    <small>
                    {{$slide->created_at}}
                    </small>
                </td>
                <td>
                    <small>
                    {{$slide->updated_at}}
                    </small>
                </td>
                <td class="project-state">
                @if($slide->is_active==1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#slide_{{$slide->id}}"><i class="fas fa-pen" title="Edit Slide"></i></button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#removeSlide" onclick="change({{$slide->id}})"><i class="fas fa-trash" title="Delete Slide"></i></button>
                </td>
            </tr>
             <!-- Modal Edit slide model-->
             <div class="modal fade" id="slide_{{$slide->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editSlide">Edit Slide {{$slide->slide_title}}</h5>
            </div>
            <div class="modal-body">
            <form action="/editSlide" method="post">
                    @csrf
                    <label for="title">Slide title:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Slide Name" name="slide_title" value="{{$slide->slide_title}}">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <label for="subtitle">Slide subtitle:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="sub title" name="slide_sub_title" value="{{$slide->slide_sub_title}}">
                    </div>
                    <label for="title">Slide title:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" name="button_title" value="{{$slide->button_title}}">
                    </div>
                    <label for="button link">Button link:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" name="button_link" value="{{$slide->button_link}}">
                    </div>
                    <div class="input-group mb-3">
                           
                        <div class="form-check form-switch">
                        Active Status
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ $slide->is_active == 1 ? 'checked' : '' }}>
                               
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="hidden" id="edit_user"value="{{$slide->id}}" name="user_id">
                    <input type="submit" value="Update" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>
        </div>
        @endforeach
</table>
</div>
                
                </main><!--begin::Footer-->
                @include('backend.footer')          
</body>
<!-- new slide -->
<div class="modal fade p-3" id="addSlide" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSlide">Add new menu item</h5>
            </div>
            <div class="modal-body">
            <form action="/setSlide" method="post" enctype="multipart/form-data">
            @csrf
            <label for="title">Slide title:</label><label for="subtitle">Slide subtitle:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Slide Name" name="slide_title">
                        <div class="input-group-text"> <span class="bi bi-person"></span> </div>
                    </div>
                    <label for="subtitle">Slide subtitle:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="sub title" name="slide_sub_title">
                    </div>
                    <label for="button">Button name:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" name="button_title" placeholder="Button title">
                    </div>
                    <label for="button link">Button link:</label>
                    <div class="input-group mb-3"> <input type="text" class="form-control" name="button_link" placeholder="Button link">
                    </div>
                    <div class="form-group">
                        <label for="image">Upload Image</label>
                        <input type="file" class="form-control" id="image" name="image">
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-check form-switch">
                        Active Status
                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>   
                        </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <input type="submit" value="Set" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>        
    </div>
   
   
    <!-- Modal delete slide-->
    <div class="modal fade" id="removeSlide" tabindex="-1" role="dialog" aria-labelledby="" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Remove this Slide from the system?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/removeSlide" method="post" >
                    @csrf
                    <input type="hidden" id="id" name="slide_id">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
        </div>

    
 <script>
        function change(x){
        document.getElementById('id').value = x;
        document.getElementById('edit_menu').value = x;
        }
    </script>
    @include('backend.successMessage')  
</html>
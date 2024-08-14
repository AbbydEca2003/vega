
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
        
    
<div class="card">
  <div class="card-header">
    <div class="row">
        <div class="col">
            <div class="card-title"><h1>Pages</h1></div>
        </div>
        <div class="col d-flex justify-content-end">
            <a href="/newPage"><button class="btn btn-primary"><i class="fas fa-plus"> Add Page</i></button><br><br></a>
        </div>
    </div>
    
  </div>
  <div class="card-body p-3">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 3%">
                    #
                </th>
                <th style="width: 30%">
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
                <th class="text-center">
                    Edit
                </th>
            </tr>
        </thead>
        <tbody> 
            @php 
                $rownum=1
            @endphp
            @foreach($page as $pages)
                <td>
                {{$rownum++}}
                </td>
                <td>
                {{$pages->title}}
                </td>
                <td>
                <small>
                    {{$pages->created_at}}
                    </small>
                </td>
                <td>
                <small>
                    {{$pages->updated_at}}
                    </small>
                </td>
                <td class="project-state">
                @if($pages->status==1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </td>
                <td class="project-actions text-right d-flex">
                    <form action="/editPage" method="post">
                        @csrf
                        <input type="hidden" value="{{$pages->id}}" name="page_id">
                        <input type="hidden" value="{{$pages->title}}" name="page_title">
                        <input type="hidden" value="{{$pages->status}}" name="page_status">
                        <button type="submit" class="btn btn-secondary"><i class='fas fa-pen' title="Edit Page"></i></button>
                    </form>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#removePage" onclick="change({{$pages->id}})"><i class="fas fa-trash" title="Delete Page"></i></button>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
                </main><!--begin::Footer-->
                @include('backend.footer')   
                @include('backend.successMessage')         
    </div>

    <script>
        function change(x){
        document.getElementById('page_id').value = x;
        document.getElementById('edit_user').value = x;
        }
    </script>

     <!-- Modal delete page-->
     <div class="modal fade" id="removePage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Remove this page from the system?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/removePage" method="post" >
                    @csrf
                    <input type="hidden" id="page_id" name="page_id">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
        </div>

            
</body>
</html>
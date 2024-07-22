
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
        <button class="btn btn-danger" data-toggle="modal" data-target="#addService">+ Add</button><br><br>
       <!-- service box -->
       @foreach($service as $services)
        <form action="/editService" method="post" class="card p-3" onsubmit="return confirm('Do you want to continue save change?');">
            @csrf
            <div class="row">
                <div class="col-1">
                    <label for="title">Title: </label>
                </div>
                <div class="col">
                    <input type="text" placeholder="Title" name="title" value="{{$services-> title}}"><br>
                </div>
            </div>
            <div class="row">
                <div class="col-1">
                    <label for="description">Description: </label>
                </div>
                <div class="col">
                    <textarea name="message" id="message" placeholder="Service Description here">{{$services-> message}}</textarea><br>
                </div>
            </div>
            <div class="col-3">
                <input type="hidden" name="user_id" value="{{$services-> id}}">
                <input type="submit" value="Delete" class="btn btn-danger" name="submit">
                <input type="submit" value="Save" class="btn btn-primary" name="submit">
            </div>
        </form>
        @endforeach
       </div>
       <div class="modal fade" id="addService" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">

                <h5 class="modal-title" id="addService">Add new services</h5>
            </div>
            <div class="modal-body">
            
            <form action="/setService" method="post">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" placeholder="Title" name="title" >
                        <div class="input-group-text"> </div>
                    </div>
                    <div class="input-group mb-3"> <textarea name="message" id="message" placeholder="Service Description here" class="form-control" placeholder="Message" name="message"></textarea>
                        <div class="input-group-text"> </div>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Set</button>
            </form>
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
        }
    </script>
        
        

</body>
</html>
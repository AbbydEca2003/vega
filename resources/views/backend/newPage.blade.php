
<!DOCTYPE html>
<html lang="en">
<head>
    <title>Vega | New Page</title>
    @include('backend.dependency')
</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
        @include('backend.topSidebar')
        <main class="app-main p-3">
        <div class="card container">
    <div class="card-header">
      <h3 class="card-title">Details</h3>
    </div>
    <!-- /.card-header -->
    <!-- form start -->
    <form action="/createPage" method="post">
      <div class="card-body">
        <div class="form-group">
          @csrf
          <label for="pagr_name">Page name</label>
          <input type="text" class="form-control" id="" placeholder="Enter page name" name="title">
        </div>
        <div class="form-group">
          <label for="exampleInputPassword1">Page link</label>
          <input type="text" class="form-control" id="" placeholder="">
        </div>
        <div class="form-group">
          <label for="exampleInputFile">Page Logo</label>
          <div class="input-group"><br><br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="" disabled>
          </div>
        </div>
        <div class="form-check">
        <div class="form-check form-switch">
            <label class="form-check-label" for="">Publish this site</label>
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
         </div>
        </div>
        <div>
          <div class="card-body container">
            <textarea id="summernote" name="code">
            
            </textarea>
          </div>
        </div>
       <footer class=" d-flex justify-content-end">
          <input type="submit" value="Save" class="btn btn-primary m-1">
       </footer>
    </form>
  </div>
</div>
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>

    <script src="js/adminlte.js"></script> 
</body>
</html>
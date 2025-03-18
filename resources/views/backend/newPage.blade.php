
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
        <div class="row">
          <div class="col">
            <div class="form-group">
              @csrf
              <label for="pagr_name">Page name</label>
              <input type="text" class="form-control" id="" placeholder="Enter page name" name="title" required>
            </div>
          </div>
          <div class="col">
            <div class="form-group">
              <label for="">Page Rank</label>
              <input type="number" class="form-control" id="" placeholder="">
            </div>
          </div>
        </div>
       
        <br>
        <div class="form-check">
        <div class="form-check form-switch">
            <label class="form-check-label" for="">Publish this content</label>
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
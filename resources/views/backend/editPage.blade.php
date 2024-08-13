<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Edit</title>
  
</head>
<body class="hold-transition sidebar-mini">
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
          <label for="pageName">Page name</label>
          <input type="text" class="form-control" id="" placeholder="Enter page name" name="title" value="{{$title}}" disabled>
        </div>
        <div class="form-group">
          <label for="pageLink">Page link</label>
          <input type="text" class="form-control-plaintext" id="" placeholder="link" disabled>
        </div>
        <div class="form-group">
          <label for="pageLogo">Page Logo</label>
          <div class="input-group"><br><br>
            <div class="custom-file">
              <input type="file" class="custom-file-input" id="" disabled>
          </div>
        </div>
        <div class="form-check">
        <div class="form-check form-switch">
            <label class="form-check-label" for="">Publish this site</label>
            @if($status == 1)
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" checked>
            @else
            <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1">
            @endif
         </div>
        </div>
        <div>
          <div class="card-body container">
            <textarea id="summernote" name="code">
              {{$fileContent}}
            </textarea>
          </div>
        </div>
       <footer class="d-flex justify-content-end">
          <input type="submit" value="Save" class="btn btn-primary m-1">
       </footer>
    </form>
  </div>
</div>
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>
  
</div>

@include('backend.dependency')

</body>
</html>

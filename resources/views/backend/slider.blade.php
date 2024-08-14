
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
            <div class="card-title"><h1>Slider</h1></div>
        <div class="col d-flex justify-content-end">
            <button class="btn btn-primary" data-toggle="modal" data-target="#addMenu"><i class="fas fa-plus" title="Add new Menu"> Add Slider</i></button>
                </div>
        </div>
        
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
            @foreach($slider as $sliders)
                <td>
                {{$rownum++}}
                </td>
                <td>
                {{$sliders->slide_title}}
                </td>
                <td>
                    <small>
                    {{$sliders->created_at}}
                    </small>
                </td>
                <td>
                    <small>
                    {{$sliders->updated_at}}
                    </small>
                </td>
                <td class="project-state">
                @if($sliders->is_active==1)
                        <span class="badge bg-success">Active</span>
                    @else
                        <span class="badge bg-warning">Inactive</span>
                    @endif
                </td>
                <td class="project-actions text-right">
                <button class="btn btn-secondary"  data-toggle="modal" data-target="#slider_{{$sliders->id}}"><i class="fas fa-pen" title="Edit Slide"></i></button>
                <button class="btn btn-primary" data-toggle="modal" data-target="#removePage" onclick="change({{$sliders->id}})"><i class="fas fa-trash" title="Delete Slide"></i></button>
                </td>
            </tr>@endforeach
</table>
</div>
                </main><!--begin::Footer-->
                @include('backend.footer')          
    
   
</body>
</html>
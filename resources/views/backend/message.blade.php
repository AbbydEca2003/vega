<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <title>Vega | Messages</title>
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
            <div class="card-title"><h1>Messages</h1></div>
        </div>
    </div>
    
  </div>
  <div class="card-body p-3">
    <table id="example1" class="table table-bordered table-striped">
        <thead>
            <tr>
                <th style="width: 3%">
                    S.N
                </th>
                <th style="width: 10%" class="text-center">
                    Name
                </th>
                <th style="width: 10%" class="text-center">
                    Emil
                </th>
                <th style="width: 10%" class="text-center">
                    Phone
                </th>
                <th class="text-center">
                    Message
                </th>
                <th class="text-center" style="width: 5%"> 
                    Edit
                </th>
            </tr>
        </thead>
        <tbody> 
            @php 
                $rownum=1
            @endphp
            @foreach($message as $message)
                <td>
                {{$rownum++}}
                </td>
                <td>
                {{$message->name}}
                </td>
                <td>
                    {{$message->email}}
                </td>
                <td>
                    {{$message->phone}}
                </td>
                <td>
                    {{$message->message}}
                </td>
                <td class="project-actions text-right d-flex">
                    <form action="/editPage" method="post">
                        @csrf
                        <input type="hidden" value="{{$message->id}}" name="page_id">
                        <input type="hidden" value="{{$message->title}}" name="page_title">
                        <input type="hidden" value="{{$message->status}}" name="page_status">
                        <button type="submit" class="btn btn-secondary"><i class='fas fa-reply' title="Edit Page"></i></button>
                    </form>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#removePage" onclick="change({{$message->id}})"><i class="fas fa-trash" title="Delete"></i></button>
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
    </div>
   
</body>
</html>
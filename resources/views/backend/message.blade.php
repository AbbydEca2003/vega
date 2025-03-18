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
                    <button class="btn btn-secondary" data-toggle="modal" data-target="#sendReplyPage" onclick="change({{$message->id}})"><i class="fas fa-reply" title="Reply"></i></button>
                    <button class="btn btn-primary" data-toggle="modal" data-target="#removePage" onclick="change({{$message->id}})"><i class="fas fa-trash" title="Delete"></i></button>
                </td>   
            </tr>
            @endforeach
        </tbody>
    </table>
  </div>
  <!-- /.card-body -->
</div>
    @include('backend.successMessage')  
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>

    <!-- Modal send reply message-->
   <div class="modal fade" id="sendReplyPage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Send</h5>
            </div>
            <div class="modal-body">
                <form action="/" method="post" >
                    @csrf
                    <input type="hidden" id="message_id" name="message_id">
                    <input type="text" value="{{$message->title}}" name="email" class="form-control" disabled>
                    <label for="subject">Subject</label>
                    <input type="text" value="{{$message->status}}" name="subject" class="form-control">
                    <label for="message">Message</label>
                    <textarea class="form-control"></textarea>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                
                   
                    <input type="submit" value="Send" class="btn btn-primary">
                </form>
            </div>
            </div>
        </div>
    </div>

   <!-- Modal delete message-->
   <div class="modal fade" id="removePage" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="removeUser">Remove this message from the system?</h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <form action="/removeMessage" method="post" >
                    @csrf
                    <input type="hidden" id="message_id" name="message_id">
                    <input type="submit" value="Delete" class="btn btn-danger">
                </form>
            </div>
            </div>
        </div>
    </div>
    <script>
    function change(x){
        document.getElementById('message_id').value = x;
    }
</script>
    
</body>
</html>
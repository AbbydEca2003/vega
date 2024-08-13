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
                   
                   <div class="col">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title"><h1>Messages</h1></h3>
                                </div> <!-- /.card-header -->
                                <div class="card-body">
                                    <table class="table table-bordered">
                                        <thead>
                                            <tr>
                                                <th style="width: 10px">#</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Phone</th>
                                                <th>Message</th>
                                                <th>Reply</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($message as $message)
                                            <tr class="align-middle">
                                                <td>{{$message->id}}.</td>
                                                <td>{{$message->name}}</td>
                                                <td>{{$message->email}}</td>
                                                <td>
                                                    {{$message->phone}}
                                                </td>
                                                <td>
                                                    {{$message->message}}
                                                </td>
                                                <td>
                                                    <button class="btn btn-primary"  data-toggle="modal" data-target="#sendMessage">Reply</button>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div> <!-- /.card-body -->
                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>
    <script src="js/adminlte.js"></script> 
    <!-- Modal -->
    <div class="modal fade" id="sendMessage" tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="sendMessage">Mail</h5>
            </div>
            <div class="modal-body">
                <form action="/" method="post">
                    @csrf
                    <div class="input-group mb-3"> <input type="text" class="form-control" value="Full Name" name="username">
                        <div class="input-group-text" > <span class="bi bi-person"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <input type="email" class="form-control" value="{{$message->email}}" name="email">
                        <div class="input-group-text"> <span class="bi bi-envelope"></span> </div>
                    </div>
                    <div class="input-group mb-3"> <textarea name="message" id=""  class="form-control" placeholder="Your message..."></textarea>
                        <div class="input-group-text"> </div>
                    </div> <!--begin::Row-->
            </div>
            <div class="modal-footer">
                    <button class="btn btn-danger" data-dismiss="modal">Close</button>
                    <input type="submit" value="Send" class="btn btn-primary" >
                </form>
            </div>
            </div>
        </div>
        </div>
</body>
</html>
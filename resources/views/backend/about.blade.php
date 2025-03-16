<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vega | About</title>
    @include('backend.dependency')
</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
               @include('backend.topSidebar')
               <main class="app-main p-3 ">
                    
                    <div class="card container">
                                <div class="card-header ">
                                    <div class="card-title"></div>
                                    <h1>About Company</h1><hr>
                    <form action="/setAbout" method="post" id="aboutForm" enctype="multipart/form-data">
                        @csrf
                    @foreach($about as $abouts)
                   
                        <div class="row">
                            <div class="col-2"><label for="Company_name">Company Name:</label></div>

                            <div class="col"><input type="text" placeholder="Company name" name="company_name" value="{{$abouts-> Company_name}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="Office">Office address:</label></div>
                            <div class="col"><input type="text" placeholder="Office" name="office" value="{{$abouts-> address}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="phone">Phone Number:</label></div>
                            <div class="col"><input type="text" placeholder="Phone number" name="phone" value="{{$abouts-> phone}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="email">Email:</label></div>
                            <div class="col"><input type="email" placeholder="Email" name="email" value="{{$abouts-> email}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="twiter">Twiter:</label></div>
                            <div class="col"><input type="text" placeholder="Twitter" name="twitter" value="{{$abouts-> twitter}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="facebook">Facebook:</label></div>
                            <div class="col"><input type="text" placeholder="Facebook" name="facebook" value="{{$abouts-> facebook}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="linkedin">Linkedin:</label></div>
                            <div class="col"><input type="text" placeholder="Linkedin" name="linkedin" value="{{$abouts-> linkedin}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="privacy_policy">Privacy Policy:</label></div>
                            <div class="col"><input type="text" placeholder="privacy policy" name="privacy_policy" value="{{$abouts-> privacy_policy}}" class="form-control" required></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="terms_of_use">Terms of Use:</label></div>
                            <div class="col"><input type="text" placeholder="terms of use" name="terms_of_use" value="{{$abouts-> terms_of_use}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="logo">Site Logo:</label></div>
                            <div class="col"><input type="file" placeholder="logo" name="logo" value="" class="form-control"></div>
                        </div><br>
                        <div class="col d-flex justify-content-end">
                        <input type="reset"  class="btn btn-secondary m-1" value="Reset Default">
                        <button type="submit"  class="btn btn-primary m-1"><i class="fa fa-life-ring"></i> Save as</button>
                        </div>
                    @endforeach
                       
                    </form>
                    
                    </div>
                </div>


                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>
</div>
@include('backend.successMessage')  

</body>
</html>
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
    <title>Vega | About</title>
</head>
<body>
    <div class="layout-fixed sidebar-expand-lg bg-body-tertiary">
               @include('backend.topSidebar')
               <main class="app-main p-3 ">
                    <h2 class="text-success">{!! \Session::get('success') !!}</h2>
                    <form action="/setAbout" method="post">
                        @csrf
                    @foreach($about as $abouts)
                   
                        <div class="row">
                            <div class="col-2"><label for="Company_name">Company Name:</label></div>

                            <div class="col"><input type="text" placeholder="Company name" name="company_name" value="{{$abouts-> Company_name}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="Office">Office address:</label></div>
                            <div class="col"><input type="text" placeholder="Office" name="office" value="{{$abouts-> address}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="phone">Phone Number:</label></div>
                            <div class="col"><input type="text" placeholder="Phone number" name="phone" value="{{$abouts-> phone}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="email">Email:</label></div>
                            <div class="col"><input type="email" placeholder="Email" name="email" value="{{$abouts-> email}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="twiter">Twiter:</label></div>
                            <div class="col"><input type="text" placeholder="Twitter" name="twitter" value="{{$abouts-> twitter}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="facebook">Facebook:</label></div>
                            <div class="col"><input type="text" placeholder="Facebook" name="facebook" value="{{$abouts-> facebook}}" class="form-control"></div>
                        </div>
                        <div class="row">
                            <div class="col-2"><label for="linkedin">Linkedin:</label></div>
                            <div class="col"><input type="text" placeholder="Linkedin" name="linkedin" value="{{$abouts-> linkedin}}" class="form-control"></div>
                        </div>
                        <input type="submit"  class="btn btn-primary">
                    @endforeach
                       
                    </form>
                    <h4 class="text-danger">{{$errors->first()}}</h4>


                </main><!--begin::Footer-->
                @include('backend.footer')          
    </div>
    <script src="js/adminlte.js"></script> 
</body>
</html>
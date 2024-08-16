<div class="app-wrapper"> <!--begin::Header-->
    <nav class="app-header navbar navbar-expand bg-body"> <!--begin::Container-->
            <div class="container-fluid"> <!--begin::Start Navbar Links-->
                <ul class="navbar-nav">
                    <li class="nav-item"> <a class="nav-link" data-lte-toggle="sidebar" href="#" role="button"> <i class="bi bi-list"></i> </a> </li>
                </ul> <!--end::Start Navbar Links--> <!--begin::End Navbar Links-->
                <ul class="navbar-nav ms-auto"> <!--begin::Navbar Search--> 
                    <li class="nav-item"> <a class="nav-link" href="#" data-lte-toggle="fullscreen"> <i data-lte-icon="maximize" class="bi bi-arrows-fullscreen"></i> <i data-lte-icon="minimize" class="bi bi-fullscreen-exit" style="display: none;"></i> </a> </li> <!--end::Fullscreen Toggle--> <!--begin::User Menu Dropdown-->
                    <li class="nav-item dropdown user-menu"> <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown"><span class="d-none d-md-inline">{{auth()->user()->name}}</span> </a></li>
                    <a href="/logout" class="btn btn-secondary text-white">Sign out</a> 
                </ul> <!--end::End Navbar Links-->
            </div> <!--end::Container-->
        </nav> <!--end::Header--> <!--begin::Sidebar-->
        
<!--begin::Sidebar-->
        
<aside class="app-sidebar bg-body-secondary shadow" data-bs-theme="light"> <!--begin::Sidebar Brand-->
            <div class="sidebar-brand"> <!--begin::Brand Link--> <a href="/admin" class="brand-link"> <!--begin::Brand Image--> <img src="/assets/vega logoO.png" alt="VegaLogo" class="brand-image opacity-75"> <!--end::Brand Image--> </a>  </div> 
            <div class="sidebar-wrapper">
                <nav class="mt-2"> <!--begin::Sidebar Menu-->
                    <ul class="nav sidebar-menu flex-column" data-lte-toggle="treeview" role="menu" data-accordion="false">
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/admin" class="nav-link"> <i class="nav-icon bi bi-speedometer"></i>
                                        <p>Home</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/about" class="nav-link"> <i class="nav-icon bi bi-tree-fill"></i>
                                        <p>About US</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/message" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                        <p>Messages</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/user" class="nav-link"> <i class="nav-icon bi bi-box-arrow-in-right"></i>
                                        <p>Users</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/page" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                        <p>Pages</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/menu" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                        <p>Menu</p>
                                    </a> </li>
                        </li>
                        <li class="nav-item nav-treeview"> 
                            <li class="nav-item"> <a href="/slide" class="nav-link"> <i class="nav-icon bi bi-pencil-square"></i>
                                        <p>Slider</p>
                                    </a> </li>
                        </li>
                        <li class="user-footer"><a href="/logout" class="btn btn-secondary text-white">Sign out</a> </li> <!--end::Menu Footer-->
                    </ul> <!--end::Sidebar Menu-->
                </nav>
            </div> <!--end::Sidebar Wrapper-->
        </aside> <!--end::Sidebar--> <!--begin::App Main-->
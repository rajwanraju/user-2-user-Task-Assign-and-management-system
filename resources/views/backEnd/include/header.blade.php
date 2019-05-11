<nav class="navbar">
    <div class="container-fluid">
        <div class="navbar-header">
            <a href="javascript:void(0);" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse" aria-expanded="false"></a>
            <a href="javascript:void(0);" class="bars"></a>
               @role('superadmin')
            <a class="navbar-brand" href="{{url('super-admin/homePage')}}">
               
                <span class="logo-name">OTS</span>
            </a>
                @endrole

                   @role('admin')

            <a class="navbar-brand" href="{{url('admin/homePage')}}">
   
                <span class="logo-name">OTS</span>
            </a>

                 @endrole

   @role('TeamLeader')

            <a class="navbar-brand" href="{{url('teamLeader/homePage')}}">
            
                <span class="logo-name">OTS</span>
            </a>

     @endrole  

     @role('TeamMember')

            <a class="navbar-brand" href="{{url('teamMember/homePage')}}">
           
                <span class="logo-name">OTS</span>
            </a>

     @endrole

        </div>
        <div class="collapse navbar-collapse" id="navbar-collapse">
            
            <ul class="nav navbar-nav navbar-right">
                <!-- Full Screen Button -->
                <li class="fullscreen">
                    <a href="javascript:;" class="fullscreen-btn">
                        <i class="fas fa-expand-arrows-alt"></i>
                    </a>
                </li>
                <!-- #END# Full Screen Button -->
                <!-- Notifications -->
                <li class="dropdown">
                   
                    <ul class="dropdown-menu pullDown">
                        <li class="header">NOTIFICATIONS</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-light-green">
                                            <i class="material-icons">person_add</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">12 new members joined</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-cyan">
                                            <i class="material-icons">add_shopping_cart</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">4 sales made</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-red">
                                            <i class="material-icons">delete_forever</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">
                                                <b>Nancy Doe</b> deleted account</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-orange">
                                            <i class="material-icons">mode_edit</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">
                                                <b>Nancy</b> changed name</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-blue-grey">
                                            <i class="material-icons">comment</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">
                                                <b>John</b> commented your post</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-light-green">
                                            <i class="material-icons">cached</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">
                                                <b>John</b> updated status</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="icon-circle bg-purple">
                                            <i class="material-icons">settings</i>
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Settings updated</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> Yesterday
                                            </span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Notifications</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Notifications -->
                <!-- #START# Message-->
                <li class="dropdown">
                   
                    <ul class="dropdown-menu pullDown">
                        <li class="header">MESSAGES</li>
                        <li class="body">
                            <ul class="menu">
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user7.png" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Sarah Smith</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 14 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user2.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Airi Satou</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 22 mins ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user3.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user4.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Ashton Cox</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 2 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user5.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Cara Stevens</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 4 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user6.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">Charde Marshall</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> 3 hours ago
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <span class="table-img msg-user">
                                            <img src="{{asset('backEnd/')}}/assets/images/user/user7.jpg" alt="">
                                        </span>
                                        <span class="menu-info">
                                            <span class="menu-title">John Doe</span>
                                            <span class="menu-desc">
                                                <i class="material-icons">access_time</i> Yesterday
                                            </span>
                                            <span class="menu-desc">Please check your email.</span>
                                        </span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <li class="footer">
                            <a href="javascript:void(0);">View All Messages</a>
                        </li>
                    </ul>
                </li>
                <!-- #END# Message-->
                <li class="dropdown user_profile">
                    <a href="javascript:void(0);" class="dropdown-toggle" data-toggle="dropdown" role="button">
                        <img src="{{asset('backEnd/')}}/assets/images/user7.png" width="32" height="32" alt="User">
                    </a>
                    <ul class="dropdown-menu pullDown">
                        <li class="body">
                            <ul class="user_dw_menu">
                                <li>
                                    <a href="{{url('user/profile')}}">
                                        <i class="material-icons">person</i>Profile
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">feedback</i>Feedback
                                    </a>
                                </li>
                                <li>
                                    <a href="javascript:void(0);">
                                        <i class="material-icons">help</i>Help
                                    </a>
                                </li>
                                <li>
                                  <a class="tooltips"  data-toggle="tooltip" title="Logout" href="{{ route('logout') }}"
                                     onclick="event.preventDefault();
                                                   document.getElementById('logout-form').submit();">
                                      <i class="fas fa-sign-out-alt sidebarQuickIcon"></i>Logout
                                  </a>

                                  <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                      @csrf
                                  </form>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </li>
                <!-- #END# Tasks -->
                <li class="pull-right">
                    &nbsp;
                    &nbsp;
                    &nbsp;
                </li>
            </ul>
        </div>
    </div>
</nav>

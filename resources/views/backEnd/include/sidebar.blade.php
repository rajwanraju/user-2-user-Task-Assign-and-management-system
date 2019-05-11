<aside id="leftsidebar" class="sidebar">
    <!-- Menu -->
    <div class="menu">
        <ul class="list">




  @php

            $data = Auth::user()->id;

     


            @endphp



  @role('TeamMember')

            <li class="sidebar-user-panel active">
                <div class="user-panel">
                    <div class=" image">
                     
                      

                     

                        <img src="{{asset('backEnd/')}}/assets/images/user7.png" class="img-circle user-img-circle" alt="User Image" />
                  
                    </div>
                </div>
                <div class="profile-usertitle">
                    <div class="sidebar-userpic-name">{{Auth::user()->name}}</div>
                    
                </div>
            
            </li>
            @endrole

  @role('TeamLeader')

           <li class="sidebar-user-panel active">
                <div class="user-panel">
                    <div class=" image">
                   

                        <img src="{{asset('backEnd/')}}/assets/images/user7.png" class="img-circle user-img-circle" alt="User Image" />
                 
                    </div>
                </div>
                <div class="profile-usertitle">
                    <div class="sidebar-userpic-name">{{Auth::user()->name}}</div>
                    
                </div>
               
            </li>


 @endrole

           
            <li class="{{ Request::path() == 'super-admin/homePage' ? 'active' : '' }}">
            @role('superadmin')

            <a href="{{url('super-admin/homePage')}}" class="menu-toggle">
                <i class="fas fa-tachometer-alt"></i>
                <span>Home</span>
            </a>

            @endrole
            @role('admin')

            <a href="{{url('admin/homePage')}}" class="menu-toggle">
                <i class="fas fa-tachometer-alt"></i>
                <span>Home</span>
            </a>

            @endrole
            @role('TeamMember')

            <a href="{{url('teamMember/homePage')}}" class="menu-toggle">
                <i class="fas fa-tachometer-alt"></i>
                <span>Home</span>
            </a>

            @endrole
            @role('TeamLeader')

            <a href="{{url('teamLeader/homePage')}}" class="menu-toggle">
                <i class="fas fa-tachometer-alt"></i>
                <span>Home</span>
            </a>

            @endrole

            </li>
  


       

        @role('TeamLeader')

            <li><a class="" href="{{url('teamLeader/team-members')}}"> <i class="far fa-calendar"></i><span>Member List</span></a></li>
      
            <li><a class="" href="{{url('teamLeader/task-list')}}"> <i class="far fa-calendar"></i><span>Task List</span></a></li>
            <li><a class="" href="{{url('teamLeader/task-done-list')}}"> <i class="far fa-calendar"></i><span>Task Done List</span></a></li>
          
         

@endrole


        @role('TeamMember')


      
            <li><a class="" href="{{url('teamMember/task-list')}}"> <i class="far fa-calendar"></i><span>Task List</span></a></li>
            <li><a class="" href="{{url('teamMember/task-done-list')}}"> <i class="far fa-calendar"></i><span>Task Done List</span></a></li>
         
           

@endrole 


 @role('superadmin')
 <li><a class="" href="{{url('super-admin/newTask')}}"> <i class="far fa-calendar"></i><span>Add New Task</span></a></li>

  <li><a class="" href="{{url('super-admin/task-Categories')}}"> <i class="far fa-calendar"></i><span>Task Category</span></a></li>

            <li><a class="" href="{{url('super-admin/teamLeaders')}}"> <i class="far fa-calendar"></i><span>Team Leader List</span></a></li>
             <li><a class="" href="{{url('super-admin/taskList')}}"> <i class="far fa-calendar"></i><span>Task List</span></a></li>
            <li><a class="" href="{{url('super-admin/task-done-list')}}"> <i class="far fa-calendar"></i><span>Task Done List</span></a></li>
         
            
@endrole



        






            
                </ul>

    </div>
    <!-- #Menu -->
</aside>

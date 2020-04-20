
 
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
               
                        <p > <i class="nav-icon fas fa-tachometer-alt "></i>
                        <span style="margin-right:10px;" >الرئيسية</span> 
                       
                            <i class="right fas fa-angle-left"></i>
                        </p>     
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="./index.html" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v1</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li>
                       
                    </ul>
                </li>
              

{{-- users--}}

                 <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">
                       
                        <p>
                        <i class=" nav-icon fa fa-users  "></i>
                           <span style="margin-right:10px;">التحكم في الأعضاء</span>  
                           <i class="right fas fa-angle-left  "></i>
                        </p>
                       
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/Adminpanel/users/create')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                                <p> اضافة عضو </p>     
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/Adminpanel/users')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p> كل الأعضاء </p>
                               
                            </a>
                        </li>
                       
                    </ul>
                </li>




            </ul>
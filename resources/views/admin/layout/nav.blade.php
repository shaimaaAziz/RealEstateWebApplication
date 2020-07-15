
 
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link active">
               
                        <p > <i class="nav-icon fas fa-tachometer-alt "></i>
                        <span class="glyphicon glyphicon-home"  style="margin-right:10px;" >الرئيسية</span> 
                       
                            <i class="right fas fa-angle-left"></i>
                        </p>     
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="/AdminDashboard" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p>لوحة التحكم </p>
                            </a>
                        </li>
                        {{-- <li class="nav-item">
                            <a href="./index2.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Dashboard v2</p>
                            </a>
                        </li> --}}
                       
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
                            <a href="{{ url('/admin/Adminpanel/users/create')}}" class="nav-link ">
                            <i class="far fa-circle nav-icon"></i>
                                <p> اضافة عضو </p>     
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/Adminpanel/users')}}" class="nav-link">
                            <i class="far fa-circle nav-icon"></i>
                                <p> كل الأعضاء </p>
                               
                            </a>
                        </li>
                       
                    </ul>
                </li>

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">

                        <p>
                            <i class=" nav-icon fa fa-users  "></i>
                            <span style="margin-right:10px;">التحكم في العقارات</span>
                            <i class="right fas fa-angle-left  "></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ url('/admin/Adminpanel/Property/create')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> اضافة عقار </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/Adminpanel/Property')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> كل العقارات </p>

                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/admin/Adminpanel/reservations')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>  الحجوزات </p>

                            </a>
                        </li>
                    </ul>
                </li>

            <li class="nav-item {{Request::is('admin/favorite')?'active':''}}">
                <a class="nav-link"  href="{{ url('/admin/favorite')}}">
                    <i class="material-icons">favorite</i>
                    <p style="margin-right:10px;">المفضلة </p>
                </a>
   
            </li>

            <li class="nav-item {{ Request::is('admin/contact*') ? 'active': '' }}">
                <a class="nav-link" href="{{ route('contact.index') }}">
                    <i class="material-icons">message</i>
                    <p style="margin-right:10px;">التواصل</p>
                </a>
            </li>

            <li >
                <a class="nav-link" href="{{ route('properties.rating') }}">
                    <i class="material-icons">star</i>
                    <p style="margin-right:10px;">التقيمات</p>
                </a>
            </li>
            </ul>
       
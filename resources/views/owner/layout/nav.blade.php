
 
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->

                <li class="nav-item has-treeview menu-open">
                    <a href="#" class="nav-link ">

                        <p>
                            <i class=" nav-icon fa fa-users  "></i>
                            <span style="margin-right:10px;">التحكم في بياناتي</span>
                            <i class="right fas fa-angle-left  "></i>
                        </p>

                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('users.show',1)}}" class="nav-link">

{{--                                                        <a href="{{route('users.edit',Auth::user()->id)}}" class="nav-link ">--}}
                                <i class="far fa-circle nav-icon"></i>
                                <p> تعديل بياناتي </p>
                            </a>
                        </li>
                        <li class="nav-item">
{{----}}
                                                        <a href="{{ route('users.show',1)}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> عرض بياناتي </p>

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
                            <a href="{{ url('/owner/Ownerpanel/Property/create')}}" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p> اضافة عقار </p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/owner/Ownerpanel/Property')}}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p> كل العقارات </p>

                            </a>
                        </li>

                    </ul>
                </li>


            </ul>

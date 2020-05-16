@extends('owner.layout.layout')

@section('title')
    عرض بياناتي

@endsection

@section('header')


@endsection

@section('content')

    <section class="content">



        <div class="container">

            <br />
            <h3 align="center">عرض بياناتي</h3>
            <br />

            <div class="jumbotron text-center">

                <br />
                <div class="row"  >
                    <div class="block-content" style=" direction: rtl;">
                        <h6 class="title" style="font-size: 15px"><a href="" tabindex="0">   {{$user->firstName}} </a></h6>

                        <div class="product-info">
                            <ul class="list-inline" >
                                <li class="author"><span>الاسم الاول:</span><span class="text">{{$user->firstName}}</span></li>
                                <li class="author"><span>اسم الأب:</span><span class="text">{{$user->middleName}}</span></li>
                                <li class="author"><span>اسم العائلة:</span><span class="text">{{$user->lastName}}</span></li>
                                <li class="author"><span>البريد الالكتروني:</span><span class="text">{{$user->email}}</span></li>
                                <li class="author"><span>رقم الجوال:</span><span class="text">{{$user->mobile}}</span></li>
                                <li class="author"><span> المدينة:</span><span class="text">

                                                @if($user->city==0)
                                            {{'غزة'}}
                                        @elseif($user->city==1)
                                            {{'رفح'}}
                                        @elseif($user->city==2)
                                            {{'خانيونس'}}
                                        @elseif($user->city==3)
                                            {{'وسطى'}}
                                        @endif

                                            </span></li>
                                <li class="author"><span> العنوان: </span><span class="text">{{$user->street}}</span></li>
                                <li class="rating"><a href="" tabindex="0"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>        </div>





    </section>
    <!-- /.content -->

@endsection




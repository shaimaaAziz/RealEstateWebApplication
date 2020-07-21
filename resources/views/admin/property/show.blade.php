@extends('admin.layout.layout')

@section('title')
    عرض عقار

@endsection

@section('header')


@endsection

@section('content')

    <section class="content">



        <div class="container">

            <br />
            <h3 align="center">عرض تفاصيل العقار</h3>
            <br />

            <div class="jumbotron text-center">
                <div align="right">
                    <a href="{{ route('Properties.index') }}" class="btn btn-default">الخلف</a>
                </div>
                <br />
                <div class="row"  >
                    <div class="block-img"  margin-right="auto">
                        <img style="width: 269.844px;height: 254.984px " src ="{{asset('storage/images/'.$property->image)}}" alt="" class="img img-responsive">

                    </div>
                    <div class="block-content" style=" direction: rtl;">
                        <h6 class="title" style="font-size: 15px"><a href="" tabindex="0">  العقار {{$property->id}} </a></h6>

                        <div class="product-info">
                            <ul class="list-inline" >
                                <li class="author"><span>نوع العقار:</span><span class="text">
                                                @if($property->type==0)
                                            {{'فيلا'}}
                                        @elseif($property->type==1)
                                            {{'ارض'}}
                                        @elseif($property->type==2)
                                            {{'شقة'}}
                                        @elseif($property->type==3)
                                            {{'بيت'}}
                                        @elseif($property->type==4)
                                            {{'شاليه'}}
                                        @endif</span></li>
                                <li class="author"><span>وصف العقار:</span><span class="text">{{$property->description}}</span></li>
                                <li class="author"><span>مالك العقار:</span><span class="text">{{Auth::user()->firstName .' '.Auth::user()->lastName}}</span></li>
                                <li class="author"><span>حالة العقار:</span><span class="text">{{$property->state==1 ?'ايجار' : 'بيع'}}</span></li>
                                <li class="author"><span>العنوان:</span><span class="text">{{$property->street}}</span></li>
                                <li class="author"><span> المدينة:</span><span class="text">

                                                @if($property->city==0)
                                            {{'غزة'}}
                                        @elseif($property->city==1)
                                            {{'رفح'}}
                                        @elseif($property->city==2)
                                            {{'خانيونس'}}
                                        @elseif($property->city==3)
                                            {{'وسطى'}}
                                        @endif

                                            </span></li>
                                <li class="author"><span> أدنى سعر: $</span><span class="text">{{$property->minPrice}}</span></li>
                                <li class="author"><span> اعلى سعر: $   </span><span class="text">{{$property->maxPrice}}</span></li>
                                <li class="author"><span>عدد الغرف :$   </span><span class="text">{{$property->roomNumbers}}</span></li>
                                <li class="author"><span>مساحة العقار :   </span><span class="text">{{$property->area}}</span></li>
                                <li class="rating"><a href="" tabindex="0"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>

                            </ul>
                        </div>
                    </div>
                </div>
            </div>        </div>







    </section>
    <!-- /.content -->

@endsection




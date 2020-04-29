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
                    <a href="{{ route('Property.index') }}" class="btn btn-default">الخلف</a>
                </div>
                <br />
                <div class="row" align="left" >
{{--                    <div class="col-md-4 col-sm-6 col-xs-12 ">--}}
{{--                        <div class="blog-item item swin-transition">--}}
                            <div class="block-img"  margin-right="auto">
                                <img style="width: 269.844px;height: 254.984px " src ="{{asset('storage/images/'.$property->image)}}" alt="" class="img img-responsive">
{{--                                <div class="group-btn" >--}}

                                    {{--                                    <a href="" class="swin-btn btn-link" tabindex="0"><i class="icons fa fa-link"></i></a>--}}
{{--                                    <a href="" class="swin-btn btn-add-to-card" tabindex="0"><i class="fa fa-shopping-basket"></i></a>--}}
{{--                                </div>--}}
                            </div>
{{--                            <h3>minPrice - {{ $property->minPrice }} </h3>--}}
{{--                            <h3>maxPrice - {{ $property->maxPrice }}</h3>--}}
                            <div class="block-content">
                                <h6 class="title" style="font-size: 15px"><a href="" tabindex="0">  العقار {{$property->id}} </a></h6>

                                <div class="product-info">
                                    <ul class="list-inline">
                                        <li class="author"><span>نوع العقار : </span><span class="text">{{$property->type}} </span></li>
                                        <li class="author"><span>وصف العقار : </span><span class="text">{{$property->description}}</span></li>
                                        <li class="author"><span>مالك العقار : </span><span class="text">{{Auth::user()->firstName .' '.Auth::user()->lastName}}</span></li>

                                        <li class="rating"><a href="" tabindex="0"><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star"></i><i class="fa fa-star-o"></i></a></li>

                                    </ul>
                                </div>
                            </div>
{{--                        </div>--}}
{{--                    </div>--}}
                </div>
                <table class="table table-hover">

                        <td></td>
                    <td>
                         حالة العقار :{{$property->state==1 ?'ايجار' : 'بيع'}}<br>
                        العنوان:   {{$property->street}}<br>
                        المدينة:  {{$property->city}}

                    </td>
                        <td>
                               أدنى سعر: ${{$property->minPrice}}<br>
                            اعلى سعر: $   {{$property->maxPrice}}<br>
                            عدد الغرف :$   {{$property->roomNumbers}}<br>

                        </td>

                        <td></td>
                        <td></td>

                    </tr>
                    </tbody>
                </table>
            </div>        </div>







    </section>
    <!-- /.content -->

@endsection




@extends('admin.layout.layout')

@section('title')
    عرض عقار

@endsection

@section('header')


@endsection

@section('content')

<style>
    .showSize{
        font-weight: bold;
    } 
    
</style>
        <div class="container">

            <h3 style="text-align: center">عرض تفاصيل العقار</h3>
            <br />

            <div class="jumbotron">
                <div style="text-align: right">
                    <a href="{{ route('Properties.index') }}" class="btn btn-default">الخلف</a>
                </div>
                <br />
                <div class="row"  >
                    <div class="col-lg-5">
                    <div class="block-img" >
                        {{-- <div id="panorama"></div> --}}
                        <div id="viewer" style="margin-right: 40px"></div>
                  
                    </div>  </div>
                    <div class="col-lg-5">
                    <div class="block-content" style="margin-right: 30px; direction: rtl;">
                        <h6 class="title" style="font-size: 30px ; margin-right: 30px"><a href="" tabindex="0">  العقار {{$property->id}} </a></h6>

                        <div class="product-info">
                            <ul class="list-inline" >
                                <li class="author"><span class="showSize">نوع العقار:</span><span class="text">
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
                                <li class="author"><span class="showSize">وصف العقار:</span><span class="text" >{{$property->description}}</span></li>
                                <li class="author"><span class="showSize">مالك العقار:</span><span class="text">{{Auth::user()->firstName .' '.Auth::user()->lastName}}</span></li>
                                <li class="author"><span class="showSize">حالة العقار:</span><span class="text">{{$property->state==1 ?'ايجار' : 'بيع'}}</span></li>
                                <li class="author"><span class="showSize">العنوان:</span><span class="text">{{$property->street}}</span></li>
                                <li class="author"><span class="showSize"> المدينة:</span><span class="text">

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
                                @if($property->price == null)
                                    <li class="author" disabled>
                                @else
                                    <li class="author" >

                                        <span class="showSize"> سعر العقار: $</span><span class="text">{{$property->price}}</span>
                                        @endif
                                    </li>
                                    @if($property->roomNumbers == null)
                                        <li class="author" disabled>
                                    @else
                                        <li class="author" >
                                            <span class="showSize">عدد الغرف :   </span><span class="text">{{$property->roomNumbers}}</span>
                                            @endif
                                        </li>
                                        <li class="author"><span class="showSize">مساحة العقار :   </span><span class="text">{{$property->area}}</span></li>

                            </ul>
                        </div> </div>
                    </div>
                </div>
            </div>        </div>







    </section>
    <!-- /.content -->

@endsection

@section('footer')
    <script type="text/javascript">


var viewer = new PhotoSphereViewer.Viewer({
        container: document.querySelector('#viewer'),
        panorama: '{{asset('propertyImages/'.$property->image)}}',
    });



   

        // var valueSelect = "Level 1";
        // // var setImage = "https://pannellum.org/images/alma.jpg";
        // var setImage = "{{asset('propertyImages/'.$property->image)}}";
        
        // $('#select-level').on('change', function() {
        //     valueSelect = this.value;

        //     // change your image base on value dropdown

        //     setImage ="{{asset('propertyImages/'.$property->image)}}";

        //     // and so on

        //     // remove the pannellum
        //     $('#panorama').html('');
        //     // call the function
        //     showPannellum(setImage, valueSelect);
        // });

        // // call the image for first time
        // showPannellum(setImage, valueSelect);

        // // function show pannellum
        // function showPannellum(image, value){
        //     pannellum.viewer('panorama', {
        //         "type": "equirectangular",
        //         "panorama": image,
        //         "autoLoad": true,
        //         "autoRotate": -2,
        //         "title": value
        //     });
        // }
    </script>
@endsection



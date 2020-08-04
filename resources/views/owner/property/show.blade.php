@extends('owner.layout')
@section('title')
    عرض العقار
@endsection
@section('content')
    <br />
    <h3 align="center">عرض تفاصيل العقار</h3>
    <br />

    <div align="right" class="jumbotron">
        <br />
        <div class="row"  >
            {{-- <div class="block-img"  margin-right="auto">
                <img style="width: 269.844px;height: 254.984px " src ="{{asset('storage/images/'.$property->image)}}" alt="" class="img img-responsive">

            </div> --}}
{{--            <iframe width="600" height="400" allowfullscreen style="border-style:none;" src="https://cdn.pannellum.org/2.5/pannellum.htm#panorama=https://pannellum.org/images/{{$property->image}}"></iframe>--}}
            <div id="panorama"></div>

{{--            <img id="panorama" src ='https://pannellum.org/images/alma.jpg' />--}}

            <div class="block-content" >
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
                                @endif</span></li><br />
                        <li class="author" style="width: 35%"><span>وصف العقار:</span><span class="text">{{$property->description}}</span></li><br />
                        <li class="author"><span>حالة العقار:</span><span class="text">{{$property->state==1 ?'ايجار' : 'بيع'}}</span></li><br />
                        <li class="author"><span>العنوان:</span><span class="text">{{$property->street}}</span></li><br />
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

                                            </span></li><br />
                        @if($property->price == null)
                            <li class="author" disabled>
                        @else
                            <li class="author" >

                                سعر العقار: $</span><span class="text">{{$property->price}}</span>
                                @endif
                            </li><br />
                            @if($property->roomNumbers == null)
                                <li class="author" disabled>
                            @else
                                <li class="author" >
                                    <span>عدد الغرف :   </span><span class="text">{{$property->roomNumbers}}</span>
                                    @endif
                                </li><br /><li class="author"><span>مساحة العقار :   </span><span class="text">{{$property->area}}</span></li><br />

                    </ul>
                </div>
            </div>
        </div>
        <a style="margin-right: 30px;" href="{{ route('Property.index') }}" class="btn btn-primary">الخلف</a>
    </div>
    <!-- /.content -->

@endsection


@section('footer')
    <script type="text/javascript">
        var valueSelect = "Level 1";
        // var setImage = "https://pannellum.org/images/alma.jpg";
        var setImage = "{{asset('propertyImages/'.$property->image)}}";

        $('#select-level').on('change', function() {
            valueSelect = this.value;

            // change your image base on value dropdown

            setImage = "{{asset('propertyImages/'.$property->image)}}";

            // and so on

            // remove the pannellum
            $('#panorama').html('');
            // call the function
            showPannellum(setImage, valueSelect);
        });

        // call the image for first time
        showPannellum(setImage, valueSelect);

        // function show pannellum
        function showPannellum(image, value){
            pannellum.viewer('panorama', {
                "type": "equirectangular",
                "panorama": image,
                "autoLoad": true,
                "autoRotate": -2,
                "title": value
            });
        }

        {{--const panorama = new PANOLENS.ImagePanorama( "{{asset('images/'.$property->image)}}" );--}}
        {{--const viewer = new PANOLENS.Viewer();--}}
        {{--viewer.add( panorama );--}}

{{--pannellum.viewer('panorama', {--}}
{{--    "type": "equirectangular",--}}
{{--    "panorama":  src ="{{asset('images/'.$property->image)}}" ,--}}
{{--    "autoLoad": true,--}}
{{--    "autoRotate": -2,--}}
{{--    "title": '',--}}
{{--});--}}

    </script>
@endsection

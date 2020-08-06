@extends('layouts.app')
<!-- @section('title')
    اهلا بك زائرنا الكريم
@endsection -->

@section('title')
@endsection

@section('header')
@endsection

@push('css')

     <style>

       span{
        font-size: 25px;
        line-height: 2em;
       }

       #title{
           color: #5b9bd1;
       }

       #property{
        color:#64a0d5 ;
       }

        #map {
        width: 100%;
        height:300px;
        background-color: grey;
        }
        #mapcolor{
            color:#5b9bd1;
        }
     #jumbotron{
        width: 60%;
        margin: auto
     }

    </style>
@endpush
@section('content')
<br />
<h1 style="text-align:center" id="title">عرض تفاصيل العقار</h1>
<br />

<div  class="jumbotron" id="jumbotron" >
    <div class="row"  >

        <div class="container" >
            <div class="product-info">
                <ul class="list-inline" >
                    <li ><span id="property">نوع العقار:</span><span class="text">
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
                    <li style="width: 50%"><span id="property">وصف العقار : </span><span class="text">{{$property->description}}</span></li><br />
                    <li ><span id="property">حالة العقار : </span><span class="text">{{$property->state==1 ?'ايجار' : 'بيع'}}</span></li><br />
                    <li ><span id="property">العنوان : </span><span class="text">{{$property->street}}</span></li><br />
                    <li ><span id="property"> المدينة : </span><span class="text">

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
                        <li disabled>
                    @else
                        <li>

                            <span id="property"> سعر العقار: </span><span class="text">{{$property->price}}$</span>
                        </li><br />
                    @endif

                    @if($property->roomNumbers == null)
                        <li disabled>
                    @else
                        <li >
                            <span id="property">عدد الغرف :   </span><span class="text">{{$property->roomNumbers}}</span>
                        </li><br />

                        @endif
                        <li ><span  id="property">مساحة العقار : </span><span class="text">{{$property->area}}</span></li><br />

                    <li ><span  id="mapcolor"> موقع العقار على الخريطة</span></li>
                    <div id="map"> </div>
                    <li ><span  id="mapcolor"> صورة العقار</span></li>
                    <div id="viewer"></div>
                </ul>
            </div>
        </div>
    </div>
    <br>
    <div class = " text-center"> <a href="{{ route('home') }}" class="btn btn-primary btn-lg ">الخلف</a></div>
</div><br><br>


@endsection


@section('footer')


<script>
    function initMap() {

    //   var myLatlng = {lat: $mapLocation->Latitude , lng: $mapLocation->Longitude};
    var latitude ={{$mapLocation->Latitude }};
    var longitude ={{$mapLocation->Longitude }};

    var gaza = new google.maps.LatLng(latitude, longitude);

      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 18, center: gaza});
      // The marker, positioned at Uluru
      var marker = new google.maps.Marker({position: gaza, map: map});



   }
  </script>
<script>
var viewer = new PhotoSphereViewer.Viewer({
    container: document.querySelector('#viewer'),
    panorama: '{{asset('propertyImages/'.$property->image)}}',
});
</script>

{{-- <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8EKP73TK6UVkBWNOeRcyQDOvDzvAUla4&callback=initMap">
        </script>
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
        } --}}
    

@endsection

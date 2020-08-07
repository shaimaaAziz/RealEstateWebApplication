@extends('owner.layout')
@section('title')
    عرض العقار
@endsection
@section('content')
<style>
    .showSize{
        font-weight: bold;
    }
    #map {
        width: 75%;
        height:400px;
        background-color: grey;
        }
      .text{
        line-height: 250%;

      }
      span{
        font-size: 25px;
       }

</style>
    <br />
    <h2 style="text-align:center">عرض تفاصيل العقار</h2>
    <br />

    <div style="text-align:right" class="jumbotron">
        <br />
        <div class="row" style="font-size: 20px" >
            {{-- <div class="block-img"  margin-right="auto">
                <img style="width: 269.844px;height: 254.984px " src ="{{asset('storage/images/'.$property->image)}}" alt="" class="img img-responsive">

            </div> --}}
{{--            <iframe width="600" height="400" allowfullscreen style="border-style:none;" src="https://cdn.pannellum.org/2.5/pannellum.htm#panorama=https://pannellum.org/images/{{$property->image}}"></iframe>--}}
            {{-- <div id="panorama"></div> --}}

{{--            <img id="panorama" src ='https://pannellum.org/images/alma.jpg' />--}}

            <div class="block-content" >
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
                                @endif</span></li><br />
                        <li class="author" style="width: 50%"><span class="showSize">وصف العقار:</span><span class="text">{{$property->description}}</span></li><br />
                      
                        <li class="author">
                            <span class="showSize"> مساحة العقار: </span> <span class="text">{{$property->area}}</span></li>
                           <br/> 
                           <li class="author"><span class="showSize">حالة العقار:</span><span class="text">{{$property->state==0 ?'ايجار' : 'بيع'}}</span></li><br />
                        <li class="author"><span class="showSize">العنوان:</span><span class="text">{{$property->street}}</span></li><br />
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

                                            </span></li><br />
                        @if($property->price != null)
                           
                            <li class="author" >

                                <span class="showSize">   سعر العقار: $</span><span class="text">{{$property->price}}</span>
                            </li><br />

                        @endif

                        @if($property->roomNumbers != null)
                               
                                <li class="author" >
                                    <span class="showSize">عدد الغرف :   </span><span class="text">{{$property->roomNumbers}}</span>
                                </li>
                                <br />
                         @endif
                             
                                <li ><span  class="showSize"> موقع العقار على الخريطة</span></li>
                                <div id="map" style="margin: 30px 0px"> </div>

                                <li ><span  class="showSize" > صورة العقار</span></li>
                               
                                <div id="viewer" style="margin-top: 30px"></div>
            

                    </ul>
                  
                </div>
            </div>
        </div>
        <br>
        <a style="margin-right: 30px;" href="{{ route('Property.index') }}" class="btn btn-primary">الخلف</a>
    </div>
    <!-- /.content -->

@endsection


@section('footer')
    <script type="text/javascript">


    var viewer = new PhotoSphereViewer.Viewer({
        container: document.querySelector('#viewer'),
        panorama: '{{asset('propertyImages/'.$property->image)}}',
    });
    </script>

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


       <script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>

        <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8EKP73TK6UVkBWNOeRcyQDOvDzvAUla4&callback=initMap">
        </script>

   
    {{-- //     <script>
    //       var valueSelect = "Level 1";
    //     // var setImage = "https://pannellum.org/images/alma.jpg";
    //     var setImage = "{{asset('propertyImages/'.$property->image)}}";

    //     $('#select-level').on('change', function() {
    //         valueSelect = this.value;

    //         // change your image base on value dropdown

    //         setImage = "{{asset('propertyImages/'.$property->image)}}";

    //         // and so on

    //         // remove the pannellum
    //         $('#panorama').html('');
    //         // call the function
    //         showPannellum(setImage, valueSelect);
    //     });

    //     // call the image for first time
    //     showPannellum(setImage, valueSelect);

    //     // function show pannellum
    //     function showPannellum(image, value){
    //         pannellum.viewer('panorama', {
    //             "type": "equirectangular",
    //             "panorama": image,
    //             "autoLoad": true,
    //             "autoRotate": -2,
    //             "title": value
    //         });
    //     }   
       

    // </script> --}}
@endsection

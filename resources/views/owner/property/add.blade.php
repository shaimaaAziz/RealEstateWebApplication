@extends('owner.layout')

@section('title')
    إضافة عقار
@endsection
@section('header')
  

<style type="text/css">
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
   
        #map {
        width: 100%;
        height: 400px;
        background-color: grey;
  
    }
    /* #searchInput {
            background-color: #fff;
            font-family: Roboto;
            font-size: 15px;
            font-weight: 300;
            margin-left: 12px;
            padding: 0 11px 0 13px;
            text-overflow: ellipsis;
            width: 50%;
        }
        #searchInput:focus {
            border-color: #4d90fe;
        } */
       
    
  </style>
    @endsection
@section('content')
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">إضافة عقار</h3>
                    </div>
                    <div class="card-body">
                        @if(Session::has('flash_message'))
                            <div class="alert alert-success">
                                {{ Session::get('flash_message') }}
                            </div>
                        @endif
                        @if($errors->any())
                            <div class="alert alert-danger">
                                @foreach($errors->all() as $error)
                                    <p>{{ $error }}</p>
                                @endforeach
                            </div>
                        @endif

                        <form method="POST" action="{{ route('Property.index') }}"  enctype="multipart/form-data" style="float: right; margin-left: 10px">
                            {{ csrf_field() }}

                            @foreach($property as $allProperties)
                            
                            <input type="hidden" name="property_id" value="{{$allProperties->id}}" >
                          
                           @endforeach
                         

                          @include('owner.property.form');
                         
                        </form>


                    </div>
                </div>
            </div>
        </div>
@endsection

@section('footer')


  <script>
    function initMap() {
      var myLatlng = {lat:  31.502207, lng: 34.466287};
     
      var map = new google.maps.Map(
          document.getElementById('map'), {zoom: 18, center: myLatlng});

    //   Create the initial InfoWindow.
      var infoWindow = new google.maps.InfoWindow(
          {content: '    Click the map to get Lat/Lng!    ', position: myLatlng});
      infoWindow.open(map);

      // Configure the click listener.
      map.addListener('click', function(mapsMouseEvent) {
        // Close the current InfoWindow.
        infoWindow.close();

        // Create a new InfoWindow.
        infoWindow = new google.maps.InfoWindow({position: mapsMouseEvent.latLng});
        infoWindow.setContent(mapsMouseEvent.latLng.toString());
        infoWindow.open(map);
      });

///   to add input search in map 
    //   var input = document.getElementById('searchInput');
    // map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    // var autocomplete = new google.maps.places.Autocomplete(input);
    // autocomplete.bindTo('bounds', map);

    // var infowindow = new google.maps.InfoWindow();
    // var marker = new google.maps.Marker({
    //     map: map,
    //     anchorPoint: new google.maps.Point(0, -29)
    // });

    // autocomplete.addListener('place_changed', function() {
    //     infowindow.close();
    //     marker.setVisible(false);
    //     var place = autocomplete.getPlace();
    //     if (!place.geometry) {
    //         window.alert("Autocomplete's returned place contains no geometry");
    //         return;
    //     }
  
    //     // If the place has a geometry, then present it on a map.
    //     if (place.geometry.viewport) {
    //         map.fitBounds(place.geometry.viewport);
    //     } else {
    //         map.setCenter(place.geometry.location);
    //         map.setZoom(17);
    //     }
    //     marker.setIcon(({
    //         url: place.icon,
    //         size: new google.maps.Size(71, 71),
    //         origin: new google.maps.Point(0, 0),
    //         anchor: new google.maps.Point(17, 34),
    //         scaledSize: new google.maps.Size(35, 35)
    //     }));
    //     marker.setPosition(place.geometry.location);
    //     marker.setVisible(true);
    
    //     var address = '';
    //     if (place.address_components) {
    //         address = [
    //           (place.address_components[0] && place.address_components[0].short_name || ''),
    //           (place.address_components[1] && place.address_components[1].short_name || ''),
    //           (place.address_components[2] && place.address_components[2].short_name || '')
    //         ].join(' ');
    //     }
    
    //     infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
    //     infowindow.open(map, marker);
      
    //     // Location details
    //     // for (var i = 0; i < place.address_components.length; i++) {
    //     //     if(place.address_components[i].types[0] == 'postal_code'){
    //     //         document.getElementById('postal_code').innerHTML = place.address_components[i].long_name;
    //     //     }
    //     //     if(place.address_components[i].types[0] == 'country'){
    //     //         document.getElementById('country').innerHTML = place.address_components[i].long_name;
    //     //     }
    //     // }
    //     document.getElementById('location').innerHTML = place.formatted_address;
    //     document.getElementById('lat').innerHTML = place.geometry.location.lat();
    //     document.getElementById('lon').innerHTML = place.geometry.location.lng();
    // });

    }
  </script>

<script src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
<script type="text/javascript" src="http://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyB8EKP73TK6UVkBWNOeRcyQDOvDzvAUla4&callback=initMap"></script>

        {{-- <script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyB8EKP73TK6UVkBWNOeRcyQDOvDzvAUla4&callback=initMap">
        </script> --}}


@endsection
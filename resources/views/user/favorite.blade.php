@extends('user.layout')

@section('title')
المفضلة
@endsection

@section('content')
    <div class="row profile">
        <div class="col-md-9">
            <div class="profile-content">
                @if( count($property) > 0)
                    @foreach($property as $key => $properties)
                        @if($key % 3 == 0 && $key!= 0 )
                            <div class="clearfix"></div>
                        @endif
                        <div class="col-md-4 pull-right">
                            <div class="productbox">
                                <img src="http://lorempixel.com/468/258" class="img-responsive">
                                <div class="producttitle">{{ $properties->type }}</div>
                                <p class="text-justify">{{Str::limit($properties->description, 80)}}</p>
                                <div class="productprice"><div class="pull-left"> <a href="#" class="btn btn-primary btn-sm" role="button">اظهر التفاصيل
                                            <span class="glyphicon glyphicon-shopping-cart"> </span></a></div>
                                    <div class="pricetext">{{$properties->maxPrice}}</div></div>

                                    <div> 

                        
                                        <ul class="post-footer" style="list-style: none;">
                                            <li>
                                                @guest
                                                    <a style="text-decoration: none;" href="javascript:void(0);" 
                                                    onclick="toastr.info('يجب عليك تسجيل الدخول قبل القيام باضافة العقار الي المفضلة .',
                                                    '',{
                                                        closeButton: true,
                                                        progressBar: true,
                                                    }
                                                    )"><i class="fas fa-heart" id="no-background-hover"></i></a>
                                                    {{ $properties->favorite_to_users->count() }}
                                                @else
                                                    <a href="javascript:void(0);" style="text-decoration: none;" 
                                                    onclick="document.getElementById('favorite-form-{{ $properties->id }}')
                                                    .submit();"  class="{{ !Auth::user()->favorite_properties->
                                                    where('pivot.property_id',$properties->id)->count()  == 0 ?'favorite_properties' : ''}}">
                                                    <i class="fas fa-heart" id="no-background-hover"></i> </a> 
                                                    {{ $properties->favorite_to_users->count() }}
                                                
                        
                                                    <form id="favorite-form-{{ $properties->id }}" method="POST" 
                                                    action="{{ route('property.favorite', $properties->id) }}
                                                        " style="display: none;">
                                                        @csrf
                                                    </form>
                                                @endguest
                        
                                            </li>   
                                        </ul>
                                    </div>
                                


                            </div>
                        </div>
                    @endforeach


                    <div class="clearfix"></div>
                    <br>

                @else
                    <div class= 'alert alert-danger'>
                        لا يوجد أي عقارات قد قمت بوضعها في المفضلة 
                    </div>
                @endif


            </div>
        </div>
    </div>
    <div class=" text-center"> <a href="{{ route('personalPage.index') }}" style="margin-top:30px;" class="btn btn-success ">رجوع</a></div>

</div>
@endsection

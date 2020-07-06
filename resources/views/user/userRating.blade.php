<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <link href="{{ Request::root() }}/website/css/bootstrap.min.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/website/css/flexslider.css" rel="stylesheet" />
    <link href="{{ Request::root() }}/website/css/style.css" rel="stylesheet" />
    {{-- <link rel="stylesheet" href="{{ Request::root() }}/website/css/font-awesome.min.css"> --}}
    <script src="{{ Request::root() }}/website/js/jquery.min.js"></script>
   
    {{-- <link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet">  --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>

    {{-- // for datatable --}}
    {{!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}}
    {{!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}}
    {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

    
    
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @toastr_css
    <title>موقع عقارات
{{-- {{ config('app.name', 'موقع عقارات') }} --}}
  

  
    @yield('title')</title>
    @stack('css')
    @yield('header')

</head>
<body style="direction:rtl;">

<div class="container">

    <div class="row">

        <div class="col-md-12">
          <form action="{{ route('propertiesPersonalRating') }}" method="POST">

                        {{ csrf_field() }}
                <div class="rating">
                                  
                    <table id="table" class="table table-bordered table-striped">
                    <thead >
                        <tr>
                            <th style= "text-align: right;"># </th>
                            <th style= "text-align: right;">رقم العقار </th>
                            <th style= "text-align: right;">وصف العقار </th>
                            <th style= "text-align: right;">التقيم</th>
                        </tr>
                    </thead>
                    <tbody>

                
                        @foreach($property as $key => $properties)
                        <tr>
                            <td>{{$key + 1}}</td>
                            <td>{{ $properties->rateable->id}}</td>
                            <td>{{ $properties->rateable->description }}</td>

                            <td>
                        <input id="input-1" name="rate" class="rating rating-loading" data-min="0" 
                        data-max="5" data-step="1" value="{{ $properties->rating}}" 
                        data-size="xs">

                        <input type="hidden" name="id" required="" value="{{ $properties->rateable->id }}">
                        <button class="btn btn-success">إرسال المراجعة</button>

                            </td>
                        </tr>
                            @endforeach
                    </tbody>


                    <br/>

                    </table>
                                        


                </div>

                          

         </form>

        </div>

    </div>

</div>



<script type="text/javascript">

    $("#input-id").rating();

</script>

<script type="text/javascript">
$('#table').DataTable({
  "paging": true,
  "lenghtChange":true,
  "searching":true,
  "ordring":true,
  "info":true,
  "autowidth":true

});

</script>
</body>
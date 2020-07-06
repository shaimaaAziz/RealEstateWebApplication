@extends('admin.layout.layout')

@section('title')
المفضلة 

@endsection

@section('header')
{{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}}

 {{-- // for rating  --}}
<link href="http://netdna.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.css" rel="stylesheet"> 
 <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/css/star-rating.min.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.js"></script>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-star-rating/4.0.2/js/star-rating.min.js"></script>


@endsection

@section('content')
<section class="content-header">
    <div class="container-fluid">
        <div class="row mb-2">
            <div class="col-sm-6">
                <h1> المفضلة </h1>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                     <li class="breadcrumb-item"><a href="{{ url('/AdminDashboard')}}">الرئيسية</a></li>
                    <li class="breadcrumb-item active"><a href="{{ url('/admin/favorite')}}"> المفضلة </a></li>
                </ol>
             </div>

         </div>
    </div>
 </section>
<div class="container-fluid">

    <!-- Exportable Table -->
    <div class="row clearfix">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="card">
                <div class="header">
                
                </div>
                <div class="body">
                    <div class="table-responsive">
                            <table id="table" class="table table-bordered table-striped">

                            <thead>
                            <tr>
                                <th style= "text-align: right;">#</th>
                                <th style= "text-align: right;">رقم العقار</th>
                                <th style= "text-align: right;"  width="400px">Star</th>
                            </tr>
                            </thead>
                           
                            @if($Property->count())

                            @foreach($Property as $key=>$Properties)

                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $Properties->id }}</td>
                                <td  style="direction:ltr;"> 

                                    <input id="input-1" name="input-1" class="rating rating-loading" 
                                    data-min="0" data-max="5" data-step="0.1" 
                                    value="{{ $Properties->averageRating }}" data-size="xs" disabled="">

                                </td>

                              

                            </tr>

                            @endforeach

                        @endif

                    </table>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- #END# Exportable Table -->
</div>

<script type="text/javascript">

    $("#input-id").rating();

</script>
@endsection


@section('footer')

{{!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}}
{{!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}}



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
@endsection





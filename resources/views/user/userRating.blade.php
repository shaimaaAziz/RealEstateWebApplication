@extends('user.layout')
 @section('title') 
 التقييم للعقارات 
 @endsection
 
 @section('header') 
  {{--  for datatable --}}
  <script src="/admin/plugins/datatables/jquery.dataTables.js"></script>
  <script src="/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js"></script>
  <link media="all" type="text/css" rel="stylesheet" href="/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css">
  {{-- {{!! Html::script('admin/plugins/datatables/jquery.dataTables.js') !!}}
  {{!! Html::script('admin/plugins/datatables-bs4/js/dataTables.bootstrap4.js') !!}}
  {{!! Html::style('admin/plugins/datatables-bs4/css/dataTables.bootstrap4.css') !!}} --}}
  @endsection

  @section('content')

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

                            <td style="list-style: none; padding:0px">
                        
                                <li  style="direction:ltr;">
                                    <input id="input-1-xs " name="rate" class="rating rating-loading " data-min="0"
                                    data-max="5" data-step="0.1"
                                    data-show-clear="false" data-show-caption="false"
                                    value="{{ $properties->rating }}"
                                    data-size="xs" disabled>
        
        
                                </li>
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
@endsection
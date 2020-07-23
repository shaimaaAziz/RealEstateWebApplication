@extends('user.layout')

@section('title')
تعديل العضو  {{$user->firstName}}
@endsection

@section('content')
    <section class="content-header">
      <div class="container-fluid">
          <div class="text-center">
            <h1>تعديل العضو {{$user->firstName}} </h1>
          </div>
    </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title"> تعديل البيانات الشخصية </h3>
              </div>
              <div class="card-body">

                     {!! Form::model($user ,['route' => ['personalPage.update',$user->id], 'method'=>'PUT','files' => true ]  )  !!}

                     @include('user.form')
                     {!! Form::close() !!}
            </div>
            </div>
           </div>
          </div>
</section>
        
@endsection





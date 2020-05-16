@extends('owner.layout.layout')

@section('title')

تعديل بياناتي


@endsection

@section('header')


@endsection

@section('content')

    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>تعديل البيانات  </h1>
          </div>

      </div><!-- /.container-fluid -->
    </div>
    </section>

    <section class="content">
      <div class="row">
        <div class="col-12">
           <div class="card">
            <div class="card-header">
              <h3 class="card-title">تعديل بياناتي {{$user->firstName.' '.$user->lastName}}</h3>
              </div>
              <div class="card-body">

                     {!! Form::model($user ,['route' => ['users.update',$user->id ], 'method'=>'PATCH' ]  )  !!}

                     @include('owner.user.form')
                     {!! Form::close() !!}
            </div>
            </div>
           </div>
          </div>
</section>
        





@endsection


@section('footer')


@endsection

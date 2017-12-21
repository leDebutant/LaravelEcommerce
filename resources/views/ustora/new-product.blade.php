@extends('ustora.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-2">
              {{ Form::open(array(
                'route'=>'new-product'
              )) }}
                <div class="form-group">
                    {{ Form::label('title','Title') }}
                    {{ Form::text('title','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('reference','Reference') }}
                    {{ Form::text('reference','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('prix','Price') }}
                    {{ Form::text('prix','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description','Description') }}
                    {{ Form::textarea('description','',['class'=>'form-control']) }}
                </div>
                {{ Form::button('submit',array(
                    'type'=>'submit',
                    'class'=>'btn btn-primary'
                )) }}

            {{ Form::close() }}
            </div>
        </div>
    </div>

@endsection
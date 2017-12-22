@extends('ustora.base')

@section('content')

    <div class="container">
        <div class="row">
            <div class="col-2">
                @if(session()->has('message'))
                    <div class="alert alert-success">
                        {{ session()->get('message') }}
                    </div>
                @endif
                @if(count($errors)>0)
                    <div class="alert alert-danger">
                        <ul>
                            @foreach($errors->all() as $e)
                            <li>
                                {{ $e }}
                            </li>
                            @endforeach
                        </ul>
                    </div>
                @endif

              {{ Form::open(array(
                'route'=>'new-product',
                'files'=>true,
              )) }}
                <div class="form-group">
                    {{ Form::label('title','Title') }}
                    {{ Form::text('title','',[
                    'class'=>'form-control',
                    'placeholder'=>'Please fill the title'
                    ]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('reference','Reference') }}
                    {{ Form::text('reference','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('prix','Price') }}
                    {{ Form::number('prix','',[
                    'class'=>'form-control',
                    'step'=>'any',
                    ]) }}
                </div>
                <div class="form-group">
                    {{ Form::label('tva','TVA') }}
                    {{Form::select('tva',array(
                        '0.2'=>'20%',
                        '0.05'=>'5%',
                    )) }}
                </div>
                <div class="form-group">
                    {{ Form::label('categories','Categories') }}
                    {{ Form::select('categories',$categories) }}
                </div>
                <div class="form-group">
                    {{ Form::label('description','Description') }}
                    {{ Form::textarea('description','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
                    {{ Form::label('stock','Stock') }}
                    {{ Form::number('stock','',['class'=>'form-control']) }}
                </div>
                <div class="form-group">
{{--                    {{ Form::label('file','Choose a picture') }}--}}
                    {{ Form::file('file') }}
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
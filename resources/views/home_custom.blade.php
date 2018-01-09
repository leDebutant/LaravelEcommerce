@extends('base')

@section('title')
    Ceci est mon titre
@endsection

@section('sidebar')
    @parent
    <li>
        Section 3
    </li>
@endsection

@section('content')
    Ceci est mon contenu descriptif
    <br/>
    <div class="row">
        Ceci est une ligne css
    </div>

@endsection

@section('footer')
    @parent
    <li>Customer Services</li>
@endsection
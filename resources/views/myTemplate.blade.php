
Ceci est mon template blade!

{{-- {{ dd($param) }}--}}


<br/>
@foreach($param as $k => $p)
    @unless($p == 'Alfonso')
        {{ $k }}: {{ $p }} <br/>
    @endunless
@endforeach

On peut également utiliser des fonction native comme is_array(); <br/>
@if(is_array($param) == false)
    This is an array
@else
    This is not an array
@endif
<br/>
Operateur ternaire
<br/>
{{ is_array($param) ? "OK":"Pas Ok" }}
<br/>

@for($i=0;$i<=3;$i++)
    {{ $ville[$i] }}
@endfor

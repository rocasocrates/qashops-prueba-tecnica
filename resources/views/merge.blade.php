@extends('layouts.respuesta')

@section('content')


    @for($i = 0; $i < count($merge); $i++)

       {{$merge[$i]}},

    @endfor
@endsection
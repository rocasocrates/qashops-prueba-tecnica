@extends('layouts.respuesta')

@section('content')

    @for($i = 0; $i < count($xmlContent->product); $i++)

        @foreach($xmlContent->product[$i] as $key => $value)

            {{$key}};

        @endforeach

    @endfor
@endsection
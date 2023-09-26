@extends('base')

@section('content')
    <div class="bg-light p-5 mb-5 text-center">
        <div class="container">
            <h1>Les Biens</h1>
            <p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Illum animi possimus quaerat deleniti iure dolorem, necessitatibus itaque beatae eligendi ullam facilis iusto? Enim optio debitis reiciendis iure quo? Optio, voluptatum?</p>
        </div>
    </div>
    <div class="container">
        <h2>Nos derniers biens</h2>
        <div class="row">
            @foreach ($properties as $property)
                <div class="col">
                    @include('property.card')
                </div>
            @endforeach
        </div>
    </div>
@endsection
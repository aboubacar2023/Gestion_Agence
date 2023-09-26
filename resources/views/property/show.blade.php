@extends('base')

@section('title', $property ->title)
@section('content')
<div class="container">
    <h1>{{$property ->title}}</h1>
    <h2>{{$property ->rooms}} pièces - {{$property ->surface}}m2 </h2>
    <div class="text-primary fw-bold" style="font-size: 4rem">
        {{number_format($property->price, thousands_separator: '')}} 
    </div>
    <hr>
    <div class="mt-4">
        <h4>Intéressé par ce bien ?</h4>
        @include('shared.flash')
        <form action="" method="post" class="vstack gap-3">
            @csrf
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Prénom', 'name' => 'firstname' ])
                @include('shared.input', ['class' => 'col', 'label' => 'Nom', 'name' => 'name' ])
            </div>
            <div class="row">
                @include('shared.input', ['class' => 'col', 'label' => 'Téléphone', 'name' => 'phone' ])
                @include('shared.input', ['type' => 'email', 'class' => 'col', 'label' => 'Email', 'name' => 'email' ])
            </div>
            @include('shared.input', ['type' => 'texarea', 'class' => 'col', 'label' => 'Votre Message', 'name' => 'message' ])
            <button class="btn btn-primary mb-5">Nous contactez</button>
        </form>
    </div>
    <div class="mt-4 mb-5">
        <p>{!! nl2br($property->description) !!}</p>
        <div class="row">
            <div class="col-8">
                <h2>Caractéristique</h2>
                <table class="table table-striped">
                    <tr>
                        <td>Surface habitable</td>
                        <td>{{$property->surface}} m2</td>
                    </tr>
                    <tr>
                        <td>Pièces</td>
                        <td>{{$property->rooms}}</td>
                    </tr>
                    <tr>
                        <td>Chambres</td>
                        <td>{{$property->bedrooms}}</td>
                    </tr>
                    <tr>
                        <td>Etage</td>
                        <td>{{$property->floor ?: 'Rez de chaussé'}}</td>
                    </tr>
                    <tr>
                        <td>Localisation</td>
                        <td>{{$property->city}}</td>
                    </tr>
                </table>
            </div>
            <div class="col-4">
                <h2>Spécificités</h2>
                <ul class="list-group">
                    @foreach ($property->options as $option)
                        <li class="list-group-item"> {{$option->name}}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
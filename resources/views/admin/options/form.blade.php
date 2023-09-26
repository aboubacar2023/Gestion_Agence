@extends('admin.admin')
@section('title', $option->exists ? "Editer une Option" : "Créer une Option")
@section('content')
    <h1>@yield('title')</h1>
    <form class="vstack gap-2" action="{{route($option->exists ? 'admin.option.update' : 'admin.option.store',  $option)}}" method="post">
    @csrf
    @method($option->exists ? 'put': 'post')

    @include('shared.input', ['label' => 'Nom', 'name' => 'name', 'value' => $option->name ])
    <button class="btn btn-primary">
        @if ($option->exists)
            Modifier
            @else
            Créer
        @endif
    </button>
    </form>
    
@endsection
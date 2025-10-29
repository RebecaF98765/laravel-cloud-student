
@extends('layouts.master')

@section('title', 'update')

@section('content')
    <div class="row">
        <div class="col-md-6 offset-md-3">
            <h2 class="text-center my-4">Dades de l'alumne Editat</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Nom:</strong> {{ $input['name'] }}</li>
                <li class="list-group-item"><strong>Any:</strong> {{ $input['year'] }}</li>
                <li class="list-group-item"><strong>Director:</strong> {{ $input['director'] }}</li>
                <li class="list-group-item"><strong>Poster:</strong> <img src="{{ $input['poster'] }}" alt="Poster" class="img-fluid"></li>
                <li class="list-group-item"><strong>Resum:</strong> {{ $input['synopsis'] }}</li>
            </ul>    
        </div>
    </div>
@endsection
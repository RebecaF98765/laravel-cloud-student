@extends('layouts.master')

@section('title', 'Editar Estudiant')

@section('content')

<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center my-4">Editar Estudiant</h2>
        <form action="{{ route('update', $students->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="form-group">
                <label for="name">Nom:</label>
                <input type="text" class="form-control" id="name" name="name" value="{{ $students->name }}" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" class="form-control" id="email" name="email" value="{{ $students->email }}" required>
            </div>
            <div class="form-group">
                <label for="address">Adreça:</label>
                <input type="text" class="form-control" id="address" name="address" value="{{ $students->address }}" required>
            </div>
            <button type="submit" class="btn btn-primary">Actualitzar Estudiant</button>
        </form>
    </div>
</div>

@endsection

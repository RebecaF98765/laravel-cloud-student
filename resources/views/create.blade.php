@extends('layouts.master')

@section('title', 'Crear Estudiant')

@section('content')


<div class="row">
    <div class="col-md-6 offset-md-3">
        <h2 class="text-center my-4">Crear Estudiant</h2>

        <form action="{{ route('new') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nom:</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>

        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" class="form-control" id="email" name="email" required>
        </div>

        <div class="form-group">
            <label for="address">Adreça:</label>
            <textarea class="form-control" id="address" name="address" required></textarea>
        </div>

        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3 mb-3">Crear Estudiant</button>
        </div>   
 </form>
    </div>
</div>
@endsection

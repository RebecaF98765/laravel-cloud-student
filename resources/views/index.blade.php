
@extends('layouts.master')

@section('title','Llistat Estudiants')

@section('content')

<h1 style="color: orange; text-align:center;">
    🎓 Llistat d'Estudiants — Nova versió desplegada automàticament 🚀
</h1>

<br>

<div class="container">
    <table class="table table-bordered table-striped">
        <thead class="thead-dark">
            <tr>
                <th>Nom</th>
                <th>Email</th>
                <th>Adreça</th>
                <th>Accions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{ $student->name }}</td>
                <td>{{ $student->email }}</td>
                <td>{{ $student->address }}</td>
                <td>
                    <a href="{{ url('/edit/' . $student->id) }}" class="btn btn-warning btn-sm">Editar</a>
                    
                    <form action="{{ url('/delete/' . $student->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Segur que vols eliminar aquest estudiant?')">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
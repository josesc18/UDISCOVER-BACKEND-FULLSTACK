@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Empleados</h1>

            <a href="{{ route('employee.create') }}" class="btn btn-primary">Añadir Empleado</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Apellido</th>
                        <th scope="col">Compañia</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $employee->firstname }}</td>
                        <td>{{ $employee->lastname }}</td>
                        <td>{{ $employee->company->name}}</td>
                        <td>{{ $employee->email }}</td>
                        <td>{{ $employee->phone }}</td>
                        <td>
                            <form action="{{ route('employee.destroy',$employee ) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Borrar" class="btn btn-danger">
                            </form>
                            <a href="{{ route('employee.edit',$employee ) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @if(sizeof($employees)>0)
            {{ $employees->links() }}
            @endIf
        </div>
    </div>
</div>
@endsection
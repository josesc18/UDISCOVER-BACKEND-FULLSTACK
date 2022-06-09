@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Compañias</h1>

            <a href="{{ route('company.create') }}" class="btn btn-primary">Añadir Compañia</a>

            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Correo</th>
                        <th scope="col">Web</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($companies as $company)
                    <tr>
                        <th scope="row">{{ $loop->index+1 }}</th>
                        <td>{{ $company->name }}</td>
                        <td>
                            <img src="{{ asset('storage').'/'.$company->logo }}" alt="{{ 'logo '.$company->name }}" width="50%">
                        </td>
                        <td>{{ $company->email }}</td>
                        <td>{{ $company->website }}</td>
                        <td>
                            <form action="{{ route('company.destroy',$company ) }}" method="post">
                                @csrf
                                {{ method_field('DELETE') }}
                                <input type="submit" value="Borrar" class="btn btn-danger">
                            </form>
                            <a href="{{ route('company.edit',$company ) }}" class="btn btn-warning">Editar</a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{ $companies->links() }}
        </div>
    </div>
</div>
@endsection
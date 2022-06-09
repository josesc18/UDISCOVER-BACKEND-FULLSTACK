@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Añadir Empleado</h1>
            <form enctype="multipart/form-data" method="POST" action="{{ route('employee.store') }}">
                @csrf
                <div class="form-group mt-3">
                    <label for="name-input">Nombre</label>
                    <input type="text" class="form-control" id="name-input" placeholder="Nombre" name="firstname">
                </div>
                <div class="form-group mt-3">
                    <label for="lastname-input">Apellido</label>
                    <input type="text" class="form-control" id="lastname-input" placeholder="Apellido" name="lastname">
                </div>
                <div class="form-group mt-3">
                    <label for="company-select">Compañia</label>
                    <select class="form-control" name="company_id" id="company-select">
                        <option selected>Choose...</option>
                        @foreach($companies as $company)
                        <option value="{{$company->id}}">{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="email-input">Correo</label>
                    <input type="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                </div>
                <div class="form-group mt-3">
                    <label for="lastname-input">Apellido</label>
                    <input type="text" class="form-control" id="lastname-input" placeholder="Telefono" name="phone">
                </div>
                <button type="submit" class="btn btn-primary mt-4 w-100">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
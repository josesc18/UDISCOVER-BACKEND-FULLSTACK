@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Editar Empleado</h1>
            <form enctype="multipart/form-data" method="POST" action="{{ route('employee.update',$employee) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group mt-3">
                    <label for="name-input">Nombre</label>
                    <input type="text" class="form-control" id="name-input" placeholder="Nombre" name="firstname" value="{{$employee->firstname}}">
                </div>
                <div class="form-group mt-3">
                    <label for="lastname-input">Apellido</label>
                    <input type="text" class="form-control" id="lastname-input" placeholder="Apellido" name="lastname" value="{{$employee->lastname}}">
                </div>
                <div class=" form-group mt-3">
                    <label for="company-select">Compañia</label>
                    <select class="form-control" name="company_id" id="company-select" value="{{$employee->company_id}}">
                        @foreach($companies as $company)
                        <option value="{{ $company->id }}" {{ $company_id == $company->id ? 'selected' : '' }}>{{$company->name}}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group mt-3">
                    <label for="email-input">Correo</label>
                    <input type="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$employee->email}}">
                </div>
                <div class="form-group mt-3">
                    <label for="lastname-input">Apellido</label>
                    <input type="text" class="form-control" id="lastname-input" placeholder="Telefono" name="phone" value="{{$employee->phone}}">
                </div>
                <button type="submit" class="btn btn-primary mt-4 w-100">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
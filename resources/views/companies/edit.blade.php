@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <h1>Editar Compañia</h1>
            @if($errors->any())
            <ul>
                @foreach($errors->all() as $error)
                <li>{{$error}}</li>
                @endforeach
            </ul>
            @endif
            <form enctype="multipart/form-data" method="POST" action="{{ route('company.update', $tempCompany) }}">
                @csrf
                {{ method_field('PUT') }}
                <div class="form-group mt-3">
                    <label for="exampleInputPassword1">Nombre</label>
                    <input type="text" class="form-control" id="name-input" placeholder="Nombre" name="name" value="{{$tempCompany->name}}" required>
                </div>
                <div class="form-group mt-3">
                    <label for="email-input">Correo</label>
                    <input type="email" class="form-control" id="email-input" aria-describedby="emailHelp" placeholder="Enter email" name="email" value="{{$tempCompany->email}}" required>
                </div>
                <div class="form-group mt-3">
                    <img src="{{ asset('storage').'/'.$tempCompany->logo }}" alt="{{ 'logo '.$tempCompany->name }}">
                </div>
                <div class=" form-group my-4">
                    <label for="logo-input">Logo</label>
                    <input type="file" class="form-control-file" id="logo-input" name="logo">
                </div>
                <div class="form-group mt-3">
                    <label for="website-input">website</label>
                    <input type="text" class="form-control" id="website-input" placeholder="website" name="website" value="{{$tempCompany->website}}" required>
                </div>
                <button type=" submit" class="btn btn-primary mt-4 w-100">Guardar</button>
            </form>
        </div>
    </div>
</div>
@endsection
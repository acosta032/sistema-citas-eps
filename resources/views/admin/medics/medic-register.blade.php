@extends('adminlte::page')
@section('title', 'Dashboard')

@section('content_header')
<div class="container-fluid welcome">
    <div class="row p-3 d-flex justify-content-center align-items-center">
        <div class="col-sm-10 col-12 fw-bold fw-bold">
            <h2 class="welcome_title">Inscripción de médicos</h2>
            <p class="welcome_text">Formulario de inscripcion de médicos</p>
        </div>
        <a href="{{route('admin.medics')}}" type="button" class="btn btn-success col-4 col-sm-2">
            <i class="fas fa-arrow-left mr-2 "></i>
            Regresar
        </a>
    </div>
</div>
@stop

@section('content')
<form action="{{url('admin/medic/create')}}" enctype="multipart/form-data" method="post" class="needs-validation" novalidate>

    {{ csrf_field() }}

    <div class="container-fluid d-flex flex-column justify-content-center"> <!--75-->
    <h4>Información básica</h4>

        <div class="row flex-sm-row flex-column">
            <div class="form-group col-sm-6 col-12">
                <label for="idtype">Tipo de identificación</label>
                <select type="text" name="idtype" id="idtype" class="form-control" required>
                    @foreach ($idtypes as $idtype)
                        <option value="{{$idtype->id_type}}">
                            {{$idtype->name_type}}
                        </option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-sm-6 col-12">
                <label for="idnumber">N° Identificación</label>
                <input type="text" name="idnumber" id="idnumber" class="form-control" pattern="[0-9]*" required>
            </div>
        </div>
    
        <div class="row flex-sm-row flex-column">
            <div class="form-group col-sm-6 col-12">
                <label for="name">Nombres</label>
                <input type="text" name="name" id="name" class="form-control" 
                pattern="^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$" required>
                <div class="valid-feedback">Campo correcto</div>
                <div class="invalid-feedback">Campo incorrecto</div>
            </div>
            <div class="form-group col-sm-6 col-12">
                <label for="last">Apellidos</label>
                <input type="text" name="last" id="last" class="form-control"
                pattern="^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$" required>
            </div>
        </div>
        
        <div class="row mb-3">
            <div class="form-group col-md-4 col-sm-4 col-12">
                <label for="birth">Fecha de nacimiento</label>
                <input type="date" name="birth" id="birth" class="form-control" required>
            </div>
            <div class="form-group col-md-3 col-sm-4 col-12">
                <label for="stratrum">Estrato</label>
                <input type="number" name="stratrum" id="stratrum" class="form-control" required>
            </div>
            <div class="form-group col-md-3 col-sm-4 col-12">
                <label for="sex">Sexo</label>
                <select type="text" name="sex" id="sex" class="form-control" required>
                    <option value="M">Masculino</option>
                    <option value="F">Femenino</option>
                </select>
            </div>
        </div>
    
        <h4>Ubicación</h4>
    
        <div class="row mb-3">
            <div class="form-group col-md-3 col-sm-6 col-12">
                <label for="department" class="form-label">Departamento</label>
                <input class="form-control" list="datalistOptions" name="department" id="department" placeholder="Escriba una palabra" required>
    
                <datalist id="datalistOptions">
                    @foreach($departments as $department)
                    <option value="{{$department->department_name}}">
                    @endforeach
                </datalist>
            </div>
            <div class="form-group col-md-3 col-sm-6 col-12">
                <label for="municipality" class="form-label">Municipios</label>
                <input class="form-control" list="datalistOptions1" name="municipality" id="municipality" placeholder="Escriba una palabra" required>
                <datalist id="datalistOptions1">
                    @foreach($municipalities as $municipality)
                    <option value="{{$municipality->municipality_name}}">
                    @endforeach
                </datalist>
    
            </div>
            <div class="form-group col-md-3 col-sm-6 col-12">
                <label for="neigh">Barrio</label>
                <input type="text" name="neigh" id="neigh" class="form-control" 
                pattern="^[ÁÉÍÓÚA-Z][a-záéíóú]+(\s+[ÁÉÍÓÚA-Z]?[a-záéíóú]+)*$" required>
            </div>
            <div class="form-group col-md-3 col-sm-6 col-12">
                <label for="address">Dirección</label>
                <input type="text" name="address" id="address" class="form-control" required>
            </div>
        </div>
    
        <h4>Información de contacto</h4>
        <div class="row mb-3">
            <div class="form-group col-12 col-sm-4 col-md-3">
                <label for="email">E-mail</label>
                <input type="text" name="email" id="email" class="form-control" 
                pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" required>
            </div>
            <div class="form-group col-12 col-sm-4 col-md-3">
                <label for="cel">Celular</label>
                <input type="text" name="cel" id="cel" class="form-control" pattern="[0-9]{10}$" required>
            </div>
            <div class="form-group col-12 col-sm-4 col-md-3">
                <label for="tel">Teléfono</label>
                <input type="text" name="tel" id="tel" class="form-control" pattern="[0-9]{7}$" required>
            </div>
        </div>
    
        <h2>Asignación de especialización</h2>
        <div class="row">
            <div class="form-group col-6 col-md-4">
                <label for="desc">Área médica</label>
                <select type="text" name="area" id="area" class="form-control" required>
    
                    @foreach ($medicalareas as $medicalarea)
                        <option value="{{$medicalarea->id_area}}">{{$medicalarea->name_area}}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group col-6 col-md-4">
                <label for="desc">Sede de Comfamiliar</label>
                <select type="text" name="branch" id="branch" class="form-control" required>
    
                    @foreach ($branchoffices as $branchoffice)
                        <option value="{{$branchoffice->id_branch}}">{{$branchoffice->name_branch_office}}</option>
                    @endforeach
                </select>
            </div>
        </div>
    
        <div class="row">
            <div class="form-group col-12">
                <label for="desc">Descripción</label>
                <textarea name="desc" id="desc" class="form-control" rows="3"></textarea>
            </div>
        </div>

        
        <div class="form-group text-center">
            <button class="btn btn-primary" type="submit">Confirmar registro</button>
        </div>
    </div>

</form>
@include('notify::components.notify')

@stop



@section('css')
@livewireStyles

<link rel="stylesheet" href="/css/admin_custom.css">
<link rel="stylesheet" href="/css/style.css">
@stop



@section('js')
<script type="text/javascript" src="/js/validate.js"></script>
@livewireScripts


@stop

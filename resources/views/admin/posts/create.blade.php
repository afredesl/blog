@extends('admin.layout')


@section('header')
   <h1>
     Crear un nuevo Post
        <small>Crear Publicacion</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li><a href="{{ route('admin.posts.index')}}"><i class="fa fa-list"></i> Listado Posts</a></li>
        <li class="active">Crear Posts</li>
      </ol>
@stop
@section('content')

<div class="row">
<form action="{{ route('admin.posts.store')}}" method="POST">
    {{csrf_field()}}
    <div class="col-md-8">
    <div class="box  box-primary">
            <div class="box-body">
                <div class="form-group {{$errors->has('title') == 1 ? 'has-error' : ''}}">
                    <label for="">Titulo de la publicion</label>
                    <input type="text" name="title" placeholder="Ingresa el Titulo" class="form-control" value="{{ old('title')}}">
                    {!! $errors->first('title', '<span class="help-block">:message</span>') !!}
                </div>
            </div>
             <div class="box-body">
                <div class="form-group {{$errors->has('body') == 1 ? 'has-error' : ''}}">
                    <label for="">Contenido de la publicion</label>
                    <textarea id="editor" rows="10" name="body" placeholder="Ingresa un contenido completo de la publicacion" class="form-control">{{ old('body')}}</textarea>
                    {!! $errors->first('body', '<span class="help-block">:message</span>') !!}
                    
                </div>
            </div>
    </div>
    </div>
    <div class="col-md-4">
        <div class="box box-primary">
            <div class="box-body">
            <div class="form-group">
                <label>Fecha de Publicacion:</label>
                <div class="input-group date">
                  <div class="input-group-addon">
                    <i class="fa fa-calendar"></i>
                  </div>
                  <input name="published_at" value="{{ old('published_at')}}" type="text" class="form-control pull-right" id="datepicker">
                </div>
              </div>
              <div class="form-group {{$errors->has('category') == 1 ? 'has-error' : ''}}">
                  <label for="">Categorias</label>
                  <select name="category" id="" class="form-control">
                      <option value="">Selecciona una categoria</option>
                      @foreach ($categories as $category)
                        <option value="{{$category->id}}" 
                            {{ old('category') == $category->id ? 'selected' : ''}}    
                        >{{$category->name}}</option>
                      @endforeach
                  </select>
                   {!! $errors->first('category', '<span class="help-block">:message</span>') !!}
              </div>
              <div class="form-group {{$errors->has('tags') == 1 ? 'has-error' : ''}}">
              <label for="">Etiquetas</label>
              <select name="tags[]" class="form-control select2" multiple="multiple" data-placeholder="Selecciona Una o mas Etiquetas"
                        style="width: 100%;">
                        @foreach ($tags as $tag)
                        <option {{ collect(old('tags'))->contains($tag->id) ? 'selected' : '' }} value="{{$tag->id}}">{{$tag->name}}</option>
                      @endforeach
                </select>
                {!! $errors->first('tags', '<span class="help-block">:message</span>') !!}
              </div>
                <div class="form-group {{$errors->has('excerpt') == 1 ? 'has-error' : ''}}">
                    <label for="">Extracto de la publicion</label>
                    <textarea name="excerpt" placeholder="Ingresa un extracto de la publicacion" class="form-control">{{old('excerpt')}}</textarea>
                    {!! $errors->first('excerpt', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="form-group">
                   <button type="submit" class="btn btn-primary btn-block">Guardar Publicacion</button>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@stop
@push('styles')
<link rel="stylesheet" href="../../administrador/adminlte/bootstrap-colorpicker/dist/css/bootstrap-colorpicker.min.css">
<link rel="stylesheet" href="../../administrador/adminlte/select2/dist/css/select2.min.css">
@endpush
@push('scripts')
<script src="../../administrador/adminlte/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<script src="https://cdn.ckeditor.com/4.9.0/standard/ckeditor.js"></script>
<script src="../../administrador/adminlte/select2/dist/js/select2.full.min.js"></script>
    <script>
        $('#datepicker').datepicker({
        autoclose: true
        });
        CKEDITOR.replace('editor');
        $('.select2').select2()
    </script>
@endpush   
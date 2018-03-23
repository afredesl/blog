@extends('admin.layout')

@section('header')
   <h1>
     Todos los Posts
        <small>Optional description</small>
      </h1>
      <ol class="breadcrumb">
        <li><a href="{{ route('dashboard')}}"><i class="fa fa-dashboard"></i> Inicio</a></li>
        <li class="active">Posts</li>
      </ol>

@stop
@section('content')
    <h1>Dashboard</h1>
	 <section class="content-header">
        <div class="box">
            <div class="box-header">
              <h3 class="box-title">Listado de Post</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="posts-table" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Id</th>
                  <th>Titulo</th>
                  <th>Extracto</th>
                  <th>Categoria</th>
                  <th>Acciones</th>
                </tr>
                </thead>
              <tbody>
                  @foreach($post as $pos)
                  <tr>
                      <td>
                        {{$pos->id}}
                      </td>
                      <td>
                        {{$pos->title}}
                      </td>
                      <td>
                        {{$pos->excerpt}}
                      </td>
                      <td>
                        {{$pos->category->name}}
                      </td>
                      <td>
                        <a href="#" class="btn btn-xs btn-info"><i class="fa fa-pencil"></i></a>
                        <a href="#" class="btn btn-xs btn-danger"><i class="fa fa-times"></i></a>
                      </td>
                  </tr>
                  @endforeach
              </tbody>
              </table>
            </div>
            <!-- /.box-body -->
          </div>

     </section>

@stop
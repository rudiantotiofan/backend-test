@extends('layouts.app')

@section('title', 'Editor')

@section('page_header')
    <h1>
      Editor
    </h1>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-newspaper-o"></i> Editor</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Edit</li>
    </ol>
@endsection

@section('content')
    @include('layouts.components.notification')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create Editor</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route'=>['editor.update', $editor], 'method' => 'PATCH', 'id'=>'form-editor', 'class' => 'form' ]) !!}
              <div class="box-body">
                @include('page.editor.form')
              </div>
              <div class="box-footer">
                <a href="{{ route('editor.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Update</button>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection

@section('custom_js')
@endsection
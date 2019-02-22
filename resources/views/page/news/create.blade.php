@extends('layouts.app')

@section('title', 'News')

@section('page_header')
    <h1>
      News
    </h1>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-newspaper-o"></i> News</a></li>
      <li><a href="#">Forms</a></li>
      <li class="active">Create</li>
    </ol>
@endsection

@section('content')
    @include('layouts.components.notification')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Create News</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            {!! Form::open(['route'=>'news.store', 'id'=>'form-news', 'class' => 'form' ]) !!}
              <div class="box-body">
                @include('page.news.form')
              </div>
              <div class="box-footer">
                <a href="{{ route('news.index') }}" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-success">Process</button>
              </div>
            {!! Form::close() !!}
          </div>
        </div>
    </div>
    <!-- /.row (main row) -->
@endsection

@section('custom_js')
@endsection
@extends('layouts.app')

@section('title', 'News')

@section('page_header')
    <h1>
        News
        <small>&nbsp;</small>
    </h1>
@endsection

@section('breadcrumbs')
    <ol class="breadcrumb">
      <li><a href="#"><i class="fa fa-newspaper-o"></i> News</a></li>
      <li class="active"><a href="#">Data</a></li>
    </ol>
@endsection

@section('content')
    @include('layouts.components.notification')
    <!-- Small boxes (Stat box) -->
    <div class="row">
      <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List of All Data</h3>
              <a href="{{ route('news.create') }}" class="btn btn-success pull-right">Create</a>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="news_datatables" class="table table-bordered table-striped" data-form="deleteForm">
                <thead>
                <tr>
                  <th>ID</th>
                  <th>Title</th>
                  <th>Editor</th>
                  <th>View</th>
                  <th>Edited By Admin</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                  @if($news)
                    @foreach($news as $value)
                      <tr>
                        <td>{{ $value->id }}</td>
                        <td>{{ $value->title }}</td>
                        <td>{{ $value->editor_name }}</td>
                        <td>{{ $value->view }}</td>
                        <td>{{ ($value->edited_by_admin==1) ? 'Yes' : 'No' }}</td>
                        <td>{{ ($value->active==1) ? 'Active' : 'Non Active' }}</td>
                        <td>
                          <a href="{{ route('news.edit', $value->id) }}" class="btn btn-primary"><span class="fa fa-edit"></span></a>
                          <a href="#" class="btn btn-default"><span class="fa fa-eye"></span></a>
                          {!! Form::model($value, ['method' => 'delete', 'route' => ['news.destroy', $value->id], 'class' =>'pull-left form-delete']) !!}
                          {!! Form::hidden('id', $value->id) !!}
                          <button type="submit" class="btn btn-danger delete" name="delete_modal" style="margin-right: 5px"><span class="fa fa-trash"></span></button>
                          {!! Form::close() !!}

                        </td>
                      </tr>
                    @endforeach
                  @endif($news)
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
    </div>
    <!-- /.row (main row) -->

    <div class="modal" id="confirm">
      <div class="modal-dialog">
          <div class="modal-content">
              <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                  <h4 class="modal-title">Delete Confirmation</h4>
              </div>
              <div class="modal-body">
                  <p>Are you sure you, want to delete?</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-sm btn-danger" data-dismiss="modal">Cancel</button>
                  <button type="button" class="btn btn-sm btn-primary" id="delete-btn">Delete</button>
              </div>
          </div>
      </div>
  </div>
@endsection

@section('custom_js')
<script>
  $('table[data-form="deleteForm"]').on('click', '.form-delete', function(e){
      e.preventDefault();
      var $form=$(this);
      $('#confirm').modal({ backdrop: 'static', keyboard: false })
          .on('click', '#delete-btn', function(){
              $form.submit();
          });
  });
  $(function () {
    $('#news_datatables').DataTable()
  })
</script>
@endsection
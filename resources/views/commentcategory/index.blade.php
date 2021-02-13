@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Comment Category</h3>
              <div class="pull-right">
            @can('commentcategory-create')
            <a class="btn btn-success" href="{{ route('commentcategories.create') }}" > Create CommentCategory</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Comment Category</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($commentcategories as $key => $commentcategory)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$commentcategory->comment_category}}</td>
                  <td>
                        @can('commentcategory-edit')
                            <a class="btn btn-primary" href="{{ route('commentcategories.edit',$commentcategory->id) }}">Edit</a>
                        @endcan
                        @can('commentcategory-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['commentcategories.destroy', $commentcategory->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @empty
                No Data Found !!

                @endforelse
               
               
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                  <th>Comment Category</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $commentcategories->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
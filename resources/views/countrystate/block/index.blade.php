@extends('layouts.app')
@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">Block Management</h3>
              <div class="pull-right">
            @can('block-create')
            <a class="btn btn-success" href="{{ route('blocks.create') }}" > Create New Block</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Block</th>
                  <th>District</th>
                  <th>State</th>
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($blocks as $key => $block)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$block->block}}</td>
                  <td>{{$block->district->district}}</td>
                  <td>{{$block->state->state}}</td>
                  <td>{{$block->st_code}}</td>
                  <td><a class="btn btn-info" href="{{ route('blocks.show',$block->id) }}">Show</a>
                        @can('block-edit')
                            <a class="btn btn-primary" href="{{ route('blocks.edit',$block->id) }}">Edit</a>
                        @endcan
                        @can('block-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['blocks.destroy', $block->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
                                {!! Form::submit('Delete', ['class' => 'btn btn-danger']) !!}
                            {!! Form::close() !!}
                        @endcan
                    </td>
                </tr>
                @endforeach
               
               
                </tbody>
                <tfoot>
                <tr>
                <th>No</th>
                <th>Block</th>
                  <th>District</th>
                  <th>State</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
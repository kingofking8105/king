@extends('layouts.app')
@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">State Management</h3>
              <div class="pull-right">
            @can('state-create')
            <a class="btn btn-success" href="{{ route('states.create') }}" > Create New State</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($states as $key => $state)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$state->country->name}}</td>
                  <td>{{$state->state}}</td>
                  <td>{{$state->st_code}}</td>
                  <td><a class="btn btn-info" href="{{ route('states.show',$state->id) }}">Show</a>
                        @can('state-edit')
                            <a class="btn btn-primary" href="{{ route('states.edit',$state->id) }}">Edit</a>
                        @endcan
                        @can('state-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['states.destroy', $state->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Country</th>
                  <th>State</th>
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
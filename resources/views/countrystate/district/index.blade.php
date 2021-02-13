@extends('layouts.app')
@section('content')
  <div class="box">
            <div class="box-header">
              <h3 class="box-title">District Management</h3>
              <div class="pull-right">
            @can('district-create')
            <a class="btn btn-success" href="{{ route('districts.create') }}" > Create New District</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>District</th>
                  <th> State</th>
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($districts as $key => $district)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$district->district}}</td>
                  <td>{{$district->state->state}}</td>
                  <td>{{$district->dist_code}}</td>
                  <td><a class="btn btn-info" href="{{ route('districts.show',$district->id) }}">Show</a>
                        @can('district-edit')
                            <a class="btn btn-primary" href="{{ route('districts.edit',$district->id) }}">Edit</a>
                        @endcan
                        @can('district-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['districts.destroy', $district->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                <th>District</th>
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
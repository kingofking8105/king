@extends('layouts.app')
@section('content')

    <!-- Content Header (Page header) -->
    
     <!-- Main content -->
  <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
                <h3 class="box-title">Country Management</h3>
                  <div class="pull-right">
                    @can('country-create')
                    <a class="btn btn-success" href="{{ route('countries.create') }}" > Create New Country</a>
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
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($countries as $key => $country)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$country->name}}</td>
                  <td>{{$country->code}}</td>
                  <td><a class="btn btn-info" href="{{ route('countries.show',$country->id) }}">Show</a>
                        @can('country-edit')
                            <a class="btn btn-primary" href="{{ route('countries.edit',$country->id) }}">Edit</a>
                        @endcan
                        @can('country-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['countries.destroy', $country->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Code</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    @endsection
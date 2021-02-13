@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Project Officer</h3>
              <div class="pull-right">
            @can('projectofficer-create')
            <a class="btn btn-success" href="{{ route('projectofficers.create') }}" > Create New ProjectOfficer</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ProjectOfficer</th>
                  <th>ProjectManager</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projectofficers as $key => $projectofficer)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$projectofficer->user->name}}</td>
                  <td>{{$projectofficer->projectManager->user->name}}</td>

                  <td>
                        @can('projectofficer-edit')
                            <a class="btn btn-primary" href="{{ route('projectofficers.edit',$projectofficer->id) }}">Edit</a>
                        @endcan
                        @can('projectofficer-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['projectofficers.destroy', $projectofficer->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>ProjectOfficer</th>
                  <th>ProjectManager</th>
                  <th>Actions</th>            
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
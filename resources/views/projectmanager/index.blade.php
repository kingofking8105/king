@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Project Manager</h3>
              <div class="pull-right">
            @can('projectmanager-create')
            <a class="btn btn-success" href="{{ route('projectmanagers.create') }}" > Create New ProjectManager</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>ProjectManager</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($projectmanagers as $key => $projectmanager)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$projectmanager->user->name}}</td>
                  <td>
                        @can('projectmanager-edit')
                            <a class="btn btn-primary" href="{{ route('projectmanagers.edit',$projectmanager->id) }}">Edit</a>
                        @endcan
                        @can('projectmanager-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['projectmanagers.destroy', $projectmanager->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>ProjectManager</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Name</h3>
              <div class="pull-right">
            @can('teacher-create')
            <a class="btn btn-success" href="{{ route('teachers.create') }}" > Create New Teacher</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Name</th>
                  <th>QualiFication</th>
                  <th>Doj</th>
                  <th>Address</th>
                  <th>Lc Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($teachers as $key => $teacher)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$teacher->teacher_name}}</td>
                  <td>{{$teacher->teacher_qualifi}}</td>
                  <td>{{$teacher->teacher_doj}}</td>
                  <td>{{$teacher->teacher_address}}</td>
                  <td>{{$teacher->lc->lc_name}}</td>
                  <td>
                        @can('teacher-edit')
                            <a class="btn btn-primary" href="{{ route('teachers.edit',$teacher->id) }}">Edit</a>
                        @endcan
                        @can('teacher-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['teachers.destroy', $teacher->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Name</th>
                  <th>QualiFication</th>
                  <th>Doj</th>
                  <th>Address</th>
                  <th>Lc Name</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $teachers->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
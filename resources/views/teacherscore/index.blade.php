@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Teacher Score</h3>
              <div class="pull-right">
            @can('teacherscore-create')
            <a class="btn btn-success" href="{{ route('teacherscores.create') }}" > Create TeacherScore</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>TeacherName</th>
                  
                  <th>TeacherScore</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($teacherscores as $key => $teacherscore)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$teacherscore->teacher->teacher_name}}</td>
                  <td>{{$teacherscore->score}}</td>

                  <td>
                        @can('teacherscore-edit')
                            <a class="btn btn-primary" href="{{ route('teacherscores.edit',$teacherscore->id) }}">Edit</a>
                        @endcan
                        @can('teacherscore-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['teacherscores.destroy', $teacherscore->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>TeacherName</th>
                  
                  <th>TeacherScore</th>
                  <th>Actions</th>        
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
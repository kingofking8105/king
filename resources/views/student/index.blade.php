@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Name</h3>
              <div class="pull-right">
            @can('student-create')
            <a class="btn btn-success" href="{{ route('students.create') }}" > Create New Student</a>
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
                  <th>Class</th>
                  <th>Roll No</th>
                  <th>Address</th>
                  <th>Lc Name</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($students as $key => $student)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$student->name}}</td>
                  <td>{{$student->current_class}}</td>
                  <td>{{$student->roll_no}}</td>
                  <td>{{$student->address}}</td>
                  <td>{{$student->lc->lc_name}}</td>
                  <td>
                        @can('student-edit')
                            <a class="btn btn-primary" href="{{ route('students.edit',$student->id) }}">Edit</a>
                        @endcan
                        @can('student-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['students.destroy', $student->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Class</th>
                  <th>Roll No</th>
                  <th>Address</th>
                  <th>Lc Name</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $students->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
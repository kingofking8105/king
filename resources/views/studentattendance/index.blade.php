@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Student Attendance</h3>
              <div class="pull-right">
            @can('studentattendance-create')
            <a class="btn btn-success" href="{{ route('studentattendances.create') }}" > Create StudentAttendance</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>StudentName</th>
                  <th>Month</th>
                  <th>Academic Year</th>
                  <th>StudentAttendance</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($studentattendances as $key => $studentattendance)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$studentattendance->student->name}}</td>
                  <td>{{$studentattendance->month_id}}</td>
                  <td>{{$studentattendance->academicYear->year}}</td>
                  <td>{{$studentattendance->attendance}}</td>

                  <td>
                        @can('studentattendance-edit')
                            <a class="btn btn-primary" href="{{ route('studentattendances.edit',$studentattendance->id) }}">Edit</a>
                        @endcan
                        @can('studentattendance-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['studentattendances.destroy', $studentattendance->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>StudentName</th>
                  <th>Month</th>
                  <th>Academic Year</th>
                  <th>StudentAttendance</th>
                  <th>Actions</th>        
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
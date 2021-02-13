@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Academic Year</h3>
              <div class="pull-right">
            @can('Acyear-create')
            <a class="btn btn-success" href="{{ route('academicyears.create') }}" > Create New Year</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Year</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($academicyears as $key => $academicyear)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$academicyear->year}}</td>
                  <td>
                        @can('Acyear-edit')
                            <a class="btn btn-primary" href="{{ route('academicyears.edit',$academicyear->id) }}">Edit</a>
                        @endcan
                        @can('Acyear-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['academicyears.destroy', $academicyear->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Year</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $academicyears->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
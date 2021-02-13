@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Leave Reason</h3>
              <div class="pull-right">
            @can('leavereason-create')
            <a class="btn btn-success" href="{{ route('leavereasons.create') }}" > Create New LeaveReason</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>LeaveReason</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($leavereasons as $key => $leavereason)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$leavereason->reason}}</td>
                  <td>
                        @can('leavereason-edit')
                            <a class="btn btn-primary" href="{{ route('leavereasons.edit',$leavereason->id) }}">Edit</a>
                        @endcan
                        @can('leavereason-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['leavereasons.destroy', $leavereason->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>LeaveReason</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $leavereasons->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
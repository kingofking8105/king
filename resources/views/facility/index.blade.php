@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Facility</h3>
              <div class="pull-right">
            @can('facility-create')
            <a class="btn btn-success" href="{{ route('facilities.create') }}" > Create New Facility</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Facility</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($facilities as $key => $facility)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$facility->facility_name}}</td>
                  <td>
                        @can('facility-edit')
                            <a class="btn btn-primary" href="{{ route('facilities.edit',$facility->id) }}">Edit</a>
                        @endcan
                        @can('facility-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['facilities.destroy', $facility->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Facility</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $facilities->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
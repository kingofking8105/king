@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Donation Duration</h3>
              <div class="pull-right">
            @can('donationduration-create')
            <a class="btn btn-success" href="{{ route('donationdurations.create') }}" > Create New Duration</a>
            @endcan
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th> Duration</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donationdurations as $key => $donationduration)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$donationduration->duration_name}}</td>
                  <td>
                        @can('donationduration-edit')
                            <a class="btn btn-primary" href="{{ route('donationdurations.edit',$donationduration->id) }}">Edit</a>
                        @endcan
                        @can('donationduration-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['donationdurations.destroy', $donationduration->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Duration</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $donationdurations->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
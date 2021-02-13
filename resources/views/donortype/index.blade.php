@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Donor Type</h3>
              <div class="pull-right">
            @can('donortype-create')
            <a class="btn btn-success" href="{{ route('donortypes.create') }}" > Create New DonorType</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>DonorType</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donortypes as $key => $donortype)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$donortype->type_name}}</td>
                  <td>
                        @can('donortype-edit')
                            <a class="btn btn-primary" href="{{ route('donortypes.edit',$donortype->id) }}">Edit</a>
                        @endcan
                        @can('donortype-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['donortypes.destroy', $donortype->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>DonorType</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $donortypes->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
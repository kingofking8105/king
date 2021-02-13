@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Pngo Type</h3>
              <div class="pull-right">
            @can('pngotype-create')
            <a class="btn btn-success" href="{{ route('pngotypes.create') }}" > Create New PngoType</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>PngoType</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pngotypes as $key => $pngotype)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$pngotype->pngo_type}}</td>
                  <td>
                        @can('pngotype-edit')
                            <a class="btn btn-primary" href="{{ route('pngotypes.edit',$pngotype->id) }}">Edit</a>
                        @endcan
                        @can('pngotype-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['pngotypes.destroy', $pngotype->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>PngoType</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $pngotypes->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
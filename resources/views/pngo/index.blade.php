@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Name</h3>
              <div class="pull-right">
            @can('pngo-create')
            <a class="btn btn-success" href="{{ route('pngos.create') }}" > Create New Pngo</a>
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
                  <th>Address</th>
                  <th>Type</th>
                
                  <th>Asso. Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pngos as $key => $pngo)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$pngo->name}}</td>
                  <td>{{$pngo->address}}</td>
                  <td>{{$pngo->pngoType->pngo_type}}</td>
                 
                  <td>{{$pngo->association_date}}</td>
                  <td>
                        @can('pngo-edit')
                            <a class="btn btn-primary" href="{{ route('pngos.edit',$pngo->id) }}">Edit</a>
                        @endcan
                        @can('pngo-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['pngos.destroy', $pngo->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Address</th>
                  <th>Type</th>
                
                  <th>Asso. Date</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $pngos->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Pngo Project</h3>
              <div class="pull-right">
            @can('donorProject-create')
            <a class="btn btn-success" href="{{ route('pngoprojects.create') }}" > Create New Pngo</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Project ID</th>
                  <th>Pngo</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>District</th>
                  <th>Block</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($pngoprojects as $key => $donorProject)
                <tr>
                  <td>{{$donorProject->id}}</td>
                  <td>{{$donorProject->pngo->name}}</td>
                  <td>{{$donorProject->country->name}}</td>
                  <td>{{$donorProject->state->state}}</td>
                  <td>{{$donorProject->district->district}}</td>
                  <td>{{$donorProject->block->block}}</td>
                  <td>
                        @can('donorProject-edit')
                            <a class="btn btn-primary" href="{{ route('pngoprojects.edit',$donorProject->id) }}">Edit</a>
                        @endcan
                        @can('donorProject-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['pngoprojects.destroy', $donorProject->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                <th>Project ID</th>
                <th>Pngo</th>
                  <th>Country</th>
                  <th>State</th>
                  <th>District</th>
                  <th>Block</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $pngoprojects->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')
@section('content')
        <div class="box">
            <div class="box-header">
                  <h3 class="box-title"> Name</h3>
              <div class="pull-right">
              <a class="btn btn-primary" href="{{ route('pocs.index','list=Donor') }}" >Donor Poc</a>
              <a class="btn btn-primary" href="{{ route('pocs.index','list=Pngo') }}" >Pngo Poc</a>
                @can('poc-create')
                <a class="btn btn-success" href="{{ route('pocs.create','list=Donor') }}" >Create Donor Poc</a>
                  <a class="btn btn-success" href="{{ route('pocs.create','list=Pngo') }}" >Create Pngo Poc</a>
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
                    <th>Mobile</th>
                    <th>Email</th>
                    <th>Designation</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($pocs as $key => $poc)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$poc->poc_name}}</td>
                  <td>{{$poc->poc_mobile}}</td>
                  <td>{{$poc->poc_email}}</td>
                  <td>{{$poc->poc_designation}}</td>
                  <td>
                        @can('poc-edit')
                            <a class="btn btn-primary" href="{{ route('pocs.edit',$poc->id,'list='.request()->list) }}">Edit</a>
                        @endcan
                        @can('poc-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['pocs.destroy', $poc->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>Designation</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $pocs->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title">Learning Centers</h3>
              <div class="pull-right">
            @can('lc-create')
            <a class="btn btn-success" href="{{ route('lcs.create') }}" > Create Learning Center</a>
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
                    <th>Donor</th>
                    <th>Pngo</th>
                    <th>Start Date</th>
                    <th>Actions</th>
                  </tr>
                </thead>
                <tbody>
                @forelse($lcs as $key => $lc)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$lc->lc_name}}</td>
                  <td>{{$lc->lc_address}}</td>
                  <td>{{$lc->donor->name}}</td>
                  <td>{{$lc->pngo->name}}</td>
                  <td>{{$lc->lc_start_date}}</td>
                  <td>
                        @can('lc-edit')
                            <a class="btn btn-primary" href="{{ route('lcs.edit',$lc->id) }}">Edit</a>
                        @endcan
                        @can('lc-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['lcs.destroy', $lc->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                    <th>Donor</th>
                    <th>Pngo</th>
                    <th>Start Date</th>
                    <th>Actions</th>
                </tr>
                </tfoot>
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
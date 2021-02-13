@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Name</h3>
              <div class="pull-right">
            @can('donor-create')
            <a class="btn btn-success" href="{{ route('donors.create') }}" > Create New Donor</a>
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
                  <th>Duration</th>
                  <th>Asso. Date</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donors as $key => $donor)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$donor->name}}</td>
                  <td>{{$donor->address}}</td>
                  <td>{{$donor->donorType->type_name}}</td>
                  <td>{{$donor->donationDuration->duration_name}}</td>
                  <td>{{$donor->association_date}}</td>
                  <td>
                        @can('donor-edit')
                            <a class="btn btn-primary" href="{{ route('donors.edit',$donor->id) }}">Edit</a>
                        @endcan
                        @can('donor-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['donors.destroy', $donor->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Duration</th>
                  <th>Asso. Date</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $donors->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Donation Type</h3>
              <div class="pull-right">
            @can('donationtype-create')
            <a class="btn btn-success" href="{{ route('donationtypes.create') }}" > Create New DonationType</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>DonationType</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donationtypes as $key => $donationtype)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$donationtype->donation_type_name}}</td>
                  <td>
                        @can('donationtype-edit')
                            <a class="btn btn-primary" href="{{ route('donationtypes.edit',$donationtype->id) }}">Edit</a>
                        @endcan
                        @can('donationtype-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['donationtypes.destroy', $donationtype->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>DonationType</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $donationtypes->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
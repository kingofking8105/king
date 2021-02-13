@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Donation Frequency</h3>
              <div class="pull-right">
            @can('donationfreq-create')
            <a class="btn btn-success" href="{{ route('donationfrequencies.create') }}" > Create New Frequency</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Frequency</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($donationfrequencies as $key => $donationfrequency)
                <tr>
                  <td>{{++$key}}</td>
                  <td>{{$donationfrequency->freq_name}}</td>
                  <td>
                        @can('donationfreq-edit')
                            <a class="btn btn-primary" href="{{ route('donationfrequencies.edit',$donationfrequency->id) }}">Edit</a>
                        @endcan
                        @can('donationfreq-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['donationfrequencies.destroy', $donationfrequency->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                  <th>Frequency</th>
                  <th>Actions</th>
                </tr>
                </tfoot>
                {!! $donationfrequencies->render() !!}
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
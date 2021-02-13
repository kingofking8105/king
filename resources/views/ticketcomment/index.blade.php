@extends('layouts.app')
@section('content')
<div class="box">
            <div class="box-header">
              <h3 class="box-title"> Ticket Comment</h3>
              <div class="pull-right">
            @can('ticketcomment-create')
            <a class="btn btn-success" href="{{ route('ticketcomments.create') }}" > Create New TicketComment</a>
            @endcan
        </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>No</th>
                  <th>Lc</th>
                  <th>User</th>
                  <th>TicketComment</th>
                  <th>Actions</th>
                </tr>
                </thead>
                <tbody>
                @forelse($ticketcomments as $key => $ticketcomment)
                <tr>
                  <td>{{++$key}}</td>

                  <td>{{$ticketcomment->lcTicket->lc->lc_name}}</td>
                  <td>{{$ticketcomment->user->name}}</td>
                  <td>{{$ticketcomment->ticket_comments}}</td>

                  <td>
                        @can('ticketcomment-edit')
                            <a class="btn btn-primary" href="{{ route('ticketcomments.edit',$ticketcomment->id) }}">Edit</a>
                        @endcan
                        @can('ticketcomment-delete')
                            {!! Form::open(['method' => 'DELETE','route' => ['ticketcomments.destroy', $ticketcomment->id],'style'=>'display:inline','onclick'=>'return confirm("Are you sure you want to delete this?")']) !!}
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
                <th>Lc</th>
                  <th>User</th>
                  <th>TicketComment</th>
                  <th>Actions</th>            
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
@endsection
@extends('layouts.app')

@section('content')

<section class="content-header">
        <h1>
            Dashboard
            <small></small>
        </h1>
        <ol class="breadcrumb">
            <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
            <li class="active">Dashboard</li>
        </ol>
</section>

    <!-- Main content -->
    <section class="content">
        <!-- Info boxes -->
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-aqua"><i class="fa fa-thumbs-up"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">Active LC</span>
                        <span class="info-box-number">{{\App\Model\Lc\Lc::where('status','1')->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="info-box">
                    <span class="info-box-icon bg-red"><i class="fa fa-thumbs-down"></i></span>

                    <div class="info-box-content">
                        <span class="info-box-text">InActive LC</span>
                        <span class="info-box-number">{{\App\Model\Lc\Lc::where('status','0')->count()}}</span>
                    </div>
                    <!-- /.info-box-content -->
                </div>
                <!-- /.info-box -->
            </div>
            <!-- /.col -->

            <!-- fix for small devices only -->
            <div class="clearfix visible-sm-block"></div>

          
        </div>
        <!-- /.row -->

        <div class="row">
            <div class="col-md-12">
                <div class="box">
                    <div class="box-header with-border">
                        <h3 class="box-title">New LC Opened</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <div class="btn-group">
                                <button type="button" class="btn btn-box-tool dropdown-toggle" data-toggle="dropdown">
                                    <i class="fa fa-wrench"></i></button>
                                <ul class="dropdown-menu" role="menu">
                                    <li><a href="#">Action</a></li>
                                    <li><a href="#">Another action</a></li>
                                    <li><a href="#">Something else here</a></li>
                                    <li class="divider"></li>
                                    <li><a href="#">Separated link</a></li>
                                </ul>
                            </div>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <div class="row">
                            <div class="col-md-12">
                                <p class="text-center">
                                    <strong>Academic Year 2019-20</strong>
                                </p>
    <input type="hidden" value="{{$year}}" id="chart-data" >
                                <div class="chart">
                                    <!-- Sales Chart Canvas -->
                                    <canvas id="salesChart" style="height: 180px;"></canvas>
                                </div>
                                <!-- /.chart-responsive -->
                            </div>
                            <!-- /.col -->
                           
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->
                    </div>
                    <!-- ./box-body -->
                   
        <!-- /.row -->
    <!-- Main content -->
    <section class="content">
        <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LC By State</h3>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>State</th>
                  <th>Count</th>
                </tr>
                </thead>
                <tbody>
                @forelse ($stateLcs as $statelc)
                <tr>
                  <td>{{$statelc->state}}</td>
                  <td>{{$statelc->total}}</td>
                </tr>
                @empty
                    No Record Found !!
                @endforelse
                </tbody>
                <tfoot>
                <tr>
                    <th>State</th>
                    <th>Count</th>
                </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <div class="row">
    <div class="col-xs-12">
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LC By PNGO</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>PNGO Name</th>
                  <th>Count</th>
                 
                </tr>
                @forelse ($pngoLcs as $pngolc)
                <tr>
                  <td>{{$pngolc->name}}</td>
                  <td>{{$pngolc->total}}</td>
                
                </tr>
                @empty
                    No Record Found !!
                @endforelse
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <div class="col-xs-6">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">LC By DONOR</h3>

              <div class="box-tools">
                <div class="input-group input-group-sm hidden-xs" style="width: 150px;">
                  <input type="text" name="table_search" class="form-control pull-right" placeholder="Search">

                  <div class="input-group-btn">
                    <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
                  </div>
                </div>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body table-responsive no-padding">
              <table class="table table-hover">
                <tr>
                  <th>DONOR Name</th>
                  <th>Count</th>
                 
                </tr>
                
                @forelse ($donorLcs as $donorlc)
                <tr>
                  <td>{{$donorlc->name}}</td>
                  <td>{{$donorlc->total}}</td>
                
                </tr>
                @empty
                    No Record Found !!
                @endforelse
               
              </table>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
      </div>
      </div>
      
    </section>
    <!-- /.content -->

@endsection

@extends('layouts.app_admin')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <div style="text-align: center;">
                    <span class="info-box-number" style="font-size: 40px">{{ $users_count }}</span>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Short Parts</span>
                  <div style="text-align: center;">
                    <span class="info-box-number" style="font-size: 40px">
                      <a href="{{ url('shortparts/by/partnumbers') }}" style="color: black">
                        {{ $short_parts_count }}
                      </a>
                    </span>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Argas Balance</span>
                  <div style="text-align: center;">
                    <span class="info-box-number" style="font-size: 40px">
                      <a href="{{ url('argas') }}" style="color: black">
                        {{ $argas_balance }}
                      </a>
                    </span>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Suppliers</span>
                  <div style="text-align: center;">
                    <span class="info-box-number" style="font-size: 40px">
                      <a href="{{ route('suppliers.index') }}" style="color: black">
                        {{ $suppliers_count }}
                      </a>
                    </span>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>

            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Missing Parts</span>
                  <div style="text-align: center;">
                    <span class="info-box-number" style="font-size: 40px">
                      <a href="{{ route('missingparts.index') }}" style="color: black">
                        {{ $missingparts_count }}
                      </a>
                    </span>
                  </div>
                </div>
                <!-- /.info-box-content -->
              </div>
              <!-- /.info-box -->
            </div>
        </div>
        <div class="row">
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active text-center">
                  <h3 class="widget-user-username" style="margin-left:0px">Top 10 Selling Parts</h3> 
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    @foreach($top_qty as $item)
                        <li>
                          <a class="disabled">
                            {{ $item->partno }}
                            <span class="pull-right badge bg-blue">
                              {{ $item->qty }}
                            </span>
                          </a>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active text-center">
                  <h3 class="widget-user-username" style="margin-left:0px">Latest 10 Short Parts</h3> 
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    @foreach($top_short as $item)
                        <li>
                          <a class="disabled">
                            {{ $item->partno }}
                            <span style="color:#999; font-size:10px; margin-left: 10px">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span> 
                            <span class="pull-right badge bg-blue">
                              {{ $item->request - $item->received }}
                            </span>
                          </a>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active text-center">
                  <h3 class="widget-user-username" style="margin-left:0px">Latest 10 Argas Balance</h3> 
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    @foreach($latest_argas_balance as $item)
                        <li>
                          <a class="disabled">
                            {{ $item->partno }}
                            <span style="color:#999; font-size:10px; margin-left: 10px">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span> 
                            <span class="pull-right badge bg-blue">
                              {{ $item->balance() }}
                            </span>
                          </a>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>

            <div class="col-md-4">
              <!-- Widget: user widget style 1 -->
              <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active text-center">
                  <h3 class="widget-user-username" style="margin-left:0px">Latest 10 Missing Parts</h3> 
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    @foreach($latest_missing as $item)
                        <li>
                          <a class="disabled">
                            {{ $item->partno }}
                            <span style="color:#999; font-size:10px; margin-left: 10px">{{ \Carbon\Carbon::parse($item->created_at)->diffForHumans() }}</span> 
                            <span class="pull-right badge bg-blue">
                              {{ $item->qty }}
                            </span>
                          </a>
                        </li>
                    @endforeach
                  </ul>
                </div>
              </div>
              <!-- /.widget-user -->
            </div>
        </div>
    </section>
@endsection()
@extends('layouts.app_admin')

@section('content')
    <section class="content">
        <div class="row">
            <div class="col-md-3 col-sm-6 col-xs-12">
              <div class="info-box">
                <span class="info-box-icon bg-aqua"><i class="fa fa-users"></i></span>

                <div class="info-box-content">
                  <span class="info-box-text">Users</span>
                  <span class="info-box-number">{{ $users_count }}</span>
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
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username">Top 10 Selling Parts</h3> 
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
                <div class="widget-user-header bg-aqua-active">
                  <h3 class="widget-user-username">Latest 10 Short Parts</h3> 
                </div>
                <div class="box-footer no-padding">
                  <ul class="nav nav-stacked">
                    @foreach($top_short as $item)
                        <li>
                          <a class="disabled">
                            {{ $item->partno }}
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
        </div>
    </section>
@endsection()
@extends('layouts.app_admin')

@section('content')
    <section class="content">
        @if(!$missing && !$shortpart && !$argas)
            <div class="row"> 
                <div class="col-md-6 col-md-offset-3">
                    <div class="callout callout-warning">
                        <h4>{{ $partno_search }}</h4>

                        <p>Ops ! I did not know where is this spare part !</p>
                    </div>
                </div>
            </div>
        @else
            <div class="row"> 
                <div class="col-md-6 col-md-offset-3">
                    <div class="callout callout-success">
                        <h4>{{ $partno_search }}</h4>

                        <p>Yehey ! I found it !</p>
                    </div>
                </div>
            </div>
            <div class="row">
            
                @if($missing)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Missing Parts</span>
                          <div style="text-align: center;">
                            <span class="info-box-number" style="font-size: 40px">
                              <a href="{{ route('missingparts.index') }}" style="color: black">
                                {{ $missing->qty }}
                              </a>
                            </span>
                          </div>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                @endif

                @if($shortpart)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Short Parts</span>
                          <div style="text-align: center;">
                            <span class="info-box-number" style="font-size: 40px">
                              <a href="{{ url('shortparts/by/partnumbers') }}" style="color: black">
                                {{ $shortpart }}
                              </a>
                            </span>
                          </div>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                @endif

                @if($argas)
                    <div class="col-md-3 col-sm-6 col-xs-12">
                      <div class="info-box">
                        <span class="info-box-icon bg-aqua"><i class="{{ icon_random_adminlte() }}"></i></span>

                        <div class="info-box-content">
                          <span class="info-box-text">Argas</span>
                          <div style="text-align: center;">
                            <span class="info-box-number" style="font-size: 40px">
                              <a href="{{ url('argas') }}" style="color: black">
                                {{ $argas }}
                              </a>
                            </span>
                          </div>
                        </div>
                        <!-- /.info-box-content -->
                      </div>
                      <!-- /.info-box -->
                    </div>
                @endif
            </div>
        @endif

    </section>
@endsection()
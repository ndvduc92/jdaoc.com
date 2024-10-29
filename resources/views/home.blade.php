@extends('layouts.master')
@section('content')
    <div class="row" style="display: inline-block;">
        <div class=" top_tiles" style="margin: 10px 0;">
            <div class="col-md-3 col-sm-3  tile">
                <span>Thành viên</span>
                <h2>{{ $data['users'] }}</h2>
                <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                        style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
            </div>
            <div class="col-md-3 col-sm-3  tile">
                <span>Doanh thu ngày</span>
                <h4>{{ number_format($data['revenue_today']) }}đ</h4>
                <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                        style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
            </div>

            <div class="col-md-3 col-sm-3  tile">
                <span>Tổng doanh thu</span>
                <h4>{{ number_format($data['revenue']) }}đ</h4>
                <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="125"
                        style="display: inline-block; width: 478px; height: 125px; vertical-align: top;"></canvas></span>
            </div>
        </div>
    </div>
    <div class="row">
        
        <div class="col-md-12 col-sm-12 ">
            <div class="x_content">
                <div class="row">
                    <a class="animated flipInY col-lg-3 col-md-3 col-sm-6  " href="/tools?type=online">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count">&nbsp</div>

                            <h6 class="ml-2">Danh sách online</h6>
                        </div>
                    </a>
                    <a class="animated flipInY col-lg-3 col-md-3 col-sm-6 " href="/trades">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-exchange"></i>
                            </div>
                            <div class="count">&nbsp</div>

                            <h6 class="ml-2">Check giao dịch Game</h6>
                        </div>
                    </a>
                    <a class="animated flipInY col-lg-3 col-md-3 col-sm-6  " href="/items">
                        <div class="tile-stats">
                            <div class="icon"><i class="fa fa-check-square-o"></i>
                            </div>
                            <div class="count">&nbsp</div>

                            <h6 class="ml-2">Tra cứu item</h6>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>
@endsection

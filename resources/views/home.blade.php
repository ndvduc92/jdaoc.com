@extends('layouts.master')
@section('content')
<div class="row" style="display: inline-block;">
    <div class=" top_tiles" style="margin: 10px 0;">
        <div class="col-md-3 col-sm-3  tile">
            <span>Thành viên</span>
            <h2>{{ $data['users'] }}</h2>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="20"
                    style="display: inline-block; width: 478px; height: 20px; vertical-align: top;"></canvas></span>
        </div>
        <div class="col-md-3 col-sm-3  tile">
            <span>Doanh thu ngày</span>
            <h4>{{ number_format($data['revenue_today']) }}đ</h4>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="20"
                    style="display: inline-block; width: 478px; height: 20px; vertical-align: top;"></canvas></span>
        </div>

        <div class="col-md-3 col-sm-3  tile">
            <span>Tổng doanh thu</span>
            <h4>{{ number_format($data['revenue']) }}đ</h4>
            <span class="sparkline_one" style="height: 160px;"><canvas width="478" height="20"
                    style="display: inline-block; width: 478px; height: 20px; vertical-align: top;"></canvas></span>
        </div>
    </div>
</div>
<div class="row">
    <div class="page-title">
        <div class="title_left">
            <h3 class="ml-2">Công cụ Game</h3>
        </div>
    </div>
    <div class="col-md-12 col-sm-12 ">
        <div class="x_content">
            @include('layouts.tools')
        </div>
    </div>
</div>
@endsection
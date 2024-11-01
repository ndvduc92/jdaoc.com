@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Thông tin khuyến mãi</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Bắt đầu</th>
                                            <th>Kết thúc</th>
                                            <th>Loại khuyến mãi</th>
                                            <th>Tỉ lệ</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($promotions as $item)
                                        <tr>
                                            <th><a class="btn btn-sm btn-danger" href="/promotions/{{ $item->id }}/edit">Sửa</a></th>
                                            <th>{{\Carbon\Carbon::parse($item->start_time)->format("d/m/Y")}}</th>
                                            <td>{{\Carbon\Carbon::parse($item->end_time)->format("d/m/Y")}}</td>
                                            <td>{{$item->getType()}}</td>
                                            <td>{{$item->type == "double" ? "x".$item->amount : $item->amount."%" }}</td>
                                        </tr>
                                        @endforeach

                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
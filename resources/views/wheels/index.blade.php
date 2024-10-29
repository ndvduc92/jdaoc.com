@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Danh sách giftcode</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_title">
                    <a href="/wheels/add" class="nav navbar-right panel_toolbox">
                        <li>
                            <button href="/wheels/add" role="" class="btn btn-success">Thêm Mới</button>
                        </li>
                    </a>
                    <div class="clearfix"></div>
                </div>
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>#</th>
                                            <th>Tên</th>
                                            <th>Loại</th>
                                            <th>Vip Level</th>
                                            <th>Xu cần</th>
                                            <th>Số lần/ngày</th>
                                            <th>Trạng thái</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($wheels as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td>{{$item->name}}</td>
                                            <td>{{\App\Models\Wheel::TYPES[$item->type]}}</td>
                                            <td>{{$item->viplevel}}</td>
                                            <td>{{$item->coin_amount}}</td>
                                            <td>{{$item->num_of_times}}</td>
                                            <td>{{$item->status}}</td>
                                            <th>
                                                <a class="btn btn-sm btn-success" href="/wheels/{{$item->id}}/items">Cài đặt</a>
                                            </th>

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
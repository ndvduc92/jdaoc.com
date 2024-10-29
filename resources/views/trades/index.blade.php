@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Kiểm tra giao dịch game</h3>
            </div>
            <br>
        </div>
        <br>
        <div class="x_title">
            <a href="/trades?fetch=true" class="nav navbar-right panel_toolbox">
                <li>
                    <button class="btn btn-success">Lấy dữ liệu mới nhất</button>
                </li>
            </a>
            <div class="clearfix"></div>
        </div>
        <div class="clearfix"></div>
        <br>
        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="card-box table-responsive">
                                    <table id="datatable-buttons" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Ngày giao dịch</th>
                                                <th>Từ nhân vật</th>
                                                <th>Đến nhân vật</th>
                                                <th>Vật phẩm</th>
                                            </tr>
                                        </thead>


                                        <tbody>
                                            @foreach ($trades as $item)
                                                <tr>
                                                    <th scope="row">
                                                        {{ $loop->index + 1 }}
                                                    </th>
                                                    <th>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y H:i:s') }}</th>
                                                    <th>{{ $item->from_char->name }} ({{ $item->from_char_id }})</th>
                                                    <th>{{ $item->to_char->name }} ({{ $item->to_char_id }})</th>
                                                    <th>
                                                        <ul class="list-group">
                                                            @foreach ($item->items as $it)
                                                                @if($it->item->name == "")
                                                                    <li class="list-group-item">Không xác định</li>
                                                                @else
                                                                    <li class="list-group-item"><img src="{{$it->item->image}}" alt="" srcset=""> {{ $it->item->name }} (x{{$it->quantity}})</li>
                                                                @endif
                                                            @endforeach
                                                          </ul>
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

    <style>
        .dt-buttons {
            display: none !important;
        }
    </style>
@endsection

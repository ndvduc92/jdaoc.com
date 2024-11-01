@extends('layouts.master')
@section('content')
<style>
    .dt-buttons {
        display: none !important;
    }
</style>

<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3 class="ml-2">Công cụ Game</h3>
        </div>
    </div>

    <br>
    <div class="x_title">
        <a href="/tools/fetch?type={{request()->type}}" class="nav navbar-right panel_toolbox">
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
            <div class="x_content">
                @include('layouts.tools')
            </div>

            <div class="card-box table-responsive">
                @if(request()->type === 'trade')
                    <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
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
                                        <li class="list-group-item"><img src="{{$it->item->image}}" alt="" srcset=""> {{
                                            $it->item->name }}
                                            (x{{$it->quantity}})</li>
                                        @endif
                                        @endforeach
                                    </ul>
                                </th>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
                @if(request()->type === 'online')
                    <table id="datatable-buttons" class="table card-box table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nhân vât</th>
                                <th>Level</th>
                                <th>Tọa độ X</th>
                                <th>Tọa độ Y</th>
                                <th>Tọa độ Z</th>
                                <th>Map</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($onlines as $user)
                            <tr>
                                <th>{{ $user["char_id"] }}</th>
                                <th>{{ $user["name"] }}</th>
                                <th>{{ $user["level"] }}</th>
                                <th>{{ $user["posx"] }}</th>
                                <th>{{ $user["posy"] }}</th>
                                <th>{{ $user["posz"] }}</th>
                                <th>{{ $user["worldtag"] }}</th>
                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
                @if(request()->type === 'refine')
                    <table id="datatable-buttons" class="card-box table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Thời gian</th>
                                <th>Nhân vật</th>
                                <th>Level trước</th>
                                <th>Level sau</th>
                                <th>Trang bị</th>
                                <th>Phù luyện khí</th>
                            </tr>
                        </thead>


                        <tbody>
                            @foreach ($trades as $item)
                            <tr>
                                <th>{{ \Carbon\Carbon::parse($item->date)->format('d/m/Y H:i:s') }}</th>
                                <th>{{ $item->char->name }}</th>
                                <th>{{ $item->refine_level_before }}</th>
                                <th>{{ $item->refine_level_after }}</th>
                                <th>{{ $item->item->name }}</th>
                                <th>{{ $item->stone->name }}</th>

                            </tr>
                            @endforeach

                        </tbody>
                    </table>
                @endif
            </div>
        </div>
    </div>
</div>
@endsection
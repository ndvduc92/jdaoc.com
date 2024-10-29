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
                    <a href="/giftcodes/add" class="nav navbar-right panel_toolbox">
                        <li>
                            <button href="/giftcodes/add" role="" class="btn btn-success">Thêm Mới</button>
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
                                            <th>Giftcode</th>
                                            <th>Vật phẩm</th>
                                            <th>Loại</th>
                                            <th>Tài Khoản</th>
                                            <th>Ngày hết hạn</th>
                                            <th>Lượt dùng</th>
                                            <th>Thao tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($giftcodes as $item)
                                        <tr>
                                            <td>{{ $loop->index + 1}}</td>
                                            <td>{{$item->giftcode}}</td>
                                            <td>
                                                <ul>
                                                    @foreach ($item->items as $it)
                                                    <li>{{$it->quantity}} cái {{$it->name}} ({{$it->bind == "19" ? "Khóa" : "Không khóa"}})</li>
                                                    @endforeach
                                                    
                                                </ul>
                                            </td>
                                            <td>{{ \App\Models\Giftcode::TYPES[$item->type]}}</td>
                                            <th>
                                                @if($item->type =="account")
                                                <p>
                                                    <a class="btn btn-primary btn-sm" data-toggle="collapse" href="#collapseExample{{$item->id}}" role="button" aria-expanded="false" aria-controls="collapseExample">
                                                      Danh sách
                                                    </a>
                                                  </p>
                                                  <div class="collapse" id="collapseExample{{$item->id}}">
                                                    <div class="card card-body">
                                                        <ul>
                                                            @foreach ($item->only_users as $item2)
                                                            <li>
                                                                {{$item2->user->username}} ({{"AOC".$item2->user->userid}}) 
                                                                <a href="/giftcodes/{{$item->id}}/accounts/{{$item2->user_id}}/delete" class="btn btn-sm btn-danger">Xóa</a>
                                                            </li>
                                                            @endforeach
                                                        </ul>
                                                    </div>
                                                  </div>
                                                
                                                    
                                                @else
                                                    -------
                                                @endif
                                            </th>
                                            <td>{{\Carbon\Carbon::parse($item->expired)->format("d/m/Y")}}</td>
                                            <td>{{$item->count }}</td>
                                            <th>
                                                <a class="btn btn-sm btn-success" href="/giftcodes/{{$item->id}}/items">Vật phẩm</a>
                                                @if ($item->type == "account")
                                                <a class="btn btn-sm btn-danger" href="/giftcodes/{{$item->id}}/accounts">Gắn Tài Khoản</a>
                                                @endif
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
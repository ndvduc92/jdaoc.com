@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Thông tin vật phẩm</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_title">
                        <a href="#" class="nav navbar-right panel_toolbox">
                            <a href="/mail/add_fast"><button role="" class="btn btn-sm btn-success">Gửi
                                    nhanh</button></a>
                            <a href="/mail/add"><button role="" class="btn btn-sm btn-primary">Gửi theo tài
                                    khoản</button></a>
                            <a href="/mail/add_all"><button role="" class="btn btn-sm btn-danger">Gửi quà máy
                                    chủ</button></a>
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
                                                <th>Hình thức</th>
                                                <th>Tên tài khoản</th>
                                                <th>ID nhân vật</th>
                                                <th>ID vật phẩm</th>
                                                <th>Mô tả</th>
                                                <th>Người gửi</th>
                                                <th>Thời gian gửi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mails as $item)
                                                <tr>
                                                    <td>{{ $loop->index + 1 }}</td>
                                                    <td>{{ \App\Models\Mail::TYPES[$item->type] }}</td>
                                                    <td>
                                                        @if ($item->char_id)
                                                            {{ $item->char->user->username }}
                                                        @endif
                                                    </td>
                                                    <td>
                                                        @if ($item->char_id)
                                                            {{ $item->char->name }} ({{ $item->char_id }})
                                                        @endif
                                                    </td>
                                                    <td><img src="{{ $item->item->image }}" alt="" srcset=""> {{ $item->item->name }} ({{ $item->quantity }} cái)</td>
                                                    <td>{{ $item->description }}
                                                    <td>{{ $item->sender->username }}
                                                    <td>{{ \Carbon\Carbon::parse($item->expired)->format('d/m/Y H:i:s') }}
                                                    </td>
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

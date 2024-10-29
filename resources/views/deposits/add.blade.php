@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Tạo lệnh tay bổ sung</h3>
        </div>
    </div>

    <div class="clearfix"></div>

    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <br>
                    <form action="" method="POST" class="form-horizontal form-label-left">
                        @csrf
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">User</label>
                            <div class="col-md-6 col-sm-6 ">
                                <select class="select2_single form-control" tabindex="-1" name="user_id">
                                        <option value="">--Chọn tài khoản hoặc để trống--</option>
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}">{{ $item->username }} (AOC{{ $item->userid }})</option>
                                        @endforeach

                                    </select>
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số tiền</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="amount" class="form-control">
                            </div>
                        </div>
                        <div class="item form-group">
                            <label class="col-form-label col-md-3 col-sm-3 label-align">Số tiền sau khi KM</label>
                            <div class="col-md-6 col-sm-6 ">
                                <input type="number" name="amount_promotion" class="form-control">
                            </div>
                        </div>
                        <div class="ln_solid"></div>
                        <div class="item form-group">
                            <div class="col-md-6 col-sm-6 offset-md-3">
                                <a href="/promotions" class="btn btn-danger" type="button">Huỷ</a>
                                <button type="submit" class="btn btn-success">Thêm</button>
                            </div>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
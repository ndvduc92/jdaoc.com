@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tài khoản gắn với Giftcode</h3>
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
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            @if (Session::has('error'))
                                <p class="alert alert-danger">{{ Session::get('error') }}</p>
                            @endif
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Mã Giftcode</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input disabled readonly value="{{ $giftcode->giftcode }}" name="giftcode"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Loại hình giftcode</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select multiple="multiple" class="select2_multiple form-control" tabindex="-1"
                                        name="user_ids[]">
                                        @foreach ($users as $item)
                                            <option value="{{ $item->id }}"
                                                {{ in_array($item->id, (array) $user_ids) ? 'selected' : '' }}>
                                                {{ $item->username }} - {{ 'AOC' . $item->userid }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                
                            </div>
                            <div class="item form-group">
                                <label class="">Account đã gắn với giftcode này:
                                    <ul>
                                        @foreach ($user_ids as $item)
                                            <li>
                                                {{$item->user->username}} ({{"AOC".$item->user->userid}}) 
                                                <a href="/giftcodes/{{$giftcode->id}}/accounts/{{$item->user_id}}/delete" class="btn btn-sm btn-danger">Xóa</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </label>
                                
                            </div>
                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="/giftcodes" class="btn btn-danger" type="button">Huỷ</a>
                                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                                </div>
                            </div>

                        </form>
                        <div class="ln_solid"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Sửa giftcode</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                        <br>
                        <form action="/giftcodes/{{ $giftcode->id }}/update" method="POST"
                            class="form-horizontal form-label-left">
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
                                    <input value="{{ $giftcode->giftcode }}" name="giftcode" class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Loại hình giftcode</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <select class="form-control" name="type">
                                        @foreach (\App\Models\Giftcode::TYPES as $key => $value)
                                            <option value="{{ $key }}"
                                                {{ $giftcode->type == $key ? 'selected' : '' }}>{{ $value }}</option>
                                        @endforeach

                                    </select>
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Loại VIP (bỏ qua nếu không phải
                                    VIP)</label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input type="number" value="{{ $giftcode->viplevel }}" name="viplevel"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="item form-group">
                                <label class="col-form-label col-md-3 col-sm-3 label-align">Ngày hết hạn <span
                                        class="required">*</span>
                                </label>
                                <div class="col-md-6 col-sm-6 ">
                                    <input name="expired" class="form-control" placeholder="dd-mm-yyyy" type="date"
                                        required="required"
                                        value="{{ \Carbon\Carbon::parse($giftcode->expired)->format('Y-m-d') }}">
                                </div>
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
                        <h5 class="col-md-3 col-sm-3 ">Danh sách vật phẩm <span class="required">*</span></h5>
                        @include('items.widget')
                        <form class="card-box" action="/giftcodes/{{ $giftcode->id }}/items" method="POST">
                            @csrf
                            <table class="table" id="items_table">
                                <thead>
                                    <tr>
                                        <th></th>
                                        <th>Ảnh</th>
                                        <th>Tên vật phẩm</th>
                                        <th>ID vật phẩm</th>
                                        <th>Số lượng</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if (count($giftcode->items))
                                        @foreach ($giftcode->items as $item)
                                            <tr class="first_item">
                                                <th><span role="button"
                                                        class="btn btn-danger btn-sm remove_item">Xóa</button>
                                                </th>
                                                <th>
                                                    <img src="{{$item->item->image}}" alt="" srcset="">
                                                </th>
                                                <th>
                                                    <input type="hidden" value="{{ $item->id }}" name="id[]"
                                                        class="form-control">
                                                    <input type="text" disabled value="{{ $item->item->name }}" name="name[]"
                                                        class="form-control">
                                                </th>
                                                <th><input required type="number" value="{{ $item->itemid }}" name="itemid[]"
                                                        class="form-control"></th>
                                                <th><input required type="number" value="{{ $item->quantity }}" name="quantity[]"
                                                        class="form-control"></th>
                                                <th>
                                                    <select name="bind[]" class="form-control">
                                                        <option value="19" {{ $item->bind == '19' ? 'selected' : '' }}>
                                                            Khóa</option>
                                                        <option value="0" {{ $item->bind == '0' ? 'selected' : '' }}>
                                                            Không Khóa</option>
                                                    </select>
                                                </th>
                                            </tr>
                                        @endforeach
                                    @else
                                        <tr class="first_item">
                                            <th><span role="button" class="btn btn-danger btn-sm remove_item">Xóa</button>
                                            </th>
                                            <th></th>
                                            <th>
                                                <input type="hidden" name="id[]" class="form-control">
                                                <input required type="text" disabled name="name[]" class="form-control">
                                            </th>
                                            <th><input required type="number" name="itemid[]" class="form-control"></th>
                                            <th><input required type="number" name="quantity[]" class="form-control"></th>
                                            <th>
                                                <select name="bind[]" class="form-control">
                                                    <option value="19">Khóa
                                                    </option>
                                                    <option value="0">Không
                                                        Khóa</option>
                                                </select>
                                            </th>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                            <span role="button" id="addNew" class="btn btn-secondary btn-sm">Thêm Item</button></span>
                            <div class="ln_solid"></div>

                            <div class="item form-group">
                                <div class="col-md-6 col-sm-6 offset-md-3">
                                    <a href="/giftcodes" class="btn btn-danger" type="button">Huỷ</a>
                                    <button type="submit" class="btn btn-success">Cập Nhật</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
        integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script>
        $(document).ready(function() {
            var $add_button = $('#addNew');
            var $first_item = $('#first_item');
            var $items_table = $('#items_table');

            $add_button.click(function() {
                const el = `<tr class="first_item">
                                            <th><span role="button" class="btn btn-danger btn-sm remove_item">Xóa</button>
                                            </th>
                                            <th></th>
                                            <th>
                                                <input type="hidden" name="id[]" class="form-control">
                                                <input disabled required type="text" name="name[]" class="form-control">
                                            </th>
                                            <th><input required type="number" name="itemid[]" class="form-control"></th>
                                            <th><input required type="number" name="quantity[]" class="form-control"></th>
                                            <th>
                                                <select name="bind[]" class="form-control">
                                                    <option value="19">Khóa
                                                    </option>
                                                    <option value="0">Không
                                                        Khóa</option>
                                                </select>
                                            </th>
                                        </tr>`
                $("#items_table tbody").append(el);
            });

            $(document).on('click', '.remove_item', function() {
                $(this).closest("tr").remove()

            });
        });
    </script>
@endsection

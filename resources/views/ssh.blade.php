@extends('layouts.master')

@section('content')
    <div id="container" class="container">
        <div class="x_panel">
            <div class="x_title">
                <h2>Một số lệnh quản lý server</h2>
                <ul class="nav navbar-right panel_toolbox">
                    <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                            aria-expanded="false"><i class="fa fa-wrench"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                            <a class="dropdown-item" href="#">Settings 1</a>
                            <a class="dropdown-item" href="#">Settings 2</a>
                        </div>
                    </li>
                    <li><a class="close-link"><i class="fa fa-close"></i></a>
                    </li>
                </ul>
                <div class="clearfix"></div>
            </div>
            <div class="x_content">

                <div class="bs-example" data-example-id="simple-jumbotron">
                    <div class="" style="padding: 2rem 1rem; color:black; font-size: 16px">
                        <i class="glyphicon glyphicon-hand-right"></i> Đăng nhập vào server <a href="/ssh" target="_blank">TẠI ĐÂY</a> <br>
                        <i class="glyphicon glyphicon-hand-right"></i> Một số lệnh chính:<br>
                        + Truy cập vào menu, gõ lệnh:
                        <div class="codeBlock">./menu.sh</div>
                        &nbsp&nbsp&nbsp&nbspvà nhấn phím số 2 để bắt đầu chạy Channel 1 với full map và phụ bản (Ngoại trừ Lăng Tiêu Thành và map War chạy riêng)<br>
                        + Lưu ý: Chờ từ 5-10p để server có thể khởi động xong và hiện thông báo chạy thành công.<br>
                        + Nhấn phím số 2 để chạy map Lăng Tiêu Thành và phím 3 để chạy map war Bang Hội. <br>
                        + Nhấn phím 12 để tắt server <strong style="color: red">(Cẩn thận - chỉ tắt khi bảo trì)</strong><br>
                        + Nhấn phím 0 để thoát khỏi menu

                        <br>
                        <br>
                        <i class="glyphicon glyphicon-hand-right"></i> Chạy thêm nhiều kênh:<br>
                        + Sau khi thoát khỏi Menu, gõ lệnh:
                        <div class="codeBlock">./channel</div>
                        + Chạy kênh nào thì nhấn phím số ấy, ví dụ nhấn phím số 2 để chạy kênh 2, số 3 để chạy kênh 3... chờ khi kênh này khởi động xong rồi mới chạy kênh khác.<br>

                    </div>
                </div>

            </div>
        </div>
    </div>
    <style>
        .codeBlock {
    position: relative;
    display: block;
    padding: 9.5px;
    margin: 0 0 10px;
    font-size: 15px;
    line-height: 1.42857143;
    color: #333;
    word-break: break-all;
    word-wrap: break-word;
    background-color: #f5f5f5;
    border: 1px solid #ccc;
    border-left: 5px solid #09f;
    border-radius: 4px;
    font-family: Consolas, Courier New, monospace;
}
    </style>
@endsection

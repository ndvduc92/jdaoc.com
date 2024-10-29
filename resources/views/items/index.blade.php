@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Tra cứu vật phẩm</h3>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_panel">
                    <div class="x_content">
                            @include("items.widget")
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

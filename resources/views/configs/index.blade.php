@extends('layouts.master')
@section('content')
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h6 class="ml-2">Công cụ Game</h6>
            </div>
        </div>

        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12 col-sm-12 ">
                <div class="x_content">
                    <div class="row">
                        <a class="animated flipInY col-lg-3 col-md-3 col-sm-6  " href="/tools?type=online">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-check-square-o"></i>
                                </div>
                                <div class="count">&nbsp</div>
    
                                <h6 class="ml-2">Danh sách online</h6>
                            </div>
                        </a>
                        <a class="animated flipInY col-lg-3 col-md-3 col-sm-6 " href="/trades">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-exchange"></i>
                                </div>
                                <div class="count">&nbsp</div>
    
                                <h6 class="ml-2">Check giao dịch Game</h6>
                            </div>
                        </a>
                        <a class="animated flipInY col-lg-3 col-md-3 col-sm-6  " href="/items">
                            <div class="tile-stats">
                                <div class="icon"><i class="fa fa-check-square-o"></i>
                                </div>
                                <div class="count">&nbsp</div>
    
                                <h6 class="ml-2">Tra cứu item</h6>
                            </div>
                        </a>
                    </div>
                </div>

                <div class="card-box table-responsive">
                    <table id="datatable-buttons" class="table table-striped table-bordered"
                        style="width:100%">
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
                </div>
            </div>
        </div>
    </div>
@endsection

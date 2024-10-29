@extends('layouts.master')
@section('content')
<div class="">
    <div class="page-title">
        <div class="title_left">
            <h3>Danh sách nhân vật</h3>
            </div>
        <br>
    </div>
    <br>

    <div class="clearfix"></div>
    <br>
    <div class="row">
        <div class="col-md-12 col-sm-12 ">
            <div class="x_panel">
                <div class="x_content">
                    <div class="row">
                        <div class="col-sm-12">
                            <div class="card-box table-responsive">
                                <table id="datatable-buttons" class="table table-bordered"
                                    style="width:100%">
                                    <thead>
                                        <tr>
                                            <th>Char ID</th>
                                            <th>UserID</th>
                                            <th>Username</th>
                                            <th>Ingame</th>
                                            <th>Level</th>
                                            <th>Môn phái</th>
                                            <th>Giới tính</th>
                                            <th></th>
                                        </tr>
                                    </thead>


                                    <tbody>
                                        @foreach ($chars as $item)
                                        <tr>
                                            <th scope="row">
                                                    {{ $item->char_id }}
                                            </th>
                                            <td>{{ $item->userid }}</td>
                                            <th><a target="_blank" href="/users/{{$item->user ? $item->user->id : ''}}/edit">{{ $item->user ? $item->user->username : ""}}</a></th>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->level }}</td>
                                            <td>{{ $item->getClass() }}</td>
                                            <td>{{ $item->gender }}</td>
                                            <th><a href="/chars/{{$item->id}}/delete"><button>Xóa</button></a></th>
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
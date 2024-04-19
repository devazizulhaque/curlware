@extends('admin.master')

@section('title')
Room Type
@endsection

@section('css')
<link href="{{ asset('/') }}admin/assets/vendor/datatables/css/jquery.dataTables.min.css" rel="stylesheet">
<style>
    .table-responsive {
        display: block;
        width: 100%;
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        overflow-y: clip;
    }
</style>
@endsection

@section('page-header')
Room Type
@endsection

@section('body')
<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Room Type Create</h4>
            </div>
            <div class="card-body basic-form">
                <form action="{{ route('room-type.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Room Type</label>
                        <input type="text" class="form-control input-default" id="name" name="name" placeholder="Room Type">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Room Type</h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Room Type</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($roomtypes as $roomtype)
                                <tr>
                                    <td>{{ $loop->iteration }}</td>
                                    <td>{{ $roomtype->name }}</td>
                                    <td class="text-right">
                                        <form action="{{ route('room-type.destroy', $roomtype->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <a href="{{ route('room-type.edit', $roomtype->id) }}" class="btn btn-primary shadow btn-xs sharp mr-1"><i class="fa fa-pencil"></i></a>
                                            <button type="submit" class="btn btn-danger shadow btn-xs sharp"><i class="fa fa-trash"></i></button>
                                        </form>
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
@endsection

@section('scripts')
<script src="{{ asset('/') }}admin/assets/vendor/datatables/js/jquery.dataTables.min.js"></script>
    <script src="{{ asset('/') }}admin/assets/js/plugins-init/datatables.init.js"></script>
@endsection

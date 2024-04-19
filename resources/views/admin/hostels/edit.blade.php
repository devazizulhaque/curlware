@extends('admin.master')

@section('title')
Hostels Edit
@endsection

@section('css')
<style>
    .add-button{
        position: absolute;
        top: 32px;
        right: -21px;
    }

    .remove-button{
        position: absolute;
        top: 70px;
        right: -21px;
        display: none;
    }
</style>
@endsection

@section('page-header')
Hostels
@endsection

@section('body')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hostels Edit</h4>
            </div>
            <div class="card-body basic-form">
                <form action="{{ route('hostels.update', $hostel->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="name">Hostels Name</label>
                        <input type="text" class="form-control input-default" id="name" name="name" value="{{ $hostel->name }}">
                    </div>
                    <div class="form-group">
                        <label for="address">Address</label>
                        <textarea name="address" class="form-control input-default" id="address" cols="30" rows="2">{{ $hostel->address }}</textarea>
                    </div>
                    <div class="form-group row rowroom" style="position: relative">
                        @foreach ($hostel->hostelrooms as $hostelroom)
                        <div class="col-6">
                            <label for="phone">Room type</label>
                            <small>
                                @if ($errors->has('roomtype_id.*'))
                                @foreach ($errors->get('roomtype_id.*') as $error)
                                    <div class="text-danger">{{ $error[0] }}</div>
                                @endforeach
                                @endif
                            </small>
                            <select class="form-control" id="roomtype_id" name="roomtype_id[]">
                                <option value="1">Select Room Type</option>
                                @foreach ($roomtypes as $roomtype)
                                    <option value="{{ $roomtype->id }}" {{ $hostelroom->roomtype_id == $roomtype->id ? 'selected' : ' ' }}>{{ $roomtype->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-6">
                            <label for="phone">Total Room</label>
                            <small>
                                @if ($errors->has('totalroom.*'))
                                @foreach ($errors->get('totalroom.*') as $error)
                                    <div class="text-danger">{{ $error[0] }}</div>
                                @endforeach
                                @endif
                            </small>
                            <input type="text" class="form-control input-default" id="totalroom" name="totalroom[]" value="{{ $hostelroom->totalroom }}">
                        </div>
                        @endforeach

                        <div class="add-button">
                            <a href="#" class="btn btn-primary btn-sm add"><i class="fa-solid fa-plus"></i></a>
                        </div>
                        <div class="remove-button">
                            <a href="#" class="btn btn-danger btn-sm remove"><i class="fa-solid fa-trash"></i></a>
                        </div>
                    </div>
                    <div id="inputfield">

                    </div>
                    
                    <div class="form-group mt-4">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    $(document).ready(function () {
        function RemoveButton() {
            var inputCount = $('.rowroom').length;
            console.log(inputCount);
            if (inputCount > 1) {
                $('.remove-button').show();
            } else {
                $('.remove-button').hide();
            }
        }
        $('.add').click(function (e) {
            e.preventDefault();
            var newRow = '<div class="row rowroom">' +
                '<div class="col-6">' +
                    '<select class="form-control" name="roomtype_id[]">' +
                        '<option value="1">Select Room Type</option>' +
                        '@foreach ($roomtypes as $roomtype)' +
                            '<option value="{{ $roomtype->id }}">{{ $roomtype->name }}</option>' +
                        '@endforeach' +
                    '</select>' +
                '</div>' +
                '<div class="col-6">' +
                    '<input type="text" class="form-control" name="totalroom[]" placeholder="Enter Total Room">' +
                '</div>' +
                '</div>';
            $('.remove-button').show();
            $('#inputfield').append(newRow);
            RemoveButton();
        });

        $('.remove').click(function (e) {
            e.preventDefault();
            $('#inputfield .rowroom:last-child').remove();
            RemoveButton();
        });

        RemoveButton();
    });
</script>
@endsection
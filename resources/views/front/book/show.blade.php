@extends('front.master')

@section('title')
Book
@endsection

@section('css')

@endsection

@section('body')
<div class="main-banner">
    <div class="item item-1">
      <div class="container">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <form action="{{ route('book.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="hidden" name="hostel_id" value="{{ $hostel->id }}">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input type="text" name="name" id="name" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" name="email" id="email" class="form-control" required>
                        </div>
                        <div class="form-group">
                            <label for="phone">Phone</label>
                            <input type="text" name="phone" id="phone" class="form-control" required>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-4">
                                <label for="roomtype_id">Room type</label>
                                <select name="roomtype_id" id="roomtype_id" class="form-control" required>
                                    <option value="">Select Room Type</option>
                                    @foreach ($hostel->hostelrooms as $hostelroom)
                                    <option value="{{ $hostelroom->roomtype->id }}">{{ $hostelroom->roomtype->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="totalroom">Total Room</label>
                                <input type="number" name="totalroom" id="totalroom" min="1" max="{{ $hostelroom->totalroom }}" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="totalperson">Total Person</label>
                                <input type="number" name="totalperson" id="totalperson" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label for="checkin">Check In</label>
                                <input type="date" name="checkin" id="checkin" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="checkout">Check Out</label>
                                <input type="date" name="checkout" id="checkout" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Message</label>
                            <textarea name="message" id="message" class="form-control" required></textarea>
                        </div>
                        <div class="form-group mt-3">
                            <button type="submit" class="btn btn-primary">Book Now</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
    </div>
  </div>
@endsection

@section('js')

@endsection
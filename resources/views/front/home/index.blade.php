@extends('front.master')

@section('title')
Home
@endsection

@section('css')
@endsection

@section('body')
<div class="main-banner">
  <div class="item item-1">
    <div class="header-text">
      <span class="category">Toronto, <em>Canada</em></span>
      <h2>Hurry!<br>Get the Best Villa for you</h2>
    </div>
  </div>
</div>


<div class="properties section">
<div class="container">
  <div class="row">
    <div class="col-lg-4 offset-lg-4">
      <div class="section-heading text-center">
        <h6>| Properties</h6>
        <h2>We Provide The Best Property You Like</h2>
      </div>
    </div>
  </div>
  <div class="row">
    @foreach ($hostels as $hostel)
    <div class="col-lg-4 col-md-6">
      <div class="item">
        <a href="{{ route('book.show', $hostel->id) }}"><img src="{{ asset('/') }}front/assets/images/property-01.jpg" alt=""></a>
        <h4><a href="{{ route('book.show', $hostel->id) }}">{{ $hostel->name }}</a></h4>
        <span>{{ $hostel->address }}</span>
        <ul>
          @foreach ($hostel->hostelrooms as $hostelroom)
          <li>{{ $hostelroom->roomtype->name }}: <span>{{ $hostelroom->totalroom }}</span></li>
          @endforeach
        </ul>
        <div class="main-button">
          <a href="{{ route('book.show', $hostel->id) }}">Book Now</a>
        </div>
      </div>
    </div>
    @endforeach
    
  </div>
</div>
</div>
@endsection

@section('js')

@endsection
@extends('admin.master')

@section('title')
Hostels
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
Hostels
@endsection

@section('body')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hostels List</h4>
                <a href="{{ route('hostels.create') }}" class="btn btn-primary btn-sm">Add</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="example" class="display" style="min-width: 845px">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Hostels Name</th>
                                <th>Total Room</th>
                                <th>Total Person</th>
                                <th>Check In</th>
                                <th>Check Out</th>
                                <th>Status</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bookings as $booking)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $booking->name }}</td>
                                <td>{{ $booking->hostel->name }}</td>
                                <td>{{ $booking->totalroom }}</td>
                                <td>{{ $booking->totalperson }}</td>
                                <td>{{ $booking->checkin }}</td>
                                <td>{{ $booking->checkout }}</td>
                                <td>
                                    <form action="{{ route('bookings.update', $booking->id) }}" method="post">
                                        @csrf
                                        @method('PUT')
                                        <input type="hidden" name="status" value="{{ $booking->status }}">
                                        <button type="submit" class="btn btn-{{ $booking->status == 'approved' ? 'success' : 'danger' }} btn-sm">{{ $booking->status }}</button>
                                    </form>
                                </td>
                                <td class="text-right">
                                    <form action="{{ route('bookings.destroy', $booking->id) }}" method="POST" style="display: inline-block">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
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

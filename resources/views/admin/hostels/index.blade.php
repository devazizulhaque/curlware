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
                                <th>Hostels Name</th>
                                <th>Address</th>
                                <th class="text-right">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($hostels as $hostel)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $hostel->name }}</td>
                                <td>{{ $hostel->address }}</td>
                                <td class="text-right">
                                    <a href="{{ route('hostels.edit', $hostel->id) }}" class="btn btn-primary btn-sm"><i class="fa fa-pencil"></i></a>
                                    <form action="{{ route('hostels.destroy', $hostel->id) }}" method="POST" style="display: inline-block">
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

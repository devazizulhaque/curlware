@extends('admin.master')

@section('title')
Hostels Create
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
Hostels Create
@endsection

@section('body')

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">Hostels Create</h4>
            </div>
            <div class="card-body basic-form">
                <form action="{{ route('brands.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" class="form-control input-default" id="name" name="name" placeholder="Enter name">
                    </div>
                    <div class="form-group">
                        <label for="address">Image</label>
                        <input type="file" class="form-control input-default" id="image" name="image" placeholder="Enter image">
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
    
</script>
@endsection
@extends('admin.master')

@section('title')
	Dashboard
@endsection

@section('css')

@endsection
@section('page-header')
Dashboard
@endsection

@section('body')
<div class="form-head mb-sm-5 mb-3 d-flex flex-wrap align-items-center">
	<h2 class="font-w600 title mb-2 mr-auto ">Dashboard</h2>
	<div class="weather-btn mb-2">
		<span class="mr-3 font-w600 text-black"><i class="fa fa-cloud mr-2"></i>21</span>
		<select class="form-control style-1 default-select  mr-3 ">
			<option>Medan, IDN</option>
			<option>Jakarta, IDN</option>
			<option>Surabaya, IDN</option>
		</select>
	</div>
	<a href="javascript:void(0);" class="btn btn-secondary mb-2"><i class="las la-calendar scale5 mr-3"></i>Filter Periode</a>
</div>
<div class="row">
		<div class="card card-coin" style="width: 100%">
			<div class="card-body text-center">
				<h1>
					Welcome to Dashboard

				</h1>	
			</div>
		</div>
</div>
@endsection

@section('scripts')

@endsection
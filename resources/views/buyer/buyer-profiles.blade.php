@extends('layouts.app')

@section('content')
	<div class="container">
		<!-- Profile info -->
		<div class="panel panel-flat">
			<div class="panel-heading">
				<h3>Profile information</h3>
			</div>

			<div class="panel-body">
				<form action="#">

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Email</label>
								<input type="text" readonly="readonly" value="eugene@kopyov.com" class="form-control">
							</div>

							<div class="col-md-6">
								<label>Matric number</label>
								<input type="text" readonly="readonly" name="matricNo" value="A123456" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>First name</label>
								<input type="text" value="Eugene" class="form-control">
							</div>
							<div class="col-md-6">
								<label>Last name</label>
								<input type="text" value="Kopyov" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Address</label>
								<textarea class="form-control"></textarea>
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col-md-4">
								<label>City</label>
								<input type="text" value="Munich" class="form-control">
							</div>
							<div class="col-md-4">
								<label>State/Province</label>
								<input type="text" value="Bayern" class="form-control">
							</div>
							<div class="col-md-4">
								<label>ZIP code</label>
								<input type="text" value="1031" class="form-control">
							</div>
						</div>
					</div>

					

	                <div class="form-group">
	                	<div class="row">
	                		<div class="col-md-6">
								<label>Phone #</label>
								<input type="text" value="+99-99-9999-9999" class="form-control">
								<span class="help-block">+99-99-9999-9999</span>
	                		</div>
	                	</div>
	                </div>

	                <div class="text-right">
	                	<button type="submit" class="btn btn-primary">Save <i class="icon-arrow-right14 position-right"></i></button>
	                </div>
				</form>
			</div>
		</div>
		<!-- /profile info -->
	</div>
@endsection
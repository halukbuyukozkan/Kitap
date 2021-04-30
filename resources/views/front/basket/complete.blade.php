@extends('layouts.app')
@section('content')

	<!--bottom-header-->
	<!--start-breadcrumbs-->
	<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="{{route('index')}}">Home</a></li>
					<li class="active">Alışverişi Tamamla</li>
				</ol>
			</div>
		</div>
	</div>
	<!--end-breadcrumbs-->
	<!--contact-start-->
	<div class="contact">
		<div class="container">
			<div class="contact-top heading">
				<h2>Bilgileri Doldurunuz</h2>
			</div>
			@if(session("status"))
			    {{session("status")}}
                
				@endif
				<div class="contact-text">

					<div class="col-md-12 contact-right">
						<form action="{{route('basket.completeStore')}}" method="POST">
						    {{csrf_field()}}
							<input type="text" name="address" required placeholder="Adres">
							@error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							<input type="text" name="phone" required placeholder="Telefon">
							@error('phone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
							<textarea name="message" placeholder="Message"></textarea>
							<div class="submit-btn">
								<input type="submit" value="TAMAMLA">
							</div>
						</form>
					</div>	
					<div class="clearfix"></div>
				</div>
		</div>
	</div>
	<!--contact-end-->
	<!--map-start-->
	



    @endsection
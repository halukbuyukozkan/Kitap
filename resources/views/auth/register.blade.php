@extends('layouts.app')

@section('content')

<div class="breadcrumbs">
		<div class="container">
			<div class="breadcrumbs-main">
				<ol class="breadcrumb">
					<li><a href="{{route('index')}}">Anasayfa</a></li>
					<li class="active">Kayıt Ol</li>
				</ol>
			</div>
		</div>
	</div>

    <div class="register">
		<div class="container">
			<div class="register-top heading">
				<h2>Kayıt Ol</h2>
			</div>
            <form method="POST" action="{{ route('register') }}">
                        @csrf
			<div class="register-main">
				<div class="col-md-6 account-left">
					<input class="{{ $errors->has('name') ? ' is-invalid' : ''}}" name="name" value="{{ old('name') }}" placeholder="Adınız" type="text" tabindex="1" required>
					@error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror	
                    <input class="{{ $errors->has('name') ? ' is-invalid' : ''}}" name ="email" value="{{ old('email') }}" placeholder="Email Adresiniz" type="text" tabindex="3" required>
					@error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror	
					<input id="password" class="@error('password') is-invalid @enderror" type="password" placeholder="Şifreniz" name="password" tabindex="4" required>
					@error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror	
                    <input id="password-confirm" type="password" placeholder="Şifreniz Tekrar" name="password_confirmation" required autocomplete="new-password">
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="address submit">
							<input type="submit" value="Submit">
						</div>
            </form>            
		</div>
	</div>



@endsection

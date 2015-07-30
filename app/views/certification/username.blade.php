@extends('layouts.subpage')

@section('title')
	<title>按照用户名分类</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/certification/certification.css">
	<link rel="stylesheet" href="/dist/css/certification/identity/identity.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.certificate-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="certificate-nav-container">
			<ul>
				<li class="active"><a href="/customer/authentication/username">全部</a></li>
				<li><a href="/customer/authentication/username/A">A</a></li>
				<li><a href="/customer/authentication/username/B">B</a></li>
				<li><a href="/customer/authentication/username/C">C</a></li>
				<li><a href="/customer/authentication/username/D">D</a></li>
				<li><a href="/customer/authentication/username/E">E</a></li>
				<li><a href="/customer/authentication/username/F">F</a></li>
				<li><a href="/customer/authentication/username/G">G</a></li>
				<li><a href="/customer/authentication/username/H">H</a></li>
				<li><a href="/customer/authentication/username/I">I</a></li>
				<li><a href="/customer/authentication/username/J">J</a></li>
				<li><a href="/customer/authentication/username/K">K</a></li>
				<li><a href="/customer/authentication/username/L">L</a></li>
				<li><a href="/customer/authentication/username/M">M</a></li>
				<li><a href="/customer/authentication/username/N">N</a></li>
				<li><a href="/customer/authentication/username/O">O</a></li>
				<li><a href="/customer/authentication/username/P">P</a></li>
				<li><a href="/customer/authentication/username/Q">Q</a></li>
				<li><a href="/customer/authentication/username/R">R</a></li>
				<li><a href="/customer/authentication/username/S">S</a></li>
				<li><a href="/customer/authentication/username/T">T</a></li>
				<li><a href="/customer/authentication/username/U">U</a></li>
				<li><a href="/customer/authentication/username/V">V</a></li>
				<li><a href="/customer/authentication/username/W">W</a></li>
				<li><a href="/customer/authentication/username/X">X</a></li>
				<li><a href="/customer/authentication/username/Y">Y</a></li>
				<li><a href="/customer/authentication/username/Z">Z</a></li>


			</ul>
		</div>
		<div class="certificate-container">
			<div class="certificate-users-container">
				@if(count($letters) > 1)	
					@foreach($letters as $key=>$letter)
				<div class="certificate-users-head">{{$key}} （{{count($letters)}}）</div>
				<ul>
						@foreach($letter as $user)
						<li>
							<div class="certificate-head-portrait">
								<img src="/images/admin/authentications/{{$user->avatar}}" alt="">
							</div>
							<div class="certificate-user-name">{{$user->realname}}</div>
						</li>
						@endforeach
				</ul>
					@endforeach
				@endif

				@if(count($letters) == 1)	
				<div class="certificate-users-head">{{$letter}} （{{count($letters)}}）</div>
				<ul>
						@foreach($letters as $user)
						<li>
							<div class="certificate-head-portrait">
								<img src="/images/admin/authentications/{{$user->avatar}}" alt="">
							</div>
							<div class="certificate-user-name">{{$user->realname}}</div>
						</li>
						@endforeach
				</ul>
				@endif
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<!-- // <script type="text/javascript" src="/src/js/pages/certificate/identity.js"></script> -->
@stop
@extends('layouts.subpage')

@section('title')
	<title>身份标志分类</title>
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
				<li class=""><a href="/customer/authentication/identity">全部</a></li>
				<li><a href="/customer/authentication/identity/1">主席团</a></li>
				<li><a href="/customer/authentication/identity/2">顾问</a></li>
				<li><a href="/customer/authentication/identity/3">理事</a></li>
				<li><a href="/customer/authentication/identity/4">舞协会员</a></li>
				<li><a href="/customer/authentication/identity/5">网站会员</a></li>
			</ul>
		</div>
		<div class="certificate-container">
			<div class="certificate-users-container">
				
					@if(!empty($bureaus))
					<div class="certificate-users-head">主席团（{{count($bureaus)}}）</div>
					<ul>
						@foreach($bureaus as $bureau)
					<li>
						<div class="certificate-head-portrait">
							<a href="/user/space_home?user_id={{$bureau->id}}">
								<img src="/images/admin/authentications/{{$bureau->avatar}}" alt="">
      							</a>						
						</div>
						<div class="certificate-user-name">{{$bureau->realname}}</div>
					</li>
						@endforeach
					</ul>
					@endif

					@if(!empty($consultants))
					<div class="certificate-users-head">顾问（{{count($consultants)}}）</div>
					<ul>
						@foreach($consultants as $consultant)
					<li>
						<div class="certificate-head-portrait">
							<a href="/user/space_home?user_id={{$consultant->id}}">
								<img src="/images/admin/authentications/{{$consultant->avatar}}" alt="">
							</a>
						</div>
						<div class="certificate-user-name">{{$consultant->realname}}</div>
					</li>
						@endforeach
					</ul>
					@endif

					@if(!empty($directors))
					<div class="certificate-users-head">理事（{{count($directors)}}）</div>
					<ul>
						@foreach($directors as $director)
					<li>
						<div class="certificate-head-portrait">
							<a href="/user/space_home?user_id={{$director->id}}">
								<img src="/images/admin/authentications/{{$director->avatar}}" alt="">
							</a>
						</div>
						<div class="certificate-user-name">{{$director->realname}}</div>
					</li>
						@endforeach
					</ul>
					@endif

					@if(!empty($dance_associattions))
					<div class="certificate-users-head">舞协会员（{{count($dance_associattions)}}）</div>
					<ul>
						@foreach($dance_associattions as $dance_associattion)
					<li>
						<div class="certificate-head-portrait">
							<a href="/user/space_home?user_id={{$dance_associattion->id}}">
								<img src="/images/admin/authentications/{{$dance_associattion->avatar}}" alt="">
							</a>
						</div>
						<div class="certificate-user-name">{{$dance_associattion->realname}}</div>
					</li>
						@endforeach
					</ul>
					@endif

					@if(!empty($website_members))
					<div class="certificate-users-head">网站会员（{{count($website_members)}}）</div>
					<ul>
						@foreach($website_members as $website_member)
					<li>
						<div class="certificate-head-portrait">
							<a href="/user/space_home?user_id={{$website_member->id}}">							
								<img src="/images/admin/authentications/{{$website_member->avatar}}" alt="">
							</a>
						</div>
						<div class="certificate-user-name">{{$website_member->realname}}</div>
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
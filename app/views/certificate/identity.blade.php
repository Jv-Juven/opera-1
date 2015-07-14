@extends('layouts.subpage')

@section('title')
	<title>身份标志分类</title>
@stop

@section('css')
	@parent
	<link rel="stylesheet" href="/dist/css/certificate/certificate.css">
	<link rel="stylesheet" href="/dist/css/certificate/identity.css">
@stop

@section('page-left-nav')
	@include('components.left-nav.certificate-left-nav')
@stop

@section('page-content')
	<div class="page-content">
		<div class="certificate-nav-container">
			<ul>
				<li class="active">全部</li>
				<li>全部</li>
				<li>全部</li>
				<li>全部</li>
				<li>全部</li>
				<li>全部</li>
			</ul>
		</div>
		<div class="certificate-container">
			<div class="certificate-users-container">
				<div class="certificate-users-head">主席团（17）</div>
				<ul>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
					<li>
						<div class="certificate-head-portrait">
							<img src="/images/certificate/user_head.png" alt="">
						</div>
						<div class="certificate-user-name">贾侦探</div>
					</li>
				</ul>
			</div>
		</div>
	</div>
@stop

@section('js')
	@parent
	<script type="text/javascript" src="/src/js/pages/certificate/identity.js"></script>
@stop
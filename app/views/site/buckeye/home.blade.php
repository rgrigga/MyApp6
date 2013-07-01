@extends('site.layouts.sandbox')

<?php
class Company extends User{

	public $name="Buckeye Mower";
}

$obj = new Company;
$company = $obj->name;
?>
{{-- Update the Meta Title --}}
<!-- THis properly overrides the default -->
@section('meta-title')
Buckeye Mower - Fast, Mobile Mower and Small Engine Repair
@stop

<!-- http://stackoverflow.com/questions/16032861/laravel-passing-data-to-default-blade-php-from-base-controller/16034358#16034358 -->

{{-- Update the Meta Description --}}
@section('meta_description')
<meta name="description" content="Buckeye Mower offers engine repair services in Columbus Ohio." />
@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
<meta name="keywords" content="Lawn Mower Repair, Lawn Mower Service" />
@stop

@section('styles')
@parent

<!-- http://stackoverflow.com/questions/806000/css-semi-transparent-background-but-not-text -->

<!-- \@ stylesheets("public-css") -->
	
	<!-- <link rel="stylesheet" href="/assets/css/style.css"> -->

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
<!-- 	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet"> -->


<!-- //This is not responsive! -->
<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/2.3.2/cosmo/bootstrap.min.css">

<!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/2.3.2/flatly/bootstrap.min.css"> -->
@stop

@section('favicons')
<!-- Favicons
================================================== -->

<!-- http://theksmith.com/technology/howto-website-icons-browsersdevices-favicon-apple-touch-icon-etc/ -->
<!-- (this step is required for Android support, android ignores the non-pre-composed version): -->
<!-- http://demosthenes.info/blog/467/Creating-MultiResolution-Favicons-For-Web-Pages-With-GIMP -->

<!-- It would be great generate these on the fly.  For now, they are located in asset file -->
<!-- http://theksmith.com/technology/howto-website-icons-browsersdevices-favicon-apple-touch-icon-etc/ -->

<!-- (this step is required for Android support, android ignores the non-pre-composed version): -->
<?php 
// $company = "gristech"; 
?>
		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{ asset('assets/'.$company.'/ico/apple-touch-icon-144-precomposed.png') }}">

		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<!-- <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}"> -->
		<link rel="shortcut icon" href="{{{ asset('assets/ico/'.$company.'/favicon.png') }}}">

		<!-- hardy har -->
				<!-- Very Funny -->
@stop

@section('nav')
	<h1>
	@parent
	 :: Child
	</h1>
@stop

{{-- Content --}}
@section('content')
<!-- @parent -->

<div class="row-fluid">
	<div class="span8">
		<h1>Welcome Home.</h1>
		<h2>{{{$company}}}</h2>
	</div>
</div>

<style>
	.sidebar-left{
		background-color: rgba(5,5,0,.2);
	}
</style>
<div class="row-fluid">
	
	<div class="span2 pull-left sidebar-left">
		<ul class="nav nav-list">
	    <li class="nav-header">List header</li>
	    <li class="active"><a href="#">Home</a></li>
	    <li><a href="#about">About Us</a></li>
	    <li><a href="#contact">Contact Us</a></li>
	    <li class="nav-header">Another Section</li>
	    <li>Services</li>
	    <li>Products</li>
	    
	    </ul>
		<img src="/assets/buckeye/buckeye.svg">

	    
	</div>
	<div class="span8" id="services">
		<h2>Services</h2>
		<div class="row-fluid">
			<ul class="thumbnails">
			<li class="thumbnail span4">
				<h3>Mower Repair</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, tenetur eius ad reprehenderit sunt voluptatem ab voluptate debitis consectetur ea.</p>
				<ul>
					<li>John Deere</li>
					<li>Briggs & Stratton</li>
					<li>Cub Cadet</li>
				</ul>
			</li>
					<li class="thumbnail span4">
				<h3>Small Engines</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Quam, tenetur eius ad reprehenderit sunt voluptatem ab voluptate debitis consectetur ea.</p>
			</li>
					<li class="thumbnail span4">
				<h3>We're Mobile</h3>
				<p>We will come to you.</p>
			</li>
		</ul>
		</div>

	</div>
</div>

<div class="row-fluid" id="about">
	<div class="span5 well">
		<h3>About</h3>
		<img src="/assets/buckeye/buckeye.svg" class="pull-left">
		<p>Tell the world about your company</p>
	</div>
</div>

<div class="row-fluid" id="contact">
	<div class="span5 well">
		<h3>Contact</h3>
		<!-- <span class="pull-right"> -->
			<img src="/assets/buckeye/buckeye.svg">
		<!-- </span> -->
		<p>How would you like people to reach you?</p>
	</div>
	
</div>



@stop

@section('test')
<h1>this is a test</h1>
@stop
@extends('site.layouts.company')

<!-- 
Company Properties:
Styles
Meta_Description
Meta-Keywords

 -->



{{-- Update the Meta Title --}}
@section('meta_title')

Advantage Services - We treat your home as our own.
 <!-- String::title($post->title) }}} -->
@stop

{{-- Update the Meta Description --}}
@section('meta_description')
<meta name="description" content="23 Years local experience.  Over 1500 served.  " />

@stop

{{-- Update the Meta Keywords --}}
@section('meta_keywords')
<meta name="keywords" content="Lawn Mower Repair, Lawn Mower Service" />
@stop





@section('styles')
@parent
<!-- \@ stylesheets("public-css") -->
	
	<link rel="stylesheet" href="/assets/css/style.css">

	<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	    <link rel="stylesheet" type="text/css" href="http://fonts.googleapis.com/css?family=Tangerine">
	    <link href="//netdna.bootstrapcdn.com/font-awesome/3.2.1/css/font-awesome.min.css" rel="stylesheet">


		<link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/2.3.2/cosmo/bootstrap.min.css">

	    <!-- <link rel="stylesheet" href="//netdna.bootstrapcdn.com/bootswatch/2.3.2/flatly/bootstrap.min.css"> -->

<!-- http://stackoverflow.com/questions/806000/css-semi-transparent-background-but-not-text -->
<style>
	/*//Your code here*/

</style>


@stop

@section('favicons')
		<!-- Favicons
		================================================== -->

<!-- It would be great generate these on the fly.  For now, they are located in X asset file -->

		<!-- http://theksmith.com/technology/howto-website-icons-browsersdevices-favicon-apple-touch-icon-etc/ -->
		<!-- (this step is required for Android support, android ignores the non-pre-composed version): -->

		<!-- http://demosthenes.info/blog/467/Creating-MultiResolution-Favicons-For-Web-Pages-With-GIMP -->

		<link rel="apple-touch-icon-precomposed" sizes="144x144" href="{{{ asset('assets/ico/apple-touch-icon-144-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="114x114" href="{{{ asset('assets/ico/apple-touch-icon-114-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" sizes="72x72" href="{{{ asset('assets/ico/apple-touch-icon-72-precomposed.png') }}}">
		<link rel="apple-touch-icon-precomposed" href="{{{ asset('assets/ico/apple-touch-icon-57-precomposed.png') }}}">
		<!-- <link rel="shortcut icon" href="{{{ asset('assets/ico/favicon.png') }}}"> -->
		<link rel="shortcut icon" href="{{{ asset('assets/ico/buckeye/favicon.png') }}}">

		<!-- hardy har -->		
@show

{{-- Content --}}
@section('content')
<!-- @parent -->

<!--  //@ include('partials/advantage')  -->
@show

@show

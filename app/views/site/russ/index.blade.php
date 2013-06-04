@extends('site.layouts.russ')

{{-- Content --}}
@section('content')


<style>
	h1 {
		/*font-size:big;*/
		text-align: center;
	}

</style>
	<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">

	<div class="row-fluid">

		<div class="span6">
			<img class="img-circle pull-left" src="http://gristech.com/img/russ/fire.png" alt="lawn mower repair">
		</div>

		<div class="span6">
			<h1>Busted Mower?</h1>
			<p class="text-center"><a class="btn btn-primary btn-large" href="tel:7405076198" > Call (740)507-6198</a></p>

			<p>Why fiddle with it for 6 hours in hopes of <em>maybe</em> fixing it.  An expert technician can come to your house and do it for you.</p>
			<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Delectus, sint expedita ipsa ea magni laboriosam maiores quas ad at harum?</p>
			<h4>Mobile Repair Service</h4>
			<p>Save yourself time, gas, money, and hassle: no need to load your mower up and haul it somewhere, we will come to you.  </p>
		</div>

	</div>

</div>
<!-- end hero-unit -->
<div class="row-fluid">
	<div class="span3">
		<h2><a href="#">Riding Lawn Mower Service</a></h2>
		<h3>Basic Service</h3>
		<p>Approx time: 1-2 hours</p>
		<p>CHANGE OIL, OIL FILTER, SPARK  PLUG 'S', AIR and FUEL FILTER.</p>

		<ul>
<li>DECK CLEANING</li>
<li>DECK LEVELING</li>
<li>BLADE SHARPENING</li>
<li>PTO CLUTCH ADJUSTMENT IF APPLICABLE</li>
<li>TEST CHARGING SYSTEM AND BATTERY</li>
<li>TIRE PRESSURE ADJUSTMENT</li>
<li>GREASE ENTIRE MACHINE</li>
<li>INSPECTION OF ENTIRE MACHINE (belts, hoses, pulleys, etc)
</li>
</ul>
<p>$85.00 plus parts</p>
<a class="btn btn-primary btn-large" href="tel:7405076198" >(740)507-6198</a>
	</div>

	<div class="span3">
		<h2>Push Mower Service</h2>
		<ul>
			<li>CHANGE OIL, AIR FILTER, SPARK PLUG</li>
			<li>DECK CLEANING</li>
			<li>BLADE SHARPENING</li>
			<li>INSPECTION OF ENTIRE MACHINE  (belt, cables, drive system etc)</li>
		</ul>


<p>$85.00 plus parts</p>
<p>
<a class="btn btn-primary btn-large" href="tel:7405076198" >(740)507-6198</a>
</p>

	</div>

	<div class="span3">
		<h2>Other Services</h2>
		<p>Call us!</p>
		<a href="tel:6142039405">6142039405</a>
	</div>

	<!-- span8 -->
	<div id="about" name="about" class="span3 pull-right" style="background-color:orange;margin:0px;">
		<h2>The New Collossus</h2>
		<img src="http://www.loc.gov/exhibits/haventohome/images/hh0041s.jpg" alt="manuscript">
		<p>Not like the brazen giant of Greek fame,
	With conquering limbs astride from land to land;
	Here at our sea-washed, sunset gates shall stand
	A mighty woman with a torch, whose flame
	Is the imprisoned lightning, and her name
	Mother of Exiles. From her beacon-hand
	Glows world-wide welcome; her mild eyes command
	The air-bridged harbor that twin cities frame.
	"Keep, ancient lands, your storied pomp!" cries she
	With silent lips. "Give me your tired, your poor,
	Your huddled masses yearning to breathe free,
	The wretched refuse of your teeming shore.
	Send these, the homeless, tempest-tost to me,
	I lift my lamp beside the golden door!"</p>

	</div>
</div>
<!-- end row -->


	<!-- Main hero unit for a primary marketing message or call to action -->
<div class="hero-unit">

			
	<div class="row">

		<div class="span6">
			<h1>HI!</h1>
		</div>
		<div class="span4 text-center" style="padding:30px;">
			<img class="img-circle" src="http://gristech.com/img/thinker/thinker_head_square.png" alt="think about it">
		</div>
	</div>
			<p>Your website is the first thing that many of your customers will know of your business, and you may only have one shot to convert "searcher" to "prospect", and "prospect" to "client".</p>
			<p>Your website helps you turn "clients" into "happy clients" and keep them that way.</p>
	
			<h3>It's not just a website...</h3>
			
			<p>
				Your website is a marketing machine.  On the front end, it is your 24/7 connection to clients.
			</p>
				<p>On the back end, it allows you to study your clients so that you may make better decisions.</p>
				<p>
					It's easy might put off, because you are too busy running your business to deal with it.  It may seem too expensive.  Maybe you've researched Web Designers, and you've found high prices.
				</p>

			<p><a class="btn btn-primary btn-large">Learn more &raquo;</a></p>

</div>
<!-- end hero-unit -->

<div class="span8">
<!-- <h1>Posts:</h1> -->
@foreach ($posts as $post)
<div class="row">
	<div class="span8 well">
		<!-- Post Title -->
		<div class="row">
			<div class="span8">
				
			</div>
		</div>
		<!-- ./ post title -->

		<!-- Post Content -->
		<div class="row">
			<div class="span4">
				<a href="{{{ $post->url() }}}" class="thumbnail">
					<!-- http://placehold.it/260x180 -->
					<img src="http://gristech.com{{{$post->image}}} " alt="{{{$post->image}}}">
				</a>
				@if (Auth::check())
                @if (Auth::user()->hasRole('admin'))
				<p>
					<a href="{{{ URL::to('admin/blogs/' . $post->id . '/edit' ) }}}" class="btn btn-mini">{{{ Lang::get('button.edit') }}}</a>
					<a href="{{{ URL::to('admin/blogs/' . $post->id . '/delete' ) }}}" class="btn btn-mini btn-danger">{{{ Lang::get('button.delete') }}}</a>
				</p>
				@endif
				@endif
			</div>
			<div class="span4">
				<h2><strong><a href="{{{ $post->url() }}}">{{ String::title($post->title) }}</a></strong></h2>
				<p>
					{{ String::tidy(Str::limit($post->content, 300)) }}
				</p>
				<p><a class="btn btn-info" href="{{{ $post->url() }}}">Read more</a></p>
			</div>
		</div>
		<!-- ./ post content -->

		<!-- Post Footer -->
		<div class="row">
			<div class="span8">
				<p></p>
				<p>
					<i class="icon-user"></i> by <span class="muted">{{{ $post->author->username }}}</span>
					| <i class="icon-calendar"></i> <!--Sept 16th, 2012-->{{{ $post->date() }}}
					| <i class="icon-comment"></i> <a href="{{{ $post->url() }}}#comments">{{$post->comments()->count()}} {{ \Illuminate\Support\Pluralizer::plural('Comment', $post->comments()->count()) }}</a>
				</p>
			</div>
		</div>
		<!-- ./ post footer -->
	</div>

</div>

<hr />
@endforeach


{{{ $posts->links() }}}
</div>
<!-- span8 -->
<div id="about" name="about" class="span3 pull-right" style="background-color:orange;margin:0px;">
	<h2>The New Collossus</h2>
	<img src="http://www.loc.gov/exhibits/haventohome/images/hh0041s.jpg" alt="manuscript">
	<p>Not like the brazen giant of Greek fame,
With conquering limbs astride from land to land;
Here at our sea-washed, sunset gates shall stand
A mighty woman with a torch, whose flame
Is the imprisoned lightning, and her name
Mother of Exiles. From her beacon-hand
Glows world-wide welcome; her mild eyes command
The air-bridged harbor that twin cities frame.
"Keep, ancient lands, your storied pomp!" cries she
With silent lips. "Give me your tired, your poor,
Your huddled masses yearning to breathe free,
The wretched refuse of your teeming shore.
Send these, the homeless, tempest-tost to me,
I lift my lamp beside the golden door!"</p>

</div>

@stop

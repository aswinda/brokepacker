@extends('frontend.base.template')
@section('content')

	<!--script-for-menu-->
		<!---start-destinatiuons---->
		<div class="destinations">
			<div class="destination-head">
				<div class="wrap">
					<h3>Destinations</h3>
				</div>
				<!---End-destinatiuons---->
				<div class="find-place dfind-place">
					<div class="wrap">
						<div class="p-h">
							<span>FIND YOUR</span>
							<label>HOLYDAYS</label>
						</div>
						<!---strat-date-piker---->
						  <script src="http://code.jquery.com/ui/1.9.2/jquery-ui.js"></script>
						  <script>
						  $(function() {
						    $( "#datepicker" ).datepicker();
						  });
						  </script>
						<!---/End-date-piker---->
						<div class="p-ww">
							<form method="POST" action="{{ url('packages/find') }}">
								<input type="hidden" name="_token" value="{{ csrf_token() }}">
								<span> From</span>
								<input name="from" class="dest" type="text" placeholder="From" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'From';}">
								<span> To</span>
								<input name="destination" class="dest" type="text" placeholder="Destination" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Destination';}">
								<input type="submit" value="Search" />
							</form>
						</div>
						<div class="clear"> </div>
					</div>
				</div>
				<!----//End-find-place---->
			</div>
			<div class="destination-places">
				<div class="wrap">
					<div class="destination-places-head">
						<h3>Bookings</h3>
					</div>
					<div class="destination-places-grids">
						@foreach($bookings as $key => $booking)
						<div class="destination-places-grid" onclick="location.href='#';">
							<a href="{{ URL::to('packages/show/'.$booking->package_id ) }}" class="b-link-stripe b-animate-go  thickbox">
								<img class="img-responsive port-pic" src="{{ URL::to('images/profiles/'.$booking->photo) }}" />
								<div class="b-wrapper">
									<h2 class="b-animate b-from-left    b-delay03 ">
										<ul>
											<li><span class="one"></span></li>
											<li><span class="two"></span></li>
										</ul>
									</h2>
								</div>
							</a>
							<div class="dest-place-opt">
								<ul class="dest-place-opt-fea">
									<li><a class="hot" href="#"><span> </span>{{ $booking->hotel }}</a></li>
									<li><a class="plain" href="#"><span> </span>{{ $booking->agent }}</a></li>
									<li><a class="Breakfast" href="#"><span> </span> Break Fast</a></li>
									<div class="clear"> </div>
								</ul>
								<ul class="dest-place-opt-cast">
									<li><a class="d-place" href="#">{{ $booking->packages }}</a></li>
									<li><a class="d-price" href="#">Starting Form IDR {{ $booking->price }}</a></li>
									<div class="clear"> </div>
								</ul>
							</div>
						</div>
						@endforeach
					
						<div class="clear"> </div>
					</div>
				</div>
			</div>
			<!---start-destinations-pagenation---->
				<div class="destination-pagenate">
					
				</div>
			<!---//End-destinations-pagenation---->
			<!---loading-more-script--->
			<!---//loading-more-script--->
		</div>
		<!----//End-offers---->
		<!----//End-images-slider---->
		<!----//End-footer---->
		<!---start-subfooter---->
		<div class="subfooter">
			<div class="wrap">
				<ul>
					<li><a href="index.html">Home</a><span>::</span></li>
					<li><a href="destinations.html">Destinations</a><span>::</span></li>
					<li><a href="criuses.html">Cruises</a><span>::</span></li>
					<li><a href="destinations.html">Specials</a><span>::</span></li>
					<li><a href="destinations.html">Holidays</a><span>::</span></li>
					<li><a href="blog.html">Blog</a><span>::</span></li>
					<li><a href="contact.html">Contact Us</a></li>
					<div class="clear"> </div>
				</ul>
				<p class="copy-right">&copy; 2014 Voyage. All rights reserved | Template by <a href="http://w3layouts.com/">W3layouts</a></p>
				<a class="to-top" href="#header"><span> </span> </a>
			</div>
		</div>
		<!---//End-subfooter---->
		<!----//End-wrap---->

@endsection
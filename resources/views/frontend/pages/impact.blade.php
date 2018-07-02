
@extends('frontend.master.master')
@section('content')


			<div class="mm-subheader--bg mm-subheader--light flex">
				<div class="mm-subheader__container">
					<div class="container custom_width">
									<ul class="mm-breadcrumb breadcrumb">
										<li><a href="{{route('home')}}">Home</a></li>

										<li>Impact Network</li>
									</ul>
							<!--title section  -->
							<div class="subheader-title">
								<h2 class="subheader-title__main-title">Impact Network</h2>
							</div>
					</div>
				</div>
			</div><!--end subheader-->

			<!--start section-->
			<section class="pgt-35 pgb-35 border-top bg-color--white">
				<div class="container custom_width">
					<div class="row">
						<div class="col-md-9 col-sm-8 ">
							@if(session()->has('message'))
								<div class="alert alert-success alert-dismissable">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
									<h4>	<i class="icon fa fa-check"></i>@if(session()->has('message_title')) {{ session()->get('message_title') }} @else success! @endif</h4>
									{{ session()->get('message') }}
								</div>
							@endif
						</div>
					</div>
					<div class="row">
						<div class="col-md-12 col-sm-12">
							<p class="result-count">Showing all {{count($impacts)}} results
							</p>
							<div class="form-group sorting-select">
								{{--<select name="mm-sort" class="select-checkout select-control--sort" >--}}
									{{--<option value="menu_order" selected data-sort-order="true">DEFAULT SORTING</option>--}}
									{{--<option value="popularity" data-sort-order="true">SORT BY POPULARITY </option>--}}
									{{--<option value="date" data-sort-order="true">SORT BY NEWNESS</option>--}}
									{{--<option value="price" data-sort-order="true">SORT BY PRICE: LOW TO HIGH</option>--}}
									{{--<option value="price" data-sort-order="false">SORT BY PRICE: HIGH TO LOW</option>--}}
								{{--</select>--}}
							</div>
							 <ul class="product-grid">
								 @foreach($impacts as $impact)
								 <li class="product">
									 <div class="product-item ">
										 <a href="{{route('impact.search',$impact->Full_Name)}}">
											 <span class="prod-image">
												 <img src="http://www.meug.be/wp-content/uploads/2017/05/Team-Member.jpg" alt title="{{$impact->Full_Name}}">
											 </span>
										 </a>
										 <div class="prod-detail">
											 <a href="{{route('impact.search',$impact->Full_Name)}}">
												 <h3 class="prod-title">
													 <a href="{{route('impact.search',$impact->Full_Name)}}">{{$impact->Full_Name}}</a>
													 </h3>
											 </a>
											 <div class="prod-descr">

												 <p>Current Position   :
													 @php
														$Positions =  explode(',',$impact->Current_Position)
													 @endphp
													 @foreach($Positions as $position)
														 <a class="tag--search" href="{{route('impact.search',$position)}}">{{$position}}</a>
														 @if(!$loop->last)
															 ,
														 @endif
													 @endforeach

												 </p>
												 <p>Currently based on :
													 @php
														 $based_ons =  explode(',',$impact->Currently_based_on)
													 @endphp
													 @foreach($based_ons as $based_on)
														 <a class="tag--search" href="{{route('impact.search',$based_on)}}">{{$based_on}}</a>
														 @if(!$loop->last)
															 ,
														 @endif
													 @endforeach
												 </p>
												 <p>Experiances :
													 @foreach($impact->experiances as $experiance)

													 <a class="tag--search" href="{{route('impact.search',$experiance->experiance)}}">{{$experiance->experiance}}</a>
														 @if(!$loop->last)

															 ,
														 @endif
													 @endforeach
												 </p>
												 <p><strong>Guidances</strong> :
													 @foreach($impact->guidances as $guidance)

														 <a class="tag--search" href="{{route('impact.search',$guidance->guidance)}}">{{$guidance->guidance}}</a>
														 @if(!$loop->last)
															 ,
														 @endif
													 @endforeach
												 </p>
											 </div>

										 </div>
									 </div>
									 <div class="mm-actions">
										 <a href="#" class="btn btn-success btn-block pull-left" onclick="event.preventDefault();
												 document.getElementById('connect-form{{$impact->id}}').submit();"> Connect </a>
										 <form id="connect-form{{$impact->id}}" action="{{ route('impact.connect') }}" method="POST" style="display: none;">
											 {{ csrf_field() }}
										 <input type="hidden" name="impact_name" value="{{$impact->Full_Name}}">
										 <input type="hidden" name="impact_id" value="{{$impact->id}}">
										 </form>
									 </div>
								 </li>
                               @endforeach

							 </ul>
						</div>
					</div>
				</div>
			</section>
			@endsection

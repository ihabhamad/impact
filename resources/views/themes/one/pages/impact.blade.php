@extends('themes.one.master.master')
@section('content')
  <div class="container">

      <div class="gl-row">

          <h3 class="gl-sub-heading">Impact net Work Page</h3><span>Showing all {{count($impacts)}} results</span>
          @if(session()->has('message'))
              <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                  <h4>	<i class="icon fa fa-check"></i>@if(session()->has('message_title')) {{ session()->get('message_title') }} @else success! @endif</h4>
                  {{ session()->get('message') }}
              </div>
      @endif
         @foreach($impacts as $impact)
          <!-- Job item-->
          <div class="panel panel-default gl-job-list-item">
              <!-- Job Excerpt -->
              <div class="gl-job-list-item-wrapper panel-heading" role="tab" id="job{{$impact->id}}">
                  <a role="button" data-toggle="collapse" data-parent="#featured-job" href="#job{{$impact->id}}Details"
                     aria-expanded="true" aria-controls="job{{$impact->id}}Details">
                      <!-- LOGO -->
                      <div class="gl-job-company-logo gl-job-item-part">
                          @if($impact->personal_image == null)
                              <img src="{{asset('images/impact.png')}}" alt="Deep Purple inc" class="gl-lazy">
                          @else
                              <img src="{{asset('uploads/impacts/'.$impact->personal_image)}}" alt="Deep Purple inc" class="gl-lazy">
                          @endif

                      </div>
                      <!-- END -->

                      <!-- JOB POSTION & COMPANY NAME -->
                      <div class="gl-job-position-company gl-job-item-part">
                          <h3>
                              {{$impact->Full_Name}}
                          </h3>

                          <p class="gl-company-name">{{$impact->Current_Position}}</p>
                      </div>
                      <!-- END -->

                      <!-- JOB AVAILABILITY -->
                      <div class="gl-job-availability gl-job-item-part">
                          <span class="gl-item-status-label full-time-job">Full time</span>
                      </div>
                      <!-- END -->

                      <!-- SALLERY -->
                      <div class="gl-job-sallery gl-job-item-part">
                          <!-- <i class="fa fa-money"></i>
                          <h3>Salary :</h3>
                          <span>$30000</span> -->
                      </div>
                      <!-- END -->

                      <!-- AREA -->
                      <div class="gl-job-location gl-job-item-part">
                          <i class="ion-ios-location-outline"></i>
                          <span>
                              {{$impact->Currently_based_on}}
                          </span>
                      </div>
                      <!-- END -->
                  </a>
              </div>
              <!-- END -->

              <!-- Job Details -->
              <div id="job{{$impact->id}}Details" class="panel-collapse collapse gl-job-list-details" role="tabpanel"
                   aria-labelledby="job{{$impact->id}}">
                  <div class="panel-body">
                      <div class="gl-jobdetails-sec">
                          <h3>About</h3>
                          <p>
                              {{$impact->about}}
                          </p>
                      </div>

                      <div class="gl-jobdetails-sec">
                          <h3>Experiances</h3>
                          <ul>
                          @foreach($impact->experiances as $experiance)

                              <li><a class="tag--search" href="{{route('impact.search',$experiance->experiance)}}">{{$experiance->experiance}}</a></li>

                          @endforeach
                          </ul>

                      </div>
                      <div class="gl-jobdetails-sec">
                          <h3>Guidances</h3>
                          <ul>
                              @foreach($impact->guidances as $guidance)

                                  <li><a class="tag--search" href="{{route('impact.search',$guidance->guidance)}}">{{$guidance->guidance}}</a></li>

                              @endforeach
                          </ul>

                      </div>

                      <div class="gl-jobdetails-sec">
                          <a href="#" class="gl-btn gl-apply-job pull-left" onclick="event.preventDefault();
                                  document.getElementById('connect-form{{$impact->id}}').submit();"> Connect </a>
                          <form id="connect-form{{$impact->id}}" action="{{ route('impact.connect') }}" method="POST" style="display: none;">
                              {{ csrf_field() }}
                              <input type="hidden" name="impact_name" value="{{$impact->Full_Name}}">
                              <input type="hidden" name="impact_id" value="{{$impact->id}}">
                          </form>
                          {{--<a href="job-single.html" class="gl-btn gl-details-job">Details</a>--}}
                      </div>
                  </div>
              </div>
              <!-- END -->
          </div>

          <!-- End -->
         @endforeach

          <!-- APPLY MODAL -->
          {{--<div class="remodal-bg">--}}
              {{--<div class="gl-modal-wrapper" data-remodal-id="modal">--}}
                  {{--<button data-remodal-action="close" class="remodal-close"></button>--}}
                  {{--<h3 class="gl-modal-title">Personal Info</h3>--}}

                  {{--<div class="gl-modal-form-wrapper">--}}
                      {{--<form action="#">--}}
                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Name</p>--}}
                              {{--<input type="text" name="gl-applicant-name" id="gl-applicant-name" placeholder="Full Name">--}}
                          {{--</fieldset>--}}

                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Email</p>--}}
                              {{--<input type="text" name="gl-applicant-email" id="gl-applicant-email" placeholder="Email">--}}
                          {{--</fieldset>--}}

                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Address</p>--}}
                              {{--<input type="text" name="gl-applicant-address" id="gl-applicant-address"--}}
                                     {{--placeholder="Address">--}}
                          {{--</fieldset>--}}

                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Cover Letter</p>--}}
                              {{--<textarea name="gl-applicant-letter" id="gl-applicant-letter" cols="30" rows="7"--}}
                                        {{--placeholder="Cover Letter"></textarea>--}}
                          {{--</fieldset>--}}

                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Upload</p>--}}

                              {{--<input type="file" name="gl-applicant-resume" id="gl-applicant-resume">--}}
                              {{--<label for="gl-applicant-resume">upload</label>--}}

                              {{--<span class="gl-extra-info">we allow only .doc and .pdf file</span>--}}
                          {{--</fieldset>--}}

                          {{--<fieldset>--}}
                              {{--<p class="gl-input-label">Your Name</p>--}}
                              {{--<input type="text" name="gl-applicant-yname" id="gl-applicant-yname"--}}
                                     {{--placeholder="Your Name">--}}
                          {{--</fieldset>--}}

                          {{--<fieldset class="gl-apply-btns-wrapper">--}}
                              {{--<button class="gl-apply-btn gl-btn" type="submit">Apply</button>--}}
                              {{--<button class="gl-apply-linkedin-btn gl-btn">Apply from Linkedin</button>--}}
                          {{--</fieldset>--}}
                      {{--</form>--}}
                  {{--</div>--}}
              {{--</div>--}}
          {{--</div>--}}
          <!-- APPLY MODAL END -->
      </div>
  </div>

@endsection

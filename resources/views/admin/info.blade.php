@if(session()->has('message'))	 
   		 <div class="alert alert-success alert-dismissable">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                    <h4>	<i class="icon fa fa-check"></i>@if(session()->has('message_title')) {{ session()->get('message_title') }} @else success! @endif</h4>
                     {{ session()->get('message') }}
         </div>
@endif

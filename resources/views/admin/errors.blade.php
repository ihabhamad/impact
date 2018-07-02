@if(count($errors->all()) > 0)
	
     <div class="form-group">
           <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                      <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			             <ul>
			               @foreach($errors->all() as $error)
			               <li>{{$error}}</li>
			               @endforeach
			             </ul>
			             
            </div>
         </div>
@endif
@if(session()->has('error'))	 
         <div class="form-group">
           <div class="alert alert-danger alert-dismissable">
                      <button type="button" class="close" data-dismiss="alert" aria-hidden="true">x</button>
                      <h4><i class="icon fa fa-ban"></i> Alert!</h4>
			            {{ session()->get('error') }}
			             
            </div>
         </div>
@endif
                 
                   
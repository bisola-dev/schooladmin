<div class="sidebar" id="sidebar">
                <div class="sidebar-inner slimscroll">
					<div id="sidebar-menu" class="sidebar-menu">
						<ul>	
							<li class="menu-title"> 
								<span>Admin</span>
							</li>
							<li> 
								<a href="/dashboardapp"><i class="la la-dashboard"></i> <span>Admin Dashboard</span></a>
							</li>


						 <li>
                       <a href="/createclass/"><i class="la la-cog"></i> <span> Create class</span></a>
                         </li>
                           
				

	<li class="submenu">
    <a href="#"> <i class="la la-cog"></i> <span> Classes</span> <span class="menu-arrow"></span></a>
    <ul style="display: none;">
        @forelse ($classrm as $data)
            <li><a href="{{ route('admin.subclasslink', ['id' => $data->id]) }}">{{ $data->classname }}</a></li>
        @empty
            <li>No classes available.</li>
        @endforelse
    </ul>
</li>


								  <li class="submenu">
								<a href="#"><i class="la la-cog"></i> <span> payments</span> <span class="menu-arrow"></span></a>
								<ul style="display: none;">					
                                 @foreach($classrm as $data)
		     	         <li><a href='/payee/{{$data->id}}/{{$data->schoolid}}'>{{$data->classname}}</a> </li>	                  
							@endforeach
                             </ul>
					 
								  </li>


                             

							<li>
							
						
						<a href="/renew/{{Session::get('id')}}"><i class="la la-cog"></i> <span> Upload School logo</span></a>
				
			
					</li>
				   	 
							<li>
                       <a href="/logout"><i class="la la-cog"></i> <span> Logout</span></a>
                   </li>
                         
 
 
						 
					
					</div>
                </div>
            </div>
@include('layout.style')

<ul class="full-width list-unstyle menu-principal">
	<li class="full-width">
    <a href="{{ Config::get('app.url') }}/Principal" class="full-width">
	       	<div class="navLateral-body-cl">
		    	<i class="zmdi zmdi-home"></i>
		    </div>
			<div class="navLateral-body-cr hide-on-tablet">
				PRINCIPAL
			</div>
		</a>
	</li>

    @foreach($menu as $m)
    <li class="full-width divider-menu-h"></li>
    <li class="full-width">
        @if($m->screen_parent_id == "")
            @if($m->screen_url == "")   
            <a class="full-width btn-subMenu">
            @else
            <a href="{{ Config::get('app.url') }}/{{$m->screen_url}}" class="full-width">
            @endif 
	  	        <div class="navLateral-body-cl">
	       	        <i class="zmdi {{$m->screen_icon}}"></i>
		        </div>
		        <div class="navLateral-body-cr hide-on-tablet">
                    {{$m->screen_dsc}}
		        </div>
                <span class="zmdi zmdi-chevron-left"></span>
		    </a>
            <ul class="full-width menu-principal sub-menu-options">
            @foreach($menu as $m2)
                @if($m2->screen_parent_id == $m->screen_id)
                <li class="full-width">
                    <a href="{{ Config::get('app.url') }}/{{$m2->screen_url}}" class="full-width">
	    			    <div class="navLateral-body-cl">
                            <i class="zmdi {{$m2->screen_icon}}"></i>
					    </div>
					    <div class="navLateral-body-cr hide-on-tablet">
                            {{$m2->screen_dsc}}
					    </div>
				    </a>
			    </li>
                @endif
            @endforeach
            </ul>
        @endif 
    </li>
    @endforeach
</ul>
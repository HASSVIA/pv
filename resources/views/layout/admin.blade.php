<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
        
    @include('layout.style')
	@include('request.notifications')

    <body>

	    <!-- navBar -->
	    <div class="full-width navBar">
		    <div class="full-width navBar-options">
			    <i class="zmdi zmdi-more-vert btn-menu" id="btn-menu"></i>	
			    <div class="mdl-tooltip" for="btn-menu">Mostrar Operaciones</div>
			    <nav class="navBar-options-list">
				    <ul class="list-unstyle">
                        <li class="btn-changestore" id="btn-changestore">
							<a style="color:#fff;" href="{{ url('/MisTiendas') }}"><i class="zmdi zmdi-shopping-cart zmdi-hc-1x"></i></a>
						    <div class="mdl-tooltip" for="btn-changestore">Cambiar de tienda</div>
                        </li>                        
					    <li class="btn-exitsystem" id="btn-exitsystem">
							<a style="color:#fff;" href="{{ url('/Logout') }}"><i class="zmdi zmdi-power zmdi-hc-1x"></i></a>
						    <div class="mdl-tooltip" for="btn-exit">Cerrar Sessión</div>
					    </li>
				    </ul>
			    </nav>
		    </div>
        </div>
        
	    <!-- MEnu Lateral Izquierdo -->
	    <section class="full-width navLateral">
		    <div class="full-width navLateral-bg btn-menu"></div>
		    	<div class="full-width navLateral-body">
			    	<div class="full-width navLateral-body-logo text-center tittles">
				    	<i class="zmdi zmdi-close btn-menu"></i><span id="Organizaton_Name"></span>
			    	</div>
			    	<figure class="full-width" style="height: 77px;">
				    	<div class="navLateral-body-cl">
					    	<img src="assets/img/avatar-male.png" alt="Avatar" class="img-responsive">
				    	</div>
				    	<figcaption class="navLateral-body-cr hide-on-tablet">
					    	<span>
								{{Session::get('user_name')}}<br>
								<small>{{Session::get('user_login')}} - {{Session::get('user_profile')}}</small>
					    	</span>
				    	</figcaption>
			    	</figure>
                	<div class="full-width tittles navLateral-body-tittle-menu">
				    	<i class="zmdi zmdi-store"></i><span class="hide-on-tablet">&nbsp;{{Session::get('aux_store_name')}}</span>
		    		</div>
            
                	<nav id="navegador" class="full-width">
						
					</nav>
				</div>
			</div>
    	</section>
    
    
        @yield('content')
	

		<script>
			function load_ajax(route,container)
			{
				$.ajax({
                	url: route,
                	type: "GET",
                	dataType: "json",
                	success:function(json) {
                    	$.each(json, function(key, value) {
                        	$(container).append(value);
                    	});
                	}
            	});
			}

			$(document).ready(function(){
				$("#navegador").load("{{ Config::get('app.url') }}/Menu");

				load_ajax("{{ Config::get('app.url') }}/ajax/parametro/1",'#Organizaton_Name');
			});
		</script>
    </body>
</html>

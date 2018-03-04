@include('layout.style')

{!!Form::open(['route'=>'Usuario.store','method'=>'POST','class'=>'form-horizontal'])!!}

    @include('request.notifications')

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabDatosUsuario" class="mdl-tabs__tab is-active">Datos del Usuario</a>
				<a href="#tabPermisosTienda" class="mdl-tabs__tab">Permisos sobre Tiendas</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabDatosUsuario">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Datos Usuario
							</div>
							<div class="full-width panel-content">
                                @include('usuario.forms.user')
                            </div>
						</div>
					</div>
				</div>
			</div>
			<div class="mdl-tabs__panel" id="tabPermisosTienda">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Tiendas Disponibles
							</div>
							<div class="full-width panel-content">
                                @include('usuario.forms.store')
							</div>
						</div>
						
					</div>
				</div>
            </div>
            
            <p class="text-center">
	            <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addClient">
    	            <i class="zmdi zmdi-plus"></i>
	            </button>
	            <div class="mdl-tooltip" for="btn-addClient">Guardar Cambios</div>
            </p>
        </div>
        
{!!Form::close()!!}
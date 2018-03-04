@include('layout.style')

{!!Form::open(['route'=>'Perfil.store','method'=>'POST','class'=>'form-horizontal'])!!}

    @include('request.notifications')

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__tab-bar">
				<a href="#tabDatosUsuario" class="mdl-tabs__tab is-active">Datos del Perfil</a>
				<a href="#tabPermisosTienda" class="mdl-tabs__tab">Permisos</a>
			</div>
			<div class="mdl-tabs__panel is-active" id="tabDatosUsuario">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--8-col-desktop mdl-cell--2-offset-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Datos del Perfil
							</div>
							<div class="full-width panel-content">
								<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    								{!!Form::text('profile_dsc',null,['id'=>'profile_dsc', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ [0-9]]*(\.+)?'])!!}
    								{!!Form::label('Nombre del Perfil',NULL,['class'=>'mdl-textfield__label','for'=>'profile_dsc'])!!}
									<span class="mdl-textfield__error">Nombre de Perfil Invalido</span>
								</div>
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
								Permisos sobre pantallas
							</div>
							<div class="full-width panel-content">
								@include('perfil.forms.screen')
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
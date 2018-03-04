@extends('layout.admin')


@section('content')



<!-- pageContent -->
    <section class="full-width pageContent">    
    
        <section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-account"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Edición y creación de usuarios (Estos Usuarios nos permitiran accesar al portal).
					 Recuerda que dependiendo el perfil es lo que el usuario proda consultar en el menú.
				</p>
			</div>
        </section>
        
        
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Usuarios
							</div>
							<div class="full-width panel-content">
                            
		                        <div class="mdl-grid">
			                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					                            <thead>
						                            <tr>
                                                        <th style="text-align:center;">Nombre</th>
                                                        <th style="text-align:center;">Usuario</th>
                                                        <th style="text-align:center;">Perfil</th>
                                                        <th style="text-align:center;">Correo</th>
														<th style="text-align:center;">Estatus</th>
                                                        <th style="text-align:center;">Opciones</th>
						                            </tr>
					                            </thead>
					                            <tbody>
                                                @foreach($users as $user)                                 
						                            <tr>
							                            <td style="text-align:left;">{{$user->user_name}}</td>
							                            <td style="text-align:left;">{{$user->user_login}}</td>
							                            <td style="text-align:left;">{{$user->profile_dsc}}</td>
							                            <td style="text-align:left;">{{$user->user_mail}}</td>
							                            <td style="text-align:left;">{{$user->status}}</td>
							                            <td>
                                                            {!! Html::decode(link_to_route('Usuario.edit', '<i class="zmdi zmdi-edit"></i>', $parameters = [$user->user_id], $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
															@if($user->active == 1)
                                                            	{!! Html::decode(link_to_route('Usuario.show', '<i class="zmdi zmdi-minus-circle"></i>', $parameters = $user->user_id, $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
															@else
																{!! Html::decode(link_to_route('Usuario.show', '<i class="zmdi zmdi-plus-circle"></i>', $parameters = $user->user_id, $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
															@endif
														</td>
                                                    </tr>
                                                @endforeach
					                            </tbody>
                                            </table>
                                        </div>
			                        </div>
		                        </div>
                            </div>

								<p class="text-center">           
									<button id="add" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addUser">
										<i class="zmdi zmdi-plus" ></i>
									</button>
									<div class="mdl-tooltip" for="btn-addUser">Agregar Nuevo Usuario</div>
								</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
@stop
@extends('layout.admin')


@section('content')

<!-- pageContent -->
    <section class="full-width pageContent">    
    
        <section class="full-width header-well">
			<div class="full-width header-well-icon">
				<i class="zmdi zmdi-accounts"></i>
			</div>
			<div class="full-width header-well-text">
				<p class="text-condensedLight">
					Se pueden editar y modificar todos los perfiles de usuario, asi como reacomodar los permisos sobre pantallas. 
				</p>
			</div>
        </section>
        
        
		<div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
			<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
				<div class="mdl-grid">
					<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
						<div class="full-width panel mdl-shadow--2dp">
							<div class="full-width panel-tittle bg-primary text-center tittles">
								Perfiles
							</div>
							<div class="full-width panel-content">
                            
		                        <div class="mdl-grid">
			                        <div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
                                        <div class="table-responsive">
                                            <table class="table table-bordered table-striped table-hover dataTable mdl-data-table mdl-js-data-table mdl-shadow--2dp full-width table-responsive">
					                            <thead>
						                            <tr>
                                                        <th style="text-align:center;">Perfil</th>
														<th style="text-align:center;">Estatus</th>
														<th style="text-align:center;">Operaciones</th>
						                            </tr>
					                            </thead>
					                            <tbody>
                                                @foreach($profiles as $val)                                 
						                            <tr>
							                            <td style="text-align:left;">{{$val->profile_dsc}}</td>
							                            <td style="text-align:left;">{{$val->status}}</td>
							                            <td>
                                                            {!! Html::decode(link_to_route('Perfil.edit', '<i class="zmdi zmdi-edit"></i>', $parameters = $val->profile_id, $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
                                                            @if($val->active == 1)
																{!! Html::decode(link_to_route('Perfil.show', '<i class="zmdi zmdi-minus-circle"></i>', $parameters = $val->profile_id, $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
															@else
																{!! Html::decode(link_to_route('Perfil.show', '<i class="zmdi zmdi-plus-circle"></i>', $parameters = $val->profile_id, $attributes = ['class' => 'mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'])) !!}
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
									<div class="mdl-tooltip" for="btn-addUser">Agregar Nuevo Perfil</div>
								</p>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


<!-- Modal -->
<div class="modal fade" id="myModal" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">×</button>
                <h4 class="modal-title">Modal with Dynamic Content</h4>
            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<script>
$('#add').on('click',function(){
    $('.modal-body').load('{{ Config::get('app.url') }}/Perfil/create',function(){
        $('#myModal').modal({show:true});
    });
});
</script>


@stop
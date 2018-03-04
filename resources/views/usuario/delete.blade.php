@include('layout.style')

    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
	    				<div class="full-width panel-tittle bg-primary text-center tittles">
                            Confirmación

                            @include('request.notifications')
						</div>
						<div class="full-width panel-content">
                            {!!Form::model($user,['route'=>['Usuario.destroy',$user->user_id],'method'=>'DELETE','class'=>'form-horizontal'])!!}
                                {!! Html::decode(Form::label('Esta seguro de cambiar el estatus del usuario <kbd>'. $user->user_login . '</kbd>',NULL,['class'=>''])) !!}
                                
                                <p class="text-center">
                                @if($user->active == 1)
									<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-danger" id="btn-addClient">
                                        <i class="zmdi zmdi-minus-circle"></i>
									</button>
                                @else
                                    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-success" id="btn-addClient">
                                        <i class="zmdi zmdi-plus-circle"></i>
									</button>
                                @endif
                                    <div class="mdl-tooltip" for="btn-addClient">Actualizar</div>
								</p>
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
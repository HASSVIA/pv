
@include('layout.style')

@include('tienda.scripts.ajax')


    <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
		<div class="mdl-tabs__panel is-active" id="tabNewAdmin">
			<div class="mdl-grid">
				<div class="mdl-cell mdl-cell--4-col-phone mdl-cell--8-col-tablet mdl-cell--12-col-desktop">
					<div class="full-width panel mdl-shadow--2dp">
	    				<div id="test" class="full-width panel-tittle bg-primary text-center tittles">
                            Creación de Tienda

                            @include('request.notifications')
						</div>
						<div class="full-width panel-content">
                            {!!Form::open(['route'=>'Tienda.store','method'=>'POST','class'=>'form-horizontal'])!!}
                                @include('tienda.forms.store')
                            {!!Form::close()!!}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>





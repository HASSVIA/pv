<h5 class="text-condensedLight">Datos de la Tienda </h5>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!!Form::text('store_dsc',null,['id'=>'store_dsc', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ0-9 ]*(\+)?'])!!}
        {!!Form::label('Nombre Completo de la tienda',NULL,['class'=>'mdl-textfield__label','for'=>'store_dsc'])!!}
		<span class="mdl-textfield__error">Nombre Invalido</span>
	</div>
	<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!!Form::text('store_dsc_short',null,['id'=>'store_dsc_short', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ0-9 ]*(\.+)?'])!!}
        {!!Form::label('Nombre corto de la tienda',NULL,['class'=>'mdl-textfield__label','for'=>'store_dsc_short'])!!}
		<span class="mdl-textfield__error">Nombre de Tienda Corto Invalido</span>
	</div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!!Form::select('state_id',$states,null,['id'=>'state_id', 'class'=>'mdl-textfield__input'])!!}
        {!!Form::label('Estado',NULL,['class'=>'mdl-textfield__label','for'=>'state_id'])!!}
    </div>
    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
        {!!Form::select('municipality_id',['placeholder'=>'Selecciona'],null,['id'=>'municipality_id', 'class'=>'mdl-textfield__input'])!!}
        {!!Form::label('Municipio',NULL,['class'=>'mdl-textfield__label','for'=>'municipality_id'])!!}
	</div>
	<p class="text-center">
		<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored bg-primary" id="btn-addClient">
			<i class="zmdi zmdi-plus"></i>
		</button>
		<div class="mdl-tooltip" for="btn-addClient">Actualizar Tienda</div>
	</p>
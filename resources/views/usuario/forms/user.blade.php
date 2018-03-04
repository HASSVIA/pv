<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    {!!Form::text('user_name',null,['id'=>'user_name', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ ]*(\.[0-9]+)?'])!!}
    {!!Form::label('Nombre Completo',NULL,['class'=>'mdl-textfield__label','for'=>'user_name'])!!}
	<span class="mdl-textfield__error">Nombre Invalido</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    {!!Form::text('user_login',null,['id'=>'user_login', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ0-9]*( \.+)?'])!!}
    {!!Form::label('Nombre de Login',NULL,['class'=>'mdl-textfield__label','for'=>'user_login'])!!}
    <span class="mdl-textfield__error">Nombre de usuario invalido</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    {!!Form::password('user_password',['id'=>'password', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ0-9]*( \.+)?'])!!}
    {!!Form::label('Contraseña',NULL,['class'=>'mdl-textfield__label','for'=>'password'])!!}
    <span class="mdl-textfield__error">Contraseña Invalida</span>
</div>                            
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    {!!Form::text('user_mail',null,['id'=>'user_mail', 'class'=>'mdl-textfield__input', 'pattern'=>'-?[A-Za-záéíóúÁÉÍÓÚ@.0-9]*( \+)?'])!!}
    {!!Form::label('Correo Electronico',NULL,['class'=>'mdl-textfield__label','for'=>'user_mail'])!!}
    <span class="mdl-textfield__error">Correo Electronico Invalido</span>
</div>
<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
    {!!Form::select('profile_id',$profiles,null,['id'=>'profile_id', 'class'=>'mdl-textfield__input'])!!}
    {!!Form::label('Perfil',NULL,['class'=>'mdl-textfield__label','for'=>'profile_id'])!!}
</div>

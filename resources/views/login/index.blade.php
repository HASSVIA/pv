@extends('layout.login')


@section('content')

<div class="container-login">
		<p class="text-center" style="font-size: 80px;">
			<i class="zmdi zmdi-account-circle"></i>
		</p>
        <p class="text-center text-condensedLight">Ingresa sus datos de acceso al portal</p>
        @include('request.notifications')

        {!!Form::open(['route'=>'Login.store','method'=>'POST'])!!}
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
			    {!!Form::text('user_login',null,['id'=>'user_login', 'class'=>'mdl-textfield__input'])!!}
                {!!Form::label('Nombre de Login',NULL,['class'=>'mdl-textfield__label'])!!}
			</div>
			<div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                {!!Form::password('user_password',['id'=>'user_password', 'class'=>'mdl-textfield__input'])!!}
                {!!Form::label('Contraseña',NULL,['class'=>'mdl-textfield__label'])!!}
			</div>
			<button id="SingIn"  class="mdl-button mdl-js-button mdl-js-ripple-effect" style="color: #3F51B5; float:right;">
				ENTRAR <i class="zmdi zmdi-mail-send" type="submit" value="ENTRAR" name="entrar"></i>
			</button>
        {!!Form::close()!!}		
	</div>

@stop
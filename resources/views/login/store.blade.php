@extends('layout.login')


@section('content')

    <div class="container-login">
        <p class="text-center text-condensedLight">SELECCIONE LA TIENDA A TRABAJAR:</p>
    
        @include('request.notifications')

        @foreach($stores as $val)                                 
            <div class="mdl-list__item mdl-list__item--two-line">
			    <span class="mdl-list__item-primary-content">
    			    <i class="zmdi zmdi-store mdl-list__item-avatar"></i>
    			    <span>{{$val->store_dsc_short}}</span>
				    <span class="mdl-list__item-sub-title">{{$val->state_dsc}} - {{$val->municipality_dsc}}</span>
                </span>
                {!! Html::decode(link_to_route('MisTiendas.edit', '<i class="zmdi zmdi-forward"></i>', $parameters = $val->store_id, $attributes = ['class' => 'mdl-list__item-secondary-action zmdi-hc-2x animated fadeInLeft zmdi-hc-fw'])) !!}
            </div>
        @endforeach
	</div>

@stop
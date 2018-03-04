<div class="full-width panel-content">
	<div class="mdl-list">
        @foreach($stores as $s)
        <div class="mdl-list__item mdl-list__item--two-line">
			<span class="mdl-list__item-primary-content">
				<i class="zmdi zmdi-store mdl-list__item-avatar"></i>
				<span>{{$s->store_dsc}}</span>
		    	<span class="mdl-list__item-sub-title">{{$s->store_dsc_short}}</span>
			</span>
			<a class="mdl-list__item-secondary-action"><input type="checkbox" name="stores[{{$s->store_id}}]" id="{{$s->store_id}}" value="{{$s->store_id}}"></a>
		</div>
        <li class="full-width divider-menu-h"></li>
        @endforeach
	</div>
</div>

@if(Session::has('edit'))
    <script type="text/javascript">
        $(document).ready(function() {        
            $.ajax({
                url: "{{ Config::get('app.url') }}/ajax/usuario_tienda/"+{{$user->user_id}},
                type: "GET",
                dataType: "json",
                success:function(json) {
                    $.each(json, function(value) {
                        document.getElementById(value).checked = true;
                    });
                }
            });        
        });
    </script> 
@endif
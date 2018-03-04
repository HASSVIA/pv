<p> Marque todas las pantallas que podra ver el perfil <p> 
             
<div class="acidjs-css3-treeview">
    <ul>
        @foreach($screen as $s)
        <li>
            @if($s->screen_parent_id == "")
            <input type="checkbox" id="node-0-3" checked="checked" /><label><input type="checkbox" name="screens[{{$s->screen_id}}]" id="{{$s->screen_id}}" value="{{$s->screen_id}}" /><span></span></label><label for="node-0-3">{{$s->screen_dsc}}</label>
            
            <ul>
                @foreach($screen as $s2)
                    @if($s2->screen_parent_id == $s->screen_id)
                    <li>
                        <label><input type="checkbox" name="screens[{{$s2->screen_id}}]" id="{{$s2->screen_id}}" value="{{$s2->screen_id}}" /><span></span></label><label for="">{{$s2->screen_dsc}}</label>
                    </li>
                    @endif
                @endforeach
            </ul>
            @endif
        </li>
        @endforeach
    </ul>
</div>
<br>
           
{!!Html::style('css/treeview.css')!!}

<script>
    $(".acidjs-css3-treeview").delegate("label input:checkbox", "change", function() {
        var checkbox = $(this),
            nestedList = checkbox.parent().next().next(),
            selectNestedListCheckbox = nestedList.find("label:not([for]) input:checkbox");
 
        if(checkbox.is(":checked")) {
            return selectNestedListCheckbox.prop("checked", true);
        }
        selectNestedListCheckbox.prop("checked", false);
    });


    @if(Session::has('edit'))
        $(document).ready(function() {        
            $.ajax({
                url: "{{ Config::get('app.url') }}/ajax/perfil_pantalla/"+{{$profile->profile_id}},
                type: "GET",
                dataType: "json",
                success:function(json) {
                    $.each(json, function(value) {
                        document.getElementById(value).checked = true;
                    });
                }
            });        
        });
    @endif
</script>

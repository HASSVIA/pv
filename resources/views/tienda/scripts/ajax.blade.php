    <script type="text/javascript">
        function load_municipality(id){
            $('select[name="municipality_id"]').empty();

            $.ajax({
                url: "{{ Config::get('app.url') }}/ajax/municipios/"+id,
                // url: 'http://127.0.0.1/PV/public/ajax/municipios/'+stateID,
                type: "GET",
                dataType: "json",
                success:function(json) {
                    $.each(json, function(key, value) {
                        $('select[name="municipality_id"]').append('<option value="'+ key +'">'+ value +'</option>');
                    });
                }
            });
        }

        $(document).ready(function() {        

            $('select[id="state_id"]').change( function() {
                var stateID = $(this).val();
                if(stateID) {
                    load_municipality(stateID);
                }
            });

        @if(Session::has('edit'))
            $("#state_id option[value={{$store->state_id}}]").attr("selected","selected");
            load_municipality({{$store->state_id}});
            $("#municipality_id option[value={{$store->municipality_id}}]").attr("selected","selected");
            $('.aiwprtron').addClass('is-focused');
        @endif
        
        });
    </script>
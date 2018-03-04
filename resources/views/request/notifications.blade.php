@if($errors->any())
    @foreach($errors->all() as $error)
            <script>showNotification('bg-red','<strong>{!!$error!!}</strong>','bottom','center','animated zoomIn','animated zoomOut');</script>
    @endforeach
@endif



@if(Session::has('error'))
    <script>showNotification('bg-red',"<strong>{{Session::get('error')}}</strong>",'bottom','center','animated zoomIn','animated zoomOut');</script>
@endif



@if(Session::has('success'))
    <script>showNotification('bg-green',"<strong>{{Session::get('success')}}</strong>",'bottom','center','animated zoomIn','animated zoomOut');</script>
@endif
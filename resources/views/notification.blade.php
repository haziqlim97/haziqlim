<script src="{{asset('js/notification.js')}}"></script>

<script>
    @if(Session::has('success'))
  		notification.success('top','center', {!! json_encode(Session::get('success')) !!});
    @endif


    @if(Session::has('info'))
        notification.info('top','center', {!! json_encode(Session::get('info')) !!});
    @endif


    @if(Session::has('warning'))
        notification.warning('top','center', {!! json_encode(Session::get('warning')) !!});
    @endif


    @if(Session::has('error'))
        notification.danger('top','center', {!! json_encode(Session::get('error')) !!});
    @endif
</script>
@if (Session::has('sweet_alert.alert'))
    <script>
        @if (Session::has('sweet_alert.content'))
            var config = {!! Session::pull('sweet_alert.alert') !!}
            var content = document.createElement('div');
            content.insertAdjacentHTML('afterbegin', config.content);
            config.content = content;
            swal(config);
        @else
            swal({!! Session::pull('sweet_alert.alert') !!});
        @endif
    </script>
@endif

@if (Session::has('error'))
    <script>
        swal({
            text: "{!! Session::get('error') !!}",
            icon: "error",
            buttons: false,
        });
    </script>
@endif

@if (Session::has('success'))
    <script>
        swal({
            text: "{!! Session::get('success') !!}",
            icon: "success",
            buttons: false,
        });
    </script>
@endif

@if (Session::has('info'))
    <script>
        swal({
            text: "{!! Session::get('info') !!}",
            icon: "info",
            buttons: false,
        });
    </script>
@endif

@if (Session::has('warning'))
    <script>
        swal({
            text: "{!! Session::get('warning') !!}",
            icon: "warning",
            buttons: false,
        });
    </script>
@endif



<div id="laravel-notify">
    @if (session()->has('notify.message'))

        @include('notifications.toast')

        @include('notifications.smiley')

        @include('notifications.drakify')

        @include('notifications.connectify')

        @include('notifications.emotify')

    @endif

    {{ session()->forget('notify.message') }}

    <script>
        var notify = {
            timeout: "{{ config('notify.timeout') }}",
        }
    </script>
</div>

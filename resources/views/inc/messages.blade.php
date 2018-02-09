@if(session()->has('success'))

    <script type="text/javascript">

        $(function(){

           alertify.success("{!! session()->get('success') !!}");
        });
    </script>
@elseif(session()->has('error'))
    <script type="text/javascript">

        $(function(){

            alertify.error("{!! session()->get('error') !!}");
        });
    </script>
    @elseif(session()->has('errors'))
    <?php $errors = session()->get('errors'); $messages = "" ?>
    @foreach ($errors->all("<p>:messages</p>") as $message) {
    <?php $messages .= $message; ?>
    @endforeach
    <script type="text/javascript">

        $(function(){

            alertify.error("{!! $messages !!}");
        });
    </script>

@endif

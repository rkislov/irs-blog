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
@endif

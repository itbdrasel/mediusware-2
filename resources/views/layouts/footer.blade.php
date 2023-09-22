<script src="{{url('backend/plugins/jquery/jquery.min.js')}}"></script>
<script src="{{url('backend/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<script type="text/javascript" src="{{url('backend/plugins/datepicker/jquery-ui.js')}}"></script>
<script src="{{asset('backend/plugins/toastr/toastr.min.js')}}" ></script>


@if((Session::has('success')) || (Session::has('error')) || Session::has('message')))
    <script type="text/javascript">
        toastr.options = {
            "closeButton": true,
            "progressBar": true,
            "escapeHtml" : true,
        }
        @if (Session::has('success'))
        toastr.success('{{ Session::get('success') }}');
        @elseif(Session::has('message'))
        toastr.info('{{Session::get('message')}}');
        @elseif(Session::has('error'))
        toastr.error('{{ Session::get('error') }}');
        @endif

    </script>
@endif

<script src="{{asset('backend/js/admin-scripts.js')}}" ></script>
@stack('pageJs')

</body>
</html>

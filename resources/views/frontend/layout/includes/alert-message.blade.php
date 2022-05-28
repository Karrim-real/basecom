@if (session('message'))
    <script>
        Swal.fire({
            'icon': 'success',
            'title': 'succeed',
            'text': '{{session('message')}}',
        })
    </script>
@endif

@if (session('autherror'))
    <script>
        Swal.fire({
            'icon': 'error',
            'title': 'An error occur',
            'text': '{{session('autherror')}}',
        })
    </script>
@endif


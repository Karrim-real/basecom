@if (session('message'))
    <script>
        Swal.fire({
            'icon': 'success',
            'title': 'successed',
            'text': '{{session('message')}}',
        })
    </script>
@endif



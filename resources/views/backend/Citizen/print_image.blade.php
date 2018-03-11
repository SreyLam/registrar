<html>
    <head>
        <title>Print image</title>
        <style>
            .page {
                page-break-after: always;
            }
        </style>
    </head>
    <body>
        @foreach($images as $image)
            <div class="page">
                <image id="print" src="{{ asset('img/backend/citizen/'.$image->image_src) }}"></image>
            </div>

        @endforeach

        <script type="text/javascript" src="{{ asset('node_modules/jquery/dist/jquery.js') }}"></script>

        <script>
            $(document).ready(function() {
                window.print();
            })
        </script>
    </body>
</html>

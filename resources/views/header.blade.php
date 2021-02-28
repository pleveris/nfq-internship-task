<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Project assistant for teachers</title>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="{{ asset('css/bootstrap.css') }}" rel="stylesheet">
    <link href="{{ asset('css/custome.css') }}" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://netdna.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>
    <script>

        // Adds the most recent status message to its box
        function addStatusMessage(message) {
            var status = $('#status').val();
            if (status.length > 0) {
                status += "\n";
            }
            status += message;
            status = status.replace("\n\n", "\n");
            $('#status').val(status);
            $('#status').scrollTop($('#status')[0].scrollHeight - $('#status').height());
        }

        // Retrieves sstatus messaage from the server
        function getStatus () {
            var old_id = $('#old').val();
            var new_id = $('#new').val();
            if (isNaN(new_id)) new_id = 0;
            if (isNaN(old_id)) old_id = 0;

            $.ajax({
                type:'get',
                url:'/get-status',
                datatype:'json',
                success:function(response){
                    //alert(response.message);
                    //addStatusMessage(response.message);
                    if(new_id < response.id) {
                        old_id = new_id;
                        new_id = response.id;

                        $('#old').val(old_id);
                        $('#new').val(new_id);
                        addStatusMessage(response.message);
                    }
                }
            });
        }

        setInterval(getStatus, 10000); // Checking  sstatus every 10sec

    </script>

    <script> getStatus(); </script>

</head>
<body>
    <div id="app">
        <header class="header mb-5">
            <nav class="navbar navbar-expand navbar-light bg-light">
                <a class="navbar-brand" href="{{ route('home') }}">Project assistant for teachers</a>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item"><a href="{{ route('home') }}" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="/projects" class="nav-link">Projects</a></li>
                        <li class="nav-item"><a href="/students" class="nav-link">Student list</a></li>
                    </ul>
                </div>
            </nav>
        </header>
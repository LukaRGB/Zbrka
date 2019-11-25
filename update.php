<!DOCTYPE html>

    <head>

        <title>Zbrka</title>

        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">


        <script src="https://code.jquery.com/jquery-2.2.4.min.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
        
        <script src="./add.js"></script>

        <?php
            require "database.php";
            $data=connect_db();
        ?>

        <script src="./homepage.js"></script>

    </head>

    <body>
        <?php
            require "nav.php";
        ?>
            <div class="container">
                <h4 style="text-align:center;">Promeniti Event</h4>

        <?php
            fillForm();
        ?>


    </body>



</html>
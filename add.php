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
            <h4 style="text-align:center;">Dodati Event</h4>

            <form method="post" action="data.php" enctype="multipart/form-data">

                <div class="row">
                    <div class="input-field col s10">
                    <input placeholder="" name="event_name" type="text" class="validate">
                    <label for="event_name">Ime Događaja</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="event_date" type="text" class="datepicker" id="date">
                        <label for="event_date">Datum</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <input name="event_location" type="text" class="validate">
                        <label for="event_location">Lokacija</label>
                    </div>
                </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="main_text" class="materialize-textarea" data-length="2048" style="min-height:128px;"></textarea>
                            <label for="main_text">Tekst (Prva rečenica je uvod)</label>
                        </div>
                    </div>

                <div class="file-field input-field">
                        <div class="btn">
                        <span>Slika</span>
                        <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                    <div class="file-path-wrapper">
                        <input class="file-path validate" type="text">
                    </div>
                </div>

                <div class="row">
                    <button class="btn waves-effect waves-light" type="submit" name="action">Submit
                    <i class="material-icons right">send</i>
                    </button>
                </div>
        
            </form>
        </div>


    </body>


</html>
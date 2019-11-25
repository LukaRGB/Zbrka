<?php

    $dbHost  = "";
    $dbUsername  = "";
    $dbPassword  = "";
    $dbName  = "";
    $dbHost  = "";
    $result="";
    $data="";
    $db;

    function connect_db(){

            $dbHost     = 'localhost';
            $dbUsername = 'root';
            $dbPassword = '';
            $dbName     = 'events';
            
            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            
            //Check connection
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $result = $db->query("SELECT * FROM local_events");

            $db->close();

        return $result;
    }

    function insertEvent(){
        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'events';

        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

        $title=$_POST['event_name'];
        $location=$_POST['event_location'];
        $date=$_POST['event_date'];
        $date=DateTime::createFromFormat('M d, Y', $_POST['event_date']);
        $date=$date->format('Y-m-d');
        $main_text=$_POST['main_text'];
        

        $target_dir = "./images/";
        if(empty($_FILES['fileToUpload']['name']))
            $target_file="./images/no_image.jpg";
        else
            $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
        $uploadOk = 1;
        $imageFileType =  strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

        if(!empty($_FILES['fileToUpload']['name'])) {
            $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $uploadOk = 0;
            }
            move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file);
        }

        $sql = "INSERT INTO `local_events` (`Title`, `ImagePath`, `Date`, `Location`, `MainText`)
    VALUES ('$title', '$target_file', '$date', '$location', '$main_text')";
        echo $sql;

        if ($db->query($sql)) {
            echo "New event created successfully";
        }
        
        $db->close();

    }

    function getImage($input){
            if(isset($input))
                echo $input['ImagePath'];
    }

    function getTitle($input){
        if(isset($input))
        echo $input['Title'];
    }

    function getIntro($input){
        $intro='';

        if(isset($input))
            $intro = $input['MainText'];

        $pos='';
        preg_match("((?<!\d)\.)", $intro, $pos, PREG_OFFSET_CAPTURE);
        $intro = substr($intro, 0, $pos[0][1]+1);

        echo $intro;
    }

    function getMain($input){
        if(isset($input))
        echo $input['MainText'];
    }

    function getEventDate($input){
        if(isset($input))
            $eventDate=$input['Date'];
        $eventDate=DateTime::createFromFormat('Y-m-d', $input['Date']);
        echo date_format($eventDate, 'd. M Y');
    }

    function getLocation($input){
        if(isset($input))
        echo $input['Location'];
    }

    function getId($input){
        if(isset($input))
            return $input['id'];
    }

    function createCards($input){
        while($data = $input->fetch_assoc()){
            echo
        "
            <div class=\"col m4\">
            <div class=\"card\">

                    <div class=\"card-image\">
                    <img src=\"";
            echo getImage($data);
            echo "\"/>
                        <span class=\"card-title\">";echo getTitle($data); echo "</span>
                    </div>

                    <div class=\"card-content\">
                        <p>"; echo getIntro($data); echo "</p>
                        <br>
                        <p>"; echo getEventDate($data); echo ", "; echo getLocation($data); echo "</p>
                    </div>

                    <div class=\"card-action\">
                        <a href=\"#\" class=\"activator\">See more</a>
                    </div>

                    <div class=\"card-reveal\">
                        <span class=\"card-title grey-text text-darken-4\">"; echo getTitle($data); echo "
                            <i class=\"material-icons right\">close</i>
                        </span>
                        <p>"; echo getMain($data); echo "</p>

                        <button class=\"btn waves-effect waves-light\">
                            <a href=\"/update.php?id="; echo getId($data); echo "\">Change</a>
                        </button>
                        <button class=\"btn waves-effect waves-light\">
                            <a href=\"/delete.php?id="; echo getId($data); echo "\">Delete</a>
                        </button>
                    </div>
                
                </div>

            </div>
        ";
        }
        
    }

    function fillForm(){

        $dbHost     = 'localhost';
        $dbUsername = 'root';
        $dbPassword = '';
        $dbName     = 'events';
            
            //Create connection and select DB
            $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            
            //Check connection
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $id=$_GET['id'];
            $sql="SELECT * FROM local_events WHERE id=".$id.";";

            $input = $db->query($sql);
            $input = $input->fetch_assoc();

            $db->close();

            $input['ImagePath'];
            $input['Title'];
            $input['MainText'];
            $eventDate=DateTime::createFromFormat('Y-m-d', $input['Date']);
            $date=date_format($eventDate, 'M d, Y');
            $input['Location'];
            $input['id'];

            echo '<div class="container">
            <h4 style="text-align:center;">Dodati Event</h4>

            <form method="post" action="data.php">

                <div class="row">
                    <div class="input-field col s10">
                    <input placeholder="" name="event_name" type="text" class="validate" value=\''.$input['Title'];
                    echo'\'>
                    <label for="event_name">Ime Događaja</label>
                    </div>
                </div>

                <div class="row">
                    <div class="input-field col s12">
                        <input name="event_date" type="text" class="datepicker" id="date" value=\''.$input['Date'];
                        echo '\'>
                        <label for="event_date">Datum</label>
                    </div>
                </div>
                
                <div class="row">
                    <div class="input-field col s12">
                        <input name="event_location" type="text" class="validate" value=\''.$input['Location'];
                        echo '\'>
                        <label for="event_location">Lokacija</label>
                    </div>
                </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <textarea name="main_text" class="materialize-textarea" data-length="2048" style="min-height:128px;"/>'.$input['MainText'];
                        echo'</textarea>
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
        </div>';

        $db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);
            
            if($db->connect_error){
                die("Connection failed: " . $db->connect_error);
            }

            $input['ImagePath'];
            $input['Title'];
            $input['MainText'];
            $eventDate=DateTime::createFromFormat('Y-m-d', $input['Date']);
            $date=date_format($eventDate, 'M d, Y');
            $input['Location'];
            $input['id'];

            $id=$_GET['id'];
            //$sql="UPDATE local_events SET Title = '""'";
            //    " "WHERE id=".$id.";";
            $sql="DELETE FROM `local_events` WHERE id=".$id;
            $db->query($sql);

            $db->close();
    }

?>
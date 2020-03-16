<html>
    <head>
        <title> Dilan Ramirez - Programming Languages </title>
        <link href="main.css" rel="stylesheet">
    </head>
    <body>
        <div class="title" align="center">
            <h1> Medical Office Appointment</h1>
            <h3>Enter Patient's Information for <?php echo date("Y-m-d", strtotime('tomorrow')) ?></h3>
            <div id="instructions">
                <b><p><font size="5">Instructions:</font></p>
                <p>
                <p>- Appointments can be any time from 9:00 am to 6:00 pm.</p>
                <p>- Appointment times are every quearter hour.</p>
                <p>- Established patients' appointments are for 30 min.</p>
                <p>- New patients' appointments are 90 min.</p><br>
                <p><font color="red">*Note: </font>This website works assuming that all the patients will type their correct info including the time conflic between appointments.</p>
                </p></b>
            </div>
        </div>
        <div id="values">
            <!-- Set format inputs using HTML -->
            <form action="index.php" method="post">
                Full Name<br>
                <input id="age" type="text" name="fullName" value="" />
                <br>
                <br>
                New?<br>
                <input id="age" type="text" name="new" value="" />
                <br>
                <br>
                Address<br>
                <input id="age" type="text" name="address" value="" />
                <br>
                <br>
                Start Time <br>
                <input type="text" name="startTime">
                <br>
                <br>
                End Time <br>
                <input type="text" name="endTime">
                <br>
                <br>
                Coordinate <br>
                <input type="text" name="coord1">
                </p>
                comments <br>
                <textarea col="40" rows="4" name="comments"></textarea>
                <br>
                <br>
                <button>Add Patient</button>
            </form>  
        </div> 
        <h1>Patient Schedule</h1>
        <h2><center><font color="red">for <?php echo date("Y-m-d", strtotime('tomorrow')) ?></center></font></h2>
        <div id="tableForm">
             <!--Create format table using HTML  -->
            <table style="width:80%" align="center" border="1" background="#fff">
                <thead>
                    <tr>
                    <th>Number</th>
                    <th>Start Time</th>
                    <th>End Time</th>
                    <th>Address</th>
                    <th>Full Name</th>
                    <th>New</th>
                    <th>Comments</th>
                    <th>Driving Time</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        session_start();
                        error_reporting(0);

                        //Create session arrays storing patients' input.
                        if (isset($_POST["fullName"])){
                            $_SESSION["fullname"][] = $_POST["fullName"];  
                        }
                        if (isset($_POST["new"])){
                            $_SESSION["new"][] = $_POST["new"];  
                        }
                        if (isset($_POST["address"])){
                            $_SESSION["address"][] = $_POST["address"];  
                        }
                        if (isset($_POST["startTime"])){
                            $_SESSION["startTime"][] = $_POST["startTime"];  
                        }
                        if (isset($_POST["endTime"])){
                            $_SESSION["endTime"][] = $_POST["endTime"];  
                        }
                        if (isset($_POST["coord1"])){
                            $_SESSION["coord1"][] = $_POST["coord1"];  
                        }
                        if (isset($_POST["comments"])){
                            $_SESSION["comments"][] = $_POST["comments"];  
                        }
                        
                        //Get coordinate from patient
                        $coordinate = $_POST["coord1"];
                        $letter = array();
                        
                        //Function to calculate driving time from one coordinate ot another.
                        function letterConvertion($coordinate){
                            $letter = str_split($coordinate);
                            if($letter[0] == "A"){
                                $time1 = 1;
                            }else if($letter[0] == "B"){
                                $time1 = 2;
                            }else if($letter[0] == "C"){
                                $time1 = 3;
                            }else if($letter[0] == "D"){
                                $time1 = 4;
                            }else if($letter[0] == "E"){
                                $time1 = 5;
                            }else if($letter[0] == "F"){
                                $time1 = 6;
                            }else if($letter[0] == "G"){
                                $time1 = 7;
                            }else if($letter[0] == "H"){
                                $time1 = 8;
                            }else if($letter[0] == "I"){
                                $time1 = 9;
                            }else if($letter[0] == "J"){
                                $time1 = 10;
                            }else if($letter[0] == "K"){
                                $time1 = 11;
                            }else if($letter[0] == "L"){
                                $time1 = 12;
                            }else if($letter[0] == "M"){
                                $time1 = 13;
                            }else if($letter[0] == "N"){
                                $time1 = 14;
                            }else if($letter[0] == "O"){
                                $time1 = 15;
                            }else if($letter[0] == "P"){
                                $time1 = 16;
                            }else if($letter[0] == "Q"){
                                $time1 = 17;
                            }else if($letter[0] == "R"){
                                $time1 = 18;
                            }else if($letter[0] == "S"){
                                $time1 = 19;
                            }else if($letter[0] == "T"){
                                $time1 = 20;
                            }else if($letter[0] == "U"){
                                $time1 = 21;
                            }else if($letter[0] == "V"){
                                $time1 = 22;
                            }else if($letter[0] == "W"){
                                $time1 = 23;
                            }else if($letter[0] == "X"){
                                $time1 = 24;
                            }else if($letter[0] == "Y"){
                                $time1 = 25;
                            }else if($letter[0] == "Z"){
                                $time1 = 26;
                            }

                            $point = array();
                            $point[0] = $time1;
                            $point[1] = "$letter[1]";
                            return $point;  
                        }
                        $point2 = letterConvertion($coordinate);
                        $tempPoint = $point2;
        

                        //Function that calculates driving time based on a origin.
                        function calculateTime($point2){
                            $drivingTime = sqrt(pow(0 - $point2[0], 2) + pow(0 - $point2[1], 2));
                            return round($drivingTime, 2);
                        }
                        $drivingTime = 2 * calculateTime($point2);
                        if($drivingTime>0){
                            $_SESSION["coord2"][] = $drivingTime;
                        }
                        

                        //creates a big array with all the patients and their info to then use it in
                        //the search.php file to swap patient's positions.
                        $result = array_merge_recursive(
                            array_combine($_SESSION["startTime"], $_SESSION["endTime"]),
                            array_combine($_SESSION["address"], $_SESSION["fullname"]),
                            array_combine($_SESSION["new"], $_SESSION["comments"]),
                            array_combine($_SESSION["coord1"], $_SESSION["coord2"])
                        );

                        //Display table of all the patients.
                        $i = 0; 
                        foreach($_SESSION["startTime"] as $item => $k) {
                            ?>
                            <tr>
                                <td><center><?php echo $i?></center></td>
                                <td><center><?php echo $_SESSION["startTime"][$item]?></center></td>
                                <td><center><?php echo $_SESSION["endTime"][$item]?></center></td>
                                <td><center><?php echo $_SESSION["address"][$item]?></center></td>
                                <td><center><b><?php echo $_SESSION["fullname"][$item]."</b>";?></center></td>
                                <td ><font color="red"><center><?php echo $_SESSION["new"][$item]?></center></font></td>
                                <td><center><?php echo $_SESSION["comments"][$item]?></center></td>
                                <td><center><?php echo $_SESSION["coord2"][$item].' minutes'?></center></td>
                            </tr><?php
                            $i = $i + 1;
                        }

                        //Creates a copy of the patient's schedule in text format to then can download it.
                        $fp = fopen('schedule.txt', 'w');
                        foreach ($_SESSION["startTime"] as $item => $k) {
                            fwrite($fp, print_r("Appointment: ".$_SESSION["startTime"][$item].' to ', TRUE));
                            fwrite($fp, print_r($_SESSION["endTime"][$item], TRUE));
                            fwrite($fp, print_r(",   Address: ".$_SESSION["address"][$item].', ', TRUE));
                            fwrite($fp, print_r("Name: ".$_SESSION["fullname"][$item].', ', TRUE));
                            fwrite($fp, print_r('*'.$_SESSION["new"][$item].'*, ', TRUE));
                            fwrite($fp, print_r("Cooments: ".$_SESSION["comments"][$item].', ', TRUE));
                            fwrite($fp, print_r("driving time from origin: ".$_SESSION["coord2"][$item], TRUE));         
                        }
                        fclose($fp);
                        ?>
                </tbody>
            </table><br><br>
            <!-- Display all the option to edit patient schedule -->
            <div id="options">
                <br>
                <!-- Delete a patient -->
                <form action="scheduler.php" method="post">
                    <b>Type person's name to delete: <br></b>
                    <input type="text" name="delete"><br>
                    <button>Delete</button><br>
                </form><br>
                <!-- swap potition of patient -->
                <form action="search.php" method="post">
                    <b>switch patients: <br></b>
                    patient's position to change<br>
                    <input type="text" name="pos1"><br>
                    New patient's position<br>
                    <input type="text" name="pos2"><br>
                    <button>Switch</button>
                </form><br><br>
                <form action="delete.php" method="post">
                    <button>Delete Schedule</button>
                </form>
                <!-- Code to download text file that contains the tomorrow's schedule -->
                <?php
                    $dir = "./";
                    $allFiles = scandir($dir);
                    $files = array_diff($allFiles, array('.', '..'));  

                    foreach($files as $file){
                        if($file == "schedule.txt"){
                            echo 'Download Schedule'."<br>"; 
                            echo "<a href='download.php? file=".$file."'>".$file."</a><br>";
                        }
                        
                    }
                ?>
            </div>
        </div>
    </body>
</html>

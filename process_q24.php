<?php

/*
 * Copyright (C) 2013 peredur.net
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
 * GNU General Public License for more details.
 *
 * You should have received a copy of the GNU General Public License
 * along with this program.  If not, see <http://www.gnu.org/licenses/>.
 */

session_start();

if (isset($_POST['exampleRadios'])) {
    if($_POST['exampleRadios'] == 1){
        $_SESSION["q24"]=$_POST['exampleFormControlInput1'];
    } else{
        $_SESSION["q24"]=$_POST['exampleRadios'];
    }  
    
    writetoDataBase();
    echo("geschafft!!");
    //header("Location: ende.html");
    //die();
} 

else {
    // The correct POST variables were not sent to this page. 
    header('Location: frage24.html');
    exit();
}

function writetoDataBase() {
    echo '<pre>' . print_r($_SESSION, TRUE) . '</pre>';

    /*$servername = "rdbms.strato.de";
    $username = "U4265121";
    $password = "ZFgzvS7pZFgzvS7p1337";
    $dbname = "DB4265121";*/

    $servername = "localhost";
    $username = "itjansen_freddypaul";
    $password = "20@4Dybf";
    $dbname = "itjansen_freddypaul";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
    } else {
        echo ("Verbindung steht");
    }

    if (empty($_SESSION["q1"])) {
        $q1 = "/";
    } else {
        $q1 = strval($_SESSION["q1"]);
    }
    if (empty($_SESSION["q2"])) {
        $q2 = "/";
    } else {
        $q2 = strval($_SESSION["q2"]);
    }
    if (empty($_SESSION["q3"])) {
        $q3 = "/";
    } else {
        $q3 = strval($_SESSION["q3"]);
    }
    if (empty($_SESSION["q4"])) {
        $q4 = "/";
    } else {
        $q4 = strval($_SESSION["q4"]);
    }
    if (empty($_SESSION["q5"])) {
        $q5 = "/";
    } else {
        $q5 = strval($_SESSION["q5"]);
    }

    if (empty($_SESSION["q5_2"])) {
        $q5_2 = "/";
    } else {
        $q5_2 = strval($_SESSION["q5_2"]);
    }
    if (empty($_SESSION["q6_1"])) {
        $q6_1 = "/";
    } else {
        $q6_1 = strval($_SESSION["q6_1"]);
    }
    if (empty($_SESSION["q6_2"])) {
        $q6_2 = "/";
    } else {
        $q6_2 = strval($_SESSION["q6_2"]);
    }
    if (empty($_SESSION["q6_3"])) {
        $q6_3 = "/";
    } else {
        $q6_3 = strval($_SESSION["q6_3"]);
    }
    if (empty($_SESSION["q6_4"])) {
        $q6_4 = "/";
    } else {
        $q6_4 = strval($_SESSION["q6_4"]);
    }


    if (empty($_SESSION["q6_5"])) {
        $q6_5 = "/";
    } else {
        $q6_5 = strval($_SESSION["q6_5"]);
    }
    if (empty($_SESSION["q6_7"])) {
        $q6_7 = "/";
    } else {
        $q6_7 = strval($_SESSION["q6_7"]);
    }
    if (empty($_SESSION["q6_8"])) {
        $q6_8 = "/";
    } else {
        $q6_8 = strval($_SESSION["q6_8"]);
    }
    if (empty($_SESSION["q6_9"])) {
        $q6_9 = "/";
    } else {
        $q6_9 = strval($_SESSION["q6_9"]);
    }
    if (empty($_SESSION["q7"])) {
        $q7 = "/";
    } else {
        $q7 = strval($_SESSION["q7"]);
    }

    if (empty($_SESSION["q6_5"])) {
        $q6_5 = "/";
    } else {
        $q6_5 = strval($_SESSION["q6_5"]);
    }
    if (empty($_SESSION["q6_7"])) {
        $q6_7 = "/";
    } else {
        $q6_7 = strval($_SESSION["q6_7"]);
    }
    if (empty($_SESSION["q6_8"])) {
        $q6_8 = "/";
    } else {
        $q6_8 = strval($_SESSION["q6_8"]);
    }
    if (empty($_SESSION["q6_9"])) {
        $q6_9 = "/";
    } else {
        $q6_9 = strval($_SESSION["q6_9"]);
    }
    if (empty($_SESSION["q7"])) {
        $q7 = "/";
    } else {
        $q7 = strval($_SESSION["q7"]);
    }

    if (empty($_SESSION["q7_1"])) {
        $q7_1 = "/";
    } else {
        $q7_1 = strval($_SESSION["q7_1"]);
    }
    if (empty($_SESSION["q7_2"])) {
        $q7_2 = "/";
    } else {
        $q7_2 = strval($_SESSION["q7_2"]);
    }
    if (empty($_SESSION["q8"])) {
        $q8 = "/";
    } else {
        $q8 = strval($_SESSION["q8"]);
    }
    if (empty($_SESSION["q8_1"])) {
        $q8_1 = "/";
    } else {
        $q8_1 = strval($_SESSION["q8_1"]);
    }
    if (empty($_SESSION["q9"])) {
        $q9 = "/";
    } else {
        $q9 = strval($_SESSION["q9"]);
    }

    if (empty($_SESSION["q9_1"])) {
        $q9_1 = "/";
    } else {
        $q9_1 = strval($_SESSION["q9_1"]);
    }
    if (empty($_SESSION["q9_2"])) {
        $q9_2 = "/";
    } else {
        $q9_2 = strval($_SESSION["q9_2"]);
    }
    if (empty($_SESSION["q9_2_1"])) {
        $q9_2_1 = "/";
    } else {
        $q9_2_1 = strval($_SESSION["q9_2_1"]);
    }
    if (empty($_SESSION["q9_3"])) {
        $q9_3 = "/";
    } else {
        $q9_3 = strval($_SESSION["q9_3"]);
    }
    if (empty($_SESSION["q9_3_1"])) {
        $q9_3_1 = "/";
    } else {
        $q9_3_1 = strval($_SESSION["q9_3_1"]);
    }

    if (empty($_SESSION["q9_4"])) {
        $q9_4 = "/";
    } else {
        $q9_4 = strval($_SESSION["q9_4"]);
    }
    if (empty($_SESSION["q9_4_1"])) {
        $q9_4_1 = "/";
    } else {
        $q9_4_1 = strval($_SESSION["q9_4_1"]);
    }
    if (empty($_SESSION["q10"])) {
        $q10 = "/";
    } else {
        $q10 = strval($_SESSION["q10"]);
    }
    if (empty($_SESSION["q10_1"])) {
        $q10_1 = "/";
    } else {
        $q10_1 = strval($_SESSION["q10_1"]);
    }
    if (empty($_SESSION["q11"])) {
        $q11 = "/";
    } else {
        $q11 = strval($_SESSION["q11"]);
    }

    if (empty($_SESSION["q11_1"])) {
        $q11_1 = "/";
    } else {
        $q11_1 = strval($_SESSION["q11_1"]);
    }
    if (empty($_SESSION["q12"])) {
        $q12 = "/";
    } else {
        $q12 = strval($_SESSION["q12"]);
    }
    if (empty($_SESSION["q12_1"])) {
        $q12_1 = "/";
    } else {
        $q12_1 = strval($_SESSION["q12_1"]);
    }
    if (empty($_SESSION["q13"])) {
        $q13 = "/";
    } else {
        $q13 = strval($_SESSION["q13"]);
    }
    if (empty($_SESSION["q13_1"])) {
        $q13_1 = "/";
    } else {
        $q13_1 = strval($_SESSION["q13_1"]);
    }
    if (empty($_SESSION["q14_1"])) {
        $q14_1 = "/";
    } else {
        $q14_1 = strval($_SESSION["q14_1"]);
    }

    if (empty($_SESSION["q14_2"])) {
        $q14_2 = "/";
    } else {
        $q14_2 = strval($_SESSION["q14_2"]);
    }
    if (empty($_SESSION["q15"])) {
        $q15 = "/";
    } else {
        $q15 = strval($_SESSION["q15"]);
    }
    if (empty($_SESSION["q16"])) {
        $q16 = "/";
    } else {
        $q16 = strval($_SESSION["q16"]);
    }
    if (empty($_SESSION["q17"])) {
        $q17 = "/";
    } else {
        $q17 = strval($_SESSION["q17"]);
    }
    if (empty($_SESSION["q17_2"])) {
        $q17_2 = "/";
    } else {
        $q17_2 = strval($_SESSION["q17_2"]);
    }

    if (empty($_SESSION["q17_3"])) {
        $q17_3 = "/";
    } else {
        $q17_3 = strval($_SESSION["q17_3"]);
    }
    if (empty($_SESSION["q17_1_1"])) {
        $q17_1_1 = "/";
    } else {
        $q17_1_1 = strval($_SESSION["q17_1_1"]);
    }
    if (empty($_SESSION["q17_2_1"])) {
        $q17_2_1 = "/";
    } else {
        $q17_2_1 = strval($_SESSION["q17_2_1"]);
    }
    if (empty($_SESSION["q17_3_1"])) {
        $q17_3_1 = "/";
    } else {
        $q17_3_1 = strval($_SESSION["q17_3_1"]);
    }
    if (empty($_SESSION["q19_1"])) {
        $q19_1 = "/";
    } else {
        $q19_1 = strval($_SESSION["q19_1"]);
    }

    if (empty($_SESSION["q19_2"])) {
        $q19_2 = "/";
    } else {
        $q19_2 = strval($_SESSION["q19_2"]);
    }
    if (empty($_SESSION["q21"])) {
        $q21 = "/";
    } else {
        $q21 = strval($_SESSION["q21"]);
    }
    if (empty($_SESSION["q20"])) {
        $q20 = "/";
    } else {
        $q20 = strval($_SESSION["q20"]);
    }
    if (empty($_SESSION["q22"])) {
        $q22 = "/";
    } else {
        $q22 = strval($_SESSION["q22"]);
    }
    if (empty($_SESSION["q23_1"])) {
        $q23_1 = "/";
    } else {
        $q23_1 = strval($_SESSION["q23_1"]);
    }

    if (empty($_SESSION["q23_2"])) {
        $q23_2 = "/";
    } else {
        $q23_2 = strval($_SESSION["q23_2"]);
    }
    if (empty($_SESSION["q24"])) {
        $q24 = "/";
    } else {
        $q24 = strval($_SESSION["q24"]);
    }
    
    echo("umwandlung erfolgreich!");

    $sql = "INSERT INTO answers (q1, q2, q3, q4, q5, q5_2, q6_1, q6_2, q6_3, q6_4, q6_5, q6_6, q6_7, q6_8, q6_9, q7, q7_1, q7_2, q8, q8_1, q9, q9_1, q9_2, q9_2_1, q9_3, q9_3_1, q9_4, q9_4_1, q10, q10_1, q11, q11_1, q12, q12_1, q13, q14_1, q14_2, q15, q16, q17, q17_2, q17_3, q17_1_1, q17_2_1, q17_3_1, q19_1, q19_2, q21, q20, q22, q23_1, q23_2, q24) 
    VALUES ('$q1', '$q2', '$q3', '$q4', '$q5', '$q5_2', '$q6_1', '$q6_2', '$q6_3', '$q6_4', '$q6_5', '$q6_7', '$q6_8', '$q6_9', '$q7', '$q7_1', '$q7_2', '$q8', '$q8_1', '$q9', '$q9_1', '$q9_2', '$q9_2_1', '$q9_3', '$q9_3_1', '$q9_4', '$q9_4_1', '$q10', '$q10_1', '$q11', '$q11_1', '$q12', '$q12_1', '$q13', '$q13_1', '$q14_1', '$q14_2', '$q15', '$q16', '$q17', '$q17_2', '$q17_3', '$q17_1_1', '$q17_2_1', '$q17_3_1', '$q19_1', '$q19_2', '$q21', '$q20', '$q22', '$q23_1', '$q23_2', '$q24')";

    if ($conn->query($sql) === TRUE) {
    echo "New record created successfully";
    } else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();

    header('Location: ende.html');
    exit();

  }
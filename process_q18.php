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

if (isset($_POST['exampleRadios']) && isset($_POST['exampleRadios2']) && isset($_POST['exampleRadios3'])) {
    $_SESSION["q18"]=$_POST['exampleRadios'];
    $_SESSION["q18_2"]=$_POST['exampleRadios2'];
    $_SESSION["q18_3"]=$_POST['exampleRadios3'];
    $_SESSION["q18_4"]=$_POST['exampleRadios4'];

    //print($_SESSION["q17"]);
    if($_SESSION["q18"] == 1){
        $_SESSION["q18_1"]=$_POST['exampleFormControlSelect1'];
    } elseif($_SESSION["q18"] == 49){
        $_SESSION["q18_1"]="49";
        $_SESSION["q18_1_1"]=$_POST['exampleFormControlInput371'];
    } else {
        $_SESSION["q18_1"]="-99";
    }

    if($_SESSION["q18_2"] == 1){
        $_SESSION["q18_2"]=$_POST['exampleFormControlSelect2'];
        print("2: ");
        print($_SESSION["q18_2"]);
        print("\n");
    } elseif($_SESSION["q18_2"] == 49){
        $_SESSION["q18_2"]="49";
        $_SESSION["q18_2_1"]=$_POST['exampleFormControlInput372'];
    } else {
        $_SESSION["q18_2"]="-99";
    }

    if($_SESSION["q18_3"] == 1){
        $_SESSION["q18_3"]=$_POST['exampleFormControlSelect3'];
        print("3: ");
        print($_SESSION["q18_3"]);
    } elseif($_SESSION["q18_3"] == 49){
        $_SESSION["q18_3"]="49";
        $_SESSION["q18_3_1"]=$_POST['exampleFormControlInput373'];
    } else {
        $_SESSION["q18_3"]="-99";
    }

    if($_SESSION["q18_4"] == 1){
        $_SESSION["q18_4"]=$_POST['exampleFormControlSelect3'];
        print("3: ");
        print($_SESSION["q18_4"]);
    } elseif($_SESSION["q18_4"] == 49){
        $_SESSION["q18_4"]="49";
        $_SESSION["q18_4_1"]=$_POST['exampleFormControlInput374'];
    } else {
        $_SESSION["q18_4"]="-99";
    }

    header("Location: frage19.html");
    die();
} 
else {
    // The correct POST variables were not sent to this page. 
    header('Location: frage18.html');
    exit();
}
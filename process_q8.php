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

if (isset($_POST['exampleRadios']) or isset($_POST['exampleRadios2'])  or isset($_POST['exampleRadios3'])  or isset($_POST['exampleRadios4'])  or isset($_POST['exampleRadios5'])  or isset($_POST['exampleRadios6'])  or isset($_POST['exampleRadios7']) or isset($_POST['exampleRadios8'])  or isset($_POST['exampleRadios9']) ) {
    $_SESSION["q8"]=$_POST['exampleRadios'];
    if($_POST['exampleRadios'] == 8){
        $_SESSION["q8_1"]=$_POST['exampleFormControlInput1'];
    } else {
        $_SESSION["q8_1"]="/";
    }

    header("Location: frage9_3.html");
    die();
} 
else {
    // The correct POST variables were not sent to this page. 
    header('Location: frage8.html');
    exit();
}
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
    $_SESSION["q9_1"]=$_POST['exampleRadios'];
} else  {
    $_SESSION["q9_1"]="/";
}
if (isset($_POST['exampleRadios2'])) {
    $_SESSION["q9_2"]=$_POST['exampleRadios2'];
} else  {
    $_SESSION["q9_2"]="/";
}
if (isset($_POST['exampleRadios3'])) {
    $_SESSION["q9_3"]=$_POST['exampleRadios3'];
} else  {
    $_SESSION["q9_3"]="/";
}
if (isset($_POST['exampleRadios4'])) {
    $_SESSION["q9_4"]=$_POST['exampleRadios4'];
} else  {
    $_SESSION["q9_4"]="/";
}
if (isset($_POST['exampleRadios5'])) {
    $_SESSION["q9_5"]=$_POST['exampleRadios5'];
} else  {
    $_SESSION["q9_5"]="/";
}
if (isset($_POST['exampleRadios6'])) {
    $_SESSION["q9_6"]=$_POST['exampleRadios6'];
} else  {
    $_SESSION["q9_6"]="/";
}
if (isset($_POST['exampleRadios7'])) {
    $_SESSION["q9_7"]=$_POST['exampleRadios7'];
} else  {
    $_SESSION["q9_7"]="/";
}
if (isset($_POST['exampleRadios9'])) {
    $_SESSION["q9_9"]=$_POST['exampleRadios9'];
} else  {
    $_SESSION["q9_9"]="/";
}
if($_POST['exampleRadios'] == 3){
    $_SESSION["9_1"]=$_POST['exampleFormControlInput1'];
}
header("Location: frage9_2.html");
die();
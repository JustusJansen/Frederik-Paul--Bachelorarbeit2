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
    $_SESSION["q16"]=$_POST['exampleRadios'];
    //print($_SESSION["q16"]);

    if($_SESSION["q5"] == "1") {
        header('Location: frage19.html');
        exit();
    } 

    header('Location: frage17.html');
    exit();
} 
else {
    // The correct POST variables were not sent to this page. 
    header('Location: frage16.html');
    exit();
}
<?php
include_once 'psl-config.php';
 
function sec_session_start() {
    $session_name = 'sec_session_id';
    $secure = SECURE;
    $httponly = true;
    if (ini_set('session.use_only_cookies', 1) === FALSE) {
        header("Location: ../error.php?err=Could not initiate a safe session (ini_set)");
        exit();
    }
    $cookieParams = session_get_cookie_params();
    session_set_cookie_params($cookieParams["lifetime"],
        $cookieParams["path"], 
        $cookieParams["domain"], 
        $secure,
        $httponly);
    session_name($session_name);
    session_start();
    session_regenerate_id();
}

function login($email, $password, $mysqli) {
    if ($stmt = $mysqli->prepare("SELECT id, username, password, salt 
        FROM members
       WHERE email = ?
        LIMIT 1")) {
        $stmt->bind_param('s', $email);
        $stmt->execute();
        $stmt->store_result();
 
        $stmt->bind_result($user_id, $username, $db_password, $salt);
        $stmt->fetch();
 
        $password = hash('sha512', $password . $salt);
        if ($stmt->num_rows == 1) {
            if (checkbrute($user_id, $mysqli) == true) {
                return false;
            } else {
                if ($db_password == $password) {
                    $user_browser = $_SERVER['HTTP_USER_AGENT'];
                    $user_id = preg_replace("/[^0-9]+/", "", $user_id);
                    $_SESSION['user_id'] = $user_id;
                    $username = preg_replace("/[^a-zA-Z0-9_\-]+/", 
                                                                "", 
                                                                $username);
                    $_SESSION['username'] = $username;
                    $_SESSION['login_string'] = hash('sha512', 
                              $password . $user_browser);
                    return true;
                } else {
                    $now = time();
                    $mysqli->query("INSERT INTO login_attempts(user_id, time)
                                    VALUES ('$user_id', '$now')");
                    return false;
                }
            }
        } else {
            return false;
        }
    }
}

function checkbrute($user_id, $mysqli) {
    $now = time();
 
    $valid_attempts = $now - (2 * 60 * 60);
 
    if ($stmt = $mysqli->prepare("SELECT time 
                             FROM login_attempts <code><pre>
                             WHERE user_id = ? 
                            AND time > '$valid_attempts'")) {
        $stmt->bind_param('i', $user_id);
 
        $stmt->execute();
        $stmt->store_result();
 
        if ($stmt->num_rows > 5) {
            return true;
        } else {
            return false;
        }
    }
}

function login_check($mysqli) {
    if (isset($_SESSION['user_id'], 
                        $_SESSION['username'], 
                        $_SESSION['login_string'])) {
 
        $user_id = $_SESSION['user_id'];
        $login_string = $_SESSION['login_string'];
        $username = $_SESSION['username'];
 
        $user_browser = $_SERVER['HTTP_USER_AGENT'];
 
        if ($stmt = $mysqli->prepare("SELECT password 
                                      FROM members 
                                      WHERE id = ? LIMIT 1")) { 
            $stmt->bind_param('i', $user_id);
            $stmt->execute();
            $stmt->store_result();
 
            if ($stmt->num_rows == 1) {
                $stmt->bind_result($password);
                $stmt->fetch();
                $login_check = hash('sha512', $password . $user_browser);
 
                if ($login_check == $login_string) {
                    return true;
                } else {
                    return false;
                }
            } else {
                return false;
            }
        } else {
            return false;
        }
    } else {
        return false;
    }
}

function esc_url($url) {
 
    if ('' == $url) {
        return $url;
    }
 
    $url = preg_replace('|[^a-z0-9-~+_.?#=!&;,/:%@$\|*\'()\\x80-\\xff]|i', '', $url);
 
    $strip = array('%0d', '%0a', '%0D', '%0A');
    $url = (string) $url;
 
    $count = 1;
    while ($count) {
        $url = str_replace($strip, '', $url, $count);
    }
 
    $url = str_replace(';//', '://', $url);
 
    $url = htmlentities($url);
 
    $url = str_replace('&amp;', '&#038;', $url);
    $url = str_replace("'", '&#039;', $url);
 
    if ($url[0] !== '/') {
        return '';
    } else {
        return $url;
    }
}

function MSGSystem($code){
	switch($code){
		case 1: header("Location: index.php"); break;
		case 2: echo '<div class="alert alert-danger">Es wurde kein Kunde zur Suche angegeben.</div>'; break;
		case 3: echo '<div class="alert alert-danger">Der Kunde wurde erfolgreich gelöscht.</div>'; break;
		case 4: echo '<div class="alert alert-success">Der Kunde wurde erfolgreich erstellt.</div>'; break;
		case 5: echo '<div class="alert alert-success">Der Kunde wurde erfolgreich editiert.</div>'; break;
	}
}

function getCustomers($mysqli){
	echo '<table class="table"><thead><tr><th>Kunde</th><th>Datum</th><th>Nova Hüppe</th><th>Sun Paradise</th><th>Glas Nowak</th><th>Solar Magic</th><th>Corradi</th><th>Egen</th><th>Trittec</th><th>Somfi</th><th>Sonstiges</th><th>Bearbeiten</th></tr></thead><tbody>';
		$sql = "SELECT * FROM customers ORDER BY kunde ASC";
		foreach ($mysqli->query($sql) as $row) {
		   echo '<tr>';
		   
		   echo '<td>';
		   echo $row['kunde'];
		   echo '</td><td>';
		   echo $row['date'];
		   echo '</td><td>';
		   echo $row['novahueppe'];
		   echo '</td><td>';
		   echo $row['sunparadise'];
		   echo '</td><td>';
		   echo $row['glasnowak'];
		   echo '</td><td>';
		   echo $row['solarmagic'];
		   echo '</td><td>';
		   echo $row['corradi'];
		   echo '</td><td>';
		   echo $row['egen'];
		   echo '</td><td>';
		   echo $row['trittec'];
		   echo '</td><td>';
		   echo $row['somfi'];
		   echo '</td><td>';
		   echo $row['sonstiges'];
		   echo '</td><td>';
		   $id = $row['id'];
		   echo '<a href="edit.php?id=' . $id . '"><span class="glyphicon glyphicon-edit"></span></a>' . ' ' . '<a href="dashboard.php?delete=' . $id . '"><span class="glyphicon glyphicon-remove"></span></a>';
		   echo '</td>';
		   
		   echo '</tr>';
		}
    echo '</tbody></table>';
}

function searchCustomer($kunde, $mysqli){
	echo '<table class="table"><thead><tr><th>Kunde</th><th>Datum</th><th>Nova Hüppe</th><th>Sun Paradise</th><th>Glas Nowak</th><th>Solar Magic</th><th>Corradi</th><th>Egen</th><th>Trittec</th><th>Somfi</th><th>Sonstiges</th><th>Bearbeiten</th></tr></thead><tbody>';
		$sql = "SELECT * FROM customers WHERE kunde = '$kunde'";
		foreach ($mysqli->query($sql) as $row) {	   
		   echo '<tr>';
		   
		   echo '<td>';
		   echo $row['kunde'];
		   echo '</td><td>';
		   echo $row['date'];
		   echo '</td><td>';
		   echo $row['novahueppe'];
		   echo '</td><td>';
		   echo $row['sunparadise'];
		   echo '</td><td>';
		   echo $row['glasnowak'];
		   echo '</td><td>';
		   echo $row['solarmagic'];
		   echo '</td><td>';
		   echo $row['corradi'];
		   echo '</td><td>';
		   echo $row['egen'];
		   echo '</td><td>';
		   echo $row['trittec'];
		   echo '</td><td>';
		   echo $row['somfi'];
		   echo '</td><td>';
		   echo $row['sonstiges'];
		   echo '</td><td>';
		   $id = $row['id'];
		   		   echo '<a href="edit.php?id=' . $id . '"><span class="glyphicon glyphicon-edit"></span></a>' . ' ' . '<a href="dashboard.php?delete=' . $id . '"><span class="glyphicon glyphicon-remove"></span></a>';

		   echo '</td>';
		   
		   echo '</tr>';
		}
    echo '</tbody></table>';
}

function deleteCustomer($kunde, $mysqli){
	$sql = "DELETE FROM customers WHERE id = '$kunde'";
	if ($mysqli->query($sql) === TRUE) { header("Location: dashboard.php?deleteaccess=1"); } else { echo "falsch"; }
}

function editCustomer($id, $mysqli){
		$sql = "SELECT * FROM customers WHERE id = '$id'";
		foreach ($mysqli->query($sql) as $row) {	   
		  echo '<form class="form-horizontal" action="includes/process_editcustomer.php" method="post">';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="kunde">ID:</label><div class="col-sm-10"><input type="text" class="form-control" name="id" id="id" value=' . $row['id'] . ' placeholder="ID" readonly="readonly"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="kunde">Kunde:</label><div class="col-sm-10"><input type="text" class="form-control" name="kunde" id="kunde" value=' . $row['kunde'] . ' placeholder="Kunde"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="novahueppe">Nova Hüppe:</label><div class="col-sm-10"><input type="text" class="form-control" name="novahueppe" id="novahueppe" value=' . $row['novahueppe'] . ' placeholder="Nova Hüppe"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="sunparadise">Sun Paradise:</label><div class="col-sm-10"><input type="text" class="form-control" name="sunparadise" id="sunparadise" value=' . $row['sunparadise'] . ' placeholder="Sun Paradise"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="glasnowak">Glas Nowak:</label><div class="col-sm-10"><input type="text" class="form-control" name="glasnowak" id="glasnowak" value=' . $row['glasnowak'] . ' placeholder="Glas Nowak"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="solarmagic">Solar Magic:</label><div class="col-sm-10"><input type="text" class="form-control" name="solarmagic" id="solarmagic" value=' . $row['solarmagic'] . ' placeholder="Solar Magic"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="corradi">Corradi:</label><div class="col-sm-10"><input type="text" class="form-control" name="corradi" id="corradi" value=' . $row['corradi'] . ' placeholder="Corradi"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="egen">Egen:</label><div class="col-sm-10"><input type="text" class="form-control" name="egen" id="egen" value=' . $row['egen'] . ' placeholder="Egen"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="trittec">Trittec:</label><div class="col-sm-10"><input type="text" class="form-control" name="trittec" id="trittec" value=' . $row['trittec'] . ' placeholder="Trittec"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="somfi">Somfi:</label><div class="col-sm-10"><input type="text" class="form-control" name="somfi" id="somfi" value=' . $row['somfi'] . ' placeholder="Somfi"></div></div>';
		  echo '<div class="form-group"><label class="control-label col-sm-2" for="sonstiges">Sonstiges:</label><div class="col-sm-10"><input type="text" class="form-control" name="sonstiges" id="sonstiges" value=' . $row['sonstiges'] . ' placeholder="Sonstiges"></div></div>';
		  echo '<div class="form-group"> <div class="col-sm-offset-2 col-sm-10"><button type="submit" class="btn btn-default">Kunden editieren</button></div></div></form>';
		}
}
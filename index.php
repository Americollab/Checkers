<?php
    session_start();



    $_SESSION['accountId'] = 1;

    $error = "";
    require_once("connect-db.php");
    $sql = "select * from setting INNER JOIN account on account.accountId  = setting.accountId";
    $statement1 = $db->prepare($sql); 
    if($statement1->execute()) {
//        an array is created, called $orders
        $accounts = $statement1->fetchAll();
        if($accounts == null) {
            $error = "No accounts found";
        }
        $statement1->closeCursor();
    }
    else {
        $error = "Error finding orders.";
    }
    
    foreach($accounts as $account){
        if($account["accountId"] == $_SESSION['accountId']){
            $_SESSION['userNameP1'] = $account['username'];
            $_SESSION['userPic1'] = $account['pieceColor'];
            $_SESSION['userBoardC1'] = $account['boardColor1'];
            $_SESSION['userBoardC2'] = $account['boardColor2'];
        }
    }
?>

<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
	<title>Checkers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
	 <link rel="stylesheet" href="menu-stylesheet.css" type="text/css">
    <script>
        function closeWindow(){
            var win = window.open("https://www.google.com/", "_self");
            win.close();
        }
    </script>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <img id="menulogo" src="menuImg/checker_menu_logo.png">
            </div>
        </div>
        <div class="buttons">
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img id="play" src="menuImg/play.png">
                    <a href="checkers.php">Play Checkers</a>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img id="settings" src="menuImg/settings.png">
                    <a href="settings.php">Settings</a>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img id="leaderboard" src="menuImg/leaderboard.png">
                    <a href="leaderboard.php">Leaderboard</a>
                </div>
                <div class="col-md-4">
                </div>
            </div>
            <div class="row">
                <div class="col-md-4">
                </div>
                <div class="col-md-4">
                    <img id="quit" src="menuImg/quit.png">
                    <a href="javascript:window.closeWindow();">Close</a>
                </div>
                <div class="col-md-4">
                </div>
            </div>
        </div>
    </div>
</body>

</html>



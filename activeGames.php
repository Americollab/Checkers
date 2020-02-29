<?php
 session_start(); 
 // $sessionUsername = $_SESSION["username"];

    $error = "";
	// sets up sql statement that returns info for the users open checker games, or returns an error messag.
    require_once("connect-db.php");
    $sql = "SELECT account.username, game.gameId
FROM account

INNER JOIN game ON game.accountId = account.accountId;";

	// executes sql statement and checks for errors. either returns info of active checker games or throws user error message
    $statement1 = $db->prepare($sql);
    if($statement1->execute()){
        $games = $statement1->fetchAll();
		// if the statement executes successfully and returns nothing, it will throw the user a message letting them know there were no games found
        if($games == null){
            $error = "No games found";
        }
        $statement1->closeCursor();
    }else
	// if the sql statement doesnt run at all because of an error, the user gets thrown a message letting them know there was an error
	{
        $error = "Error finding games";
    }
?>

<!DOCTYPE html>
<html>

<!-- WHERE $sessionUsername = account.username -->

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width,initial-scale=1">
	<title>Checkers</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" href="activeGames-stylesheet.css">
</head>

<body>
	<div class="container">
		<div class="row">
			<div class="col-md-3">
				<button id="backButton" onclick="history.go(-1);">Back to Menu</button>
			</div>
			<div class="col-md-9">
				<h1>Your active checker games</h1>
			</div>
		</div>
		<!-- this will run if the sql statement returns no active games for the user -->
		<?php if($error == "No games found"){ ?>
		<h2 style="color: red">You have no active checker games!<br>Invite a friend to see your game show up on this page!</h2>
		<?php } ?>

		<!-- this will run if sql statement returns an error -->
		<?php if($error == "Error finding games"){ ?>
		<h2 style="color: red">There was an error, unable to load your checker games.</h2>
		<?php } ?>

		<!-- this will run if sql statement runs successfully and returns games -->
		<?php foreach($games as $game){ ?>
		<div class="row">
			<div class="col-md-12">
				<button id="gameButton" onClick='location.href="checkers.php"'>Opponent:
					<?php echo $game["username"];?></button>
				<br>
			</div>
		</div>
		<?php } ?>
	</div>
</body>

</html>

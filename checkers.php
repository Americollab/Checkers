<?php
    session_start();
    $_SESSION['accountIdP2'] = 2;
    $_SESSION['userNameP2'] = "Phil";
    $_SESSION['userPic2'] = "checkPcsImg/bot";
    
    require_once("connect-db.php");
    $sql = "select * from setting";
    $statement1 = $db->prepare($sql); 
    if($statement1->execute()) {

        $accounts = $statement1->fetchAll();
        if($accounts == null) {
            $error = "No accounts found";
        }
        $statement1->closeCursor();
    }
    else {
        $error = "Error finding orders.";
    }
    /*
    foreach($accounts as $account){
        if($account["accountId"] == $_SESSION['accountIdP2']){
            $_SESSION['userPic2'] = $account['pieceColor'];
            
        }
    }
*/
$tranPL1 = $_SESSION['userNameP1'];
$tranPL2 = $_SESSION['userNameP2'];


?>

<!DOCTYPE html>

<html>
<head>

    
    
  <title>HTML5 Checkers</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    
  <link rel="stylesheet" type='text/css' href="style.php"  media="screen">
    
  <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
  <link rel="shortcut icon" href="favicon.png" type="image/x-icon">
  <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.png" type="image/x-icon">
    <script type="text/javascript">var PL1 = "<?= $tranPL1 ?>"; var PL2 = "<?= $tranPL2 ?>";</script>
  <script src="script.js"></script>
  <script>
    function rules(){
      alert("Checkers Information & Directions\nEach player starts with 12 pieces, placed on the dark squares of the board. The objective of the game is to capture all the opponent's pieces by jumping over them.\n\nAbout the game & Rules:\nPieces can only move diagonally on the dark squares (the light squares of the board are never used).\nA normal move is moving a piece diagonally forward one square. The initial pieces can only move forward diagonally, not backwards. You cannot move onto a square that is occupied by another piece. If an opponent piece is on the square diagonally in front of you, you can (and must) jump over it diagonally, thereby capturing it. If you land on a square where you can capture another opponent piece you must jump over that piece as well, immediately.\nOne turn can kill many pieces. It is required to jump over pieces whenever you can.\nIf a piece reaches the end row of the board, on the opponent's side, it becomes a King.\nKings can move diagonally forwards and backwards.\n\nDirections for moving pieces:\nTo move, highlight the piece you would like to move and click it.\nNext, you will click the direction you wish to move it. Please note, If a jump is available, you will need to move your piece in the direction of the jump.");
    }
  </script>
</head>
<body>
    
  <div class="column">
    
      
      
      <!--Display player stats-->
    <div class="stats">
      <h2>Game Statistics</h2>
      <div class="wrapper">
      <div id="player1">
        <h3><?php echo $_SESSION['userNameP1'] ?></h3>
          <h4 class="statTxt2">(Top)</h4>
      </div>
      <div id="player2">
        <h3><?php echo $_SESSION['userNameP2'] ?> <span class="statTxt"></span></h3>
          <h4 class="statTxt2">(Bottom)</h4>
      </div>
      </div>
      <div class="clearfix"></div>
      <div class="turn"></div>
      <span id="winner"></span>
      <button onclick=rules()>Rules</button>
    </div>
  </div>
  <div class="column boards">
    
    <div id="board">
      <div class="tiles"></div>
      <div class="pieces">
        <div class="player1pieces">
            <div class="king">
            </div>
        </div>
        <div class="player2pieces">
            <div class="king">
            </div>
        </div>
      </div>
      
  </div>
  

    </div>
        
        
        
</body>
</html>
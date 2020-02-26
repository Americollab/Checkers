<?php
    session_start();
    $user = $_SESSION['accountId'];

    $error = $variable = "";
    require_once("connect-db.php");
    $sql = "select * from setting WHERE accountId = $user";
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
        $holdPcs = "$account[pieceColor]";
        $holdBoard1 = "$account[boardColor1]";
        $holdBoard2 = "$account[boardColor2]";
        
        $submittingPcs = "";
        $submittingBoard1 = $submittingBoard2 = "";
    }

    $error = "";
    if($_SERVER["REQUEST_METHOD"] == "POST") {
        /*$submittingPcs = $_POST['checkPcs'];*/
        if(!isset($_POST['checkPcs'])) {
            $submittingPcs = $holdPcs;
        }
        else {
            $submittingPcs = $_POST['checkPcs'];
        }
        if(!isset($_POST['checkBoard'])) {
            $submittingBoard1 = $holdBoard1;
            $submittingBoard2 = $holdBoard2;
        }
        else {
            $submittingBoard1 = strstr($_POST['checkBoard'], ' ', true);
            $submittingBoard2 = strstr($_POST['checkBoard'], ' ');
        }
        
            
        /*$submittingBoard = $_POST['checkBoard'];*/
        
        if($error == null){
            require_once("connect-db.php");
            $sql = "UPDATE setting  SET pieceColor = :submittingPcs, boardColor1 = :submittingBoard1, boardColor2 = :submittingBoard2 WHERE accountId = $user";
            $statement1 = $db->prepare($sql);
            
            $statement1->bindValue(':submittingPcs', $submittingPcs);
            $statement1->bindValue(':submittingBoard1', $submittingBoard1);
            $statement1->bindValue(':submittingBoard2', $submittingBoard2);
            
            if($statement1->execute()) {
            $statement1->closeCursor();
            $success = "Order successfully added.";
            }
            else {
                $error = $statement1->errorInfo();
            }
            
        }
        
        
        
        $_SESSION['userPic1'] = $submittingPcs;
        $_SESSION['userBoardC1'] = $submittingBoard1;
        $_SESSION['userBoardC2'] = $submittingBoard2;
    }

    //echo $_SESSION['userPic1'];
?>
<!DOCTYPE html>

<html>
  <head>
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <link href="https://fonts.googleapis.com/css?family=Lato:400,700" rel="stylesheet">
      <link rel="icon" href="favicon.ico" type="image/x-icon">
  <link rel="icon" href="favicon.png" type="image/x-icon">
    <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
    <title>Settings</title>
    <!-- <link rel="stylesheet" href="style.php" type='text/css'> -->
  <link rel="stylesheet" href="styleAddon.css" type="text/css">
      
  </head>
  <body>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 return">
                    <a class="" href="index.php">Return</a>
                
                </div>
            
            </div>
            <div class = "row">
                <div class="col-lg-6">

                </div>
            </div>
            <div class="row">
                <div class="col-lg-6">
                    <div class="boardColorDisplay">
                        <div class = "row">
                        <h1>Current Board Colors</h1>
                        <div class="col-lg-6 colorHolder">
                            <div class="boardShow1" style="background-color: <?php echo $_SESSION['userBoardC1'] ?>"></div> 
                        </div>
                        <div class="col-lg-6 colorHolder">
                            <div class="boardShow2" style="background-color: <?php echo $_SESSION['userBoardC2'] ?>"></div>
                        </div>
                        </div>
                        
                    </div>
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                    <h1>Select your board color</h1>
                        <fieldset class="boardColor">
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#ffffff #000000"><img src="checkBoardImg/blacknwhite.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#bb4b5b #000000"><img src="checkBoardImg/rednblack.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#a39d9d #000000"><img src="checkBoardImg/blackngray.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#009287 #000000"><img src="checkBoardImg/blacknteal.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#dafcfe #2a00ba"><img src="checkBoardImg/bluencyan.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#70b4e8 #000000"><img src="checkBoardImg/bluenblack.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#c1d221 #210792"><img src="checkBoardImg/bluenyellow.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#2fd008 #041689"><img src="checkBoardImg/bluengreen.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#fbf783 #5e000a"><img src="checkBoardImg/rednyellow.jpg"></button>
                            
                            <button type="submit" class="brColor" name="checkBoard" value="#8204b6 #000000"><img src="checkBoardImg/purplenblack.jpg"></button>
                            
                            
                        </fieldset>
                    </form>
                </div>
                
                
                <div class="col-lg-6">
                    <!--Temporary settings button
            <button><a href="checkers.php">check</a></button>-->
                    <h1>Current piece color</h1>
                    <img src="<?php echo $_SESSION['userPic1'] ?>.png">
                    <form method="post" action="<?php echo $_SERVER["PHP_SELF"];?>">
                        <h1>Select your piece color</h1>
                        <fieldset class="pieceColor">
                            <?php
                            
                                foreach (new DirectoryIterator('checkPcsImg') as $file) {   
                                    if($file->isDot()) continue;
                                    if($file != "bot.png"){
                                        $variable = $file->getFilename();
                                        $variable = substr($variable, 0, strpos($variable, "."));
                            ?>
                                <button type="submit" class="pcsColor" name="checkPcs" value="checkPcsImg/<?php echo($variable)?>"><img src="checkPcsImg/<?php echo($file->getFilename())  ?>"></button>
                            <?php
                                    }
                                }
                            ?>
                            
                        </fieldset>
                    </div>
                
                </div>
            
            
        </div>
        <script src="//cdnjs.cloudflare.com/ajax/libs/modernizr/2.5.3/modernizr.min.js" type="text/javascript"></script>
  </body>
</html>
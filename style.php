<?php
  header("Content-type: text/css;");
  session_start();
    
?>

html, body {
  position: absolute;
  top: 0;
  left: 0;
  height: 100%;
  width: 100%;
  margin: 0;
  padding: 0;
  color: #333333;
    
    
    
  /*Example: font-family: "Lato", Calibri, sans-serif;*/
    /*Font to for Checker page*/
  font-family: monospace;
  font-size: 16px;
    
    
    
    
    
  background-image: url(blue_wave_menu_background.jpg); 
  background-size: cover;
  background-repeat: no-repeat;
}
  html h1, body h1 {
    margin-top: 10px; }


/*Changes the "Game Statistics"*/
  html h2, body h2 {
    font-size: 1.3em; }
/*Changes the Player1 and Player 2 text*/
  html h3, body h3 {
    font-size: 1.1em; }
.statTxt, .statTxt2{   
    font-size: .8em;
}
  html a, body a {
    text-decoration: none;
    color: #333333;
    font-weight: 700; 
}
    html a:hover, body a:hover {
      text-decoration: underline; }
  html hr, body hr {
    border: 0;
    height: 1px;
    background-color: #333;
    background-image: -webkit-gradient(linear, left top, right top, from(#333333), to(#ccc));
    background-image: linear-gradient(to right, #333333, #ccc); }
  html .clearfix, body .clearfix {
    clear: both; }

div.column {
  position: relative;
  float: left;
  overflow: auto;
  height: 100%;
  min-height: 100%;
  width: 50%; }

  .boardNames {
    font-size: 55px;
    text-align: center;
  }

@media screen and (max-width: 1206px) {
    
    
    .boards{
        background-image: url(blue_wave_menu_background-flipped.jpg);
        background-size: cover;
    }
    
    
  div.column {
    width: 100% !important;
    overflow: hidden;
    height: auto; } }
div.info, div.stats {
  width: 40%;
  margin: 9vmin auto 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  padding: 20px 30px;
  background-color: #F1F1FF;
  color: #3A3042;
  border-radius: 3px;
  -webkit-box-shadow: 1px 1px 3px #232621;
  box-shadow: 1px 1px 3px #232621; }
/*
div.stats {
  margin-left: 410px !important;
}
*/
  div.stats .wrapper {
    display: -webkit-box;
    display: -ms-flexbox;
    display: flex; }
  div.stats #player1 {
    text-align: center;
    display: inline-block;
    width: 50%;
    float: left;
      
    background-color: <?=$_SESSION['userBoardC1']?>;
      
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 15px 20px;
    border-top-left-radius: 3px;
    color: #232621; }
    div.stats #player1 .capturedPiece {
      width: 2.4vmin;
      height: 2.4vmin;
      background-color: <?=$_SESSION['userBoardC2']?>;
      background-size: 65%;
      background-repeat: no-repeat;
      background-position: center;
      border-radius: 6vmin;
      display: inline-block;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      -webkit-transition: all 0.2s linear;
      transition: all 0.2s linear;
      margin: 5px; }
  div.stats #player2 {
    text-align: center;
    display: inline-block;
    width: 50%;
    float: left;
      
    background-color: <?=$_SESSION['userBoardC2']?>;
        
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    padding: 0 15px 20px;
    border-top-right-radius: 3px;
    color: white; }
    div.stats #player2 .capturedPiece {
      width: 2.4vmin;
      height: 2.4vmin;
      background-color: <?=$_SESSION['userBoardC1']?>;
      background-size: 65%;
      background-repeat: no-repeat;
      background-position: center;
      border-radius: 6vmin;
      display: inline-block;
      -webkit-box-sizing: border-box;
      box-sizing: border-box;
      -webkit-transition: all 0.2s linear;
      transition: all 0.2s linear;
      margin: 5px; }
  div.stats div.turn {
    height: 55px;
    width: 100%;
    background: -webkit-gradient(linear, left top, right top, color-stop(50%, #BEEE62), color-stop(50%, transparent));
    background: linear-gradient(to right, orange 50%, transparent 50%);
    border-radius: 0 0 3px 3px; }
  div.stats span#winner {
    display: block;
    padding: 10px 0 0;
    text-align: center; }
  

/*Affects the board colors*/
div#board {
  position: absolute;
  top: calc(50% - 40vmin);
  left: calc(50% - 40vmin);
  width: 80vmin;
  height: 80vmin;
  border-radius: 5px;
  -webkit-box-shadow: 1px 1px 3px #232621;
  box-shadow: 1px 1px 3px #232621;
  background-color: <?=$_SESSION['userBoardC1']?>;
  overflow: hidden; }
  div#board .tile {
    width: 10vmin;
    height: 10vmin;
    position: absolute;
    background-color: <?=$_SESSION['userBoardC2']?>; }

/*Top checker pieces*/
  div#board .player1pieces .piece {
    position: absolute;
    width: 8vmin;
    height: 8vmin;
      
      /*Piece center color*/
    background-image: url(<?=$_SESSION['userPic1'] . ".png"?>);
    background-size: 105%;
      
    background-repeat: no-repeat;
    background-position: center;
    border-radius: 6vmin;
    display: inline-block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.2s linear;
    transition: all 0.2s linear;
    margin-top: 1vmin;
    margin-left: 1vmin;
    cursor: pointer;
    border: 1vmin solid #B93848; }
    div#board .player1pieces .piece.selected {
      -webkit-box-shadow: 0 0 10px 5px #16A8C7;
      box-shadow: 0 0 10px 5px white; }

/*Bottom checker pieces*/
  div#board .player2pieces .piece {
    position: absolute;
    width: 8vmin;
    height: 8vmin;
      
    background-image: url(<?=$_SESSION['userPic2'] . ".png"?>);
    /*background-color: blue;*/
    background-size: 105%;
    
    
    background-repeat: no-repeat;
    background-position: center;
    border-radius: 6vmin;
    display: inline-block;
    -webkit-box-sizing: border-box;
    box-sizing: border-box;
    -webkit-transition: all 0.2s linear;
    transition: all 0.2s linear;
    margin-top: 1vmin;
    margin-left: 1vmin;
    cursor: pointer;
    border: 1vmin solid #8b8bff; }
    div#board .player2pieces .piece.selected {
      -webkit-box-shadow: 0 0 10px 5px #16A8C7;
      box-shadow: 0 0 10px 5px white; }

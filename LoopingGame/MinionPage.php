

<!doctype html>
<html>
    <head>

    <style>
        p{
        text-align: center;
        /*position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;*/
            /*font-size: 16px;*/
    }
    .gameTable{

        margin-left:auto; 
    margin-right:auto;
    }
    </style>
        <title>JS Game</title>
        <?php
            include("../Template/Template.php");
        ?>
                    
                
                        <h1><p> Minion Madness</p></h1>
                        <p>I created this game in JavaScript.</p>
                        <br> </br>
                        <h4><p>CONTROLS:</p></h4>
                        <p> Use arrow keys to move and jump.</p>
                        <p>The flower gives you fire power similar to Mario.</p>
                        <p>Press "D" to use fireballs.</p>
                        
                    <div class="gamediv">
                        <table class="gameTable">
                            <tr>
                                <td id = "game">
                                    
                                    </td>
                                    </tr>
                                    
                                    </table>
                    </div>
        
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>
        <script type="text/javascript" src="game.js"></script>
        
    <?php
            include("../Template/Footer.php");
        ?>
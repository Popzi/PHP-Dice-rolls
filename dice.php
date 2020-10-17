<?php
session_start();
if (empty($_SESSION['dice1'])) {
$_SESSION['dice1'] = $_SESSION['dice2'] = $_SESSION['dice3'] = $_SESSION['dice4'] = $_SESSION['dice5'] = $_SESSION['dice6'] = $_SESSION['throws'] = 0;  
}

if (!empty($_POST)) {

    if (!empty($_POST['reset'])) { session_destroy(); } else {

    if (!empty($_POST['number'])) { $dices = $_POST['number']; } else { $dices = "6"; }
    
    for ($x = 0; $x < $dices; $x++) {
    $roll=rand(1,6); //Roll
    $_SESSION['dice' . $roll] = $_SESSION['dice' . $roll]+1; //Log roll
    echo "<img src=\"diceimages/mdice".$roll.".jpg\">"; //Get Image for roll   
    }
    $_SESSION['throws'] = $_SESSION['throws']+1;

    echo "\n"
    ."<p>Roll History:<br /><pre>\n"
    ."You have rolled " . $_SESSION['dice1'] . " <img src='diceimages/sdice1.jpg'><br>"
    ."You have rolled " . $_SESSION['dice2'] . " <img src='diceimages/sdice2.jpg'><br>"
    ."You have rolled " . $_SESSION['dice3'] . " <img src='diceimages/sdice3.jpg'><br>"
    ."You have rolled " . $_SESSION['dice4'] . " <img src='diceimages/sdice4.jpg'><br>"
    ."You have rolled " . $_SESSION['dice5'] . " <img src='diceimages/sdice5.jpg'><br>"
    ."You have rolled " . $_SESSION['dice6'] . " <img src='diceimages/sdice6.jpg'><br>"
    ."In a total of <b>" . $_SESSION['throws'] . "</b> dice rolls."
    ."</pre></p>\n";
}
}
            
?>

<form action="" method="POST" width="100px">
	<label>How many dices to roll: </label><input type="text" name='number' size='3' value="<?php if (!empty($_POST['number'])) { echo $_POST['number']; } else { echo ''; } ?>"/> <br />
	<br>
	<input type="submit" value="Roll the dices!" />
	<input type="submit" name='reset' value="Reset the dices!" />
</form>
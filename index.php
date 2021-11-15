<?php
//require_once '../behorighet.php';
?>
<!DOCTYPE html>
<html lang="sv">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="stylee.css">
    <title>Index</title>
    <link rel="stylesheet" href="style-gen.css">
</head>
<body>
    <div class="asd">

   <h2> VÄLKOMMEN TILL EVENTHANTERAREN!!!!</h2>
</div>
    </form>
    <div class="link">
  
    <header class="top"></header>
    <a href="event.php">Redigera event</a><br>
    <a href="datuminput.php">Visa specifik dag</a><br>
    <a href="testin.html?aid=&hash=">Mina event</a><br>
    <a href="../minkalender.php?aid=&hash=">Visa event (json)</a><br>
    <a href="rattigheter.php?aid=&hash=">Bjuda in</a><br>
    <a href="redigera.php?anv=&losen=">Redigera användare</a><br>
    <a href="visaannan.php?aid=&hash=">Andras event</a><br>
    

    </div>

    <div class="inlogg">
    <?php
    require_once '../behorighet.php';
    


    if(isset($behorighet)) {
        switch ($behorighet) {
            case 1:
                echo "<div>Du är inloggad som admin</div>";
                $visaskapaanv = true;
                break;
            case 3:
                echo "<div>Du är inloggad som användare</div>";
                break;
            default:
                echo "<div>Du är inte inloggad</div>";
                break;
        }
    }
    else
        echo "Du är inte inloggad";
    ?>
    
    </div>


<div class="form">
<form action="../process.php" method="GET">
    <input type="text" name="namn" placeholder="Namn på event" require autocomplete="off">
    <input type="text" name="Agare" placeholder="vem äger eventet">
    <label for="starttid">Starttid:</label>
    <input type="datetime-local" name="starttid" require>
    <label for="sluttid">Sluttid:</label>
    <input type="datetime-local" name="sluttid" require>
    <input type="text" name="anv">
    <input type="text" name="hash">
    <input type="submit" name="submit" value="submit">

</form>

<?php
if(isset($behorighet))
if($behorighet == 1)
echo '<form action="../skapaanvandare.php" method="GET">
    <input type="number" name="Behorighet">
    <input type="text" placeholder="Anvandarnamn" name="Anvnamn">
    <input type="password" placeholder="Losenord" name="Losen">
    <input type="text" placeholder="Efternamn" name="Enamn">
    <input type="text" placeholder="Fornamn" name="Fnamn">
    <input type="text" placeholder="Epost" name="Epost">
    <input type="text" placeholder="Telefon" name="Telefon">
    <input type="submit" value="submit">
</form>';
?>
</div>
</body>
<script src="theprovider.js"></script>
</html>
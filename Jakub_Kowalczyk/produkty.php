<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="style1.css" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
</head>

<body onload="czas();">
    
    <?php
        Include 'header.html';
    ?>
    <hr id="linia">
    
    <section>
    
    <article>
    <form method="post" action="produkty.php">
        
    <h3>Marka : </h3> <input type="text" name="marka3">
        <button type="submit">Szukaj</button>
        <input type="hidden" name="submitted" value="TRUE" />
    </form>
        <?php
        $wzor='/^[A-Z]{1}[a-z]+$/';
        if (isset($_POST['submitted'])) {
            $polaczenie= mysqli_connect('localhost','root','','projekt');

            if(!$polaczenie){
                die("Connection failed:".mysqli_connect_error());
            }
        
            @$marka=$_POST['marka3'];
        
            $zapytanie="select nazwa from produkty where nazwa like '$marka%'";
            $wynik=mysqli_query($polaczenie,$zapytanie);
        
            if(preg_match($wzor,$marka))
            {
                while($row = mysqli_fetch_array($wynik))
                {   
                    echo $row['nazwa']."<br>";
                }
            }
            else echo "Coś poszło nie tak! Spróbuj ponownie!";
             @mysqli_close($polaczenie);
        }
        
       
        
        ?>
    </article>
    
    
    </section>
    <hr id="linia">
    
    <?php
    Include 'footer.html';
    ?>
    
</body>
</html>
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
        <h4>Opinie naszych klientów: </h4><br>
        <?php
        
        $polaczenie= mysqli_connect('localhost','root','','projekt');

        if(!$polaczenie){
	       die("Connection failed:".mysqli_connect_error());
        }
        
        $zapytanie="select * from opinie";
        $wynik=mysqli_query($polaczenie,$zapytanie);
     
        
        while($row = mysqli_fetch_array($wynik))

        {   
            echo '<i>'.$row['imie'] . " " .$row['nazwisko'].'</i>'."<br>".$row['opinia']."<br><br>";
        }

        @mysqli_close($polaczenie);
        ?>
    </article>
    
    
    </section>
    <hr id="linia">
    
    <?php
    Include 'footer.html';
    ?>
    
</body>
</html>
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
    
    <section id="rez">
    <?php
        error_reporting(E_ERROR | E_PARSE);
        session_start();
        if($_SESSION["current_user"]){
            ?>
    <article>
   
        <form method="post" action="rezerwacja.php">
            <h4>Wypełnij formularz, a my wyślemy ci termin wiadomością email!</h4><br>
        <table>
            <tr>
                <td>Imię: </td>
                <td><input type="text" name="imie"></td>
            </tr>
            <tr>
                <td>Nazwisko: </td>
                <td><input type="text" name="nazwisko"></td>
            </tr>
             <tr>
                <td>E-mail: </td>
                <td><input type="text" name="mail"></td>
            </tr>
             <tr>
                <td>Marka telefonu: </td>
                <td><input type="text" name="marka"></td>
            </tr>
             <tr>
                <td>Model: </td>
                <td><input type="text" name="model"></td>
            </tr>
        </table>
            <br>
            <button type="submit">Wyślij</button>
            <button type="reset">Reset</button>
            <input type="hidden" name="submitted" value="TRUE" />
        </form>
        
        <?php
        
        if (isset($_POST['submitted'])) {
            @$dane1=$_POST['imie'];
            @$dane2=$_POST['nazwisko'];
            @$dane3=$_POST['mail'];
            @$dane4=$_POST['marka'];
            @$dane5=$_POST['model'];
            
            $wzor_imienia='/^[A-Z]{1}[a-z]+$/';
            $wzor_nazwiska='/^[A-Z]{1}[a-z]+$/';
            $wzor_maila='/^[a-zA-Z0-9-_.]+@[a-z0-9-.]+.[a-z0-9]{1,4}/';
            
            if(preg_match($wzor_imienia,$dane1))
            {
                if(preg_match($wzor_nazwiska,$dane2))
                {
                    if(preg_match($wzor_maila,$dane3))
                    {
                            $polaczenie= mysqli_connect('localhost','root','','projekt');

                            if(!$polaczenie){
	                           die("Connection failed:".mysqli_connect_error());
                            }
                            $zapytanie="INSERT INTO klienci set imie='$dane1', nazwisko='$dane2', email='$dane3', marka='$dane4', model='$dane5' ";
                            $wynik=mysqli_query($polaczenie,$zapytanie);
                            @mysqli_close($polaczenie);
                    }
                }
            }
          
        }
        ?>
        
        
        
        <form method="post" action="rezerwacja.php">
        <br>
        <h4>Popełniłeś błąd podczas wpisywania adresu e-mail? Przwidzieliśmy taką sytuację, wypełnij formularz ponownie a my zmienimy twoje dane. :) </h4><br>
            <table>
            <tr>
                <td>Imię: </td>
                <td><input type="text" name="imie2"></td>
            </tr>
            <tr>
                <td>Nazwisko: </td>
                <td><input type="text" name="nazwisko2"></td>
            </tr>
             <tr>
                <td>E-mail: </td>
                <td><input type="text" name="mail2"></td>
            </tr>
           
        </table>
            <br>
            <button type="submit">Aktualizuj dane</button>
            <button type="reset">Reset</button>
            <input type="hidden" name="submitted2" value="TRUE" />
        </form>
          <?php
        
            if (isset($_POST['submitted2'])) {
                @$imie2=$_POST['imie2'];
                @$nazwisko2=$_POST['nazwisko2'];
                @$email2=$_POST['mail2'];
        

                $wzor_imienia2='/^[A-Z]{1}[a-z]+$/';
                $wzor_nazwiska2='/^[A-Z]{1}[a-z]+$/';
                $wzor_maila2='/^[a-zA-Z0-9-_.]+@[a-z0-9-.]+.[a-z0-9]{1,4}/';
                
                if(preg_match($wzor_imienia2,$imie2))
                {
                    if(preg_match($wzor_nazwiska2,$nazwisko2))
                    {
                        if(preg_match($wzor_maila2,$email2))
                        {
                             $polaczenie= mysqli_connect('localhost','root','','projekt');

                            if(!$polaczenie){
                                die("Connection failed:".mysqli_connect_error());
                            }
                            $zapytanie="update klienci set email='$email2' where nazwisko='$nazwisko2' and imie='$imie2'";
                            $wynik=mysqli_query($polaczenie,$zapytanie);
                            @mysqli_close($polaczenie);
                        }
                    }
                }
            }
         ?>
        <form method="post" action="rezerwacja.php">
        
         <br>
        <h4>Chesz anulować swoją rezerwację ? Wystarczy wpisać swoje imię i nazwisko, a resztą się zajmiemy! </h4><br>
        
         <table>
            <tr>
                <td>Imię: </td>
                <td><input type="text" name="imie3"></td>
            </tr>
            <tr>
                <td>Nazwisko: </td>
                <td><input type="text" name="nazwisko3"></td>
            </tr>
         
        </table>
            <br>
            <button type="submit">Anuluj rezerwację terminu</button>
            <button type="reset">Reset</button>
            <input type="hidden" name="submitted3" value="TRUE" />
        </form>
        <?php
        
        if (isset($_POST['submitted3'])) {
            @$imie3=$_POST['imie3'];
            @$nazwisko3=$_POST['nazwisko3'];
        
            $wzor_imienia3='/^[A-Z]{1}[a-z]+$/';
            $wzor_nazwiska3='/^[A-Z]{1}[a-z]+$/';
            
            if(preg_match($wzor_imienia3,$imie3))
            {
                if(preg_match($wzor_nazwiska3,$nazwisko3))
                {
                    $polaczenie= mysqli_connect('localhost','root','','projekt');
                    if(!$polaczenie){
                        die("Connection failed:".mysqli_connect_error());
                    }
                    $zapytanie="delete from klienci where imie='$imie3' and nazwisko='$nazwisko3'";
                    $wynik=mysqli_query($polaczenie,$zapytanie);
                    @mysqli_close($polaczenie);
                }
            }
          
        }
        ?>
    </article>
    
     <?php
        }
        else echo "Nie posiadasz wystarczająych uprawnień!";
        ?>
    </section>
    <hr id="linia">
    
    <?php
    Include 'footer.html';
    ?>

    
</body>
</html>
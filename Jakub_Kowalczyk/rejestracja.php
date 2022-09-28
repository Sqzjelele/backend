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
    
    <article>
   
        <form method="POST" action="rejestracja.php">
        <input type="text" name="nazwisko" placeholder="Nazwisko" required>
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="haslo" placeholder="Hasło" required>
        <input type="submit" name="submit" value="Wyślij">
        <input type="hidden" name="submitted" value="TRUE" />
        </form>
        
    <?php
        error_reporting(E_ERROR | E_PARSE);
        $polaczenie= mysqli_connect('localhost','root','','projekt') or die("Odpowiedź: Błąd połączenia z serwerem localhost");
        $nazwisko = mysqli_real_escape_string($polaczenie, $_POST["nazwisko"]);
        $email = mysqli_real_escape_string($polaczenie, $_POST["email"]);
        $haslo = mysqli_real_escape_string($polaczenie, $_POST["haslo"]);
        
         if (isset($_POST['submitted'])){
        if (mysqli_query($polaczenie, "INSERT INTO uzytkownicy (nazwisko, email, haslo) VALUES ('$nazwisko', '$email', '$haslo')")){
            
                echo "Rejestracja przebiegła poprawnie";
            } 
            else{
                echo "Nieoczekiwany błąd - użytkownik już istnieje lub błąd serwera MySQL.";
            }
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
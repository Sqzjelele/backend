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
   
        
        <form method="POST" action="logowanie.php">
        <input type="email" name="email" placeholder="E-mail" required>
        <input type="password" name="haslo" placeholder="Hasło" required>
        <input type="submit" name="zaloguj" value="zaloguj">
        <input type="hidden" name="submitted" value="TRUE" />
        </form>
        
        
        <a href="logout.php">Wyloguj</a>   
       
    <?php
        error_reporting(E_ERROR | E_PARSE);
        $polaczenie= mysqli_connect('localhost','root','','projekt') or die("Odpowiedź: Błąd połączenia z serwerem localhost");
        $haslo = mysqli_real_escape_string($polaczenie, $_POST["haslo"]);
        $email = mysqli_real_escape_string($polaczenie, $_POST["email"]);
        $query_login = mysqli_query($polaczenie, "SELECT * FROM uzytkownicy WHERE email = '$email'");
        
        if (isset($_POST['submitted'])){
            if(mysqli_num_rows($query_login) > 0) {
                $record = mysqli_fetch_assoc($query_login);
                $password = $record["haslo"];
                if ($haslo == $password) {
                    session_start();
                    $_SESSION["current_user"] = $_POST['email'];
                    echo "Witaj: " . $_SESSION["current_user"];
                }
            else echo "Błędne dane. Spróbuj ponownie!";
        }
            else echo "Błędne dane. Spróbuj ponownie!";
        }
        
        if (($_SESSION['current_user'])){
            if(isset($_POST['logout'])){
                echo "t";
                session_destroy();
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
<!DOCTYPE html>
<?php
 $loginRejestracja = "";
 $hasloRejestracja = "";
 $loginLogowanie = "";
 $hasloLogowanie = "";
if (isset($_COOKIE['user'])) {
    header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php");
}
 if(isset($_POST['buttonLogowanie'])) {
    $loginLogowanie = $_POST['loginLogowanie'];
    $hasloLogowanie = $_POST['hasloLogowanie'];
    $istnieje = false;
    $baza = mysqli_connect("localhost","root","","baza");
    $zapytanie = mysqli_query($baza,"SELECT konta.login, konta.haslo FROM konta WHERE konta.login = '$loginLogowanie';");
    $wynik = mysqli_fetch_row($zapytanie);
    if (isset($wynik)) {
        $istnieje = true;
    };
    if (!($loginLogowanie == "" || $hasloLogowanie == "") && $hasloLogowanie == $wynik[1] && $istnieje) {
        setcookie("user", $loginLogowanie, time() + (86400 * 30), "/");
        header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php");
        mysqli_close($baza);
    };
    mysqli_close($baza);
 };

 if(isset($_POST['butttonRejestracja'])) {
    $loginRejestracja = $_POST['loginRejestracja'];
    $hasloRejestracja = $_POST['hasloRejestracja'];
    $istnieje = false;
    $baza = mysqli_connect("localhost","root","","baza");
    $zapytanie = mysqli_query($baza,"SELECT konta.login, konta.haslo FROM konta WHERE konta.login = '$loginRejestracja';");
    $wynik = mysqli_fetch_row($zapytanie);
    if (isset($wynik)) {
        $istnieje = true;
    };
    if (!($loginRejestracja == "" || $hasloRejestracja == "") && !$istnieje) {
        mysqli_query($baza,"INSERT INTO konta(login, haslo) VALUES ('$loginRejestracja', '$hasloRejestracja');");
        setcookie("user", $loginRejestracja, time() + (86400 * 30), "/");
        header("Location:http://localhost/mateuszPokorniecki3P/projektSklep/zalogowany.php");
        mysqli_close($baza);
    };
    mysqli_close($baza);
 };

?>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Strona</title>
    <link rel="stylesheet" href="stylKonto.css">
</head>
<body>
    <section id="baner">
        <h1>KSIĘGARNIA</h1>
    </section>
    <div id="rejestracja" class="okno">
        <form action="http://localhost/mateuszPokorniecki3P/projektSklep/konto.php" method="post">
            <h1>rejestracja</h1>
            Login: <input type="text" name="loginRejestracja"><br>
            Hasło: <input type="password" name="hasloRejestracja"><br>
            <input type="submit" value="Zarejestruj" name="butttonRejestracja">

        </form>
    </div>
    <div id="logowanie" class="okno">
        <form action="http://localhost/mateuszPokorniecki3P/projektSklep/konto.php" method="post">
            <h1>logowanie</h1>
            Login: <input type="text" name="loginLogowanie"><br>
            Hasło: <input type="password" name="hasloLogowanie"><br>
            <input type="submit" value="Zaloguj" name="buttonLogowanie">
        </form>
    </div>
    <section id="stopka">
        <p id="autorStrony">Autor strony: Mateusz Pokorniecki 3P</p>
    </section>
</body>
</html>
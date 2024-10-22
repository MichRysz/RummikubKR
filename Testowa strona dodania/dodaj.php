<?php
// Połączenie z bazą danych
$servername = "localhost";
$username = "root"; // Zmień na swoją nazwę użytkownika MySQL
$password = ""; // Zmień na swoje hasło
$dbname = "moje_dane";

// Tworzenie połączenia
$conn = new mysqli($servername, $username, $password, $dbname);

// Sprawdzenie połączenia
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

// Sprawdzenie, czy dane zostały przesłane
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $imie = $_POST['imie'];
    $nazwisko = $_POST['nazwisko'];
    $email = $_POST['email'];

    // SQL do dodania rekordu
    $sql = "INSERT INTO uzytkownicy (imie, nazwisko, email) VALUES ('$imie', '$nazwisko', '$email')";

    if ($conn->query($sql) === TRUE) {
        echo "Nowy rekord dodany pomyślnie!";
    } else {
        echo "Błąd: " . $sql . "<br>" . $conn->error;
    }
}

// Zamknięcie połączenia
$conn->close();
?>

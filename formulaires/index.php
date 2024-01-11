<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calculatrice</title>
</head>
<body>
    <?php
    // Étape 2 : Récupérer les champs du formulaire
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if (isset($_POST["number1"]) && isset($_POST["number2"]) && isset($_POST["operation"])) {
            $number1 = (int)$_POST["number1"];
            $number2 = (int)$_POST["number2"];
            $operation = $_POST["operation"];

            // Étape 4 : Utiliser les conditions pour appeler les bonnes fonctions
            switch ($operation) {
                case "addition":
                    $result = add($number1, $number2);
                    break;
                case "subtraction":
                    $result = subtract($number1, $number2);
                    break;
                case "multiplication":
                    $result = multiply($number1, $number2);
                    break;
                case "division":
                    $result = divide($number1, $number2);
                    break;
                case "modulo":
                    $result = modulo($number1, $number2);
                    break;
                default:
                    $result = "Opération non reconnue";
            }

            // Afficher le résultat
            echo "<p>Résultat de l'opération : $result</p>";
        }
    }

    // Étape 1 : Créer le formulaire
    ?>
    <form method="post" action="index.php">
        <label for="number1">Nombre 1 :</label>
        <input type="number" name="number1" required>

        <label for="number2">Nombre 2 :</label>
        <input type="number" name="number2" required>

        <label for="operation">Opération :</label>
        <select name="operation" required>
            <option value="addition">Addition</option>
            <option value="subtraction">Soustraction</option>
            <option value="multiplication">Multiplication</option>
            <option value="division">Division</option>
            <option value="modulo">Modulo</option>
        </select>

        <button type="submit">Calculer</button>
    </form>

    <?php
    // Étape 3 : Créer les fonctions

    function add(int $nb1, int $nb2): int
    {
        return $nb1 + $nb2;
    }

    function subtract(int $nb1, int $nb2): int
    {
        return $nb1 - $nb2;
    }

    function multiply(int $nb1, int $nb2): int
    {
        return $nb1 * $nb2;
    }

    function divide(int $nb1, int $nb2): ?int
    {
        // Éviter la division par zéro
        if ($nb2 != 0) {
            return $nb1 / $nb2;
        } else {
            return null;
        }
    }

    function modulo(int $nb1, int $nb2): ?int
    {
        // Éviter la division par zéro
        if ($nb2 != 0) {
            return $nb1 % $nb2;
        } else {
            return null;
        }
    }
    ?>
</body>
</html>
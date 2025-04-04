<!DOCTYPE html>
<html lang="pl">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Wyszukiwanie książek</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>

<body class="container py-4">

    <h1>Wyszukiwanie wg. autora</h1>

    <form action="zadanie.php" method="post" class="mb-3">
        <div class="row g-2 align-items-center">
            <div class="col-auto">
                <label for="name" class="col-form-label">Nazwisko autora:</label>
            </div>
            <div class="col-auto">
                <input type="text" name="name" id="name" class="form-control">
            </div>
            <div class="col-auto">
                <input type="submit" value="Szukaj" class="btn btn-primary">
            </div>
            <div class="col-auto">
                <a href="add.php" class="btn btn-success"><i class="bi bi-plus-circle"></i> Dodaj książkę</a>
            </div>
        </div>
    </form>

    <?php
    $name = "%";
    if (isset($_POST['name'])) {
        $name = "%" . $_POST['name'] . "%";
    }

    $sql = "SELECT 
        ksiazki.id,
        CONCAT(autorzy.first_name, ' ', autorzy.last_name) AS author, 
        ksiazki.title AS title 
        FROM ksiazki 
        LEFT JOIN autorzy ON autorzy.ID = ksiazki.author_id 
        WHERE autorzy.last_name LIKE '" . $name . "' 
        OR autorzy.first_name LIKE '" . $name . "'";

    $db = new mysqli('localhost', 'root', '', 'tima_biblioteka');
    $result = $db->query($sql);

    echo '<table class="table table-striped">';
    echo "<thead><tr><th>ID</th><th>Autor</th><th>Tytuł</th></tr></thead><tbody>";

    while ($row = $result->fetch_assoc()) {
        $id = $row['id'];
        $author = $row['author'];
        $title = $row['title'];
        echo "<tr>";
        echo "<td>$id</td><td>$author</td><td>$title</td>";
        echo "</tr>";
    }

    echo "</tbody></table>";
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>

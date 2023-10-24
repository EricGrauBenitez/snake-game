<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>
<body>
    <h1>Tic-Tac-Toe</h1>
    <div class="board">
        <?php
        // Genera el tablero utilizando PHP
        for ($row = 0; $row < 3; $row++) {
            echo '<div class="row">';
            for ($col = 0; $col < 3; $col++) {
                echo '<div class="cell">';
                // Crea un formulario para enviar el movimiento del jugador a game.php
                echo '<form action="game.php" method="post" target="_self">';
                echo '<input type="hidden" name="row" value="' . $row . '">';
                echo '<input type="hidden" name="col" value="' . $col . '">';
                // El jugador (X o O) puede ser determinado dinámicamente en PHP
                echo '<input type="hidden" name="player" value="X">';
                echo '<button type="submit"></button>';
                echo '</form>';
                echo '</div>';
            }
            echo '</div>';
        }
        ?>
    </div>
</body>
</html>

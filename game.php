<?php
// Inicializa un tablero vacío de 3x3.
$board = array(
    array('', '', ''),
    array('', '', ''),
    array('', '', ''),
);

// Lógica para manejar los movimientos de los jugadores.
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $row = $_POST['row'];
    $col = $_POST['col'];
    $player = $_POST['player'];

    // Asegúrate de que la celda esté vacía antes de realizar el movimiento.
    if ($board[$row][$col] === '') {
        $board[$row][$col] = $player;

        // Verifica si el jugador actual ha ganado.
        if (checkWinner($board, $player)) {
            echo "¡Jugador $player ha ganado!";
        } elseif (isTie($board)) {
            echo "¡Es un empate!";
        }
    }
}

// Imprime el tablero en HTML y permite que los jugadores realicen movimientos.
for ($row = 0; $row < 3; $row++) {
    echo '<div class="row">';
    for ($col = 0; $col < 3; $col++) {
        echo '<div class="cell">';
        // Imprime la marca del jugador en la celda si no está vacía.
        if ($board[$row][$col] !== '') {
            echo $board[$row][$col];
        } else {
            // Agrega el formulario con las coordenadas de la celda.
            echo '<form action="game.php" method="post">';
            echo '<input type="hidden" name="row" value="' . $row . '">';
            echo '<input type="hidden" name="col" value="' . $col . '">';
            echo '<input type="hidden" name="player" value="X">'; // Debes determinar el jugador actual dinámicamente
            echo '<button type="submit"></button>';
            echo '</form>';
        }
        echo '</div>';
    }
    echo '</div>';
}
?>

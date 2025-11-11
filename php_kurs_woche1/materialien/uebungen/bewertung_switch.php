<?php
$punkte = 10; // erreichte Punktzahl

switch ($punkte) {
    case 10:
        echo "<pre>           Sehr gut</pre>";
        break;
    case 9:
        echo "Gut";
        break;
    case 8:
        echo "Befriedigend";
        break;
    case 7:
        echo "Ausreichend";
        break;
    default:
        echo "Leider zu wenige Punkte erreicht";
    }
    echo "<br>";
    echo "<pre>  __________________________________</pre>";
    
?>

<?php
for ($punkte = 1; $punkte <= 10; $punkte++) {
    echo $punkte . " Punkte: ";
    switch ($punkte) {
        case 10:
            echo "Sehr gut";
            break;
        case 9:
            echo "Gut";
            break;
        case 8:
            echo "Befriedigend";
            break;
        case 7:
            echo "Ausreichend";
            break;
        default:
            echo "Leider zu wenige Punkte erreicht";
    }
    echo "<br>";
}
?>


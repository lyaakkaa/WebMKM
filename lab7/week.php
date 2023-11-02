<?php
$day = 5;

switch ($day) {
    case 1:
    case 2:
    case 3:
    case 4:
    case 5:
        echo "It's a workday";
        break;
    case 6:
    case 7:
        echo "It's a weekend";
        break;
    default:
        echo "Unknown day";
        break;
}
?>
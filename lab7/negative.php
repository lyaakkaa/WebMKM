<?php
    function hasNegativeNumbers($array) {
        foreach ($array as $value) {
            if ($value < 0) {
                return true;
            }
        }
        return false;
    }

    if (isset($_POST['numbers'])) {
        $input = $_POST['numbers'];

    
        $numericArray = explode(',', $input);

        $numericArray = array_map('intval', $numericArray);

       
        $hasNegatives = hasNegativeNumbers($numericArray);


        if ($hasNegatives) {
            echo "yes";
        } else {
            echo "no";
        }
    }
?>

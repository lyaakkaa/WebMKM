<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $section = $_POST["section"];
    $card = $_POST["cardNumber"];
    $cardType = $_POST["card"];

    // Function to validate the credit card number using the Luhn Algorithm
    function isLuhnValid($number) {
        $number = str_replace('-', '', $number);
        $sum = 0;
        $isEven = false;

        for ($i = strlen($number) - 1; $i >= 0; $i--) {
            $digit = (int) $number[$i];
            if ($isEven) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
            $isEven = !$isEven;
        }

        return ($sum % 10) === 0;
    }

    $isCardValid = false;

    if (preg_match('/^(?:\d{4}-?){3}\d{4}$/', $card)) {
        if (($cardType == "Visa" && preg_match('/^4/', $card)) ||
            ($cardType == "MasterCard" && preg_match('/^5/', $card))) {
            // Check if the credit card number is Luhn valid
            if (isLuhnValid($card)) {
                $isCardValid = true;
            }
        }
    }

    if (isset($name) && isset($section) && isset($card) && !empty($name) && !empty($section) && !empty($card) && $isCardValid) {
        echo "<h1>Thanks, sucker!</h1>";

        echo "<p>Your information has been recorded.</p>";

        echo "<dl>
                        <dt>Name</dt>
                        <dd>" . $name . "</dd>

                        <dt>Section</dt>
                        <dd>" . $section . "</dd>

                        <dt>Credit Card</dt>
                        <dd>" . $card . "</dd>
                        </dl>
                
                    <p>Here are all the suckers who have submitted here:</p>";

        $file = 'suckers.txt';
        $current = json_encode($_POST);
        file_put_contents($file, $current . "\n", FILE_APPEND);

        $data = file_get_contents("suckers.txt");
        $jsonData = explode("\n", trim($data));

        echo "<h1>Here are all the suckers who have submitted:</h1>";
        foreach ($jsonData as $entry) {
            $entryData = json_decode($entry, true);
            if (isset($entryData['name']) && isset($entryData['section']) && isset($entryData['cardNumber']) && isset($entryData['card'])) {
                $formattedData = $entryData['name'] . ";" . $entryData['section'] . ";" . $entryData['cardNumber'] . ";" . $entryData['card'];
                echo $formattedData . "<br />";
            }
        }
    } elseif (!$isCardValid) {
        echo "<p>You provided an invalid card number or card type.</p>";
        echo '<a href="buyagrade.html">Try again.</a>';
    } else {
        echo "<h1>Sorry</h1>";
        echo '<a href="buyagrade.html">Try again.</a>';
    }
}
?>
</body>
</html>

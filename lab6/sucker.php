<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <title>Buy Your Way to a Better Education!</title>
    <link href="http://www.cs.washington.edu/education/courses/cse190m/09sp/labs/4-buyagrade/buyagrade.css" type="text/css" rel="stylesheet" />
</head>

<body>
<h1>Thanks, sucker!</h1>

<p>Your information has been recorded.</p>

<dl>
    <dt>Name</dt>
    <dd>
        <?php echo $_POST['name']; ?>
    </dd>

    <dt>Section</dt>
    <dd>
        <?php echo $_POST['section']; ?>
    </dd>

    <dt>Credit Card</dt>
    <dd>
        <?php echo $_POST['creditcard']; ?>
    </dd>
</dl>
</body>
</html>

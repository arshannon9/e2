<!DOCTYPE html>
<html lang="en">

<head>
    <title>Results</title>
    <meta charset="utf-8">
    <link href=data: , rel=icon>

    <style>
    .correct {
        color: green;
    }

    .incorrect {
        color: red;
    }
    </style>
</head>

<body>

    <h1>Results</h1>

    <?php if($correct) { ?>
    <div class="correct">You got it correct! :-)</div>
    <?php } else { ?>
    <div class="incorrect">Incorrect. <a href="index.php">Please try again.</a></p>
        <?php } ?>

</body>

</html>
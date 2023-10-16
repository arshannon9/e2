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

    .no-answer {
        color: black;
    }
    </style>
</head>

<body>

    <h1>Results</h1>

    <?php if ($haveAnswer == false) { ?>
    <div class="no-answer">Please enter an answer.</div>
    <?php } else if ($correct) { ?>
    <div class="correct">You got it correct! :-)</div>
    <?php } else { ?>
    <div class="incorrect">Sorry, that is incorrect. :-(</div>
    <?php } ?>

    <a href="index.php">Play again...</a>

</body>

</html>
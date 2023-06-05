<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> <?php echo $title ?> </title>
    <style>
        * {
            font-family: "Roboto", sans-serif;
            padding : 0;
            margin : 0;
            box-sizing: border-box;
        }

        header {
            height: 30vh;
            background-color: red;

            display: flex;
            justify-content: center;
        }

        footer {
            height: 30vh;
            background-color: #333533;
            color: #E8EDDF;

            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }
    </style>
</head>

<body>
    <header>
        <nav>
            <ul>
                <li><a href="index.php?action=HomePage">Home</a></li>
                <li><a href="index.php?action=movieListing">Movies</a></li>
                <li><a href="">Genre</a></li>
                <li><a href="">Actors</a></li>
                <li><a href="">Producer</a></li>
            </ul>
        </nav>
    </header>

    <?php echo $content ?>

    <footer>
        <small class="footer-text">Saucisson de bretagne</small>
    </footer>
</body>
</html>
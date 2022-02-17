<html>

<head>
    <title>YouTube Search</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form action="r.php" method="get">
            Search: <input type="text" name="v"><br>
            <input type="submit">
    </form>

    <?php
    
    $sentVar = $_GET["v"];
    $command = escapeshellcmd("python search-video.py \"$sentVar\"");
    $output = shell_exec($command);
    echo "You're currently searching for: " . $sentVar . "<br><br>";
    $output = json_decode($output, true);
    $index = 0;
    foreach ($output['videos'] as $key => $value)
    {
        foreach ($output['videos'][$index] as $var1 => $var2) {
            if ($var1 == "thumbnails") {
                echo '<img src="'.$var2[0].'"<br><br>';
                continue;
            }
            echo "$var1 = $var2<br>";
        }
        $index++;
        echo "<br><br>";
    }
    echo "<div class=\"lol\"></div>";
    ?>
    <br>

</body>

</html>

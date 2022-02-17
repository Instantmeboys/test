<html>

<head>
    <title>YouTube Search</title>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="styles.css">
</head>

<body>
    <form action="search.php" method="post">
            Search: <input type="text" name="search"><br>
            <input type="submit">
    </form>

    <?php
    
    $sentVar = $_POST["search"];
    $command = escapeshellcmd("python search-video.py \"$sentVar\"");
    $output = shell_exec($command);
    echo "You're currently searching for: " . $sentVar . "<br><br>";
    $output = json_decode($output, true);
    $index = 0;
    foreach ($output['videos'] as $key => $value)
    {
        foreach ($output['videos'][$index] as $var1 => $var2) {
            if ($var1 == "thumbnails") {
                continue;
            }
            echo "$var1 = $var2<br>";
        }
        $index++;
        echo "<br><br>";
    }
    ?>
    <br>

</body>

</html>
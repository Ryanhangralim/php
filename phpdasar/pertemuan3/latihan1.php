<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Latihan 1</title>
</head>
<body>
    <table border="1" cellpadding="10" cellspacing="0">
        <?php 
        for($baris = 1; $baris <= 3; $baris++){
            echo "<tr>";
            for($kolom = 1; $kolom <= 5; $kolom++){
                echo "<td> $baris, $kolom </td>";
            }
            echo "</tr>";
        }
        ?>
    </table>
</body>
</html>
<h2> insertion table -> <?php echo $table; ?></h2>

<br/>
<form method="post" >
    <?php foreach ($colonnesTable as $colonneTable )
        {
           // if ($colonneTable['Field'] !== 'id')
                echo $colonneTable['Field'].': <input type="text" value="'.$colonneTable['Default'].'" name="'. $colonneTable['Field'].'"><br/>' ;
        }
    ?>

    <input type="submit" name="valider" value="valider">
</form>
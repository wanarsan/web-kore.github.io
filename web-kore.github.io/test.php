<button class="btn bg-primary"name="change"value="Change_Value"type="submit" style="width: 100%;">

<?php

if (isset($_POST["change"])){

    if (isset($_SESSION["Change_Value"])){
        alert("Hello World");
    }

}

?>

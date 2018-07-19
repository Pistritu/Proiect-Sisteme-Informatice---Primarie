<?php
require 'Controller.php';
$Controller = new Controller();

$title = "Adauga un produs nou: ";

if(isset($_GET["update"]))
{
    $produs = $Controller->GetObjectById($_GET["update"]);
    
    $content ="<form action='' method='post'>
    <fieldset>
        <legend>Adauga un produs nou</legend>
        <label for='name'>Nume: </label>
        <input type='text' class='inputField' name='txtName' value='$produs->nume'  /><br/>


        <label for='price'>Pret: </label>
        <input type='text' class='inputField' name='txtPrice' value='$produs->pret'/><br/>
        
        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$Controller->GetImages().
        "</select></br>

        <label for='review'>Descriere: </label>
        <textarea cols='70' rows='12' name='txtReview'>$produs->descriere</textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}
 else 
{
    $content ="<form action='' method='post'>
    <fieldset>
        <legend>Adauga un produs nou</legend>
        <label for='name'>Nume: </label>
        <input type='text' class='inputField' name='txtName' /><br/>

        <label for='price'>Pret: </label>
        <input type='text' class='inputField' name='txtPrice' /><br/>

        <label for='image'>Image: </label>
        <select class='inputField' name='ddlImage'>"
        .$Controller->GetImages().
        "</select></br>

        <label for='review'>Descriere: </label>
        <textarea cols='70' rows='12' name='txtReview'></textarea></br>

        <input type='submit' value='Submit'>
    </fieldset>
</form>";
}


if(isset($_GET["update"]))
{
    if(isset($_POST["txtName"]))
    {
        $Controller->UpdateObject($_GET["update"]);
    }
}
else
{
    if(isset($_POST["txtName"]))
    {
        $Controller->InsertObject();
    }
}

include './Template.php';
?>



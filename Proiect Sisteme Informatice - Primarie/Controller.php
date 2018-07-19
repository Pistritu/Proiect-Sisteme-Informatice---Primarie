<script>
//Display a confirmation box when trying to delete an object
function showConfirm(id)
{
    // build the confirmation box
    var c = confirm("Are you sure you wish to delete this item?");
    
    // if true, delete item and refresh
    if(c)
        window.location = "ObjectOverview.php?delete=" + id;
}
</script>

<?php
require ("DatabaseStuff.php");

//Contains non-database related function for the object page
class Controller {

    function CreateOverviewTable() {
        $result = "
            <table class='overViewTable'>
                <tr>
                    <td></td>
                    <td></td>
                    <td><b>nume</b></td>
                    <td><b>pret</b></td>
                    <td><b>descriere</b></td>
                </tr>";

        $objectArray = $this->GetObjectByType('%');

        foreach ($objectArray as $key => $value) {
            $result = $result .
                    "<tr>
                        <td><a href='AddProdus.php?update=$value->nume'>Update</a></td>
                        <td><a href='#' onclick='showConfirm($value->nume)'>Delete</a></td>
                        <td>$value->nume</td>
                        <td>$value->pret</td>
                        <td>$value->descriere</td> 
                    </tr>";
        }

        $result = $result . "</table>";
        return $result;
    }

    function CreateObjectDropdownList() {
        $objectModel = new ObjectModel();
        $result = "<form action = '' method = 'post' width = '200px'>
                    Please select a type: 
                    <select name = 'nume' >
                        <option value = '%' >All</option>
                        " . $this->CreateOptionValues($this->GetObjectTypes()) .
                "</select>
                     <input type = 'submit' value = 'Search' />
                    </form>";

        return $result;
    }

    function CreateOptionValues(array $valueArray) {
        $result = "";

        foreach ($valueArray as $value) {
            $result = $result . "<option value='$value'>$value</option>";
        }

        return $result;
    }

    function CreateObjectTables($nume) {
        $objectModel = new ObjectModel();
        $objectArray = $objectModel->GetObjectByType($nume);
        $result = "";

        //Generate a objectTable for each Entity in array
        foreach ($objectArray as $key => $produs) {
            $result = $result .
                    "<table class = 'objectTable'>
                        <tr>
                            <th rowspan='6' width = '150px' ><img runat = 'server' src = '$produs->poza' /></th>
                            <th width = '75px' >Nume</th>
                            <td>$produs->nume</td>
                        </tr>
                        
                        <tr>
                            <th>pret: </th>
                            <td>$produs->pret $ </td>
                        </tr>
                        
                        <tr>
                            <th>Descriere: </th>
                            <td>$produs->descriere</td>
                        </tr>
                     </table>";
        }
        return $result;
    }

    //Returns list of files in a folder.
    function GetImages() {
        //Select folder to scan
        $handle = opendir("images");

        //Read all files and store names in array
        while ($image = readdir($handle)) {
            $images[] = $image;
        }

        closedir($handle);

        //Exclude all filenames where filename length < 3
        $imageArray = array();
        foreach ($images as $image) {
            if (strlen($image) > 2) {
                array_push($imageArray, $image);
            }
        }

        //Create <select><option> Values and return result
        $result = $this->CreateOptionValues($imageArray);
        return $result;
    }

    //<editor-fold desc="Set Methods">
    function InsertObject() {
        $nume = $_POST["txtName"];
        $pret = $_POST["txtPrice"];
        $poza = $_POST["ddlImage"];
        $descriere = $_POST["txtReview"];

        $produs = new Entity($nume,$pret, $poza, $descriere);
        $objectModel = new ObjectModel();
        $objectModel->InsertObject($produs);
    }

    function UpdateObject($nume) {
        $name = $_POST["txtName"];
        $pret = $_POST["txtPrice"];
        $poza = $_POST["ddlImage"];
        $descriere = $_POST["txtReview"];

        $produs = new Entity($nume,$pret, $poza, $descriere);
        $objectModel = new ObjectModel();
        $objectModel->UpdateObject($nume, $produs);
    }

    function DeleteObject($nume) 
    {
        $objectModel = new ObjectModel();
        $objectModel->DeleteObject($nume);
    }

    //</editor-fold>
    //<editor-fold desc="Get Methods">
    function GetObjectById($nume) {
        $objectModel = new ObjectModel();
        return $objectModel->GetObjectById($nume);
    }

    function GetObjectByType($type) {
        $objectModel = new ObjectModel();
        return $objectModel->GetObjectByType($type);
    }

    function GetObjectTypes() {
        $objectModel = new ObjectModel();
        return $objectModel->GetObjectTypes();
    }

    //</editor-fold>
}
?>

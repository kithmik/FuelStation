<?php
require_once($_SERVER['DOCUMENT_ROOT'] . "/models/Model.php");
if (isset($_POST['submit'])){
    $lubricant_id = $_POST['LubricantId'];
    $date = $_POST['Date'];
    $no_of_items = $_POST['NoOfItems'];

    $price_sql = "SELECT * FROM lubricantprice WHERE `LubricantId` = '$lubricant_id' AND `UnitPricedDate` <= '$date' ORDER BY `UnitPricedDate` DESC LIMIT 1";
//    echo $price_sql;
//    exit(0);
    $price_data = customGetData($price_sql);

    if (count($price_data) == 1){
        $price_data = $price_data[0];

        $total_amount = $price_data["UnitPrice"] * $no_of_items;

        $_POST["TotalAmount"] = $total_amount;

        $lubricantsale_id = insert("lubricantsale", $_POST);

        if (isset($_SERVER['HTTP_REFERER'])){
            header("Location: ".$_SERVER['HTTP_REFERER']);
        }

    }


}

//$LubricantId=$_POST['LubricantId'];
//$Date=$_POST['Date'];
//$NoOfItems=$_POST['NoOfItems'];
//$Cashsale=$_POST['Cashsale'];
//$Debtorsale=$_POST['Debtorsale'];
//$Cardsale=$_POST['Cardsale'];
//
//
//
//
//$sql="INSERT INTO lubricantsale(LubricantId,Date,NoOfItems,Cashsale,Debtorsale,Debtorsale,Cardsale) VALUES ('$LubricantId','$Date','$NoOfItems','$Cashsale','$Debtorsale','$Cardsale')";
//
//
//if ($conn->query($sql) === TRUE) {
//    echo "<script>window.alert('Successfully added !');
//    			window.location='view.php'</script>";
//
//} else {
//    echo "Error: " . $sql . "<br>" . $conn->error;
//}
//$conn -> close();
//
//}

?>
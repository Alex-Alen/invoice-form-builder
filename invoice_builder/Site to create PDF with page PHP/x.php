<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>



<form method="POST" action="bill.php" name="bill">
Client: <input type="text" name="ClientName" /><br/>
Reg.nr: <input type="text" name="ClientRegNum" /><br/>
Address: <input type="text" name="ClientAddr" /><br/>

<table border="0">

    <tr>
        <th>Product Name</th>
        <th>Quantity </th>
        <th>Price</th>
        <th>Discount</th>
        <th>Tax</th>
        <th>Summ</th>
    </tr>

    <?php
    $N = 10;
    for($i = 1; $i <= $N; $i++){
        echo '<tr>
        <td><input type="text" name="prodName'.$i.'" size="40"/></td>
        <td><input type="text" name="prodNum'.$i.'" onchange="setSumm('.$i.')" size="3"  value="0"/></td>
        <td><input type="text" name="prodPrice'.$i.'" onchange="setSumm('.$i.')" size="6" value="0"/></td>
        <td><input type="text" name="prodOff'.$i.'"  onchange="setSumm('.$i.')" size="6" value="0"/></td>
        <td><input type="text" name="prodTax'.$i.'"  onchange="setSumm('.$i.')" size="3" value="0"/></td>
        <td id="prodSumm'.$i.'"></td>
        </tr>';
    }
    ?>

</table>


<input type="submit" value="make bill" />
</form>


<script>
    function setSumm(N){

        Qt = parseFloat(document.bill["prodNum" + N].value);
        Pr = parseFloat(document.bill["prodPrice" + N].value);
        Of = parseFloat(document.bill["prodOff" + N].value);
        Tx = parseInt(document.bill["prodTax" + N].value);
        Sm = Qt * Pr * (100 - Of) / 100 * (1 + Tx/100);
        Sm = Math.floor(Sm * 100)/100;
        document.getElementById("prodSumm" + N).innerHTML = Sm;

    }
</script>



</body>
</html>
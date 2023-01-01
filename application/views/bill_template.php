<!DOCTYPE html>
<html>
<head>
<title>test</title>
<style>
    *{
        margin: 0px;
        padding: 0px;
    }

    td{
        font-size: 6px;
    }
    th{
        font-size: 6px;
    }

    table, th, td {
border: 1px solid black;
border-collapse: collapse;
}

p{
    margin: 0px;
}
</style>
</head>
<body>
<div style="text-align: left;">
<div style="text-align: center;">
 <p style="font-size: 12px;margin:0px;"><b>RuchiBooks Store</b>
</div>

<table class="table table-bordered table-responsive-sm" style="border:1px solid #000;" cellpadding="4.5px" autosize="1" width="100%" style="overflow: wrap;border-radius:5px;">
<tbody>
       <tr>
        <th>Bill Date Time</th>
        <td><?= date('d-m-Y H:i')  ?></td>
        <th>Customer Name </th>
        <td><?= !empty($_POST)?$_POST['customer_name']:''?> </td>
        <th>Mobile No.</th>
        <td><?= !empty($_POST)?$_POST['mobile_no']:'' ?> </td>
    </tr>  
</tbody>
</table>
<hr>
<table class="table table-bordered table-responsive-sm" style="border:1px solid #000;" cellpadding="4.5px" autosize="1" width="100%" style="overflow: wrap;border-radius:5px;">
<tbody>
       <tr>
        <th>Sr.<th/>
        <th>Product Name</th>
        <th>Qty. </th>
        <th>Price</th>
    </tr>
    <?php
    $price=0;
    $i=1;foreach ($_POST['item_desc'] as $key => $value) {
        if($value){
        $product_name=getProductName($value);
        $price=$price+$_POST['price'][$key];
        ?>
    <tr>
        <td><?= $i ?></td>
        <td><?= $product_name->name ?> </td>
        <td><?= $_POST['qty'][$key] ?> </td>
        <td><?= $_POST['price'][$key] ?> </td>
    </tr>
    <?php $i++; } } ?>
    
</tbody>
</table>
<br><br>
<p style="text-align:center">Total : <?= $price ?>/-</p>
</div>
</body>
</html>
<?php
include('./Item.php');
include('./VendingMachine.php');

$sudukai = [
    new Item('Snikcers', 'A01', 5, 1),
    new Item('Kitkat', 'A02', 4, 0.5),
    new Item('Mars', 'A03', 8, 2),
    new Item('Twix', 'A04', 2, 1.5),
    new Item('Cola', 'A05', 3, 0.5),
    new Item('Pringles', 'A06', 1, 1.9)
];

$error = '';
$vendMachine = new VendingMachine($sudukai);
if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(!empty($_POST['enteredCode']) && !empty($_POST['enteredMoney'])){
        echo $vendMachine->vend($_POST['enteredCode'], $_POST['enteredMoney']);
    } else {
        $error = 'Uzpildykite abu laukelius!';
    }
}
function showError($msg){
    if ($msg !== '') {
        return "<p>$msg</p>";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<style>
p {
    color: red;
}
</style>
<body>


<h1>Vending machine products</h1>

<table>
    <tr>
        <th>Name</th>
        <th>Code</th>
        <th>Amount</th>
        <th>Price</th>
    </tr>
    <?php foreach($sudukai as $product):?>
    <tr>
        <td><?php print $product->getName() ?></td>
        <td><?php print $product->getCode() ?></td>
        <td><?php print $product->getAmount() ?></td>
        <td><?php print $product->getPrice() ?></td>
    </tr>
    <?php endforeach ?>
</table>

<form action="" method="POST">
    <input type="text" name="enteredCode" placeholder="Enter item code" value="<?php echo $_POST['enteredCode'] ?? null ?>">
    <input type="text" name="enteredMoney"placeholder="Enter your money" value="<?php echo $_POST['enteredMoney'] ?? null ?>">
    <button type="submit">submit</button>
</form>
    
<?php echo showError($error); ?> 

</body>
</html>
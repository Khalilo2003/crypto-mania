<?php include "components/navbar.php";
$coins = getAllPortfolioCoins();?>

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Amount</th>
        </tr>
    </thead>
    <tbody>
        <!-- als de array coins niet gelijk is aan 0 dan loopt hij er overheen en laat jij ze zien. -->
        <?php if(count($coins)!=0):?>
        <?php foreach($coins as $coin): ?>
        <tr>
            <td><?php echo $coin["coinName"]?></td>
            <td><?php echo $coin["coinAmount"]?></td>
        </tr>
        <?php endforeach; ?>
        <?php endif; ?>
    </tbody>
</table>
<?php include "components/footer.php"; ?>
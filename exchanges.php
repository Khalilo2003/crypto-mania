<?php include "components/navbar.php" ?>
<div class="row gap-2 justify-content-center mt-2" id="exchanges-target">
 
</div>

<template id="exchanges-template">
    <!-- haalt de data op en zet die in de html -->
    {{ #data }}
 <div class="cart col-10 col-md-5 col-lg-3 border border-primary p-2">
    <div class="cart-body">
        <h5 class="cart-title">{{name}}</h5>
        <p>Volume:{{volumeUsd}}</p>
        <small class="text-muted">{{rank}}</small>
    </div>
 </div>
 {{ /data }}
</template>
<?php include "components/footer.php" ?>
<script src="files/exchanges.js"></script>
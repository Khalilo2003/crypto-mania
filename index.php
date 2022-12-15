<?php include "components/navbar.php" ?>

<template id="coin-template">
    {{ #data }}
    <tr>
        <td>{{name}}</td>
        <!-- A.P.I gegevens worden onder elkaar gezet eb=n word lowercase gezet -->
        <td><img height="50" src="https://assets.coincap.io/assets/icons/{{symbollowercase }}@2x.png" >{{symbol}}</td>
        <td>{{priceUsd}}</td>
        <td>{{priceEuro}}</td>
        <td>{{marketCapUsd}}</td>
        <td>{{changePercent24Hr}}</td>
        <!-- Elke coin heeft een eigen informatie pagina -->
        <td><button class="btn btn-primary history" id="{{id}}">More info</button></td>    
    </tr>
    {{ /data }}
</template>
<div class="table-responsive" id="">
    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Shortname</th>
                <th>Price</th>
                <th>Price Euro</th>
                <th>Market cap</th>
                <th>Trade Volume</th>
                <th>More info</th>
            </tr>
        </thead>
    <!-- hier word template ingeladen -->
    <tbody id="coin-table">

    </tbody>
    </table>
    <!-- Modal -->
<div class="modal-container">
    <div class="modal fade" tabindex="-1">
    </div>
</div>
</div>

<div class="lds-hourglass"></div>


<template id="modal-template">
    <div class="modal-dialog modal-xl">
        <div class="modal-content bg-white p-2">
            <div class="modal-header">
                <h5 class="modal-title">{{name}}</h5>
                <button class="btn btn-close modal-close"></button>
            </div>
            <div class="modal-body">
                <!-- price van elke munt -->
                <h3>Price</h3>
                <p>{{priceUsd}}</p>
                <div class="d-flex align-items-center gap-2">
                    <div>
                        <h3>Market cap</h3>
                        <!-- elke munt zn marktwaarde -->
                        <p>{{marketCapUsd}}</p>
                    </div>
                    <div>
                        <h3>Volume USD</h3>
                        <p>{{volumeUsd24Hr}}</p>
                    </div>
                    <div>
                        <h3>Supply</h3>
                        <p>{{supply}}</p>
                    </div>
                </div>
                <div class="chart-container">
                    
                    <canvas id="myChart" height="400" width="400"></canvas>
                </div>
            </div>
            <div class="modal-footer d-flex flex-column justify-content-end align-items-end">
                <button class="btn btn-secondary modal-close">close</button>
                <!-- als je bent ingelogd dan kan je een coin kopen. -->
                <?php if (isset($_SESSION["user"])): ?>
                <a href="buy.php?id={{id}}">buy</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
</template>
<?php include "components/footer.php" ?>
<script src="files/script.js"></script>
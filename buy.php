<?php include "components/navbar.php"; 
// Als je een munt koopt dan word het een post en voert hij de functie uit
if($_SERVER["REQUEST_METHOD"]=="POST"){
    buyCoin();
}
?>

<div id="coin"></div>

<?php include "components/footer.php"; ?>

<script>
    var url = window.location.search
    // pakt alles uit de url.
    var urlparams = new URLSearchParams(url)
    var id = urlparams.get("id")

    console.log(id)
    $.ajax({
        url:`https://api.coincap.io/v2/assets/${id}`, success:function(element){
            $("#coin").html(`<h1>${element.data.name}</h1>
            <h1>${element.data.priceUsd}</h1>
            <form method="POST" action=""> 
            <div class="form-group">
            <label for="">Amount</label>
            <input name="coinAmount" type="text" placeholder="amount" class="form-control">
            </div>
            <input type="text" name="coinName" hidden value="${element.data.name}">
            <input type="submit" value="buy">
            </form>`)
            console.log(element)
        }
    })
</script>
$(document).ready(function(){

    var target = $("#exchanges-target")
    var template = $("#exchanges-template").html()

function getExchanges(){
    $.ajax({

        url: "https://api.coincap.io/v2/exchanges", success:function(element){
            // data die in de template staat word render en gaat in de div
            var render = Mustache.render(template, element)
            // Plakt alle data
            target.append(render)
        }
    })
}
getExchanges()
})


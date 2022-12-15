//wacht tot de document is geladen tot die de functie uitvoert
$(document).ready(function(){
    $(".spinner").hide()
    // index coin table
    var target = $("#coin-table") 
    // word overgezet naar html data
    var template = $("#coin-template").html()
    var eurorate;
    var symbollowercase;
    // het verleden van de coin
    var History = [];
    var modalTemplate = $("#modal-template").html();
    var modal = $(".modal-container");
    var historydate = [];
    var historyprice = [];

    // haalt de data op van hoeveel euro in dollar is.
    function getEuro(){
        $.ajax({
            // wanneer de data succesvol is opgehaald dan voert hij dit uit.
            url:"https://api.coincap.io/v2/rates/euro", success:function(data){

                eurorate = data.data.rateUsd
                getAllCoins();
            }
        })
    }

    getEuro()

    function getAllCoins(){
        // api request 
        $.ajax({
            url:"https://api.coincap.io/v2/assets", success:function(data){
                
                $(".lds-hourglasss").show()
                target.hide()
                // wacht voor een paar seconden en zet die alles van onder naar boven.
                setTimeout(()=> {
                    data.data.forEach((element, index) => {
                    symbollowercase = element.symbol.toLowerCase()
                    //zorgt ervoor dat onder het kopje alles kleine letters zijn.
                    data.data[index].symbollowercase = symbollowercase
                    //Convert usd naar euro
                    data.data[index].priceEuro = eurorate * data.data[index].priceUsd
                });
                // zet alles in de template met de data
                var Render = Mustache.render(template, data)
                target.append(Render)
                },1000)
                //looped door elke coin en die informatie word op de website gezet.
            }, complete:function(){
                setTimeout(()=> {
                    //na 1 seconde dan verstopt die de spinner
                    $(".lds-hourglass").hide()
                    //en laat alle informatie zien
                    target.show()
                }, 1000)
            }
        })
    }

    function getCryptoHistory(id){
        $.ajax({
            // de url pakt de id en ziet de coin geschiedenis
            url:`https://api.coincap.io/v2/assets/${id}/history?interval=d1`, success:function(data){
                historydate = []
                historyprice = []
                // de 7 laatste items laat die over. dat zijn dan de laatste 7 dagen.
                History = data.data.splice(data.data.length - 7)
                History.forEach((element)=>{
                    historydate.push(element.date)
                    historyprice.push(element.priceUsd)
                })
                setTimeout(()=>{
                    const ctx = document.getElementById('myChart').getContext('2d');
                    const myChart = new Chart(ctx, {
                    type: 'line',
                    data: {
                    // opmaak chart
                    labels: historydate,
                    datasets: [{
                        label: 'Laatste 7 dagen',
                        data: historyprice,
                        backgroundColor: 
                            'rgba(255, 99, 132, 0.2)',
                        borderColor: 
                            'rgba(54, 162, 235, 1)',
                        borderWidth: 1
                    }]
                    },
                    options: {
                        responsive:true,
                        aspectRatio: 2.5,
                    }
                    });
                })
            }
        })
    }

    //als je klikt op de knop haal je informatie van de knop op.
    $(document).on("click", ".history",function(){
        // knop klik Id
        getCoin(this.id)
        $(".modal-container").show()
    })

    // doet de modal dicht
    $(document).on("click", ".modal-close",function(){
        $(".modal-container").hide()
    })

    //gebaseerd op de id haalt die informatie op
    function getCoin(id){
        // haalt Api op 
        $.ajax({
            url: `https://api.coincap.io/v2/assets/${id}`, success: function(data){
            console.log(data)
            getCryptoHistory(id)
            var render = Mustache.render(modalTemplate, data.data)
            modal.html(render)    
            }
        })
    }
})


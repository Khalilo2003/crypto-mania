$(document).ready(function(){
    var template = $("#news-template").html();
    var target = $("#news-target");

    function getNews(){
        // alles word naar ajax code gezet.
        $.ajax({
            //  
            url: "https://newsdata.io/api/1/news?apikey=pub_131985229d4a398c0c9c7743f65fba3db7301&q=crypto", success:function(element){
            var render = Mustache.render(template, element)
            target.append(render)
            }
        })
    }
    getNews();
})
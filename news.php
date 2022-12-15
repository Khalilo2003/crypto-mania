<?php include "components/navbar.php" ?>
<div id="news-target">
</div>
<template id="news-template">
    {{ #results }}
    <div class="p-4">
        <!-- news api gegevens -->
        <h1>{{title}}</h1>
        <!-- news api gegevens -->
        <img class="w-25" src="{{image_url}}" alt="">
        <p>{{description}}</p>
        <br>
        <p>{{content}}</p>
        <p>bron: <a href="{{link}}">{{link}}</a></p>
        <hr>
    </div>
    {{ /results }}
</template>
<?php include "components/footer.php" ?>
<script src="Files/news.js"></script>
<div style="overflow-x:auto ; height: 400px; display: flex">
    <?php foreach ($var as $videoId) { ?>
    <iframe style="padding: 10px ; padding-bottom: 5px" width="560" height="315" src="https://www.youtube.com/embed/{{$videoId}}" frameborder="0" allowfullscreen></iframe>
    <?php } ?>
</div>
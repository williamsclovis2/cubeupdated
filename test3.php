<video controls style="width:100%;">
  <source src="vid/cruise.mp4" type="video/mp4">
  <source src="http://www.html5rocks.com/en/tutorials/video/basics/Chrome_ImF.ogg" type="video/ogg">
Your browser does not support the video tag.
</video>
<style type="text/css">
*{
    margin:0px;
    padding:0px;
}
</style>
<script type="text/javascript">
var $video  = $('video'),
    $window = $(window); 

$(window).resize(function(){
    
    var height = $window.height();
    $video.css('height', height);
    
    var videoWidth = $video.width(),
        windowWidth = $window.width(),
    marginLeftAdjust =   (windowWidth - videoWidth) / 2;
    
    $video.css({
        'height': height, 
        'marginLeft' : marginLeftAdjust
    });
}).resize();
</script>
<body>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<div class="wrapper">
    <video class="video blurEffect" id="myAudio"  style="width:300px;">  
        <source src="vid/loop-bg.mp4" type=video/mp4>
    </video>
    <p id="demo"></p>
        <div class="content">
            <div class="play">►</div>
        </div>
</div>
<audio id="myAudio" controls>
  <source src="horse.ogg" type="audio/ogg" >
  <source src="img/_Lamour_%20-%20J%20Balvin%20x%20Wizkid%20Type%20Beat.mp3" type="audio/mpeg">
  Your browser does not support the audio element.
</audio>
    
<h1>The onclick Event</h1>

<p>The onclick event is used to trigger a function when an element is clicked on.</p>

<p>Click the button to trigger a function that will output "Hello World" in a p element with id="demo".</p>

<button onclick="myFunction()">Click me</button>



<script>
function myFunction() {
  document.getElementById("demo").innerHTML = "<a href='#'>tststss</a>";
}
</script>
</body>
<style>
.wrapper {
    position: relative;
    display: inline-block;
}

.blurEffect {
    -webkit-filter: blur(7px);
    -o-filter: blur(7px);
    -moz-filter: blur(7px);
    -ms-filter: blur(7px);
    filter: blur(7px);
}

.content {
    position: absolute;
    display: inline-block;
    transform: translate(-50%,-50%);
    top: 50%;
    left: 50%;
    color: #FFF;
    width: 100%;
    text-align: center;
    z-index: 999;
}

.play {
    font-size: 50px;
    cursor: pointer;
    border: 1px solid #FFF;
    display: inline-block;
    text-align: center;
    padding: 5px 25px;
}

.play:hover {
    color: red;
}

</style>
<script>
$(document).ready(function(){
    $('.play').click(function () {
        if($(this).parent().prev().get(0).paused){
            $(this).parent().prev().get(0).play();
            $(this).parent().prev().removeClass('blurEffect');
            $('.content').hide();
        }
    });

    $('.video').on('ended',function(){
        $(this).addClass('blurEffect');
      $('.content').show();
    });
})

</script>
<script>
var aud = document.getElementById("myAudio");
aud.onended = function() {
    document.getElementById("demo").innerHTML = "<a href='#'>tststss</a>";
};
</script>
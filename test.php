<style>
    .choose-flat__select {
	-webkit-appearance: button;
  -moz-appearance: button;
  appearance: none;
  -webkit-user-select: none;
  -moz-user-select: none;
	background-color: #fff;
	display: inline;
	box-sizing: border-box;
	height: 33px;
	width: 132px;
	border: 1px solid #ababab;
	border-radius: 5px;
	cursor: pointer;
	padding-left: 13px;
 	background: url('../images/select-arrow.png') 100% 0% no-repeat #fff;
 	color: #000;
}

.default
{
  color: red;
}

.choose-flat__select option 
{ 
	color: #000;
}
</style>
<body>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
<select id="year-ready" name="" class="choose-flat__select default">
  <option value="" default selected hidden>Year...</option>
  <option value="2017">2017</option>
  <option value="2018">2018</option>
  <option value="2019">2019</option>
  <option value="2020">2020</option>
  <option value="2021">2021</option>
</select>
<script>
    $(document).ready(function (){
  
   $("#year-ready").change(function() {
       var val = $(this).val();
       
       if(val == "")
       {
           $(this).addClass("default");
       }
       else
       {
          $(this).removeClass("default");
       }
    });

});
</script>
</body>
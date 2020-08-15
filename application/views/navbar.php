<div id="navContainer" style="position: absolute; left:0; top:0; height:10%; width:100%; background-color:#00FF00;">
	<div id="left" style="font-size:2em; float:left;">
		Welcome!
	</div>
	<div id="right" style="float:right;">
		<button id="logout" style="font-size:2em;">Log out</button>
	</div>
</div>
<script>
	document.getElementById('logout').addEventListener('click',function(){
		window.location.href="<?=base_url()?>userPage/logout"
	});
</script>

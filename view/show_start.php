<?php 
if (!isset($_SESSION)) session_start();
include $conf->root_path.'/view/header.php';
?>

<div class="container">
   	<div class="col-lg-10 col-lg-offset-1 col-md-11 col-md-offset-1 col-sm-11 col-sm-offset-1"> 
	   	<h1>Zadanie 1.</h1>
	   	<div id="text">
			<p>Akapit 1</p>
			<p>Akapit 2</p>
			<p>Akapit 3</p>
			<p>Akapit 4</p>
			<p>Akapit 5</p>
	   	</div>
		<ul id="listaRoslin">
			<li>Rośliny
				<ul id="rosliny">
					<li>Rośliny drzewiaste
						<ul>
							<li>drzewa</li>
							<li>krzewy</li>
							<li>krzewinki</li>
						</ul>
					</li>
					<li>Rośliny zielne
						<ul>
							<li>rośliny jednoroczne</li>
							<li>rośliny dwuletnie</li>
							<li>byliny</li>
						</ul>
					</li>
				</ul>
			</li>
			<li>Zwierzęta
				<ul id="zwierzeta">
					<li>ryby</li>
					<li>ptaki</li>
					<li>gady</li>
					<li>płazy</li>
					<li>owady</li>
					<li>ssaki</li>
				</ul>
			</li>
		</ul>   	 
	</div>
</div>
<script>
$( document ).ready(function() {	
	$("#text p").addClass('boldRed');
	$("#text>p:nth-child(2)").replaceWith("<p>Zmieniony tekst dla drugiego elementu</p>");
	$("#text>p:nth-child(2)").addClass("boldBlue");
	$("#text p:last-of-type").replaceWith("<p>Zmieniony tekst dla ostatniego elementu</p>");
	$("#text p:last-of-type").addClass("boldBlue");
	$("ul:eq(0), ul:eq(2), ul:eq(3)").addClass("no-bullet");
	$("#rosliny ul li:nth-child(3)").addClass("marked");
	$("#listaRoslin>li:nth-child(2)").addClass("horizontal-list");
	$("ul:eq(2)>li, ul:eq(3)>li, #zwierzeta>li").each(function(i){
        var index = i;
        $(this).append(" <a href='https://us.edu.pl/'>Link["+index+"]</a>");   
	});
});
</script>

			


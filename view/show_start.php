<?php if (!isset($_SESSION))
	session_start();
include $conf->root_path . '/view/header.php';
?>

<div class="container">
	<form>
		<div class="row">
			<div class="col">
				<label for="name" class="form-label">Imię</label>
				<input type="text" class="form-control" placeholder="Podaj imię" aria-label="Podaj imię" id="name">
				<p id="invalidName"></p>
			</div>
			<div class="col">
				<label for="surname" class="form-label">Nazwisko</label>
				<input type="text" class="form-control" placeholder="Podaj nazwisko" aria-label="Podaj nazwisko"
					id="surname">
				<p id="invalidSurname"></p>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<label for="city" class="form-label">Miasto</label>
				<input type="text" class="form-control" placeholder="Podaj miejsce zamieszkania"
					aria-label="Podaj miejsce zamieszkania" id="city">
				<p id="invalidCity"></p>
			</div>
			<div class="col">
				<label for="yob" class="form-label">Rok urodzenia</label>
				<input type="text" class="form-control" placeholder="Podaj rok urodzenia"
					aria-label="Podaj rok urodzenia" id="yob">
				<p id="invalidYOB"></p>
			</div>
		</div>
		<div class="row">
			<label for="email" class="form-label">Email</label>
			<input type="text" class="form-control" placeholder="Podaj  adres email" aria-label="Podaj adres email"
				id="email">
			<p id="invalidEmail"></p>
		</div>
		<div class="row">
			<label for="phone" class="form-label">Telefon</label>
			<input type="text" class="form-control" placeholder="Podaj numer telefonu" aria-label="Podaj numer telefonu"
				id="phone">
			<p id="invalidPhone"></p>
		</div>
		<button id="create" type="submit" class="btn btn-primary">Utwórz nowe konto</button>
	</form>
	<div id="errors" role="alert"></div>
</div>

<script>
	$("form").on("submit", function (event) {
		event.preventDefault();
		clearErrors();
		if (validateForm()) {
			$("#errors").addClass("alert alert-warning");
			$("#errors").text("Formularz zawiera błędy");
		} else {
			$("#errors").addClass("alert alert-primary");
			$("#errors").append("<p>Imie:" + $("#name").val() +
				"</p><p>Nazwisko:</p>" + $("#surname").val() +
				"</p><p>Miasto:" + $("#city").val() +
				"</p><p>Rok urodzenia:" + $("#yob").val() +
				"</p><p>Email:" + $("#email").val() +
				"</p><p>Telefon:" + $("#phone").val() + "</p>");
		}
	});

	function validateForm() {
		let error = false;

		if ($("#name").val() == "") {
			$("#invalidName").text("Pole wymagane");
			error = true;
		}
		if ($("#surname").val() == "") {
			$("#invalidSurname").text("Pole wymagane");
			error = true;
		}
		if ($("#city").val() == "") {
			$("#invalidCity").text("Pole wymagane");
			error = true;
		}
		if ($("#yob").val() == "") {
			$("#invalidYOB").text("Pole wymagane");
			error = true;
		}
		if ($("#email").val() == "") {
			$("#invalidEmail").text("Pole wymagane");
			error = true;
		}
		if ($("#phone").val() == "") {
			$("#invalidPhone").text("Pole wymagane");
			error = true;
		}

		if (!$.isNumeric($("#phone").val()) || $("#phone").val().length != 9) {
			$("#invalidPhone").text("Podaj poprawny numer telefonu");
			error = true;
		}

		if (!$.isNumeric($("#yob").val()) || $("#yob").val().length != 4) {
			$("#invalidYOB").text("Podaj poprawny rok urodzenia");
			error = true;
		}

		if ($.isNumeric($("#yob").val()) && $("#yob").val() >= 2006 && $("#yob").val().length == 4) {
			$("#invalidYOB").text("Musisz być pełnoletni");
			error = true;
		}

		if (!validateEmail($("#email").val())) {
			$("#invalidEmail").text("Podaj poprawny adres email");
			error = true;
		}

		if (!checkAlphabets($("#name").val())) {
			$("#invalidName").text("Podaj poprawne imię");
			error = true;
		}

		if (!checkAlphabets($("#surname").val())) {
			$("#invalidSurname").text("Podaj poprawne nazwisko");
			error = true;
		}
		return error;
	}

	function validateEmail($email) {
		var emailReg = /^([\w-\.]+@([\w-]+\.)+[\w-]{2,4})?$/;
		return emailReg.test($email);
	}

	function checkAlphabets(input) {
		for (const char of input) {
			if (!(char >= "a" && char <= "z") &&
				!(char >= "A" && char <= "Z")) {
				return false;
			}
		}
		return true;
	}

	function clearErrors() {
		$("#invalidName").text("");
		$("#invalidSurname").text("");
		$("#invalidCity").text("");
		$("#invalidYOB").text("");
		$("#invalidEmail").text("");
		$("#invalidPhone").text("");
		$("#errors").text("");
	}
</script>

<!--<div class="container">
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
</script>-->
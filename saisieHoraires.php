
<html>
<head>
<script>

	function getId(id){
		return document.getElementById(id); //recupère un élément via son id
	}



	function toInt(x){
	return parseInt(x,10); // converti un string en int
	}



	function jhm(tmp){
		var diff = {} 	// Initialisation du retour
		
		diff.min = tmp%60;
		
		diff.heures = Math.floor(tmp/60);    						// Nombre d'heures (entières)
		 
		 
		return diff;
	}


	function verification(id){
		getId(id).style.outline = "none";
		regex=/^([0-1][0-9]|2[0-3]):([0-5][0-9])$/;
		valeurId=getId(id).value;
		if (valeurId.match(regex)){
			// if(getId('dmidi')!= "")
				// if(getId('rmidi')!= "")
					// if(getId('dsoir')!= "")
			
			var arriveeMatin = (getId(id).value).split(':');//heure de départ
			var trHAenMinute=(toInt(arriveeMatin[0])*60)+toInt(arriveeMatin[1]); //tranformation en date heure
			//var trHAenDateMs=trHAenDate.getTime(trHAenDate);//conversion en milliseconde
			
			var hPlein=(7*60)+42;// taux horaire 07:42

			var tPause=45;// temps de pause 00:45
			
			
			var time=trHAenMinute+hPlein+tPause;// difference entre début et fin

		 
			diff=jhm(time);
			
			if (diff.heures<16){
				getId('message').innerHTML ="16:00";
			}
			else{
				getId('message').innerHTML =diff.heures+':'+diff.min;
				
			}
				
		}
		else{
			getId('message').innerHTML = "Merci de renseigner l'heure d'arrivée matin au minimum (HH:MM)";
			getId(id).style.outline = "1px solid red";
		}
	}
</script>
</head>
	<body>
		<h1> Je pars à quel heure??? </h1>
		<form>
			<p>Arrivée matin : <input value="" id="aMatin" onkeyup="verification(this.id)"> (<i>45 min de pause midi</i>)</p>
			<p>Départ midi : <input disabled placeholder="en cours" type="text" id="dmidi" /></p>
			<p>Retour midi : <input disabled placeholder="en cours" type="text" id="rmidi" /></p>
			<p>Départ soir: <input disabled placeholder="en cours" type="text" id="dsoir" /></p>
			<p>Je peux partir à  : <span id="message" placeholder="Ici sera le message"></span></p>
		</form>

	</body>
</html> 

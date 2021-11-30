<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>CIBLE PANEL</title>
	<link rel="shortcut icon" href="img/FFE.png">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="css/w3.css">	
	<link rel="stylesheet" href="css/w3-theme-blue.css">
	<link rel="stylesheet" href="css/style.css">
	
	<script language="javascript" src="js/jquery-3.4.1.min.js"></script>
	<script language="javascript" src="js/time2.js"></script>
</head>

<body>
<!-- Récuparation de l'addresse réseau -->
<?Php
		$ip = $_SERVER['REMOTE_ADDR'];
		$search = substr($ip,12);
		$addres = substr($ip,0,9);
?>

<div class="bgimg w3-container w3-animate-opacity">
	<div class="w3-display-topleft w3-padding-large w3-xlarge">
		<img src="img/FFE.png" style="width:30%; height:40%;"/>
	</div>
	<div class="w3-display-bottomright w3-padding-large">
		<button id="btn_score" onCLick="document.getElementById('status').style.display='block'" style="bottom:10px" class="w3-button w3-yellow w3-xlarge w3-round-large" disabled>SCORE</button>
    </div>
	<div class="w3-display-topright w3-padding-large">
		<button onClick="document.getElementById('id01').style.display='block'" class="w3-button w3-xlarge w3-yellow w3-round-large">CONFIG.</button>
    </div>
    <div class="w3-display-middle w3-center">
		<button onClick="document.getElementById('JOUER').style.display='block'" class=" w3-center w3-button w3-yellow w3-round-xlarge w3-jumbo w3-animate-top">JOUER</button>
		<br>
		<br>
		<hr class="w3-border-grey" style="margin:auto; width:40%">
		<p class="w3-large w3-center w3-text-white">Fédération Française d'Escrime</p>
    </div>
	<audio id="0" style="display:none" src="son/0.mp3"></audio>
    <div id="JOUER" class="w3-modal" style="color:black; display:none">
        <div class="w3-modal-content w3-card-4 w3-animate-zoom">
    		<!--::before-->
            <header class="w3-container w3-black">
            <span onclick="document.getElementById('JOUER').style.display='none'" class="w3-button w3-black w3-display-topright w3-xlarge">x</span>
            <h2>JEU</h2>
            <!--::after-->
            </header>
            <div class="w3-bar w3-border-bottom">
            	<!--::before-->
                <button id="btn_basique" onClick="FenetreJouer(Basique)" class="w3-button w3-bar-item w3-grey">BASIQUE</button>
                <button id="btn_avances" onClick="FenetreJouer(Avances)" class="w3-button w3-bar-item" disabled>AVANCÉS</button>
            </div>
            <div id="Basique" class="w3-row-padding" style="display:block">
               <div class="w3-container">
                    <h2>TEMPS DE JEU :</h2>
                    <center>
					<table class="w3-center">
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_M('plus','1')" style="width:80%">+</button>
							</td>
							<td>
								
							</td>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_S('plus','15')" style="width:80%">+</button>
							</td>
							<td>
								
							</td>
						</tr>
						
						<tr>
							<td>
								<input class="t_M w3-center" style="width:80%" type="number" min="0" max="59" value="01" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>min</label>
							</td>
							<td>
								<input class="t_S w3-center" style="width:80%" type="number" min="0" max="59" value="00" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>s</label>
							</td>
						</tr>
						
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_M('moins','1')" style="width:80%">-</button>
							</td>
							<td>
								
							</td>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_S('moins','15')" style="width:80%">-</button>
							</td>
							<td>
								
							</td>
						</tr>
					</table>
					</center>
                </div>
                <hr>
                <div class="w3-container">
                    <h2>MODE DE JEU:</h2>
					<div id="coordination_basique" style="display:block; width:100%; height:100%; float:left;" class="w3-center">
						<input type="radio" name="type_de_lien" value="IDENTIQUE" onChange="javascript:vinc = 'IDENTIQUE';" checked />IDENTIQUE
						<input type="radio" name="type_de_lien" value="DIFFERENT" onChange="javascript:vinc = 'DIFFERENT';"/>DIFFÉRENT
					</div>
                    <table class="w3-table">
                    	<tr>
                        	<td><button id="btn_mode_1" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode('CONTRAT')" style="width:100%; height:50px">CONTRAT</button></td>
                        	<td><button id="btn_mode_2" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode('MARATHON')" style="width:100%; height:50px">MARATHON</button></td>
                        </tr>
                        <tr>
                        	<td><button id="btn_mode_3" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode(3)" style="width:100%; height:50px" disabled>MODE 3</button></td>
                        	<td><button id="btn_mode_4" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode(4)" style="width:100%; height:50px" disabled>MODE 4</button></td>
                        </tr>
                    </table>
                </div>
                <hr>
				<div class="w3-container w3-border-bottom">
                	<h2>TEMPS DE PRÉPARATION :</h2>
                    <div class="w3-center">
                   		<center>
					<table class="w3-center">
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="Warm('plus','1')" style="width:80%">+</button>
							</td>
						</tr>
						<tr>
							<td>
								<input class="warm w3-center" style="width:80%" type="number" min="0" max="59" value="3" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>s</label>
							</td>
						</tr>
						
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="Warm('moins','1')" style="width:80%">-</button>
							</td>
						</tr>
					</table>
					</center>
                    </div>
                </div>
                <div class="w3-container w3-center">
                	<button id='Basique_Go' onclick="AppelleGo()" class="w3-button w3-yellow w3-round-xlarge w3-xxlarge w3-margin-top w3-margin-bottom" style="height:90px; width:80%" disabled>GO!</button>
                </div>
            </div>
			
            <div id="Avances" class="w3-row-padding" style="display:none">
				<div class="w3-container">
                    <h2>TEMPS DE JEU :</h2>
                    <center>
					<table class="w3-center">
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_M('plus','1')" style="width:80%">+</button>
							</td>
							<td>
								
							</td>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_S('plus','15')" style="width:80%">+</button>
							</td>
							<td>
								
							</td>
						</tr>
						
						<tr>
							<td>
								<input class="t_M w3-center" style="width:80%" type="number" min="0" max="59" value="01" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>min</label>
							</td>
							<td>
								<input class="t_S w3-center" style="width:80%" type="number" min="0" max="59" value="00" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>s</label>
							</td>
						</tr>
						
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_M('moins','1')" style="width:80%">-</button>
							</td>
							<td>
								
							</td>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="tiempo_S('moins','15')" style="width:80%">-</button>
							</td>
							<td>
								
							</td>
						</tr>
					</table>
					</center>
                </div>
                <hr>
                <div class="w3-container">
                	<h2>SET INTERVAL (fonctionne pas) :</h2>
					<center>
					<table class="w3-table">
						<tr>
							<td><p class="w3-center" style="font-size:20px">IntervalON</p></td>
							<td><p class="w3-center" style="font-size:20px">IntervalOFF</p></td>
							<td><p class="w3-center" style="font-size:20px">TouchTime</p></td>
						</tr>
						<tr>
							<td class="w3-center"><input id="IntervalON" class="w3-center w3-button w3-border w3-round-large w3-hover-white" placeholder="2000" type="text" style="width:70%; height:90% font-size:20px">ms</td>
							<td class="w3-center"><input id="IntervalOFF" class="w3-center w3-button w3-border w3-round-large w3-hover-white" placeholder="3000" type="text" style="width:70%; height:90% font-size:20px">ms</td>
							<td class="w3-center"><input id="TouchTime" class="w3-center w3-button w3-border w3-round-large w3-hover-white" placeholder="40" type="text" style="width:70%; height:90% font-size:20px">ms</td>
						</tr>
					</table>
					</center>
                </div>
                <hr>
                <div class="w3-container">
                    <h2>MODE DE JEU :</h2>
					<div id="coordination_avances" style="display:block; width:100%; height:100%; float:left;" class="w3-center">
						<input type="radio" name="type_de_lien" value="IDENTIQUE_AVANCES" onChange="javascript:vinc = 'IDENTIQUE_AVANCES';" />IDENTIQUE
						<input type="radio" name="type_de_lien" value="DIFFERENT_AVANCES" onChange="javascript:vinc = 'DIFFERENT_AVANCES';"/>DIFFÉRENT
					</div>
                    <center>
                    <table class="w3-table">
                    	<tr>
                        	<td><button id="btn_mode_5" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode('CONTRAT')" style="width:90%; height:50px">CONTRAT</button></td>
                        	<td><button id="btn_mode_6" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode('MARATHON')" style="width:90%; height:50px">MARATHON</button></td>
                        </tr>
                        <tr>
                        	<td><button id="btn_mode_7" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode(3)" style="width:90%; height:50px" disabled>MODE 3</button></td>
                        	<td><button id="btn_mode_8" class="w3-button w3-round-large w3-khaki mode" onclick="gamemode(4)" style="width:90%; height:50px" disabled>MODE 4</button></td>
                        </tr>
                    </table>
                    </center>
                </div>
                <hr>
				<div class="w3-container w3-border-bottom">
                	<h2>TEMPS DE PRÉPARATION :</h2>
                    <div class="w3-center">
                   	<center>
					<table class="w3-center">
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="Warm('plus','1')" style="width:80%">+</button>
							</td>
						</tr>
						<tr>
							<td>
								<input class="warm w3-center" style="width:80%" type="number" min="0" max="59" value="3" disabled onChange="if(parseInt(this.value,10)<10)this.value='0'+this.value;"/>
							</td>
							<td>
								<label>s</label>
							</td>
						</tr>
						<tr>
							<td>
								<button class="w3-button w3-black w3-round-large" onclick="Warm('moins','1')" style="width:80%">-</button>
							</td>
						</tr>
					</table>
					</center>
                    </div>
                </div>
                <div class="w3-container w3-center">
                	<button id='Avances_Go' onclick="AppelleGoAvances()" class="w3-button w3-yellow w3-round-xlarge w3-xxlarge w3-margin-top w3-margin-bottom" style="height:90px; width:80%" disabled>GO!</button>
                </div>
            </div>
            <div class="w3-container w3-light-grey w3-padding"></div>
   	 	</div>
    </div>
	<div id="id01" class="w3-modal" style="color:black;">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom">
			<header class="w3-container w3-black"> 
				<span onclick="document.getElementById('id01').style.display='none'" 
				class="w3-button w3-black w3-xlarge w3-display-topright">x</span>
				<h2>CONFIGURATION</h2>
			</header>
			<div class="w3-bar w3-border-bottom">
				<button id="btn_detection" onClick="FenetreConfig(Detection)" class="w3-bar-item w3-button w3-grey">DÉTECTION</button>
				<button id="btn_gestion" onClick="FenetreConfig(Gestion)" class="w3-bar-item w3-button">GESTION</button>
			</div>
			<div id="Detection" class="w3-container">
				<h2>DÉTECTION</h2>
				<div id="SEARCH" class="w3-center" style="display:block;">			
					<button id="verificar" class="w3-button w3-round-large w3-khaki" style="width:90%; height:100px; font-size:20px" onclick="ScanReseau()">SCAN</button>
					<div id="scan" style="display:block;">
						<p style="display:none"><a id="IP_Base"><?Php echo "http://$addres";?></a></p>
						<p style="display:none"><a id="error"></a></p>
						<div id="success">
							<!-- <p class="CIBLES w3-border w3-border-grey w3-round-large w3-bar" style="width:90%"> -->
								<!-- <a style="font-size:20px">CIBLE 1</a> -->
								<!-- <button class="w3-button w3-green w3-round" onclick="IP('10.3.141.10','1')" style="font-size:20px" id="Cible1">CONNECTER</button>  -->
								<!-- <button class="w3-button w3-khaki w3-round" style="font-size:20px" id="Test_Cible1">TEST</button>  -->
							<!-- </p> -->
							<!-- <p class="CIBLES w3-border w3-border-grey w3-round-large w3-bar" style="width:90%">  -->
								<!-- <a style="font-size:20px">CIBLE 2</a>  -->
							<!-- <button class="w3-button w3-green w3-round" onclick="IP('10.3.141.11','2')" style="font-size:20px" id="Cible2">CONNECTER</button>  -->
								<!-- <button class="w3-button w3-khaki w3-round" style="font-size:20px" id="Test_Cible2">TEST</button> -->
							<!-- </p> -->
							<!-- <p class="CIBLESS w3-border w3-border-grey w3-round-large w3-bar" style="width:90%">  -->
								<!-- <a style="font-size:20px">CIBLE 3</a>  -->
								<!-- <button class="w3-button w3-green w3-round" onclick="IP('10.3.141.12','3')" style="font-size:20px" id="Cible3">CONNECTER</button>  -->
								<!-- <button class="w3-button w3-khaki w3-round" style="font-size:20px" id="Test_Cible3">TEST</button>  -->
							<!-- </p> -->
						</div>
					</div>
				</div>
			</div>
			<div id="Gestion" class="w3-container" style="display:none">
				<h2>GESTION</h2>
                
				</p>
			</div>
			<div class="w3-container w3-light-grey w3-padding">
			</div>
		</div>
	</div>
	</div>
	<div id="chrono_warmup" class="w3-modal "style="color:black">
		<div class="w3-modal-content w3-card-4 w3-animate-zoom">
			<header class="w3-container w3-black w3-center"> 
				<h1>PRÉPARATION</h1>
			</header>
			<div class="w3-container">
				<div id="CompteARebours_Warmup" class="w3-center" style="font-size:180px" >Prêt ?</div>
			</div>
		</div>
	</div>
	<div id="status" class="w3-modal" style="color:black">
		<div class="w3-modal-content w3-animate-zoom w3-border w3-round-large">
			<header class="w3-container w3-indigo w3-border w3-round-large"> 
				<span onclick="document.getElementById('status').style.display='none'; document.getElementById('btn_score').disabled=false" class="w3-button w3-display-topright w3-xlarge">x</span>
				<h2>JEU: <a id="jeu_select"><b>----</b></a></h2>
			</header>
				<div class="w3-container w3-light-grey">
					<div id="tiempo" class="w3-center" style="width:100%">
						<div class="chronometer">
							<div id="screen" class="w3-jumbo">00 : 00 : 00</div>
							<!--
							<div class="buttons" style="display:none;">
								<button class="emerald" onclick="start()">START &#9658;</button>
								<button class="emerald" onclick="stop()">STOP &#8718;</button>
								<button class="emerald" onclick="resume()" >RESUME &#8634;</button>
								<button class="emerald" onclick="reset()">RESET &#8635;</button>
							</div>-->
						</div>
					</div>
					<div class="w3-center w3-content w3-display-container" id="points" style="color:black; padding-top:20px">
						
					</div>
						
				</div>
			<footer class="w3-container w3-indigo w3-border w3-round-large">
				<button class='w3-right w3-indigo w3-button w3-xlarge' onclick="stop()">STOP</button>
			</footer>
		</div>
	</div>
</div>
</body>
<script>
var seconds;					//temps du warmup
var idWarmup;					//id de la répétition du warmup
var modedejeu;					//défini le mode de jeu
var IntervalON;								//pour le mode avancés (non au point)
var IntervalOFF;							//pour le mode avancés (non au point)
var TouchTime;								//pour le mode avancés (non au point)
var CIBLES_POUR_JOUER = [];		//stockage des IPs pour le jeu
var vinc;						//identique/différent
var FIN = false;				//=true à la fin d'une partie
var seg = true;					// pour le jeu

var nb_joueurs = 0;				//représente le nb de joueurs connectés
var LancerPartie=0;				//=1 lorsque le jeu tourne
var id=1;						//variable représentant les IDs dynamiques
var IP_DES_CIBLES = [];					//récupération des IPs de la bdd
var IP_DES_CIBLES_LOCAL = [];			//stockage de la fin des IPs des cibles
var score_des_joueurs = [];				//score des joueurs
var Niveau_Batterie = [];				//Niveau de batterie des cibles
	
	//suppression des IPs enregistrées à la fermeture de la page
	window.addEventListener("beforeunload", function(e){
		IP_DES_CIBLES_LOCAL.forEach(function(element, index){
			$.ajax({
				async: true,
				type: "GET",
				url: "form.php",
				data:{"SUP_IP":IP_DES_CIBLES_LOCAL[index]},
				dataType: "html",
				success: function(data){}
			});
		});
	});
	
	//Affichage dynamique du score de chaque cible
	function AffichageScore() 
	{
			$.ajax({
			async:	true, 
			type: "POST",
			url: "mensajes.php",
			data: {"m":IP_DES_CIBLES_LOCAL},
			dataType:"json",
			success: function(data)
			{
				if(nb_joueurs>0 && LancerPartie==1) {	//verif pour ne pas éxecuter pls fois dans le vide (lecture de la bdd)		
					var reception = data;
					for (const [key,value] of Object.entries(reception)){
						score_des_joueurs[key]=value;
					}
					score_des_joueurs.forEach(function(element, index){
						var SC = sessionStorage.getItem(index);
						document.getElementById("SCORE"+SC).innerHTML=element;		//rafraichissement de l'affichage	
					});
				}
			}

			});	
			setTimeout(AffichageScore(),500);			//actualisé toutes les 500ms
}

	$(document).ready(function()	//s'éxecute au chargement de la page
	{
		AffichageScore();
	});
	
	
//Récupère et affiche le niveau de batterie des cibles connectées
	function NiveauDeBatterie() {
		var nb=0;
		for(var a=0; a<CIBLES_POUR_JOUER.length; a++){
		$.ajax({											//envoi aux ESP
			async:	true, 
			type: "GET",
			url: "http://"+CIBLES_POUR_JOUER[a],
			data: "Niveau",
			dataType:"html",
			success: function(data,textStatus,jqXHR){
				console.log("a");		//debug
				nb++;
				if(nb==nb_joueurs) {
					$.ajax({								//lecture de la BDD avec Niveau.php
						async:	false, 
						type: "POST",
						url: "Niveau.php",
						data: "",
						dataType:"json",
						timeout: "500",
						success: function(data){
							console.log("b");		//debug
							var reception_Batterie = data;
							for(const [key,value] of Object.entries(reception_Batterie)){
								Niveau_Batterie[key]=value;
								console.log("c");		//debug
							}
							Niveau_Batterie.forEach(function(element, index){
								var SC=sessionStorage.getItem(index);
								if(Niveau_Batterie[index]==25){document.getElementById("Batterie_ID_"+SC).setAttribute("src","img/4.png");}
								if(Niveau_Batterie[index]==50){document.getElementById("Batterie_ID_"+SC).setAttribute("src","img/3.png");}
								if(Niveau_Batterie[index]==75){document.getElementById("Batterie_ID_"+SC).setAttribute("src","img/2.png");}
								if(Niveau_Batterie[index]==100){document.getElementById("Batterie_ID_"+SC).setAttribute("src","img/1.png");}
								if(Niveau_Batterie[index]==125){document.getElementById("Batterie_ID_"+SC).setAttribute("src","img/5.png");}
							});
							Niveau_Batterie.length=0;
						}
					});
				}
			}
		});
		}
	}

	//Affichage des onglets "basique" et "avances" de la fenêtre JOUER
	function FenetreJouer(id) {
    	if(id==Avances) {
        	document.getElementById('Basique').style.display='none';
            document.getElementById('btn_basique').className="w3-button w3-bar-item";
            document.getElementById('Avances').style.display='block';
          	document.getElementById('btn_avances').className="w3-button w3-bar-item w3-grey";
            
        }
        else {
        	document.getElementById('Avances').style.display='none';
            document.getElementById('btn_avances').className="w3-button w3-bar-item";
        	document.getElementById('Basique').style.display='block';
            document.getElementById('btn_basique').className="w3-button w3-bar-item w3-grey";
        }
    }
    
	//Affichage des onglets "detection" et "gestion" de la fenêtre CONFIG
    function FenetreConfig(id) {
    	if(id==Gestion) {
        	document.getElementById('Detection').style.display='none';
            document.getElementById('btn_detection').className="w3-button w3-bar-item"
            document.getElementById('Gestion').style.display='block';
            document.getElementById('btn_gestion').className="w3-button w3-bar-item w3-grey"
			NiveauDeBatterie();		//actualisation du niveau de batterie à l'appui
        }
        else {
        	document.getElementById('Gestion').style.display='none';
            document.getElementById('btn_gestion').className="w3-button w3-bar-item"
        	document.getElementById('Detection').style.display='block';
            document.getElementById('btn_detection').className="w3-button w3-bar-item w3-grey"
        }
    }
    
	//Sélection du mode de jeu
    function gamemode(mode) {
	var i;
        for (i=1;i<9;i++) {
		document.getElementById('btn_mode_'+i).className="w3-button w3-round-large w3-khaki mode";
		}
		switch (mode) {
			case 'CONTRAT':
				modedejeu="CONTRAT";
				document.getElementById("Basique_Go").disabled=false;
				//document.getElementById("Avances_Go").disabled=false;
				document.getElementById('btn_mode_1').className="w3-button w3-round-large w3-green mode";
				document.getElementById('btn_mode_5').className="w3-button w3-round-large w3-green mode";
			break;
			case 'MARATHON':
				modedejeu="MARATHON";
				document.getElementById("Basique_Go").disabled=false;
				//document.getElementById("Avances_Go").disabled=false;
				document.getElementById('btn_mode_2').className="w3-button w3-round-large w3-green mode";
				document.getElementById('btn_mode_6').className="w3-button w3-round-large w3-green mode";
			break;
			case 3:
				document.getElementById('btn_mode_3').className="w3-button w3-round-large w3-green mode";
				document.getElementById('btn_mode_7').className="w3-button w3-round-large w3-green mode";
			break;
			case 4:
				document.getElementById('btn_mode_4').className="w3-button w3-round-large w3-green mode";
				document.getElementById('btn_mode_8').className="w3-button w3-round-large w3-green mode";
			break;
		}
        
    }
    
	//Paramétrage des minutes du temps de jeu
    function tiempo_M(PouM,T){
		var Temps_M=document.getElementsByClassName("t_M");	
		if(PouM == "plus"){
			if(Temps_M[0].value<59 && Temps_M[1].value<59){
				Temps_M[0].value = parseInt(Temps_M[0].value) + parseInt(T);
				Temps_M[1].value = parseInt(Temps_M[1].value) + parseInt(T);
				if(Temps_M[0].value<10 && Temps_M[1].value<10){
					Temps_M[0].value = "0" + Temps_M[0].value;
					Temps_M[1].value = "0" + Temps_M[1].value;
				} 
				if(Temps_M[0].value == 60 && Temps_M[1].value == 60){
					Temps_M[0].value = "59";
					Temps_M[1].value = "59";
				}
			}
		}
		if(PouM == "moins"){
			if(Temps_M[0].value>0 && Temps_M[1].value>0){
				if(Temps_M[0].value==59 && Temps_M[1].value==59){
					Temps_M[0].value="60";
					Temps_M[1].value="60";
				}
				Temps_M[0].value = parseInt(Temps_M[0].value) - parseInt(T);
				Temps_M[1].value = parseInt(Temps_M[1].value) - parseInt(T);
				if(Temps_M[0].value<10 && Temps_M[1].value<10){
					Temps_M[0].value = "0" + Temps_M[0].value;
					Temps_M[1].value = "0" + Temps_M[1].value;
				}
			}
		}
	}
	
	//Paramétrage des secondes du temps de jeu
	function tiempo_S(PouM,T){
		var Temps_S=document.getElementsByClassName("t_S");	
		if(PouM == "plus"){
			if(Temps_S[0].value<59 && Temps_S[1].value<59){
				Temps_S[0].value = parseInt(Temps_S[0].value) + parseInt(T);
				Temps_S[1].value = parseInt(Temps_S[1].value) + parseInt(T);
				if(Temps_S[0].value<10 && Temps_S[1].value<10){
					Temps_S[0].value = "0" + Temps_S[0].value;
					Temps_S[1].value = "0" + Temps_S[1].value;
				} 
				if(Temps_S[0].value == 60 && Temps_S[1].value == 60){
					Temps_S[0].value = "59";
					Temps_S[1].value = "59";
				}
			}
		}
		if(PouM == "moins"){
			if(Temps_S[0].value>0 && Temps_S[1].value>0){
				if(Temps_S[0].value==59 && Temps_S[1].value==59){
					Temps_S[0].value="60";
					Temps_S[1].value="60";
				}
				Temps_S[0].value = parseInt(Temps_S[0].value) - parseInt(T);
				Temps_S[1].value = parseInt(Temps_S[1].value) - parseInt(T);
				if(Temps_S[0].value<10 && Temps_S[1].value<10){
					Temps_S[0].value = "0" + Temps_S[0].value;
					Temps_S[1].value = "0" + Temps_S[1].value;
				}
			}
		}
	}
       
	//Paramétrage du temps de préparation
    function Warm(ope, temps) {
        var warm=document.getElementsByClassName("warm");
            if(ope == "plus"){
                if(warm[0].value<59 && warm[1].value<59){
                   warm[0].value = parseInt(warm[0].value) + parseInt(temps);
				   warm[1].value = parseInt(warm[1].value) + parseInt(temps);
                   if(warm[0].value < 10 && warm[1].value < 10){
						//warm[0].value = "0" + warm[0].value;
						//warm[1].value = "0" + warm[1].value;
                   }
                }
            }
            if(ope == "moins"){
                if(warm[0].value>0 && warm[1].value>0){
                    warm[0].value = parseInt(warm[0].value) - parseInt(temps);
					warm[1].value = parseInt(warm[1].value) - parseInt(temps);
                    if(warm[0].value<10 && warm[1].value<10){
						//warm[0].value = "0" + warm[0].value;
						//warm[1].value = "0" + warm[1].value;
                    }
                }
            }
        
    }
	
	//Décompte du temps de préparation
	function decompte_warmup() {
		if (seconds>=0){
			document.getElementById('CompteARebours_Warmup').innerHTML= seconds;
			if(seconds<10) {
				document.getElementById('CompteARebours_Warmup').innerHTML="0"+seconds;
				if (seconds==3) {}	//jouer le son "3" (non trouvé)
				if (seconds==2) {}	//jouer le son "2" (non trouvé)
				if (seconds==1) {}	//jouer le son "1" (non trouvé)
			}
			if(seconds==0){
				document.getElementById('CompteARebours_Warmup').innerHTML="GO !!";
				//document.getElementById("0").play();	//jouer le son "0"
			}
			seconds--;
		}else {
			document.getElementById('chrono_warmup').style.display='none'; 
			document.getElementById('status').style.display='block';
			document.getElementById('CompteARebours_Warmup').innerHTML="Prêt ?";
			LancerPartie=1;
			clearInterval(idWarmup);	//stop le timer
			LancerJeu();				//lancement de la partie
		}
	}
	
	//Lancement du temps de préparation + vidage de la bdd
	function AppelleGo() {
		var warm_value=document.getElementsByClassName("warm");
		document.getElementById('JOUER').style.display='none';
		document.getElementById('chrono_warmup').style.display='block';
		document.getElementById('btn_score').disabled=true;
		
		seconds=warm_value[0].value;
		
		$.ajax({				//vidage de la bdd
			async: true,
			type: "POST",
			url: "Erase.php",
			data: "",
			dataType: "html",
			success :function(data) {
				for (var c=1; c<=nb_joueurs; c++) {
					document.getElementById("SCORE"+c).innerHTML = "0";
				}
			}
		});
        
		idWarmup=setInterval(decompte_warmup,1000);		//lance le temps de préparation
	}

	//Lancement de la partie
	function LancerJeu() {
			switch(modedejeu){
			case 'CONTRAT':
				CONTRAT();
			break;
			case 'MARATHON':
				MARATHON();	//pas touché
			break;
			}	
		
		
	}
	
	//temps de préparation + temps des intervalles + lancement de la partie (pas au point et onglet disabled)
	function AppelleGoAvances() {
		var warm_value=document.getElementsByClassName("warm");
		document.getElementById('JOUER').style.display='none';
		document.getElementById('chrono_warmup').style.display='block';
		
		seconds=warm_value[0].value;
		
		//IntervalON=document.getElementById("IntervalON").value;
		//IntervalOFF=document.getElementById("IntervalOFF").value;
		//TouchTime=document.getElementById("TouchTime").value;
        
		idWarmup=setInterval(decompte_warmup,1000);
	}
	
	//Scan du réseau pour la détection des cibles
	function ScanReseau(){
			CIBLES_POUR_JOUER.forEach(function(){CIBLES_POUR_JOUER.shift();});
			id=1;	//id dynamique
			var vaciar = document.getElementById("success");
			var vaciar_div_points = document.getElementById("points");
				while(vaciar.firstChild){
					vaciar.removeChild(vaciar.firstChild);
				}
				while(vaciar_div_points.firstChild){
					vaciar_div_points.removeChild(vaciar_div_points.firstChild);
				}
			if(IP_DES_CIBLES_LOCAL.length>0){			//si il y a des cibles enregistrées avant un scan
				IP_DES_CIBLES_LOCAL.forEach(function(g){
					$.ajax({
						async: false,
						type: "GET",
						url: "form.php",
						data: {"SUP_IP":g},
						dataType: "html",
					});
				
				});
				IP_DES_CIBLES_LOCAL.length=0;
			}
			$.ajax({			//lecture des IPs de la bdd
				async: true,
				type: "POST",
				url: "LectureIP.php",
				data: "",
				dataType: "json",
				success: function(data, textStatus){
					if(textStatus=="success"){
						IP_DES_CIBLES = data;
						
						var busqueda = document.getElementById('IP_Base').innerHTML;
						var s;
						for(s=2; s<=254; s++){
							var p=false;
							if(IP_DES_CIBLES.length == 0){		//si aucune cible n'est enregistrée dans la bdd
								$.ajax({
									async:	true, 
									type: "GET",
									url: busqueda+s,
									data: "Start",
									dataType:"html",
									success: function(data, textStatus, jqXHR){
										if(textStatus == "success"){
											var buscar_IP_cible = "IP:";
											var buscar_ID_cible = "id:";
											var buscar_IP_FIN = "</html>";
											var pos_IP_cible = data.indexOf(buscar_IP_cible);
											var pos_ID_cible = data.indexOf(buscar_ID_cible);
											var IP_cible = data.substr(pos_IP_cible+4);
											var ID_cible_bis = data.substr(pos_ID_cible+4);
												if (IP_cible.length <= 30) {
													var pos_IP_FIN = IP_cible.indexOf(buscar_IP_FIN);
													var pos_ID_FIN = ID_cible_bis.indexOf("IP:");
													IP_cible = IP_cible.substr(0,pos_IP_FIN-2);
													//ID_cible = ID_cible.substr(0,pos_ID_FIN-2);
													ID_cible=id;
									
													var P_IP = document.createElement("p");
													var A_IP = document.createElement("a");
													var btn_conectar = document.createElement("button");
													var btn_test = document.createElement("button");							
									
													var A_Text = document.createTextNode("CIBLE " + ID_cible + " ");
													var btn_connecter_Text = document.createTextNode('CONNECTER');
													var btn_test_Text = document.createTextNode('TEST');								
									
													P_IP.className = "CIBLES w3-border w3-border-grey w3-round-xlarge w3-bar";
													P_IP.setAttribute("style","width:90%");
													A_IP.setAttribute("style", "font-size:20px");
													btn_conectar.className = "w3-button w3-green w3-round";
													btn_conectar.setAttribute("onClick", "IP('"+ IP_cible +"','"+ ID_cible +"')");
													btn_conectar.setAttribute("style", "font-size:20px");
													btn_test.className = "w3-button w3-khaki w3-round";
													btn_test.setAttribute("onClick", "TESTCIBLES('"+IP_cible+"')");			
													btn_test.setAttribute("style", "font-size:20px");							
													btn_conectar.id = "Cible"+ID_cible;
													btn_test.id = "Test_Cible"+ID_cible;										
									
													if (typeof(Storage) !== "undefined") {
														IP_cible=IP_cible.substr(9);
														sessionStorage.setItem(IP_cible, ID_cible);
													}else {
														alert("Sorry, your browser does not support Web Storage...");
													}
									
													btn_conectar.appendChild(btn_connecter_Text);
													btn_test.appendChild(btn_test_Text);									
													A_IP.appendChild(A_Text);
													P_IP.appendChild(A_IP);
													P_IP.appendChild(btn_conectar);
													P_IP.appendChild(btn_test);													
													document.getElementById('success').appendChild(P_IP);
									
													id++;
												}
								
										}
									}
								});
							}
							else{					//sinon, si il y en a, on n'envoie pas de requêtes à leur adresse
								for(var t=0; t<IP_DES_CIBLES.length; t++){
									if(s==IP_DES_CIBLES[t]){p=true;}
								}
								if(p!=true){
									$.ajax({
										async:	true, 
										type: "GET",
										url: busqueda+s,
										data: "Start",
										dataType:"html",
										success: function(data, textStatus, jqXHR){
											if(textStatus == "success"){
												var buscar_IP_cible = "IP:";
												var buscar_ID_cible = "id:";
												var buscar_IP_FIN = "</html>";
												var pos_IP_cible = data.indexOf(buscar_IP_cible);
												var pos_ID_cible = data.indexOf(buscar_ID_cible);
												var IP_cible = data.substr(pos_IP_cible+4);
												var ID_cible_bis = data.substr(pos_ID_cible+4);
													if (IP_cible.length <= 30) {
														var pos_IP_FIN = IP_cible.indexOf(buscar_IP_FIN);
														var pos_ID_FIN = ID_cible_bis.indexOf("IP:");
														IP_cible = IP_cible.substr(0,pos_IP_FIN-2);
														//ID_cible = ID_cible.substr(0,pos_ID_FIN-2);
														ID_cible=id;
									
														var P_IP = document.createElement("p");
														var A_IP = document.createElement("a");
														var btn_conectar = document.createElement("button");
														var btn_test = document.createElement("button");							
									
														var A_Text = document.createTextNode("CIBLE " + ID_cible + " ");
														var btn_connecter_Text = document.createTextNode('CONNECTER');
														var btn_test_Text = document.createTextNode('TEST');								
									
														P_IP.className = "CIBLES w3-border w3-border-grey w3-round-xlarge w3-bar";
														P_IP.setAttribute("style","width:90%");
														A_IP.setAttribute("style", "font-size:20px");
														btn_conectar.className = "w3-button w3-green w3-round";
														btn_conectar.setAttribute("onClick", "IP('"+ IP_cible +"','"+ ID_cible +"')");
														btn_conectar.setAttribute("style", "font-size:20px");
														btn_test.className = "w3-button w3-khaki w3-round";
														btn_test.setAttribute("onClick", "TESTCIBLES('"+IP_cible+"')");			
														btn_test.setAttribute("style", "font-size:20px");							
														btn_conectar.id = "Cible"+ID_cible;
														btn_test.id = "Test_Cible"+ID_cible;										
									
														if (typeof(Storage) !== "undefined") {
															IP_cible=IP_cible.substr(9);
															sessionStorage.setItem(IP_cible, ID_cible);
														}else {
															alert("Sorry, your browser does not support Web Storage...");
														}
									
														btn_conectar.appendChild(btn_connecter_Text);
														btn_test.appendChild(btn_test_Text);									
														A_IP.appendChild(A_Text);
														P_IP.appendChild(A_IP);
														P_IP.appendChild(btn_conectar);
														P_IP.appendChild(btn_test);													
														document.getElementById('success').appendChild(P_IP);
									
														id++;
													}
								
											}
										}
									});
								}
							}
							}
					}
				}
			});
	}
	
	//Test les LEDs des cibles
	function TESTCIBLES(ip_cibles) {
		var reseau=document.getElementById('IP_Base').innerHTML;
		var fin=ip_cibles.substring(9);
		$.ajax({
			async:	true, 
			type: "GET",
			url: reseau+fin,
			data: "Start",
			dataType:"html",
			success: function(data, textStatus, jqXHR){
				alert("success !!");
								
			}
		});
	}
	
	//Enregistrement des cibles pour le jeu
	function IP(CIBLE_IP,ID){
			var ejecutar = true;
			var CIBLE_IP_COUPEE = CIBLE_IP.substr(9); 		//récupération de la fin des IPs (10.3.141.X)
			for(var existe = 0; existe <= CIBLES_POUR_JOUER.length; existe++){	
				if(CIBLES_POUR_JOUER[existe]){
					if(CIBLES_POUR_JOUER[existe] == CIBLE_IP){	//si l'IP d'entrée est déja dans le tableau on la supprime du tableau 
						$.ajax({								//et de la bdd
							async: true,
							type: "GET",
							url: "form.php",
							data:{"SUP_IP":CIBLE_IP_COUPEE},
							dataType: "html",
						});
						CIBLES_POUR_JOUER.splice(existe, 1);
						IP_DES_CIBLES_LOCAL.splice(existe,1);
						ejecutar = false;
						document.getElementById("Cible"+ID).innerHTML = "CONNECTER";
						document.getElementById("Cible"+ID).className = "w3-button w3-green w3-round";
						document.getElementById("Gestion").removeChild(document.getElementById("GestionCible"+ID));
						document.getElementById("points").removeChild(document.getElementById("SC"+ID));
						nb_joueurs--;
						//alert("DÉCONNECTÉ!");
					}
				}
			}
			if(ejecutar){					//sinon
				ip = "http://" + CIBLE_IP;		
				$.ajax({					//modification de l'id de la cible (facultatif)
					async: true,
					type: "GET",
					url: ip,
					data: {"Nv_ID":ID},
					dataType: "html",
				});
				$.ajax({					//stockage de l'ip dans la bdd (multi sessions)
					async: true,
					type: "GET",
					url: "form.php",
					data: {"IP":CIBLE_IP_COUPEE},
					dataType: "html",
				});
				CIBLES_POUR_JOUER.push(CIBLE_IP);
				IP_DES_CIBLES_LOCAL.push(CIBLE_IP_COUPEE);
				document.getElementById("Cible"+ID).innerHTML = "DÉCONNECTER";
				document.getElementById("Cible"+ID).className = "w3-button w3-red w3-round";
				nb_joueurs++;
				//------------Création du contenu de la fenêtre gestion---------------------------------------------
				var div_gestion = document.getElementById("Gestion");
				
				var section_gestion = document.createElement("p");
				var centrer_gestion = document.createElement("center");
				var tableau_gestion = document.createElement("table");
				var ligne_tableau_gestion = document.createElement("tr");
				var colonne_cible_gestion = document.createElement("th");
				var colonne_espace = document.createElement("td");
				var colonne_niveau = document.createElement("td");
				var nom_gestion = document.createElement("p");
				var blanc_gestion = document.createElement("p");
				var niveau_bat = document.createElement("img");
				
				var text_nom_gestion = document.createTextNode("CIBLE "+ID);
				var text_blanc_gestion = document.createTextNode("CIBLE "+ID);
				
				section_gestion.className="w3-border w3-border-grey w3-center";
				section_gestion.id="GestionCible"+ID;
				section_gestion.setAttribute("style","display:block")
				nom_gestion.setAttribute("style","font-weight:300; font-size:30px");
				blanc_gestion.className="w3-text-white";
				blanc_gestion.setAttribute("style","font-weight:300; font-size:30px");
				niveau_bat.id="Batterie_ID_"+ID;
				niveau_bat.setAttribute("src","img/1.png");
				
				nom_gestion.appendChild(text_nom_gestion);
				blanc_gestion.appendChild(text_blanc_gestion);
				colonne_cible_gestion.appendChild(nom_gestion);
				colonne_espace.appendChild(blanc_gestion);
				colonne_niveau.appendChild(niveau_bat);
				ligne_tableau_gestion.appendChild(colonne_cible_gestion);
				ligne_tableau_gestion.appendChild(colonne_espace);
				ligne_tableau_gestion.appendChild(colonne_niveau);
				tableau_gestion.appendChild(ligne_tableau_gestion);
				centrer_gestion.appendChild(tableau_gestion);
				section_gestion.appendChild(centrer_gestion);
				div_gestion.appendChild(section_gestion);
				

				//------------Création de l'espace pour l'affichage des scores--------------------------------------
				var div_points = document.getElementById("points");
									
				var div_espace_de_score_pour_cible = document.createElement("div");
				var centrer_laffichage_de_score = document.createElement("center");
				var tableau_pour_contenir_tous_les_scores = document.createElement("table");
				var ligne_du_tableau_du_dessus = document.createElement("tr");
				var colonne_pour_le_nom_de_la_cible = document.createElement("th");
				var colonne_pour_le_score_de_la_cible = document.createElement("td");
				var colonne_pour_le_mot_pts = document.createElement("td");
				var Nom_cible_joueur = document.createElement("p");
				var Affichage_des_points = document.createElement("p");
				var Affichage_du_mot_pts = document.createElement("p");
				var score_cible = document.createElement("a");
									
				var txt_Nom_cible_joueur = document.createTextNode("CIBLE "+ID+" :");
				var txt_Affichage_du_mot_pts = document.createTextNode("pts");
				var test_score = document.createTextNode("0");
									
				score_cible.id = "SCORE" +ID;
				score_cible.className = "SCORES";
				Nom_cible_joueur.className = 'C_Nom';
									
				Nom_cible_joueur.setAttribute("style", "font-weight:300; font-size:30px; font-weight:bold");
				Affichage_des_points.setAttribute("style", "font-weight:300; font-size:30px");
				Affichage_du_mot_pts.setAttribute("style", "font-weight:300; font-size:20px");
									
				Nom_cible_joueur.appendChild(txt_Nom_cible_joueur);
				colonne_pour_le_nom_de_la_cible.appendChild(Nom_cible_joueur);
				score_cible.appendChild(test_score);
				Affichage_des_points.appendChild(score_cible);
				colonne_pour_le_score_de_la_cible.appendChild(Affichage_des_points);
				Affichage_du_mot_pts.appendChild(txt_Affichage_du_mot_pts);
				colonne_pour_le_mot_pts.appendChild(Affichage_du_mot_pts);
				ligne_du_tableau_du_dessus.appendChild(colonne_pour_le_nom_de_la_cible);
				ligne_du_tableau_du_dessus.appendChild(colonne_pour_le_score_de_la_cible);
				ligne_du_tableau_du_dessus.appendChild(colonne_pour_le_mot_pts);
				tableau_pour_contenir_tous_les_scores.appendChild(ligne_du_tableau_du_dessus);
				centrer_laffichage_de_score.appendChild(tableau_pour_contenir_tous_les_scores);
									
									
				div_espace_de_score_pour_cible.id = "SC"+ID;
				div_espace_de_score_pour_cible.className = "MyScore w3-border w3-border-grey w3-round-large";
				div_espace_de_score_pour_cible.setAttribute("style","display:block");
							
				div_espace_de_score_pour_cible.appendChild(centrer_laffichage_de_score);
				div_points.appendChild(div_espace_de_score_pour_cible);
				
				//----------------------------------------------------------------------------------------------------
				
				document.getElementById("SC"+ID).style.display = 'block';
			}
	}
	
	
</script>
<script language="javascript" src="js/jeu2.js"></script>
</html>

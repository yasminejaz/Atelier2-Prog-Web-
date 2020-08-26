<?php

$nom=$_POST["Nom"];
$prenom=$_POST["Prenom"];
$DN=$_POST["DN"];
$LN=$_POST["LN"];
$email=$_POST["email"];
$Num=$_POST["Num"];
$adr=$_POST["adr"];
$Commune=$_POST["Commune"];
$Wilaya=$_POST["Wilaya"];
$Annee=$_POST["Annee"];
$AnneeF=$_POST["AnneeF"];
$AnneeD=$_POST["AnneeD"];
$Serie=$_POST["Serie"];
$Mention=$_POST["Mention"];
$Moy=$_POST["Moy"];
$Lyc=$_POST["Lyc"];
$Pfe=$_POST["Pfe"];

#fonction de clacul d'age
function age($DN){
	$dateN=preg_split("[-|/]", $DN);
	$t=time();
	$d=date("d m Y",$t);
	$d=explode(" ",$d);
	if($dateN[2]<$d[2] && ($dateN[1]<$d[1] || ($dateN[1]==$d[1] && $dateN[0]>=$d[0]))){
		return $d[2]-$dateN[2];
	}
		return $d[2]-$dateN[2]-1;
}

#verification du remplissage de tous les champs 
if (empty($nom) || empty($prenom) || empty($DN) || empty($LN) || empty($email) || empty($Num) || empty($adr) || empty($Moy) || empty($Lyc) || empty($Pfe) || $Commune=="vide" || $Wilaya=="vide" || $Annee=="vide" ||$AnneeD=="vide" || $AnneeF=="vide" ||$Serie=="vide" ||$Mention=="vide") {
	
		echo "<font size='5' color=red >Erreur ! Veuillez remplir tous les champs du formulaire.<a href= index.html >Revenir au formulaire.</a> </font>";
}
else{

  $Vnom=preg_match("#^[A-Za-z][a-z]([a-z]*([-|\s]{1}[A-Z])?[a-z]+)*$#", $nom); #verifie le format du nom
  $Vpre=preg_match("#^[A-Za-z][a-z]([a-z]*([-|\s]{1}[A-Z])?[a-z]+)*$#", $prenom); #verifie le format du prenom
  $VDate=preg_match("#\d{2}\s?/\s?\d{2}\s?/\s?\d{4}|\d{2}\s?-\s?\d{2}\s?-\s?\d{4}#",$DN); #verifie le fromat de la date aka: jj/mm/aaaa ou jj-mm-aaaa avec ou sans espace avant ou/et apres le separateur 
  if($VDate){
  	$date=preg_split("[\s?-\s?|\s?/\s?]", $DN); #split de la date pour verifier sa validité 
 	 $Vdate=checkdate($date[1], $date[0], $date[2]); #verification de la validité de la date 
 	 if($Vdate && $Vnom && $Vpre){ #pour l'affichage du Bievenue prenom_nom_age.
  		$age= age($DN);
  		echo "<h1 align= right valign=top > <font color=#ffa41b > Bienvenue ".$prenom." ".$nom." ".$age." ans </font>";
	  }
	}else{
	  	echo "<h1 align= right valign=top > <font color=#ffa41b > Bienvenue ?? ?? ?? ans </font>";
 }
 ?>



<html>
	<head>
	
		<title> Atelier 2</title>
	
	</head>

<body style="color: darkblue;">

<table bordercolor="red" border="3" bgcolor="white" align="left" width="750" cellpadding="8" cellspacing="0" >

	<tr> <!--Section 1-->

		<td rowspan="3"> <!--element sec1-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0" >
				<tr>

					<td>
						
						<section>
								<h1 align="center" style="color: red;font-family: comic sans ms;"><a href="Pages/index.html"><img src="Images/photo1.jpg"  style="float: right;"></a>Informations Personelles</h1>
								<a name="#infoPers"></a>
							<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<table>
											<tr>
												<td align="right">
												<strong style="color: black;">Nom:</strong><br>
												<strong style="color: black">Prenom:</strong><br>
												<strong style="color: black">Date de Naissance:</strong> <br>
												<strong style="color: black">Lieu de Naissance:</strong> <br>
												</td>
												<td>
												<?php 
													if($Vnom){
															echo $nom;
													}else{ #message d'erreur
														echo "<font color=red > Erreur!, Nom non conforme.<a href= index.html >Revenir au formulaire.</a></font>";} 
												?><br>
													
												<?php 
													if($Vpre){
															echo $prenom;
													}else{#message d'erreur
														echo "<font color=red > Erreur!, Prenom non conforme.<a href= index.html >Revenir au formulaire.</a></font>";} 
												?><br>
													<?php 
													if($VDate && $Vdate){ # si date conforme au format et est valide alors afficher la date
															echo $DN;
														
													}else{#message d'erreur
														echo "<font color=red > Erreur!, Date non conforme ou erroné.<a href= index.html >Revenir au formulaire.</a></font>";} 
													?><br>
														
													<?php echo $LN; ?><br>													
												</td>
											</tr>
										</table>
									</td>
								</tr>
								
							</table>

						</section>

					</td>
					
				</tr>

			</table>
			<br>
		 <!--Section 2-->

		 <!--element sec2-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0">
				<tr>

					<td>
						<section>
								<h1 align="center" style="color: red;font-family:comic sans ms;">Informations de Contact</h1>
								<a name="#infoCon"></a>
							<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<table>
											<tr>
												<td align="right">
													<strong style="color: black">Adresse email: </strong><br>
													<strong style="color: black">Numero de t&#233;l&#233;phone:</strong> <br>
													<strong style="color: black">Adresse:</strong> <br>
													<strong style="color: black">Commune:</strong> <br>
													<strong style="color: black">Wilaya:</strong> <br>
												</td>
												<td>
													<a href='https://mail.google.com/' style="text-decoration-line: none">
														<?php echo $_POST["email"]; ?></a><br>
													<?php echo "+213 ".$_POST["Num"]; ?><br>
													<?php echo $_POST["adr"]; ?><br>
													<?php echo $_POST["Commune"]; ?><br>
													<?php echo $_POST["Wilaya"]; ?><br>
												</td>
											</tr>
										</table>
									</td>	
								</tr>

							</table>

						</section>

					</td>
					
				</tr>

			</table>


			<br>

	<!--Section 3-->

		 <!--element sec3-->

			<table bordercolor="orange" border="2" bgcolor="grey" width="100%" cellpadding="6" cellspacing="0">
				<tr>

					<td>
						<section>
								<h1 align="center" style="color: red;font-family:comic sans ms;">Informations sur Cursus</h1>
								<a name="#infoCur"></a>
							<table bordercolor="black" border="1" bgcolor="#f1e3cb" width="100%" cellpadding="0" cellspacing="0">
								<tr>
									<td>
										<ol>
											<li >
											<strong style="color: black">Cycle Secondaire: </strong>
												<ul><br>
													<li>
														<strong style="color: black">Lyc&#233;e:</strong> <?php echo $_POST["Lyc"]; ?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de d&#233;but:</strong>
														<?php 
															if($AnneeF-"3">=$Annee)
																{echo $Annee; 
																}else{
																	echo "<font color=red > Erreur!, Verifiez la date choisi.<a href= index.html >Revenir au formulaire.</a></font>";
																}
														?>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de fin:</strong> <?php echo $_POST["AnneeF"]; ?>
													</li>
												</ul>
											</li>
											<br>
											<li>
												<strong style="color: black">Bac:</strong>
												<ul>
													<li>
														<dl>
															<dt>
																<strong style="color: black">S&#233;rie:</strong>
															</dt>
															<dd>
																<?php echo $_POST["Serie"]; ?>
															</dd>
															
														</dl>
													<li>
														<dl>
															<dt>
																<strong style="color: black">Mention:</strong>
															</dt>
															<dd><?php echo $_POST["Mention"]; ?></dd>
														</dl>
													</li>
													<li>
														<strong style="color: black">Moyenne:</strong> 
														<?php 
															if($Moy<="19.99" && $Moy>="10.00") 
																{ echo $Moy; 
																	}else {
																	echo "<font color=red > Erreur!, Moyenne erroné.<a href= index.html >Revenir au formulaire.</a></font>";
																}?>
													</li>
												</ul>
											</li>
											<br>
											<li>
												<strong style="color: black">Cycle Universitaire:</strong>
												<ul><br>
													<li>
														<strong style="color: black">Universit&#233;:</strong>
														<a href='https://www.usthb.dz/' style="text-decoration-line:  none"> U.S.T.H.B </a>
													</li>
													<li>
														<strong style="color: black">Ann&#233;e de debut:</strong> 
														
														<?php 
															if($AnneeF<=$AnneeD)
																{echo $_POST["AnneeD"];
																}else{
																	echo "<font color=red > Erreur!, Verifiez la date choisi.<a href= index.html >Revenir au formulaire.</a></font>";
																} 
														?>
													
													</li>
													<li>
														<strong style="color: black">Titre P.F.E:</strong> <?php echo $_POST["Pfe"]; ?>
													</li>
												</ul>
											</li>
										</ol>
									</td>
								</tr>

							</table>	
	
						</section>

					</td>
					
				</tr>

			</table>


		
</table>


</body>


</html>


<?php  } 
?>
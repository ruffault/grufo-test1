<h3> Entrez ou modifiez les caractéristiques d'un bug ou d'une évolution </h3>

<p> pour valider appuyez sur le bouton OK </p>

<?php
$demande=give_demande($_GET['demande']);
?>
<form action ="../inc/majdemande.inc.php" method="post"> 
	<p>
		<label for="id_dev">id_dev</label> : 
		<input type="text" name="id_dev" <?php echo 'value="' .(isset($demande['id_dev']) ? $demande['id_dev'] : '')  .'";'?> id="id_dev"/>
		<p> Nature de votre demande?<br />
		<input type="radio" name="type_dev" value="bug" id="type_dev" <?php  if (isset($demande['type_dev'])) echo(($demande['type_dev'] == "bug") ? "checked" : '');?>/>
		<label for="type_dev">Bug</label><br />
		<input type="radio" name="type_dev" value="évolution" id="type_dev" <?php  if (isset($demande['type_dev'])) echo(($demande['type_dev'] == "évolution") ? "checked" : '');?>/>
		<label for="type_dev">Evolution</label><br />
		</p>

		<fieldset>
		<legend>Description de la demande</legend>

		<label for="venant_de">Venant de</label> :
		<input type="text" name="venant_de" <?php echo 'value="' .(isset($demande['venant_de']) ? $demande['venant_de'] : '')  .'";'?> id="venant_de"/>
		
		</label for="url_vue"> URL de la  page</label> :
		<input type="url" name="url_vue" <?php echo 'value="' . (isset($demande['url_vue']) ? $demande['url_vue'] : '') .'";'?> id="url_vue"/>

		<label for="url_vraie">   URL retranscrite</label> :
		<input type="url" name="url_vraie" <?php echo 'value="' . (isset($demande['url_vraie']) ? $demande['url_vraie'] : '') .'";'?> id="url_vraie"/><br/><br/>
		<label for="des_bug">décrire le bug en indiquant un résumé dans la première ligne</label> <br/>
		<textarea name="des_bug"  id="des_bug" rows="5" cols="150">
		<?php echo (isset($demande['des_bug']) ? $demande['des_bug'] : '') ?></textarea><br/>
		<label for="cop_col_bug">Copié-collé de sa manifestation </label>: 
		<input type="text" name="cop_col_bug" <?php echo 'value="' . (isset($demande['cop_col_bug']) ? $demande['cop_col_bug'] : '') .'";'?> id="cop_col_bug"/><br/>
		<label for="des_evol">décrire l'évolution souhaitée en indiquant un résumé dans la première ligne</label> <br/>
		<textarea name="des_evol"  id="des_evol" rows="5" cols="150">
		<?php echo  (isset($demande['des_evol']) ? $demande['des_evol'] : '') ;?></textarea><br />
		<label for="des_image">insérer schéma/image correspondante</label> :
		<input type="" name="des_image" <?php echo 'value="' . (isset($demande['des_image']) ? $demande['des_image'] : '') .'";'?> id="des_image"/>

		</fieldset>

		<fieldset>
		<legend>Identification de la demande</legend>

		<label for="auteur">Demandé par</label> :
		<input type="" name="auteur" <?php echo 'value="' . (isset($demande['auteur']) ? $demande['auteur'] : '') .'";'?> id="auteur"/>
		<label for="mail_auteur">       mail du demandeur</label> :
		<input type="email" name="mail_auteur" <?php echo 'value="' . (isset($demande['mail_auteur']) ? $demande['mail_auteur'] : '') .'";'?> id="mail_auteur"/>

		</fieldset>

		<fieldset>
		<legend>Et tout ça c'est pour quand?</legend>

		<label for="date_demande">date de la demande</label> :
		<input type="date" name="date_demande" <?php echo 'value="' . (isset($demande['date_demande']) ? $demande['date_demande'] : '') .'";'?> id="date_demande"/>
		<label for="date_souhait">         date souhaitée réalisation</label> :
		<input type="date" name="date_souhait" <?php echo 'value="' . (isset($demande['date_souhait']) ? $demande['date_souhait'] : '') .'";'?> id="date_souhait"/><br />
		<label for="date_pec">date de prise en charge</label> :
		<input type="date" name="date_pec" <?php echo 'value="' . (isset($demande['date_pec']) ? $demande['date_pec'] : '') .'";'?> id="date_pec"/>
		
		<label for="date_prev">          date prévue réalisation</label> :
		<input type="date" name="date_prev" <?php echo 'value="' . (isset($demande['date_prev']) ? $demande['date_prev'] : '') .'";'?> id="date_prev"/>
		
		<label for="date_reel">date_reel</> :
		<input type="date" name="date_reel" <?php echo 'value="' . (isset($demande['date_reel']) ? $demande['date_reel'] : '') .'";'?> id="date_reel"/>

		</fieldset>

		<fieldset>
		<legend>Le coin des besogneux</legend>

		<label for="charge_prev">charge prévisionelle en jours/homme</label> :
		<input type="number" name="charge_prev" <?php echo 'value="' . (isset($demande['charge_prev']) ? $demande['charge_prev'] : '') .'";'?> id="charge_prev"/>
		<label for="charge_reel">           charge constatée en jours/homme</label> :
		<input type="number" name="charge_reel" <?php echo 'value="' . (isset($demande['charge_reel']) ? $demande['charge_reel'] : '') .'";'?> id="charge_reel"/><br />
		
		<label for="devloper">mon développeur</label> :
		<input type="text" name="devloper" <?php echo 'value="' . (isset($demande['devloper']) ? $demande['devloper'] : '') .'";'?> id="devloper"/>
		
		<label for="mail_devloper">         mail du développeur</label> :
		<input type="email" name="mail_devloper" <?php echo 'value="' . (isset($demande['mail_devloper']) ? $demande['mail_devloper'] : '') .'";'?> id="mail_devloper"/><br />
		
		<label for="prog_fic">sur plusieurs lignes les fichiers/progammes touchés</label> <br/>
		<textarea name="prog_fic"  id="prog_fic" rows="10" cols="80">
		<?php echo  (isset($demande['prog_fic']) ? $demande['prog_fic'] : '') ;?></textarea>
		</fieldset>

		<input type= "submit" value= "Enregistrer"/>
	</p>
</form>
	 
	 

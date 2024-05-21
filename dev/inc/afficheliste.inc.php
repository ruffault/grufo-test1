<h2>Les demandes déjà enregistrées</h2>

<table class="table table-brdered" id="stat">
<table> 
	<tr  border=5px,solid,black border-top=5px,solid,black >
		<th width= 7%>Type</th>
		<th width= 17%>demandé par</th>
		<th width=40%>en résumé</th>
		<th width=14%>demandé le</th>
		<th width=14%>prévu le</th>
		<th width=14%>en détail</th>
	</tr>

<?php
$liste= give_demandes();
//var_dump($liste);
foreach ($liste as  $value){
	echo "<tr border-bottom=3px,solid,black>";
	echo '    
				
				<td width=7% >' . $value['type_dev'] . '	</td>
				<td width=17%>' . $value['auteur'] . '</td>
				<td width=40%>' . (($value['type_dev'] == 'bug') ? $value['des_bug']: $value['des_evol']) . '</td>
				<td width=14%>' . $value['date_demande'] . '</td>
				<td width=14%>' . $value['date_prev'] . '</td>
				<td width=14%> <a href=' . $urlsite . 'dev_index.php/?demande=' .$value['id_dev'] .'>détail?</a>
				</tr>';
}

?>
</table>
<p text-align=center font-weight=bold> <a href=<?php echo '"' . $urlsite . "dev_index.php/?demande=0" .'"';?> >           Pour ajouter une demande:</a></p>

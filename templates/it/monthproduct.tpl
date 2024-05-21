<h3>Prodotti del mese</h3>
<div id="monthproduct"class="border">

<a href="{$urlsite}{$monthproduct.id_produit|product_link:$monthproduct.nom:$monthproduct.categorie}" style="text-decoration: none;">
<img src="{$urlsite}picproduct/{$monthproduct.id_produit}_icon.jpg" alt="" />
</a><br />
<h4>
<a href="{$urlsite}{$monthproduct.id_produit|product_link:$monthproduct.nom:$monthproduct.categorie}">
{$monthproduct.nom|utf8_encode}</a>
</h4>
</div>

<div id="modifpref">
  {if ($error_modif && $smarty.post.modifpref) or !$smarty.post.modifpref}
    <h2><span class="deco">></span>Personal Information</h2>
  
    <p>
      You can modify your personal information. 
      You can also change your password.
    </p>
    
    {if $error_modif}
    <div id="erreur">
    <h3>Information missing! Some fields are incomplete:</h3>
    <p>

			{if $error_modif.noname == 1}
				Last name not filled in <br />
			{/if}

			{if $error_modif.nosurname == 1}
				First name not filled in <br />
			{/if}
					
			{if $error_modif.noadress == 1}
				Address 1 not filled in<br />
			{/if}	
		
			{if $error_modif.nocity == 1}
				City not filled in<br />
			{/if}	

			{if $error_modif.nocp == 1}
				Invalid post code<br />
			{/if}	

			{if $error_modif.nophone == 1}
				Invalid telphone number<br />
			{/if}	
			
			{if $error_modif.nofax == 1}
				Invalid fax number<br />
			{/if}	
						
			{if $error_modif.noemail == 1}
				Email not filled in<br />
			{/if}	

			{if $error_modif.nopass == 1}
				You have entered your password incorrectly<br />
			{/if}	

			{if $error_modif.badconf == 1}
				The password and its confirmation are different<br />
			{/if}

			{if $error_modif.badpass == 1}
				New password invalid. The password must have at least 6 characters<br />
			{/if}	
		
		</p>
    </div>
    {/if}

    <p><em>Fields marked by * must be completed.</em></p>

    <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>
      <h3>Contact Information</h3>

      <p class="field">
      <label for="i_civilite">*Title</label>
  		{if $smarty.post.account_civilite == 1}
        <input type='radio' id="i_civilite" name='account_civilite' value='1' checked='checked' /> Mr.
      {else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='1' /> Mr.
  		{/if}
      {if $smarty.post.account_civilite == 2}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' checked='checked' /> Mrs.
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='2' /> Mrs.
  		{/if}
      {if $smarty.post.account_civilite == 3}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' checked='checked' /> Miss
  		{else}
  			<input type='radio' id="i_civilite" name='account_civilite' value='3' /> Miss
      {/if}
      </p>
      <p class="field">
        <label for="i_nom">*Name</label><input type="text" name="account_nom" value="{$smarty.post.account_nom}" />
      </p>
      <p class="field">
        <label for="i_prenom">*First Name</label><input type="text" name="account_prenom" value="{$smarty.post.account_prenom}" />
      </p>
      <p class="field">
        <label for="i_adresse1">*Address 1</label><input type="text" name="account_adresse1" value="{$smarty.post.account_adresse1}" />
      </p>
      <p class="field">
        <label for="i_adresse2">Address 2</label><input type="text" name="account_adresse2" value="{$smarty.post.account_adresse2}" />
      </p>
      <p class="field">
        <label for="i_adresse3">Address 3</label><input type="text" name="account_adresse3" value="{$smarty.post.account_adresse3}" />
      </p>
      <p class="field">
        <label for="i_cp">*Postal Code</label><input type="text" name="account_cp" value="{$smarty.post.account_cp}" />
      </p>
      <p class="field">
        <label for="i_ville">*City</label><input type="text" name="account_ville" value="{$smarty.post.account_ville}" />
      </p>
      <p class="field">
        <label for="i_etat">Country</label><input type="text" name="account_etat" value="{$smarty.post.account_etat}" />
      </p>
      <p class="field">
        <label for="i_tel">*Telephone</label><input type="text" name="account_tel" value="{$smarty.post.account_tel}" />
      </p>
      <p class="field">
        <label for="i_fax">Fax</label><input type="text" name="account_fax" value="{$smarty.post.account_fax}" />
      </p>
      <p class="field">
        <label for="i_email">*Email</label><input type="text" name="account_email" value="{$smarty.post.account_email}" />
      </p>
      <p class="field">
          <label for="i_mailing">Receive the newsletters</label>
        <select name="account_mailinglist">
    		{if $smarty.post.account_mailinglist == 1}
    		  <option value='1' selected='selected'>yes</option>
    		  <option value='0'>no</option>
    		{else}
          <option value='1'>yes</option>
    		  <option value='0' selected='selected'>no</option>
    		{/if}
        </select>
      </p><br />
      <p class="submit">
      <input type="submit" name="modifpref" value="Save" />
      </p>
      </fieldset>
      </form>
      
      <form method="post" action="{$urlsite}index.php?page=modifpref">
      <fieldset>      
      <h3>Password</h3>

      <p class="field">
        <label for="i_ancien">Old</label>
        <input type="password" name="account_oldpass" value="{$smarty.post.account_oldpass}" />
      </p>
      <p class="field">
        <label for="i_nouveau">New</label>
        <input type="password" name="account_newpass" value="{$smarty.post.account_newpass}" />
      </p>
      <p class="field">
        <label for="i_confpass">Confirmation</label>
        <input type="password" name="account_confpass" value="{$smarty.post.account_confpass}" />
      </p>
      <p class="submit">
      <input type="hidden" name="action" value="changepassword" />
      <input type="submit" name="modifpref" value="Save" />
      </p>
      </fieldset>
    </form>


  {elseif $smarty.post.modifpref}
    <h2><span class="deco">></span>Your personal information has been successfully modified</h2>
    <p>
      We have made the required modifications. Our 
      servers have been updated accordingly and the
      new information has been applied.
    </p>
  {/if}
  
</div>

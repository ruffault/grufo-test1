<?php /* Smarty version 2.6.31, created on 2019-11-17 22:58:42
         compiled from en/myaccount.tpl */ ?>
<div id="myaccount">
<h2><span class="deco">></span>My Account</h2>


<p>You can accesss all your information and follow-up your orders
in this personalised area.</p>
<?php if ($_SESSION['id_membre']): ?>
<ul>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=modifpref">Modify my information</a>
	<p>You can modify your address, password etc. here.</p></li>
	
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">Real-time order follow-up</a>
	<p>We keep you informed about each step of your order processing.
	Status is displayed in real-time, it is represented by a progress bar.
	Here, you can also find and consult your previous orders.</p></li>
  <li><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier">View basket</a>
	<p>View basket. All selected items are saved here. You may modify the quantity
	of each ordered item. It is also possible to put items aside for a future order.</p>
	</li>
</ul>
<?php else: ?>
<h3>Already registered? Please log in...</h3>
<form action="<?php echo $this->_tpl_vars['urlsite']; ?>
login.php" method="post">
<p>
	Alias <input type="text" value="" name="login_identification" />
	Pasword <input type="password" value="" name="password_identification" />
	<input type="submit" value="ok" name="submit_identification" />
</p>
<p>
  <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass'>Lost your password?</a>
</p>
</form>
<h3>Not yet registered?</h3>
<p><a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=forminscription&amp;newaccount=1">Register yourself</a>, it is quick and easy.</p>
<?php endif; ?>
</div>
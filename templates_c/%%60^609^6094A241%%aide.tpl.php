<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:07
         compiled from en/aide.tpl */ ?>
<div id='aideenligne'>
<h2><span class="deco">></span>Online help</h2>

<h3><span class="deco">></span><a href="#commentfonctionne">How does the interface work?</a></h3>
<ul>
<li><a href='#moncompte'>My account: making, modifying and following up orders</a></li>
<li><a href='#recherche'>Simple and advanced search</a></li>
<li><a href='#catalogue'>Catalogue</a></li>
<li><a href='#detail'>Information on the books</a></li>
</ul>

<h3><span class="deco">></span><a href="#commentcommander">How to order</a></h3>
<ul>
<li><a href='#panier'>Search for the items and add them to my basket</a></li>
<li><a href='#passer'>Make and order</a></li>
<li><a href='#suivre'>Order follow-up</a></li>
</ul>

<h3><span class="deco">></span><a href='#paiement'>Secure payment</a></h3>

<h3><span class="deco">></span><a href='#quisommenous'>About us</a></h3>

<h3><span class="deco">></span><a href="#nouscontacter">How to contact us</a></h3>

<h3><span class="deco">></span><a href='#faq'><acronym title='Frequently Asked Question'>FAQ</acronym> (Frequently Asked Questions)</a></h3>
<ul>
<li><a href='#passperdu'>What to do if you forget or lose your password</a></li>
</ul>
<br /><br /><br /><br />
<h2 id="commentfonctionne"><span class="deco">></span>How does the interface work?</h2>
<h3 id="moncompte"><span class="deco">></span>My account</h3>
<p>We recommend that you now create your own account on dicoland.com.
Once registered, you can <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php'>confirm your orders</a>
more rapidly, save your <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier'>basket</a> and receive our newsletter if you
so wish.</p>
<p>You will be registered with Dicoland.com as soon as you have made your first order.
You will then have an alias and password that identifies you on Dicoland.com. This enables you follow the correct progres
of your order online in the  <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">follow up my
orders</a> section. You will also find the entire history of your purchases.</p>
<p>You can also change your personal details and password in the
"change my preferences" section. This is also the area where you can 
decide whether or not to subscribe to our newsletter.</p>
<p>However, if you still do not want to register yourself, you can
continue to browse on Dicoland.com and products to your basket.</p>

<h3 id="recherche"><span class="deco">></span>Simple and advanced searches</h3>
<p>Two differents types of search are available on Dicoland.com.</p>
<ul>
<li><strong>Quick search</strong>
<p>The quick search feature is found on the orange bar at the top of the site.
It enables you to carry out a wide search on the name of a work and/or author, 
or even a subject. This is the search that provides the most results out of the
two available.
</p></li>
<li><strong>Advanced search</strong>
<p>The advanced search is available through the <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>Advanced search</a>
link to the right of the quick search function in the orange bar at the top of
the interface. This is where you can refine your search by defining several
criteria such as title, subject, author or language.
</p>
</li>
</ul>
<p>
You will be directed to the results page once the search is running.
If some of the subjects or categories correspond to the criteria requested, you will
find them in the "categories" box to the right of the result list for the
search.</p>
</div>
<h3 id='catalogue'><span class="deco">></span>Catalogue</h3>
<p>
<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html'>Catalogue</a> enables you to search for
items by subject. It functions at several levels, meaning that you can access
the main categories then the sub-categories. When you are in a sub-category, 
you can move back to the higher level category by clicking on the links
at the top of the catalogue. You can also move directly to the 
main page of the catalogue through the <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html">catalogue</a> link.</p>

<h3 id="detail"><span class="deco">></span>Detailed information</h3>
<p>When you have selected a product, you have access to the following information:</p>
<ul>

<li>Author
<p>This contains the name of the author of the work. If the author has written 
other works, they will be listed further on in the section
"by the same author". You can then visit the links to the other 
products.</p></li>

<li>Subject
<p>The subject corresponds to the catalogue category associated with the product. You 
will find the books dealing with the same subject in the "in the same
category" in the "by the same author" section.</p></li>

<li>Reference
<p>The reference is a code that Dicoland.com assigns to each product to
make it distinct from all the other products.</p></li>

<li>Availability<p>When the book is available, this word is displayed in
relation to the book. If the book is not available immediately,
another message will indicate the lead time.</p></li>

<li>Reference price
<p>This shows the price set by the publisher of the book.</p></li>

<li>Discount
<p>Some books have a discount. The discount given is then
indicated.</p></li>

<li>The price
<p>This corresponds to the price that Dicoland.com applies to the book. As with all
Dicoland.com prices, this may vary in line with certain events or situations
(please refer to the legal information).
Irrespective of whether you are a private individual or a professional, the prices are indicated as <acronym  title="Hors taxes">excl. VAT</acronym>
and <acronym title="Toute taxes comprises">incl. VAT</acronym>. 
</p></li>

<li>Cover
<p>You can display an image of most of the covers of the books. You can zoom in on
on these images by clicking on the image itself to view an enlarged version.</p></li>

<li>Description
<p>This is either a description or summary of the work,
to provide you with an idea of its contents before purchasing it.</p></li>

<li>Miscellaneous information
<p>This area contains other additional information. For
example, whether or not the book has a supplement, or whether it is part 
of a collection, etc.</p></li>

<li>Number of pages and number of terms
<p>These indications provide you with a better idea of the volume of the book.</p></li>

<li>Languags
<p>This section indicates all the languages of the book and the translation direction.</p></li>

<li>Index
<p>Indicates whether or not the book has an index.</p></li>

<li>The <em>Add to basket</em> button
<p>This button enables you to add a selected book to your basket.</p></li>
</ul>


<h2 id="commentcommander"><span class="deco">></span>How to order</h2>
<h3 id="panier"><span class="deco">></span>Looking for titles and adding them to my basket</h3>
<p>Adding books to your basket is easy. Just click on the "add to my basket"
button located on the details of the items
that interrest you.<br />
You will find the products on the main page by using the search engine, catalogue
or by browsing the links placed in the
various sheets.
</p>
<p>
You can then return to the basket to view and organise it. You can
modify the quantity of each book you require by changing the number
found in the relevant box and by clicking on "modify". You can also
remove a previously selected item by entering 0 and clicking on the
button.</p>

<p>If you wish to put items to one side for a future order,
please click on the "store" button. The marked articles will then be
listed in the "Stored items" section above the basket.
If you want to select an item previously set aside, all you have to do
is click on the "Add to basket" button.</p>

<h3 id="passer"><span class="deco">></span>Making an order</h3>

<p>As soon as you want make an order, click on <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php">Confirm
order</a> in your basket or in the menu bar on the right-hand of the screen.
If you are as yet unregistered with Dicoland.com, a form will prompt you to enter
your personal details. You must then indicate the address to be used for the
delivery. 
You then have the choice of receiving the invoice at another address. All that remains
is to specify the delivery mode (priority or second class) you require. 
The ordering procedure is almost over. You must finally choose a method of
payment and follow the instructions displayed.<br />
You will then receive an e-mail confirming reception of the order.</p>

<h3 id="suivre"><span class="deco">></span>Order follow-up</h3>

<p>Once your order is confirmed, you will be kept informed of its progress at each
stage in its processing.<br />Firstly, Dicoland.com verifies your order to check
that it is valid. If Dicoland.com finds no errors, your order is then accepted.
As soon as the payment is received, Dicoland.com prepares and dispatches
the order.<br />
You will be kept informed by e-mail at each of these stages. You can also follow-up 
your order in real-time on Dicoland.com under "my account" then "follow up the
real time status of my orders".
On this page, you can display the details of your orders and the advancement of their
preparation.
</p>

<h2 id="paiement"><span class="deco">></span>Secure payment?</h2>
<p>For total security of payment, dicoland.com redirects you to the secure online
payment service of the CIC bank, when you pay by credit card.
In this way, Dicoland.com has no knowledge of your personal bank information at
any moment. This information is encrypted when you make the payment on the
secure server of the bank. When you carry out this operation, you can see that
you are in a secure area by noting the display of a small padlock in the status
bar of your browser.</p>

<h2 id="nouscontacter"><span class="deco">></span>How to contact us</h2>
<p>It is easy to contact us.<br />You can use the special form provided in the
<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>contact</a> section. We will be delighted to reply
as rapidly as we can. If you want, you can also contact us by telephone on
+33 (0) 1 43 22 12 93 or by fax on +33 (0) 1 43 22 01 77.
</p>

<h3 id="faq"><span class="deco">></span><acronym title='Frequently Asked Question'>FAQ</acronym> (Questions Fréquemment Posées)</h3>
<h4 id="passperdu"><span class="deco">></span>How to recover a lost or forgotten password</h4>
<p>
  To obtain a new password that you should subsequently change, go to 
  <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">the password recovery
  form</a>. Enter the e-mail address that you provided during your registration.<br />
  You will then receive a new password that will enable you to connect to Dicoland.com 
  instantly.
</p>
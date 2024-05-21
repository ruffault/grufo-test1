<?php /* Smarty version 2.6.31, created on 2019-11-18 03:40:33
         compiled from es/aide.tpl */ ?>

<div id='aideenligne'>
<h2><span class="deco">></span>Ayuda en línea</h2>

<h3><span class="deco">></span><a href="#commentfonctionne">¿Cómo funciona la interfaz?</a></h3>
<ul>
<li><a href='#moncompte'>Mi cuenta: creación, modificación, mi pedido</a></li>
<li><a href='#recherche'>Búsqueda rápida y búsqueda avanzada</a></li>
<li><a href='#catalogue'>El catálogo</a></li>
<li><a href='#detail'>Datos de la obra</a></li>
</ul>

<h3><span class="deco">></span><a href="#commentcommander">¿Cómo comprar?</a></h3>
<ul>
<li><a href='#panier'>Buscar los artículos y añadirlos a mi cesta de la compra</a></li>
<li><a href='#passer'>Hacer un pedido</a></li>
<li><a href='#suivre'>Estado de mi pedido</a></li>
</ul>

<h3><span class="deco">></span><a href='#paiement'>Forma de pago segura</a></h3>

<h3><span class="deco">></span><a href='#quisommenous'>¿Quiénes somos?</a></h3>

<h3><span class="deco">></span><a href="#nouscontacter">¿Cómo ponerse en contacto con nosotros?</a></h3>

<h3><span class="deco">></span><a href='#faq'><acronym title='Frequently Asked Question'>FAQ</acronym> (Preguntas más frecuentes)</a></h3>
<ul>
<li><a href='#passperdu'>¿Cómo recuperar su contraseña perdida u olvidada?</a></li>
</ul>
<br /><br /><br /><br />
<h2 id="commentfonctionne"><span class="deco">></span>¿Cómo funciona la interfaz?</h2>
<h3 id="moncompte"><span class="deco">></span>Mi cuenta</h3>
<p>Le aconsejamos que se cree una cuenta en dicoland.com.
Cuando esté registrado, podrá <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php'>confirmar sus pedidos</a>
más rápido, guardar su <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=showpanier'>cesta</a> y, si lo desea, recibir nuestro 
boletín de información.</p>
<p>Después de realizar el primer pedido, estará registrado en Dicoland.com 
y dispondrá de un seudónimo y una contraseña que le permitirán
identificarse en Dicoland.com. También podrá consultar el estado 
de su pedido en la parte <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=oldcommande">estado de mi pedido</a>,así como todo el histórico de las compras efectuadas.</p>
<p>También puede modificar sus datos personales y
su contraseña en la zona "modificar mis preferencias". En esta misma zona deberá decidir
si desea recibir el boletín de información.</p>
<p>Si, por el momento, decide no recibirlo podrá
seguir navegando por Dicoland.com y añadir productos a su cesta de la compra.</p>

<h3 id="recherche"><span class="deco">></span>Búsqueda rápida y búsqueda avanzada</h3>
<p>Dicoland.com le permite realizar 2 tipos de búsqueda.</p>
<ul>
<li><strong>La búsqueda rápida</strong>
<p>La búsqueda rápida se encuentra en la barra naranja, en la parte superior del sitio.
Le permite realizar una busca aproximada del título de una obra y/o 
un autor o un tema. Esta es la forma de búsqueda que le permitirá obtener un mayor número
de resultados.
</p></li>
<li><strong>La búsqueda avanzada</strong>
<p>Podrá acceder a la búsqueda avanzada mediante el enlace <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=advancedsearch'>Búsqueda avanzada</a>
situado a la derecha de la búsqueda rápida, en la barra naranja que se encuentra en la parte superior
de la interfaz. Podrá precisar su búsqueda mediante
distintos criterios como el título, el tema, el autor o el idioma.
</p>
</li>
</ul>
<p>
Después de haber lanzado la búsqueda, llegará a la página de los resultados.
Si los temas o categorías corresponden con los criterios definidos, éstos aparecen
en el recuadro "categorías", a la derecha de los resultados de la 
búsqueda.</p>
</div>
<h3 id='catalogue'><span class="deco">></span>El catálogo</h3>
<p>
<a href='<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html'>El catálogo</a> le permite realizar búsquedas de
artículos por temas. Está organizado en varios niveles, es decir, usted puede acceder
a las categorías principales y de éstas a las secundarias. Cuando se encuentra en una categoría 
secundaria, puede acceder a la categoría de nivel superior haciendo clic en los
enlaces situados en la parte superior del catálogo. También puede acceder directamente
a la página principal del catálogo mediante el enlace <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
catalogue-0-tous.html">catálogo</a>.</p>

<h3 id="detail"><span class="deco">></span>Datos de la obra</h3>
<p>Después de seleccionar un producto tendrá acceso a los datos siguientes:</p>
<ul>

<li>Autor
<p>Encontrará aquí el nombre del autor de la obra. Si éste ha escrito
otras obras, encontrará la lista debajo, en la sección
"del mismo autor". En esta sección podrá visitar los enlaces hacia estos
productos.</p></li>

<li>Tema
<p>El tema corresponde a la categoría asignada al producto. Encontrará
las obras sobre el mismo tema en la sección "en la misma
categoría" situada en la sección "del mismo autor".</p></li>

<li>Referencia
<p>La referencia es un código asignado por Dicoland.com a los productos, para evitar
cualquier confusión entre productos.</p></li>

<li>Disponibilidad<p>Cuando una obra está disponible, se indica "disponible".
Si una obra no está disponible de inmediato,
aparece indicado el tiempo de aprovisionamiento.</p></li>

<li>Precio del editor
<p>Indica el precio fijdo por el editor.</p></li>

<li>Descuento
<p>Podrá obtener un descuento para determinadas obras. Aparece indicado el
precio con el descuento.</p></li>

<li>Precio
<p>Corresponde al precio que Dicoland.com aplica a la obra. Al igual que todos
los precios de Dicoland.com, éste pede variar en función de ciertos eventos
o circunstancias (ver las informaciones legales).
Los precios se indican <acronym  title="Hors taxes">sin IVA</acronym> y 
<acronym title="Toute taxes comprises">con IVA</acronym>
tanto para particulares como para profesionales. 
</p></li>

<li>Portada
<p>Puede visualizar la mayoría de las portadas de las obras. También 
puede ampliarlas haciendo clic sobre la imagen.</p></li>

<li>Descripción
<p>Puede tratarse de una descripción de la obra o de un resumen 
de ésta, que le permite hacerse una idea de la obra antes de comprarla.</p></li>

<li>Información diversa
<p>Encontrará información complementaria. Por 
ejemplo, si el libro posee o no un suplemento, si forma parte de una 
colección, etc.</p></li>

<li>Número de páginas y número de términos
<p>Estas dos indicaciones le permiten hacerse una idea del volumen de la obra.</p></li>

<li>Idiomas
<p>Se indica todos los idiomas en los que existe la obra, así como la lengua de partida y la lengua de llegada.</p></li>

<li>Índice
<p>Indica si la obra contiene un índice.</p></li>

<li>Botón<em>Añadir a la cesta de la compra</em>
<p>Este botón le permite añadir el producto seleccionado a su cesta de la compra.</p></li>
</ul>


<h2 id="commentcommander"><span class="deco">></span>¿Cómo hacer un pedido?</h2>
<h3 id="panier"><span class="deco">></span>Buscar los títulos y añadirlos a mi cesta de la compra</h3>
<p>Para añadir las obras a su cesta de la compra, sólo tiene que hacer un clic en el
botón "añadir a mi cesta de la compra" que encontrará en la información de los artículos
que le interesan.<br />
Puede buscar productos mediante una herramienta de búsqueda, en la página principal;
en el catálogo o haciendo clic en los enlaces de las fichas que contienen.
</p>
<p>
Después de haber realizado el pedido puede ir a su cesta y organizarla. Puede
modificar la cantidad de cada uno de los artículos seleccionados,
modificando el número de la casilla correspondiente y haciendo clic en 
"modificar". También puede dejar un artículo que había seleccionado introduciendo 0 ó haciendo clic
en el botón.</p>

<p>Si desea archivar artículos para un futuro pedido,
haga clic en el botón "archivar". Los artículos guardados se encuentran
en la sección "artículos archivados", debajo de la cesta de la compra.
Si desea volver a seleccionar un artículo que había archivado,
sólo tiene que hacer un clic en el botón "Añadir a la cesta de la compra".</p>

<h3 id="passer"><span class="deco">></span>Hacer un pedido</h3>

<p>Cuando desee pasar un pedido sólo tiene que hacer clic en <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
verifmembre.php">Confirmar el pedido</a> en su cesta de la compra o en su barra de menú situada a la derecha de la pantalla.
Si todavía no está registrado en Dicoland.com un formulario le permitirá
introducir sus datos personales. Deberá indicar la dirección a la que desee 
recibir su compra.
Existe la posibilidad de indicar otra dirección para recibir la factura.
A continuación, indique la forma de envío (urgente o económico).
Para finalizar, debe elegir la forma de pago
y seguir las instrucciones que aparecen.<br />
Recibirá un e-mail para confirmarle la recepción
de su pedido.</p>

<h3 id="suivre"><span class="deco">></span>Estado del pedido</h3>

<p>Después de haber confirmado su pedido, le mantendremos informado del estado de
su pedido.<br />Primeramente, Dicoland.com comprueba la validez
de su pedido. Si Dicoland.com no encuentra ningón error, su pedido es
aceptado. A partir de la recepción del pago, Dicoland.com procede al tratamiento
del pedido y a su envío.<br />
Será informado de cada una de estas etapas por e-mail. También puede consultar
el estado de su pedido directamente en Dicoland.com, en la sección
"mi cuenta" y "consultar el estado de mi pedido en directo".
En esta página podrá consultar el detalle de sus pedidos y su estado.
</p>

<h2 id="paiement"><span class="deco">></span>¿Pago seguro?</h2>
<p>Para un pago totalmente seguro, dicoland.com emplea el servicio de
pago en línea seguro del banco CIC, para realizar el pago de su
pedido mediante tarjeta de crédito, por lo que Dicoland.com no conoce en ningún momento
sus datos bancarios personales. Durante la realización de su pago en el servidor seguro del
banco, sus datos están cifrados. Así mismo, el candado que aparece en la barra de estado del
navegador durante esta operación, le indica que se encuentra en un espacio seguro.
</p>

<h2 id="nouscontacter"><span class="deco">></span>¿Cómo contactarnos?</h2>
<p>Ponerse en contacto con nosotros es muy fácil.<br />Puede utilizar el formulario
que se encuentra en la sección <a href='<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=contact'>contacto</a>. Estaremos encantados de responderle
lo antes posible. Si lo desea,también puede
ponerse en contacto con nosotros por teléfono al +33 (0) 1 43 22 12 93 ó por fax al +33 (0) 1 43 22 01 77.
</p>

<h3 id="faq"><span class="deco">></span><acronym title='Frequently Asked Question'>FAQ</acronym> (Preguntas más frecuentes)</h3>
<h4 id="passperdu"><span class="deco">></span>¿Cómo encontrar una contraseña perdida u olvidada?</h4>
<p>
  Para obtener una nueva contraseña que podrá modificar posteriormente vaya al
  <a href="<?php echo $this->_tpl_vars['urlsite']; ?>
index.php?page=lastpass">formulario de recuperación de contraseña</a>.
  Introduzca la misma dirección electrónica que había utilizado para la inscripción.<br />
  Recibirá una nueva contraseña que le permitirá 
  conectarse de inmediato a Dicoland.com.
    
    </p>
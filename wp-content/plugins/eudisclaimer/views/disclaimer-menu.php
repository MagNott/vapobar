<?php 
 
 if (!empty($_POST['message_disclaimer']) && !empty($_POST['url_redirection'])) {

 $text = new DisclaimerOptions(); 
 $text->setMessageDisclaimer($_POST['message_disclaimer']); 
 $text->setRedirectionko($_POST['url_redirection']); 

 DisclaimerGestionTable::insererDansTable($text->getMessageDisclaimer(), $text->getRedirectionko()); 

 $message = "Mise à jour bien effectuée";
 }


 $placeholder = DisclaimerGestionTable::getplaceholder()[0];


 ?>

<!-- ["message_disclaimer"]=> string(9) "Ho Ho Ho " ["redirection_ko"]=> string(14) "www.google.com" } -->



<h1>EU DISCLAIMER</h1>

<br>

<h2>Configuration</h2>

<p><strong style="color:green"><?php echo @$message; ?></strong></p>

<form method="post" action="" novalidate="novalidate">

    <table class="form-table">
        <tr>
            <th scope="row"><label for="blogname">Message du disclaimer</label></th>
            <td><input name="message_disclaimer" type="text" id="message_disclaimer"value="<?= $placeholder->message_disclaimer?>" class="regular-text" required /></td>
        </tr>
        <tr>
            <th scope="row"><label for="blogname">Url de redirection</label></th>
            <td><input name="url_redirection" type="text" id="url_redirection" value="<?= $placeholder->redirection_ko?>" class="regular-text" required/></td>
        </tr>
    </table>

    <p class="submit"><input type="submit" name="submit" id="submit" class="button button-primary" value="Enregistrer les modifications"/></p>

</form>

 <br>

<p>Exemple: La législation nous impose de vous informer sur la nocivité des 
produits à base de nicotine, vous devez avoir plus de 18 ans pour consulter 
ce site !</p>

<br>

<h3>
Centre AFPA / session DWWM 
</h3>

<img src="<?php echo plugin_dir_url( dirname( __FILE__ ) ) . 
'assets/img/layout_set_logo.jpg'; ?>" width="10%">
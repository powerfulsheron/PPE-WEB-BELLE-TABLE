<form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post">
	<?php
	echo'
	<input type="hidden" value="'.$totalcommande.'" name="amount" />';
	?>
	<input name="currency_code" type="hidden" value="EUR" />

	<input name="shipping" type="hidden" value="0.00" />

	<input name="tax" type="hidden" value="0.00" />
	<?php
	echo'
	<input name="return" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>

	<input name="cancel_return" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>

	<input name="notify_url" type="hidden" value="resumecommande.php?total='.$totalcommande.'&livraison='.$livraison.'&miseplace='.$miseplace.'&service='.$service.'&vaisselle='.$vaisselle.'&lessive='.$lessive.'"/>';
	?>
	<input name="cmd" type="hidden" value="_xclick" />

	<input name="business" type="hidden" value="testvendeur@belletable.com" />

	<input name="item_name" type="hidden" value="Commande BelleTable" />

	<input name="no_note" type="hidden" value="1" />

	<input name="lc" type="hidden" value="FR" />

	<input name="bn" type="hidden" value="PP-BuyNowBF" />

	<input name="custom" type="hidden" value="ID_ACHETEUR" />
	
	<p align="right"><input alt="Effectuez vos paiements via PayPal : une solution rapide, gratuite et sécurisée" name="submit" src="https://www.paypal.com/fr_FR/FR/i/btn/btn_buynow_LG.gif" type="image" /><img src="https://www.paypal.com/fr_FR/i/scr/pixel.gif" border="0" alt="" width="1" height="1" /></p>
	
</form>
<?php
function creationPanier(){
   if ((!isset($_SESSION['panier']))||($_SESSION['panier'] == "")){
      $_SESSION['panier']=array();
      $_SESSION['panier']['idproduit'] = array();
	  $_SESSION['panier']['libelleproduit'] = array();
      $_SESSION['panier']['qteProduit'] = array();
      $_SESSION['panier']['prixProduit'] = array();
   }
   return true;
}
include('parametres.php');
function ajouterArticle($idproduit,$qteProduit,$libel,$prix){

   //Si le panier existe
   if (creationPanier())
   {
      //Si le produit existe déjà on ajoute seulement la quantité
      $positionProduit = array_search($idproduit, $_SESSION['panier']['idproduit']);

      if ($positionProduit !== false)
      {
         $_SESSION['panier']['qteProduit'][$positionProduit] += $qteProduit ;
      }
      else
      {
         //Sinon on ajoute le produit
         array_push( $_SESSION['panier']['idproduit'],$idproduit);
		 array_push( $_SESSION['panier']['libelleproduit'],$libel);
         array_push( $_SESSION['panier']['qteProduit'],$qteProduit);
         array_push( $_SESSION['panier']['prixProduit'],$prix);
      }
   }
   else
   echo "Un problème est survenu veuillez contacter l'administrateur du site.";
}

function MontantGlobal(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['idproduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total;
}

function MontantGlobalTTC(){
   $total=0;
   for($i = 0; $i < count($_SESSION['panier']['idproduit']); $i++)
   {
      $total += $_SESSION['panier']['qteProduit'][$i] * $_SESSION['panier']['prixProduit'][$i];
   }
   return $total+$total*0.2;
}

function compterArticles()
{
   if (isset($_SESSION['panier']))
   return count($_SESSION['panier']['idproduit']);
   else
   return 0;

}

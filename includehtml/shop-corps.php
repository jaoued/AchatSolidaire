<?php
    if ( isset ($_GET['souscategory'])) {
        $tab=array('CategoryProduits_idCategoryProduits'=>$_GET['souscategory']);
          $unControleur->setTable('view_produitsallensignescategory');
        $results = $unControleur->selectWhereAll($tab);
        
        $tab2=array('idCategoryProduits'=>$_GET['souscategory']);
        $unControleur->setTable('view_CategoryCategoryProduits');
        $resultCat = $unControleur->selectWhere($tab2);
        $titre= 'SOUS CATEGORIE : '.$resultCat['CategoryProduits'];
    }
    else if  ( isset ($_GET['category']) )
    {
        if ( isset ($_GET['search']))
        {
                $tabWhere=array('CategoryCategory'=>$_GET['category'] );
                $tabLike=array('Produits'=> $_GET['search'], 'CategoryProduits'=> $_GET['search'] );
                $results = $unControleur->selectWhereAllLike($tabWhere, $tabLike);
                $titre= 'CATEGORIE : '.$_GET['category'] ;
        }
        else  
        {
            $tab=array('idCategoryCategory'=>$_GET['category'] );
            $unControleur->setTable('view_produitsallensignescategory');
            $results = $unControleur->selectWhereAllLike($tab);
            $tab2=array('idCategoryCategory'=>$_GET['category']);
            $unControleur->setTable('CategoryCategory');
            $resultCat = $unControleur->selectWhere($tab2);
            $titre= 'CATEGORIE : '.$resultCat['CategoryCategory'];
         }
        
        
    }

    else{
        $_GET['category']=1;
        $tab=array('idCategoryCategory'=>$_GET['category']);
         $unControleur->setTable('view_produitsallensignescategory');
        $results = $unControleur->selectWhereAll($tab);
        
        $tab2=array('idCategoryCategory'=>$_GET['category']);
        $unControleur->setTable('CategoryCategory');
        $resultCat = $unControleur->selectWhere($tab2);
        $titre= 'CATEGORIE : '.$resultCat['CategoryCategory'];
    }
    

   
   
    /*
    var_dump($resultCat);
    var_dump($resultCat['CategoryProduits']);
    */
?>
    <div class="col-sm-9 padding-right">



        <div class="features_items"><!--features_items-->
            <h2 class="title text-center" style="padding-top: 27px"><?php echo $titre ?></h2>
            <?php
            foreach ($results as $result)
            echo '
            <div class="col-sm-4">
                <div class="product-image-wrapper">
                    <div class="single-products">
                        <div class="productinfo text-center">
                            <img src='.$result['mediasproduits'].' alt="" />
                            <h2>'.$result['prix'].' E</h2>
                            <p>'.$result['Produits'].'
                                <br><a href="product-details.php?produit='.$result['idProduits'].'&amp;enseigne='.$result['idEnseigne'].'"><i class="fa fa-hand-o-right"></i>Plus de détails</a>
                                <br><i>De : </i><a href="enseigne.php?enseigne='.$result['idEnseigne'].'"><strong>'.$result['enseigne'].'</strong></a>
                            </p>
                            <button type="button" class="btn btn-fefault cart2">
											<i class="fa fa-shopping-cart"></i>
											<a href="cart.php?action=ajout&amp;enseigne='.$result['enseigne']. '&amp;idenseigne='.$result['idEnseigne'].
                                    '&amp;pourcentagereverse='.$result['pourcentage_reverse'].
                                    '&amp;mediaproduit='.$result['mediasproduits'].
                                    '&amp;l='.$result['Produits'].'&amp;q=1&amp;p='.$result['prix'].
                                    '&amp;idProduit='.$result['idProduits'].'&amp;uri='.$_SERVER['REQUEST_URI'].
                                    '">Ajouter au panier</a>
				        </button>
                        </div>
                    </div>
                    <div class="choose">
                        <ul class="nav nav-pills nav-justified">
                  
                           
                           
                            <li><a href="addWishlist.php?action=ajout&amp;enseigne='.$result['enseigne']. '&amp;idenseigne='.$result['idEnseigne'].
                                    '&amp;pourcentagereverse='.$result['pourcentage_reverse'].
                                    '&amp;mediaproduit='.$result['mediasproduits'].
                                    '&amp;l='.$result['Produits'].'&amp;q=1&amp;p='.$result['prix'].
                                '&amp;idProduit='.$result['idProduits'].'&amp;uri='.$_SERVER['REQUEST_URI'].
                                    '"><i class="fa fa-plus-square"></i>Ajouter a la wishlist</a></li><br>
                                    
                                    
                           <li><a href="href="addWishlist.php?action=ajout&amp;enseigne='.$result['enseigne']. '&amp;idenseigne='.$result['idEnseigne'].
                                    '&amp;pourcentagereverse='.$result['pourcentage_reverse'].
                                    '&amp;mediaproduit='.$result['mediasproduits'].
                                    '&amp;l='.$result['Produits'].'&amp;q=1&amp;p='.$result['prix'].
                                '&amp;idProduit='.$result['idProduits'].'&amp;uri='.$_SERVER['REQUEST_URI'].
                                    '"><i class="fa fa-plus-square"></i>Comparer prix</a></li>
                        </ul>
                    </div>
                </div>
            </div>';
            ?>
						
					
					</div><!--features_items-->
						<ul class="pagination">
							<li class="active"><a href="">1</a></li>
							<li><a href="">2</a></li>
							<li><a href="">3</a></li>
							<li><a href="">&raquo;</a></li>
						</ul>
					</div><!--features_items-->
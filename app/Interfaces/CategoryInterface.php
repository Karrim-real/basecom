<?php
 namespace App\Interfaces;

 interface CategoryInterface{

        /**
     * getAllcategorys
     *
     * @return void
     */
    public function getAllcategorys();

    /**
     * getAcategory
     *
     * @param  mixed $prodID
     * @return void
     */
    public function getAcategory($catID);

    /**
     * createcategorys
     *
     * @param  mixed array $prod_details
     * @return void
     */
    public function createcategorys(array $cat_details);

    /**
     * updatecategory
     *
     * @param  mixed $prodID
     * @param  mixed array $newprod_details
     * @return void
     */
    public function updatecategory($catID, array $newcat_details);

    /**
     * updateProdwithOutImage
     *
     * @param  mixed $prodID
     * @param  mixed $newprod_details
     * @return void
     */
    public function updateCatwithOutImage($catID, array $newcat_details);

    /**
     * deletcategory
     *
     * @param  mixed $prodID
     * @return void
     */
    public function deletcategory($catID);
 }

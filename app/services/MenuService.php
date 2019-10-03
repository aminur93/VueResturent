<?php
    /**
     * Created by PhpStorm.
     * User: pavel
     * Date: 10/3/2019
     * Time: 1:10 PM
     */
    
    namespace App\Services;
    
    use App\Models\Menu;

    class MenuService
    {
        public function getMenuWithCategory($restoId)
        {
            $menuItems = Menu::where('resto_id',$restoId)
                ->get()
                ->groupBy('category.name');
            
            return $menuItems;
        }
    }
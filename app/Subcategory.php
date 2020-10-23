<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 09/04/2016
 * Time: 9:00 AM
 */
namespace App;

    /**
     *
     */
    class Subcategory
    {

        public function getCategories(){

            $categories=\App\Category::where('parent_id',0)->get();//united

            $categories=$this->addRelation($categories);

            return $categories;

        }

        protected function selectChild($id)
        {
            $categories=\App\Category::where('parent_id',$id)->get(); //rooney

            $categories=$this->addRelation($categories);

            return $categories;

        }

        protected function addRelation($categories){

            $categories->map(function ($item, $key) {

                $sub=$this->selectChild($item->id);

                return $item=array_add($item,'subCategory',$sub);

            });

            return $categories;
        }
    }

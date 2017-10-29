<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories';

    public function checkIfCatExist($catName){
    	if(Category::where('name', '=', $catName)->exists()){
            return true;
        } else {
            return false;
        }
    }


    public function addNewCategory($catName){
    	$category = new Category();
    	$category->name = $catName;
    	$category->save();
    }
}

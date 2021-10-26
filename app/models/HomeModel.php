<?php

//ke thua tu class model
class HomeModel extends Model{

    function tableFill()
    {
        return 'product';
    }
    function fieldFill()
    {
        return '*';
    }
    function primaryKey()
    {
        return 'id';
    }
}
?>
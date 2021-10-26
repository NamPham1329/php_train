<?php
class CartModel extends Model
{
    function tableFill()
    {
        return 'cart';
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
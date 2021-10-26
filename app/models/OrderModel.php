<?php
class OrderModel extends Model
{
    function tableFill()
    {
        return 'orderdetail';
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
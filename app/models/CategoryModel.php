<?php
class CategoryModel extends Model
{
    function tableFill()
    {
        return 'categories';
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
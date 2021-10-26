<?php
class RoleModel extends Model
{
    function tableFill()
    {
        return 'role';
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
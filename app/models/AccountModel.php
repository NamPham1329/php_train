<?php
class AccountModel extends Model
{
    function tableFill()
    {
        return 'account';
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
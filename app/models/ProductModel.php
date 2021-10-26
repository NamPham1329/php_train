<?php
class ProductModel extends Model{
    const _PATH = './public/asset/admin/upload/';
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
    public function find($id)
    {
        $tableName = $this->tableFill();
        $fildSelect = $this->fieldFill();
        $primaryKey = $this->primaryKey();
        $sql = "SELECT $fildSelect FROM $tableName WHERE $primaryKey = $id";
        $query = $this->db->query($sql);
        $result = $query->get_result();
        $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
        return $row;
        if(!empty($row))
        {
            return $row;
        }
        return false;
    }
    
}
?>
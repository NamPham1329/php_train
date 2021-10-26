<?php
abstract class Model extends Database
{
    protected $db;
    public $tableName;
    function __construct()
    {
        $this->db = new Database();   
    }
    abstract function tableFill();
    abstract function fieldFill();
    abstract function primaryKey();
//lấy tất cả bản ghi
//     public function all()
//     {
//         $tableName = $this->tableFill();
//         $fildSelect = $this->fieldFill();
//         $sql = "SELECT $fildSelect FROM $tableName";
//         $query = $this->db->query($sql);
//         $result = $query->get_result();
//         $row = mysqli_fetch_all($result,MYSQLI_ASSOC);
//         return $row;
//         if(!empty($row))
//         {
//             return $row;
//         }
//         return false;
//     }
// //lấy 1 bản ghi
    // public function find($id)
    // {
    //     $tableName = $this->tableFill();
    //     $fildSelect = $this->fieldFill();
    //     $primaryKey = $this->primaryKey();
    //     $sql = "SELECT $fildSelect FROM $tableName WHERE $primaryKey = $id";
    //     $query = $this->db->query($sql);
    //     $result = $query->get_result();
    //     $row = mysqli_fetch_array($result,MYSQLI_ASSOC);
    //     return $row;
    //     if(!empty($row))
    //     {
    //         return $row;
    //     }
    //     return false;
    // }
    

}
?>
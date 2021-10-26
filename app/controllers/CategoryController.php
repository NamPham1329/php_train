<?php
class Category extends Controller
{
    public $data = [], $model;
    public function __construct()
    {
        $this->model('CategoryModel');
        $this->model = new CategoryModel();
    }

    public function getListCategories()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data['category'] = $this->db->table($this->model->tableFill())
            ->select($this->model->fieldFill())
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('categories/list', $this->data);
        return $this->data;
    }
    public function get_category()
    {
        $this->render('categories/add', $this->data);
    }
    public function post_category()
    {
        $request = new Request();
        $request->rules([
            'category_name' => 'required',
        ]);
        $request->message([
            'category_name.required' => 'Tên danh mục sản phẩm không được để trống'
        ]);

        $validate = $request->validate();
        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (empty($this->data['errors'])) {
            $request = new Request();
            $this->data = $request->getFields();
            unset($this->data['create']);
            $this->data['categories'] = $this->db->table($this->model->tableFill())
                ->insert($this->data);
            mysqli_close($this->db->__conn);
            $response = new Response();
            $response->redirect('/php_train/admin/danh-muc');
        }
        $this->render('categories/add', $this->data);
    }
    public function get_detail_category($id)
    {
        $this->data = $this->db->table($this->model->tableFill())
            ->select($this->model->fieldFill())
            ->where('id', '=', $id)
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('categories/update', $this->data);
        return $this->data;
    }
    public function update_category()
    {
        $request = new Request();
        $this->data = $request->getFields();
        echo '<pre>';
        print_r($this->data);
        echo '<pre>';
        if (!empty($this->data['update'])) {
            unset($this->data['update']);
        }
        $this->db->table($this->model->tableFill())
            ->where('id', '=', $this->data['id'])
            ->update($this->data);
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/danh-muc');
    }
    public function delete_category()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data = $this->db->table($this->model->tableFill())
            ->where('id', '=', $this->data['delete'])
            ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/danh-muc');
    }
}

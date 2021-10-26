<?php
class Role extends Controller
{
    public $data = [], $model;
    public function __construct()
    {
        $this->model('RoleModel');
        $this->model = new RoleModel();
    }
    public function getListRoles()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data['role'] = $this->db->table($this->model->tableFill())
            ->select('*')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('roles/list', $this->data);
        return $this->data;
    }
    public function get_role()
    {
        $this->render('roles/add', $this->data);
    }
    public function post_role()
    {
        $request = new Request();
        $request->rules([
            'role_name' => 'required',
        ]);
        $request->message([
            'role_name.required' => 'Tên chức năng không được để trống'
        ]);

        $validate = $request->validate();
        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (!empty($this->data['errors'])) {
            $this->render('roles/add', $this->data);
        }
        if (empty($this->data['errors'])) {
            $request = new Request();
            $this->data = $request->getFields();
            unset($this->data['create']);
            $this->data['roles'] = $this->db->table($this->model->tableFill())
                ->insert($this->data);
            mysqli_close($this->db->__conn);
            $response = new Response();
            $response->redirect('/php_train/admin/chuc-nang');
        }
        $this->render('roles/add', $this->data);
    }
    public function get_detail_role($id)
    {
        $this->data = $this->db->table($this->model->tableFill())
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('roles/update', $this->data);
        return $this->data;
    }
    public function update_role()
    {
        $request = new Request();
        $this->data = $request->getFields();
        if (!empty($this->data['update'])) {
            unset($this->data['update']);
        }
        $this->db->table($this->model->tableFill())
            ->where('id', '=', $this->data['id'])
            ->update($this->data);
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/chuc-nang');
    }
    public function delete_role()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->db->table($this->model->tableFill())
            ->where('id', '=', $this->data['delete'])
            ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/chuc-nang');
    }
}

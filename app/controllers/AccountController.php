<?php
class Account extends Controller
{
    public $data = [], $model;
    public function __construct()
    {
        $this->model('AccountModel');
        $this->model = new AccountModel();
    }
    public function getListAccount()
    {
        $this->data = $this->db->table($this->model->tableFill())
            ->select('account.id, username, password, role_name')
            ->join('role', 'role.id = account.role_id')->limit(1000, 1)
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('account/list', $this->data);
        return $this->data;
    }
    public function register()
    {
        $this->render('account/register', $this->data);
    }
    public function post_account()
    {
        $request = new Request();
        $request->rules([
            'username' => 'required|min:3|max:20',
            'password' => 'required|min:5|max:10',
            'confirm_pwd' => 'required|match:password',
        ]);
        $request->message([
            'username.required' => 'Username không được để trống',
            'username.min' => 'Username phải có ít nhất 5 ký tự',
            'username.max' => 'Username không được quá 20 ký tự',
            'password.required' => 'Mật khẩu không được để trống',
            'password.min' => 'Mật khẩu phải có ít nhất 5 ký tự',
            'password.max' => 'Mật khẩu không được quá 10 ký tự',
            'confirm_pwd.required' => 'Mật khẩu nhập lại không được để trống',
            'confirm_pwd.match' => 'Mật khẩu nhập lại không khớp',
        ]);

        $validate = $request->validate();
        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (empty($this->data['errors'])) {
            $request = new Request();
            $this->data = $request->getFields();
            unset($this->data['register']);
            unset($this->data['confirm_pwd']);
            $this->data['role_id'] = 2;
            $this->data = $this->db->table($this->model->tableFill())
                ->insert($this->data);
            mysqli_close($this->db->__conn);
            $response = new Response();
            $response->redirect('/php_train/admin/account');
        }
        $this->render('account/register', $this->data);
    }
    public function login()
    {
        $this->render('account/login', $this->data);
    }
    public function get_user()
    {
        $request = new Request();
        $request->rules([
            'username' => 'required',
            'password' => 'required'
        ]);
        $request->message([
            'username.required' => 'Username không được để trống',
            'password.required' => 'Mật khẩu không được để trống'
        ]);
        $validate = $request->validate();
        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (empty($this->data['errors'])) {
            $this->data = $request->getFields();
            $this->data['password'] = md5($this->data['password']);
            $this->data = $this->db->table($this->model->tableFill())
                ->select('*')
                ->where('username', '=', $this->data['username'])
                ->where('password', '=', $this->data['password'])->get();
            mysqli_close($this->db->__conn);
            $response = new Response();
            if (!empty($this->data)) {
                $_SESSION['user'] = [
                    'id' => $this->data[0]['id'],
                    'username' => $this->data[0]['username'],
                    'role_id' => $this->data[0]['role_id'],
                ];
                $response->redirect('/php_train/admin');
            }
        }
    }
    public function get_detail_account($id)
    {
        $this->data = $this->db->table($this->model->tableFill())
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        $this->data['role'] = $this->db->table('role')
            ->select('*')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('account/update', $this->data);
        return $this->data;
    }
    public function save_account()
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
        $response->redirect('/php_train/admin/account');
    }
    public function logout()
    {
        session_destroy();
        header('Location: /php_train/home');
    }
    public function delete_account()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->db->table($this->model->tableFill())
            ->where('id', '=', $this->data['delete'])
            ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/account');
    }
}

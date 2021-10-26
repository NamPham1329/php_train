<?php
class Home extends Controller{
    public $product, $data=[];
    public function __construct()
    {
        $this->product = $this->model('HomeModel');
        
    }
    public function index()
    {
       $request = new Request();
       $this->data = $request->getFields();
       $this->data = $this->db->table('product')
            ->select('*')
            ->get();
        mysqli_close($this->db->__conn);
       $this->render('home/index', $this->data);
       return $this->data;
    }
    // public function post_user()
    // {
    //     $request = new Request();
    //     $request->rules([
    //         'fullname' => 'required|min:5|max:30',
    //         'email' => 'required|email|min:6',
    //         'password' => 'required|min:3',
    //         'confirm_password' => 'required|match:password'
    //     ]);
    //     $request->message([
    //         'fullname.required'=> 'Họ tên không được để trống',
    //         'fullname.min'=> 'Họ tên phải có ít nhất 5 ký tự',
    //         'fullname.max'=> 'Họ tên không được quá 30 ký tự',
    //         'email.required'=> 'Email không được để trống',
    //         'email.email'=> 'Địa chỉ email không hợp lệ',
    //         'email.min'=> 'Email phải có ít nhất 6 ký tự',
    //         'password.required'=> 'Password không được để trống',
    //         'password.min'=> 'Password phải có ít nhất 3 ký tự',
    //         'confirm_password.required'=> 'Nhập lại không được để trống',
    //         'confirm_password.match'=> 'Nhập lại mật khẩu không trùng khớp'
    //     ]);
    //     $validate = $request->validate();
    //     if(!$validate)
    //     {
    //         $this->data['errors'] = $request->errors();
    //     }
    //     $this->render('users/add', $this->data);
    //     mysqli_close($this->db->__conn);
    // }
}
?>
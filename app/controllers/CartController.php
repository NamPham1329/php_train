<?php
class Cart extends Controller
{
    public $data = [], $model;
    public function __construct()
    {
        $this->model('CartModel');
        $this->model = new CartModel();
    }
    public function getListCart()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data = $this->db->table($this->model->tableFill())
            ->select('cart.id, order_status, username')
            ->join('account', 'account.id = cart.customer_id')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('cart/list', $this->data);
        return $this->data;
    }
    public function get_detail_cart($id)
    {
        $this->data = $this->db->table('orderdetail')
            ->select('*')
            ->where('order_id', '=', $id)
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('cart/cart_detail', $this->data);
        return $this->data;
    }
    public function delete_cart()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->db->table($this->model->tableFill())
        ->where('id', '=', $this->data['delete'])
        ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/admin/cart');
    }
}

<?php
class Order extends Controller
{

    public $data = [], $model;
    public function __construct()
    {
        $this->model('OrderModel');
    }
    public function add_to_cart()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $id_product = $this->data['addToCart'];
        $id = $_SESSION['user']['id']; //lấy id check
        $this->data = $this->db->table('cart')
            ->select('*')
            ->where('customer_id', '=', $id)
            ->get(); //check cart
        if (empty($this->data)) {
            $this->data = [
                'customer_id' => $id,
                'order_status' => 'processing'
            ];
            $this->db->table('cart')
                ->insert($this->data); //tạo cart nếu chưa có
        }
        $this->data['cart_id'] = $this->db->table('cart')
            ->select('id')
            ->where('customer_id', '=', $id)
            ->get(); //lấy id_cart
        $this->data['product'] = $this->db->table('product')
            ->select('*')
            ->where('id', '=', $id_product)
            ->get();
        $quantity = 1;
        $this->data = [
            'order_id' => $this->data['cart_id'][0]['id'],
            'product_name' => $this->data['product'][0]['product_name'],
            'product_img' => $this->data['product'][0]['product_img'],
            'product_price' => $this->data['product'][0]['price'],
            'quantity' => $quantity,
            'order_total' => $this->data['product'][0]['price'] *  $quantity
        ];
        $this->db->table('orderdetail')
            ->insert($this->data);
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect("product-detail/id-$id_product.html");
    }
    public function get_list_order()
    {
        $id = $_SESSION['user']['id'];
        $this->data = $this->db->table('cart')
            ->select('*')
            ->join('orderdetail', 'cart.id = orderdetail.order_id')
            ->where('customer_id', '=', $id)
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('order/list', $this->data);
        return $this->data;
    }
    public function update_order()
    {

        $request = new Request();
        $this->data = $request->getFields();

        $this->data['order'] = $this->db->table('orderdetail')
            ->select('*')
            ->where('order_id', '=', $this->data['update'])->get();
        for ($i = 0; $i < count($this->data['order']); $i++) {
            $this->data['qty'][$i] = [
                'quantity' => $this->data['quantity'][$i]
            ];
            $this->db->table('orderdetail')
                ->where('id', '=', $this->data['order'][$i]['id'])
                ->update($this->data['qty'][$i]);
            mysqli_close($this->db->__conn);
        }
        $response = new Response();
        $response->redirect("/php_train/list-order");
    }
    public function delete_order()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->db->table('orderdetail')
            ->where('id', '=', $this->data['delete'])
            ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/list-order');
    }
    public function delete_all_order()
    {
        $request = new Request();
        $this->data = $request->getFields();
        print_r($this->data);
        $this->db->table('orderdetail')
            ->where('order_id', '=', $this->data['deleteAll'])
            ->delete();
        mysqli_close($this->db->__conn);
        $response = new Response();
        $response->redirect('/php_train/list-order');
    }
}

<?php
class Product extends Controller
{
    public $data = [], $model, $name;
    public function __construct()
    {
        $this->model('ProductModel');
        $this->model = new ProductModel();
    }

    public function getListProduct()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data = $this->db->table($this->model->tableFill())
            ->select('product.id, product_name, price, product_img, product_detail, category_name')
            ->join('categories', 'categories.id = product.category_id')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('products/list', $this->data);
        return $this->data;
    }
    public function get_detail($id)
    {
        $this->data = $this->model->find($id);
        mysqli_close($this->db->__conn);
        if (empty($this->data)) {
            $this->render('404NotFound');
        } else {
            $this->render('products/detail', $this->data);
            return $this->data;
        }
    }
    public function getProduct()
    {
        $request = new Request();
        $this->data = $request->getFields();
        $this->data['category'] = $this->db->table('categories')
            ->select('*')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('products/insert', $this->data);
        return $this->data;
    }
    public function postProduct()
    {
        $request = new Request();
        $request->rules([
            'product_name' => 'required|min:5',
            'price' => 'required',
            'product_detail' => 'required',
            'category_id' => 'required',
        ]);
        $request->message([
            'product_name.required' => 'Tên sản phẩm không được để trống',
            'product_name.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'product_detail.required' => 'Chi tiết sản phẩm không được để trống',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
        ]);

        $validate = $request->validate();

        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (!empty($this->data['errors'])) {
            $this->data = $request->getFields();
            $this->data['category'] = $this->db->table('categories')
                ->select('*')
                ->get();
            mysqli_close($this->db->__conn);
            $this->data['errors'] = $request->errors();
            $this->render('products/insert', $this->data);

            return;
        } else {
            $this->upload();
            $this->data = $request->getFields();
            $this->data['product_img'] = $this->name;
            unset($this->data['add_prd']);
            $this->data['product'] = $this->db->table($this->model->tableFill())
                ->insert($this->data);
            $this->data['category'] = $this->db->table('categories')
                ->select('*')
                ->get();
            mysqli_close($this->db->__conn);
            $response = new Response();
            $response->redirect('/php_train/admin');
        }
        $this->render('product/insert', $this->data);
    }
    public function upload()
    {
        $this->data['image'] = $_FILES['image'];
        $type = $_FILES['image']['type'];
        $str = explode("/", $type);
        $this->name = date("d_m_Y_H_i_s").'.'.$str[1];
        $tmp_name = $_FILES['image']['tmp_name'];
        $pattern = '/image.+/';
        if (!preg_match($pattern, $type)) 
        {
            $this->data['image'] = null;
        }
        move_uploaded_file($tmp_name, $this->model::_PATH.$this->name);
    }
    public function get_detail_product($id)
    {
        $this->data['product'] = $this->db->table($this->model->tableFill())
            ->select('*')
            ->where('id', '=', $id)
            ->get();
        $this->data['category'] = $this->db->table('categories')
            ->select('*')
            ->get();
        mysqli_close($this->db->__conn);
        $this->render('products/update', $this->data);
        return $this->data;
    }
    public function update_product()
    {
        $request = new Request();
        $request->rules([
            'product_name' => 'required|min:5',
            'price' => 'required',
            'product_detail' => 'required',
            'category_id' => 'required',
        ]);
        $request->message([
            'name.required' => 'Tên sản phẩm không được để trống',
            'name.min' => 'Tên sản phẩm phải có ít nhất 5 ký tự',
            'price.required' => 'Giá sản phẩm không được để trống',
            'detail.required' => 'Chi tiết sản phẩm không được để trống',
            'category_id.required' => 'Danh mục sản phẩm không được để trống',
        ]);

        $validate = $request->validate();
        if (!$validate) {
            $this->data['errors'] = $request->errors();
        }
        if (empty($this->data['errors'])) {
            $this->upload();
            //tach ra thanh class upload
            $this->data = $request->getFields();
            $this->data['product_img'] = $this->name;
            unset($this->data['update_prd']);
            $this->db->table($this->model->tableFill())
                ->where('id', '=', $this->data['id'])
                ->update($this->data);
            mysqli_close($this->db->__conn); 
            $response = new Response();
            $response->redirect('/php_train/admin');
        }
    }
    public function delete_product()
    {
        // $request = new Request();
        // $this->data = $request->getFields();
        // $this->data = $this->db->table($this->model->tableFill())
        //     ->where('id', '=', $this->data['delete'])
        //     ->delete();
        // mysqli_close($this->db->__conn);
        // $response = new Response();
        // $response->redirect('/php_train/admin');
        // return $this->data;
        $this->data['product'] = $this->db->table($this->model->tableFill())
            ->select('*')
            ->where('id', '=', 3)->where('id', '=', 4)
            ->get();
    }
}


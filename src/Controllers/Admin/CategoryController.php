<?php

namespace Acer\Asm2Ph35301\Controllers\Admin;

use Acer\Asm2Ph35301\Commons\Controller;
use Acer\Asm2Ph35301\Commons\Helper;
use Acer\Asm2Ph35301\Models\Category;
use Acer\Asm2Ph35301\Models\Product;
use Rakit\Validation\Validator;

class CategoryController extends Controller
{
    
    private Category $category;

    public function __construct()
    {
        $this->category = new Category();
    }

    public function index()
    {
        $category = $this->category->all();

        $this->renderAdmin('category.index', [
            'category' => $category
        ]);
    }

    public function create()
{
    $category = $this->category->all(); // Lấy danh sách tất cả các danh mục

    // Tạo một mảng liệt kê (pluck) các tên danh mục với khóa là ID
    $categoryPluck = array_column($category, 'name', 'id');

    // Truyển mảng các danh mục đã tạo vào view để hiển thị trong form
    $this->renderAdmin('category.create', [
        'categoryPluck' => $categoryPluck
    ]);
}


public function store()
{
    // VALIDATE
    $validator = new Validator;
    $validation = $validator->make($_POST, [
        'name'          => 'required|max:100',
        // Bạn có thể thêm các quy tắc validate khác nếu cần
    ]);
    $validation->validate();

    if ($validation->fails()) {
        $_SESSION['errors'] = $validation->errors()->firstOfAll();

        header('Location: ' . url('admin/category/create'));
        exit;
    } else {
        $data = [
            'name'          => $_POST['name'],
            // Thêm các trường dữ liệu khác của danh mục nếu cần
        ];

        // Lưu dữ liệu vào model của danh mục
        $this->category->insert($data);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Thao tác thành công!';

        header('Location: ' . url('admin/category'));
        exit;
    }
}





public function edit($id)
{
    $category = $this->category->findByID($id);

    $this->renderAdmin('category.edit', [
        'category' => $category,
    ]);
}

public function update($id)
{
    $category = $this->category->findByID($id);

    // Kiểm tra xem thể loại có tồn tại không
    if (!$category) {
        // Nếu không tồn tại, chuyển hướng về trang danh sách thể loại và hiển thị thông báo
        $_SESSION['status'] = false;
        $_SESSION['msg'] = 'Thể loại không tồn tại!';
        header('Location: ' . url('admin/category'));
        exit();
    }

    // VALIDATE
    $validator = new Validator;
    $validation = $validator->make($_POST, [
        'name'        => 'required|max:100',
        //Thêm các quy tắc kiểm tra cho các trường cần thiết khác (nếu có)
    ]);
    $validation->validate();

    if ($validation->fails()) {
        // Nếu việc kiểm tra không thành công, chuyển hướng về trang sửa đổi với thông báo lỗi
        $_SESSION['errors'] = $validation->errors()->firstOfAll();
        header('Location: ' . url("admin/category/$id/edit"));
        exit;
    } else {
        // Nếu việc kiểm tra thành công, cập nhật thông tin của thể loại và chuyển hướng về trang sửa đổi với thông báo thành công
        $data = [
            'name'        => $_POST['name'],
            //Thêm các trường cần thiết khác vào $data (nếu có)
        ];

        $this->category->update($id, $data);

        $_SESSION['status'] = true;
        $_SESSION['msg'] = 'Cập nhật thành công!';

        header('Location: ' . url("admin/category/$id/edit"));
        exit;
    }
}



    public function delete($id)
{
    try {
        $category = $this->category->findByID($id);

        if ($category) {
            $this->category->delete($id);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } else {
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Danh mục không tồn tại!';
        }
    } catch (\Throwable $th) {
        $_SESSION['status'] = false;
        $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
    }

    header('Location: ' . url('admin/category'));
    exit();
}

}

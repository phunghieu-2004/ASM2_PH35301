<?php

namespace Acer\Asm2Ph35301\Controllers\Admin;

use Acer\Asm2Ph35301\Commons\Controller;
use Acer\Asm2Ph35301\Models\User;
use Rakit\Validation\Validator;

class UserController extends Controller
{
    private User $user;
    public function __construct()
    {
        $this->user = new User();
    }

    public function index()
    {
        $users = $this->user->all();

        $this->renderAdmin('users.index', [
            'users' => $users
        ]);
    }

    public function create()
    {
        $this->renderAdmin('users.create');
    }

    public function store()
    {
        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'required|min:6',
            'confirm_password'      => 'required|same:password',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
            'type'                  => 'required|in:admin,member',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url('admin/users/create'));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'type'      => $_POST['type'],
                'password'  => password_hash($_POST['password'], PASSWORD_DEFAULT),
            ];

            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                    header('Location: ' . url('admin/users/create'));
                    exit;
                }
            }

            $this->user->insert($data);

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url('admin/users'));
            exit;
        }
    }

    public function show($id)
    {
        $user = $this->user->findByID($id);

        $this->renderAdmin('users.show', [
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = $this->user->findByID($id);

        $this->renderAdmin('users.edit', [
            'user' => $user
        ]);
    }

    public function update($id)
    {
        $user = $this->user->findByID($id);

        $validator = new Validator;
        $validation = $validator->make($_POST + $_FILES, [
            'name'                  => 'required|max:50',
            'email'                 => 'required|email',
            'password'              => 'min:6',
            'avatar'                => 'uploaded_file:0,2M,png,jpg,jpeg',
            'type'                  => 'required|in:admin,member',
        ]);
        $validation->validate();

        if ($validation->fails()) {
            $_SESSION['errors'] = $validation->errors()->firstOfAll();

            header('Location: ' . url("admin/users/{$user['id']}/edit"));
            exit;
        } else {
            $data = [
                'name'      => $_POST['name'],
                'email'     => $_POST['email'],
                'type'      => $_POST['type'],
                'password'  => !empty($_POST['password'])
                    ? password_hash($_POST['password'], PASSWORD_DEFAULT) : $user['password'],
            ];

            $flagUpload = false;
            if (isset($_FILES['avatar']) && $_FILES['avatar']['size'] > 0) {

                $flagUpload = true;

                $from = $_FILES['avatar']['tmp_name'];
                $to = 'assets/uploads/' . time() . $_FILES['avatar']['name'];

                if (move_uploaded_file($from, PATH_ROOT . $to)) {
                    $data['avatar'] = $to;
                } else {
                    $_SESSION['errors']['avatar'] = 'Upload Không thành công';

                    header('Location: ' . url("admin/users/{$user['id']}/edit"));
                    exit;
                }
            }

            $this->user->update($id, $data);

            if (
                $flagUpload
                && $user['avatar']
                && file_exists(PATH_ROOT . $user['avatar'])
            ) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công';

            header('Location: ' . url("admin/users/{$user['id']}/edit"));
            exit;
        }
    }

    public function delete($id)
{
    // Đảm bảo rằng session đã được bắt đầu
    if (session_status() == PHP_SESSION_NONE) {
        session_start();
    }

    try {
        // Đảm bảo hằng số PATH_ROOT đã được định nghĩa
        if (!defined('PATH_ROOT')) {
            define('PATH_ROOT', '/your/path/to/root/'); // Định nghĩa đường dẫn gốc phù hợp với hệ thống của bạn
        }

        // Tìm người dùng bằng ID
        $user = $this->user->findByID($id);

        // Nếu người dùng tồn tại, tiến hành xóa
        if ($user) {
            $this->user->delete($id);

            // Xóa tệp avatar của người dùng nếu tồn tại
            if ($user['avatar'] && file_exists(PATH_ROOT . $user['avatar'])) {
                unlink(PATH_ROOT . $user['avatar']);
            }

            $_SESSION['status'] = true;
            $_SESSION['msg'] = 'Thao tác thành công!';
        } else {
            // Người dùng không tồn tại
            $_SESSION['status'] = false;
            $_SESSION['msg'] = 'Người dùng không tồn tại!';
        }
    } catch (\Exception $e) {
        // Xử lý các ngoại lệ cụ thể
        $_SESSION['status'] = false;
        $_SESSION['msg'] = 'Thao tác KHÔNG thành công!';
    }

    // Chuyển hướng về danh sách người dùng
    header('Location: ' . url('admin/users'));
    exit();
}

}

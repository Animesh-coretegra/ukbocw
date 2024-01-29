<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\CausesModel;
use App\Models\GeneralModel;
use App\Models\MenuMappingModel;
use App\Models\MenuModel;
use App\Models\RoleModel;
use App\Models\UserModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class AdminController extends BaseController
{
    private $menuModel;
    private $roleModel;
    private $userModel;
    private $menuMappingModel;
    private $causesModel;

    private $generalModel;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->menuModel = new MenuModel();
        $this->roleModel = new RoleModel();
        $this->userModel = new UserModel();
        $this->menuMappingModel = new MenuMappingModel();
        $this->causesModel = new CausesModel();
        $this->generalModel = new GeneralModel();
    }
    public function menu()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                helper('util');
                $menu = array(
                    'menu_id' => generateRandom('alnum', 16),
                    'menu_name' => $request['menuName'],
                    'menu_icon' => $request['menuIcon'],
                    'menu_url' => $request['menuUrl'],
                    'parent_id' => !empty($request['parentMenu']) ? $request['parentMenu'] : "0",
                    'status' => $request['status']
                );


                $result = $this->generalModel->insert_data('menu', $menu);
                if ($result) {
                    return redirect()->to('menu')->with('success', 'Menu Inserted Successfully');
                } else {
                    return redirect()->to('menu')->with('failed', 'Unable to Insert Menu');
                }
            } else {
                return redirect()->to('menu')->with('failed', 'Invalid Recaptcha Token');
            }
        }

        $menu = $this->generalModel->fetch_data('menu', array('status' => '1'));
        $menuIcon = $this->generalModel->fetch_data('menu_icons');
        $menuData = $this->request->menuData;
        foreach ($menu as $key => $value) {
            if ($value['parent_id'] != "0") {
                $parent =  $this->generalModel->fetch_single_data('menu', array('menu_id' => $value['parent_id']));
                $menu[$key]['parent_name'] = $parent['menu_name'];
            }
        }
        return view('admin/menu', compact('menu', 'menuIcon', 'menuData'));
    }

    public function getParentMenu()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $menu = $this->generalModel->fetch_data('menu', array('status' => '1'));
        if (!empty($menu)) {
            foreach ($menu as $key => $value) {
                if ($value['parent_id'] != 0) {
                    $parentMenu = $this->generalModel->fetch_single_data('menu', array('menu_id' => $value['parent_id']));
                }
                $menuData['data'][] = array(
                    'id' => $value['id'],
                    'menu_id' => $value['menu_id'],
                    'menu_name' => $value['menu_name'],
                    'parentName' => isset($parentMenu['menu_name']) ? $parentMenu['menu_name'] : ""
                );
            }
            echo json_encode($menuData);
        } else {
            echo json_encode("");
        }
    }
    public function getMenuById()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $menuId = $this->request->getGet('menu_id');

        $menu = $this->generalModel->fetch_data('menu', array('status' => '1', 'menu_id' => $menuId));
        foreach ($menu as $key => $value) {
            $menuData['data'] = array(
                'menu_id' => $value['menu_id'],
                'menu_name' => $value['menu_name'],
                'parentName' => $this->generalModel->fetch_data('menu', array('parent_id' => '0')),
                'status' =>  $value['status']
            );
        }
        echo json_encode($menuData);
    }

    public function menuEdit()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                helper('util');
                $menu = array(
                    'menu_name' => $request['menuName'],
                    'parent_id' => !empty($request['parentMenu']) ? $request['parentMenu'] : "0",
                    'status' => $request['status']
                );

                $result = $this->generalModel->update_data('menu', $menu, array('menu_id' => $request['menu_id']));
                if ($result) {
                    return redirect()->to('menu')->with('success', 'Menu Update Successfully');
                } else {
                    return redirect()->to('menu')->with('failed', 'Unable to Update Menu');
                }
            } else {
                return redirect()->to('menu')->with('failed', 'Invalid Recaptcha Token');
            }
        }
    }

    public function role()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                helper('util');
                $roleId = generateRandom('alnum', 16);
                $role = array(
                    'role_id' => $roleId,
                    'role_name' => $request['roleName'],
                    'status' => $request['status']
                );


                $result = $this->generalModel->insert_data('role', $role);
                if ($result) {
                    foreach ($request['menu'] as $key => $value) {
                        $menuData = array(
                            'menu_id' => $value,
                            'role_id' => $roleId,
                        );
                        $this->generalModel->insert_data('menu_mapping', $menuData);
                    }
                }
                if ($result) {
                    return redirect()->to('role')->with('success', 'Role Inserted Successfully');
                } else {
                    return redirect()->to('role')->with('failed', 'Unable to Insert Role');
                }
            } else {
                return redirect()->to('role')->with('failed', 'Invalid Recaptcha Token');
            }
        }

        $menu = $this->generalModel->fetch_data('menu', array('parent_id' => '0'));
        foreach ($menu as $key => $value) {
            $parent =  $this->generalModel->fetch_data('menu', array('parent_id' => $value['menu_id']));
            $menu[$key]['child_menu'] = $parent;
        }
        $role = $this->generalModel->fetch_data('role');
        $menuData = $this->request->menuData;
        return view('admin/role', compact('role', 'menu', 'menuData'));
    }

    public function getRoleById()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $roleId = $this->request->getGet('role_id');
        $role = $this->generalModel->fetch_single_data('role', array('role_id' => $roleId));
        $roleData['data'] = array(
            'role_id' => $role['role_id'],
            'role_name' => $role['role_name'],
            'status' =>  $role['status']
        );
        echo json_encode($roleData);
    }

    public function roleEdit()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                $role = array(
                    'role_name' => $request['roleName'],
                    'status' => $request['status']
                );
                $result = $this->generalModel->update_data('role', $role, array('role_id' => $request['role_id']));
                if ($result) {
                    return redirect()->to('role')->with('success', 'Role Update Successfully');
                } else {
                    return redirect()->to('role')->with('failed', 'Unable to Update role');
                }
            } else {
                return redirect()->to('role')->with('failed', 'Invalid Recaptcha Token');
            }
        }
    }

    public function user()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }

        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                $validation = \Config\Services::validation();
                $validation->setRules([
                    'userName' => [
                        'label'  => 'Full Name',
                        'rules'  => 'required|max_length[30]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Full Name must be in 30 character'
                        ],
                    ],
                    'password' => [
                        'label'  => 'Password',
                        'rules'  => 'required|max_length[16]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'min_length' => 'Your {field} is too short. You want to get hacked?',
                            'regex_match' => 'Password length must be 8 and at least 1 special symbol,1 lowercase and 1 uppercase'
                        ],
                    ],
                    'confirmPassword' => [
                        'label'  => 'Confirm Password',
                        'rules'  => 'required|max_length[16]|matches[password]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'min_length' => 'Your {field} is too short. You want to get hacked?',
                            'regex_match' => 'Password length must be 8 and at least 1 special symbol,1 lowercase and 1 uppercase',
                            'matches' => 'Confirm Password is not same as password'
                        ],
                    ],
                    'userEmail' => [
                        'label'  => 'Email Id',
                        'rules'  => 'required|valid_email|is_unique[user.user_email]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'valid_email' => 'Enter Valid Email Id',
                            'is_unique' => 'Email Id Already Exists'
                        ],
                    ],
                    'phoneNumber' => [
                        'label'  => 'Phone Number',
                        'rules'  => 'required|max_length[10]|is_natural',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Phone number must be of 10 digit',
                            'is_natural' => 'Enter valid phone Number'
                        ],
                    ],
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {

                    $userData = array(
                        'user_id' => $request['userId'],
                        'user_name' => $request['userName'],
                        'user_email' => $request['userEmail'],
                        'user_phone' => $request['phoneNumber'],
                        'user_password' => base64_encode($request['password']),
                        'user_role' => $request['role'],
                        'status' => $request['status'],
                    );
                    $result = $this->generalModel->insert_data('user', $userData);

                    if ($result) {
                        return redirect()->to('user')->with('success', 'User Update Successfully');
                    } else {
                        return redirect()->to('user')->with('failed', 'Unable to Update User');
                    }
                }
            } else {
                return redirect()->to('user')->with('failed', 'Invalid Recaptcha Token');
            }
        }
        $role = $this->generalModel->fetch_data('role');
        $menuData = $this->request->menuData;
        $userData = $this->userModel->getAllUser(array('user.status' => '1'));
        return view('admin/user', compact('role', 'userData', 'menuData'));
    }
    public function profile()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $session = session();
        $userSession =  $session->get('user');

        $user = $this->generalModel->fetch_single_data('user', array('user_id' => $userSession['userId']));
        $user['role'] = $this->generalModel->fetch_single_data('role', array('role_id' => $user['user_role']), 'role_name');
        $menuData = $this->request->menuData;
        return view('admin/profile', compact('user', 'menuData'));
    }

    public function userEdit()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                $validation = \Config\Services::validation();
                $validation->setRules([
                    'userName' => [
                        'label'  => 'Full Name',
                        'rules'  => 'required|max_length[30]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Full Name must be in 30 character'
                        ],
                    ],
                    'password' => [
                        'label'  => 'Password',
                        'rules'  => 'required|max_length[16]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'min_length' => 'Your {field} is too short. You want to get hacked?',
                            'regex_match' => 'Password length must be 8 and at least 1 special symbol,1 lowercase and 1 uppercase'
                        ],
                    ],
                    'confirmPassword' => [
                        'label'  => 'Confirm Password',
                        'rules'  => 'required|max_length[16]|matches[password]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'min_length' => 'Your {field} is too short. You want to get hacked?',
                            'regex_match' => 'Password length must be 8 and at least 1 special symbol,1 lowercase and 1 uppercase',
                            'matches' => 'Confirm Password is not same as password'
                        ],
                    ],
                    'userEmail' => [
                        'label'  => 'Email Id',
                        'rules'  => 'required|valid_email',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'valid_email' => 'Enter Valid Email Id',
                        ],
                    ],
                    'phoneNumber' => [
                        'label'  => 'Phone Number',
                        'rules'  => 'required|max_length[10]|is_natural',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Phone number must be of 10 digit',
                            'is_natural' => 'Enter valid phone Number'
                        ],
                    ],
                    'profileImage' => [
                        'label'  => 'Phone Number',
                        'rules'  => 'uploaded[profileImage]|mime_in[profileImage,image/jpg,image/png,image/jpeg]|ext_in[profileImage,png,jpg,jpeg]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                        ],
                    ],
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $img = $this->request->getFile('profileImage');
                    $img->move('assets/backend/assets/images/users/');

                    $name = $img->getName();
                    $userData = array(
                        'user_name' => $request['userName'],
                        'user_email' => $request['userEmail'],
                        'user_phone' => $request['phoneNumber'],
                        'user_password' => base64_encode($request['password']),
                        'user_profile_image' => $name
                    );
                    $result = $this->generalModel->update_data('user', $userData, array('user_id' => $request['user_id']));
                    if ($result) {
                        return redirect()->to('profile')->with('success', 'Profile Update Successfully');
                    } else {
                        return redirect()->to('profile')->with('failed', 'Unable to Update Profile');
                    }
                }
            } else {
                return redirect()->to('profile')->with('failed', 'Invalid Recaptcha Token');
            }
        }
    }

    public function userAccessEdit()
    {

        $role_id = $this->request->getGet('role_id');
        $role['role'] = $this->roleModel->getRole(array('role_id' => $role_id));
        $menuAccess = $this->menuModel->getNavigation(array('role_id' => $role_id));

        $menu = $this->menuModel->getAllMenu(array('parent_id' => '0'));
        foreach ($menu as $key => $value) {
            $parent =  $this->menuModel->getAllMenu(array('parent_id' => $value['menu_id']));
            $menu[$key]['child_menu'] = $parent;
        }
        foreach ($menuAccess as $key => $menuAccessValue) {
            foreach ($menu as $keyValue => $menuValue) {
                if ($menuAccessValue['menu_id'] == $menuValue['menu_id'] && $menuAccessValue['status'] == '1') {
                    $menu[$keyValue]['checked'] = "checked";
                }
                if (!empty($menuValue['child_menu'])) {
                    foreach ($menuValue['child_menu'] as $k => $v) {
                        if ($menuAccessValue['menu_id'] == $v['menu_id'] && $menuAccessValue['status'] == '1') {
                            $menu[$keyValue]['child_menu'][$k]['checked'] = "checked";
                        }
                    }
                }
            }
        }
        $role['menu'] = $menu;
        echo json_encode($role);
    }

    public function editMenuMapping()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $roleId = $this->request->getGet('role_id');
        $menuId = $this->request->getGet('menu_id');

        $menuData = $this->menuMappingModel->getAllMenu(array('role_id' => $roleId, 'menu_id' => $menuId));
        if (!empty($menuData)) {
            if ($menuData[0]['status'] == '1') {
                $this->menuMappingModel->updateRole(array('status' => '0'), $roleId, $menuId);
            } else if ($menuData[0]['status'] == '0') {
                $this->menuMappingModel->updateRole(array('status' => '1'), $roleId, $menuId);
            }
        } else {
            $menuValue = array(
                'menu_id' => $menuId,
                'role_id' => $roleId,
                'status' => '1'
            );
            $this->menuMappingModel->insertMenuMapping($menuValue);
        }
    }

    public function causes()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $causeData = $this->causesModel->getCauses();
        $menuData = $this->request->menuData;
        return view('admin/causes', compact('menuData', 'causeData'));
    }
    public function causeCreate()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();

            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'causeTitle' => [
                        'label'  => 'Full Name',
                        'rules'  => 'required|max_length[30]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Full Name must be in 30 character'
                        ],
                    ],
                    'raisedAmount' => [
                        'label'  => 'Raised Amount',
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'numeric' => 'Raised amount should in number formate',
                        ],
                    ],
                    'goalAmount' => [
                        'label'  => 'Goal Amount',
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'numeric' => 'Raised amount should in number formate',
                        ],
                    ],
                    'thumbnailImage' => [
                        'label'  => 'Thumbnail Image',
                        'rules'  => 'uploaded[thumbnailImage]|mime_in[thumbnailImage,image/jpg,image/png,image/jpeg]|ext_in[thumbnailImage,png,jpg,jpeg]|max_dims[thumbnailImage,300,300]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                            'max_dims' => 'file size should be 300 * 300'
                        ],
                    ],
                    'mein_images' => [
                        'label'  => 'Main Image',
                        'rules'  => 'uploaded[mein_images]|mime_in[mein_images,image/jpg,image/png,image/jpeg]|ext_in[mein_images,png,jpg,jpeg]|max_dims[mein_images,900,600]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                            'max_dims' => 'file size should be 900 * 600'
                        ],
                    ],
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $multipleImages = [];
                    if ($this->request->getFile('thumbnailImage')) {
                        $img = $this->request->getFile('thumbnailImage');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $thumbNailName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/causes/thumbnail', $thumbNailName);
                            $request['thumbnailImage'] = $thumbNailName;
                        }
                    }
                    if ($this->request->getFile('mein_images')) {
                        $mainImage = $this->request->getFile('mein_images');
                        if ($mainImage->isValid() && !$mainImage->hasMoved()) {
                            $mainImg = $mainImage->getRandomName();
                            $mainImage->move('assets/backend/assets/images/causes/main', $mainImg);
                            $request['mein_images'] = $thumbNailName;
                        }
                    }
                    if ($this->request->getFileMultiple('details_images')) {
                        $files = $this->request->getFileMultiple('details_images');

                        foreach ($files as $file) {

                            if ($file->isValid() && !$file->hasMoved()) {
                                $newName = $file->getRandomName();
                                $file->move('assets/backend/assets/images/causes/detailImages', $newName);
                                array_push($multipleImages, $newName);
                            }
                        }
                    }
                    $request['details_images'] = implode(';', $multipleImages);
                    $causeData = array(
                        'cause_id' => $request['causeId'],
                        'cause_title' => $request['causeTitle'],
                        'raised_amount' => $request['raisedAmount'],
                        'goal_amount' => $request['goalAmount'],
                        'cause_short_description' => $request['shortDescription'],
                        'cause_long_description' => $request['longDescription'],
                        'thumbnail_image' => $request['thumbnailImage'],
                        'details_images' => $request['mein_images'],
                        'cause_thumbnail_image' => $request['details_images'],
                        'is_urgent' => isset($request['urgentCause']) ? '1' : '0',
                        'is_latest' => isset($request['latestCause']) ? '1' : '0',
                        'status' => isset($request['status']) ? '1' : '0',
                    );
                    $result = $this->causesModel->insertCause($causeData);
                    if ($result) {
                        return redirect()->to('causes')->with('success', 'Causes Add Successfully');
                    } else {
                        return redirect()->to('causes')->with('failed', 'Unable to Add Causes');
                    }
                }
            } else {
                return redirect()->to('cause')->with('failed', 'Invalid Recaptcha Token');
            }
        }
        $menuData = $this->request->menuData;
        return view('admin/causeCreate', compact('menuData'));
    }

    public function causeView()
    {
        $causeId = $this->request->getGet('cause_id');
        $causeData['data'] = $this->causesModel->getCause(array('cause_id' => $causeId));
        $causeData['data']['cause_thumbnail_images'] = explode(';', $causeData['data']['cause_thumbnail_image']);
        echo json_encode($causeData);
    }
    public function causeEdit($causeId)
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }

        $causeData = $this->causesModel->getCause(array('cause_id' => urldecode(base64_decode($causeId))));
        $causeData['cause_thumbnail_images'] = explode(';', $causeData['cause_thumbnail_image']);
        $menuData = $this->request->menuData;
        return view('admin/causeCreate', compact('menuData', 'causeData'));
    }

    public function causeEditAction()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {

            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'causeTitle' => [
                        'label'  => 'Full Name',
                        'rules'  => 'required|max_length[30]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Full Name must be in 30 character'
                        ],
                    ],
                    'raisedAmount' => [
                        'label'  => 'Raised Amount',
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'numeric' => 'Raised amount should in number formate',
                        ],
                    ],
                    'goalAmount' => [
                        'label'  => 'Goal Amount',
                        'rules'  => 'required|numeric',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'numeric' => 'Raised amount should in number formate',
                        ],
                    ],

                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $multipleImages = [];
                    if ($this->request->getFile('thumbnailImage')->getSize() > 0) {
                        $img = $this->request->getFile('thumbnailImage');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $thumbNailName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/causes/thumbnail', $thumbNailName);
                            unlink('assets/backend/assets/images/causes/thumbnail/' . $request['oldThumbnail']);
                            $request['thumbnailImage'] = $thumbNailName;
                        }
                    } else {
                        $request['thumbnailImage'] =  $request['oldThumbnail'];
                    }

                    if ($this->request->getFile('mein_images')->getSize() > 0) {
                        $mainImage = $this->request->getFile('mein_images');
                        if ($mainImage->isValid() && !$mainImage->hasMoved()) {
                            $mainImg = $mainImage->getRandomName();
                            $mainImage->move('assets/backend/assets/images/causes/main', $mainImg);
                            unlink('assets/backend/assets/images/causes/main/' . $request['old_mein_images']);
                            $request['mein_images'] = $thumbNailName;
                        }
                    } else {
                        $request['mein_images'] =  $request['old_mein_images'];
                    }
                    $detail = explode(';', $request['oldDetails_images']);
                    if ($this->request->getFileMultiple('details_images')) {
                        $files = $this->request->getFileMultiple('details_images');
                        if ($files[0]->getSize() > 0) {
                            foreach ($files as  $file) {
                                if ($file->isValid() && !$file->hasMoved()) {
                                    $newName = $file->getRandomName();
                                    $file->move('assets/backend/assets/images/causes/detailImages', $newName);
                                    array_push($multipleImages, $newName);
                                }
                            }
                            if (!empty($detail)) {
                                for ($i = 0; $i < sizeof($detail); $i++) {
                                    unlink('assets/backend/assets/images/causes/detailImages/' . $detail[$i]);
                                }
                            }

                            $request['details_images'] = implode(';', $multipleImages);
                        } else {
                            $request['details_images'] =  $request['oldDetails_images'];
                        }
                    }
                    $causeData = array(
                        'cause_id' => $request['causeId'],
                        'cause_title' => $request['causeTitle'],
                        'raised_amount' => $request['raisedAmount'],
                        'goal_amount' => $request['goalAmount'],
                        'cause_short_description' => $request['shortDescription'],
                        'cause_long_description' => $request['longDescription'],
                        'thumbnail_image' => $request['thumbnailImage'],
                        'details_images' => $request['mein_images'],
                        'cause_thumbnail_image' => $request['details_images'],
                        'is_urgent' => isset($request['urgentCause']) ? '1' : '0',
                        'is_latest' => isset($request['latestCause']) ? '1' : '0',
                        'status' => isset($request['status']) ? '1' : '0',
                        'modified_at' => date("Y-m-d H:i:s"),
                    );
                    $result = $this->causesModel->updateCause($causeData, $request['causeId']);
                    if ($result) {
                        return redirect()->to('causes')->with('success', 'Causes Update Successfully');
                    } else {
                        return redirect()->to('causes')->with('failed', 'Unable to Update Causes');
                    }
                }
            } else {
                return redirect()->to('causes')->with('failed', 'Invalid Recaptcha Token');
            }
        }
    }

    public function slider()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'sliderTitle' => [
                        'label'  => 'Slider Title',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],
                    'subtitle' => [
                        'label'  => 'Slider SubTitle',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],
                    'thumbnailImage' => [
                        'label'  => 'Thumbnail Image',
                        'rules'  => 'mime_in[thumbnailImage,image/jpg,image/png,image/jpeg]|ext_in[thumbnailImage,png,jpg,jpeg]|max_dims[thumbnailImage,1920,803]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                            'max_dims' => 'file size should be  1920*803 '
                        ],
                    ],

                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    if ($this->request->getFile('thumbnailImage')->getSize() > 0) {
                        $img = $this->request->getFile('thumbnailImage');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $thumbNailName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/', $thumbNailName);
                            unlink('assets/backend/assets/images/' . $request['oldThumbnail']);
                            $request['thumbnailImage'] = $thumbNailName;
                        }
                    } else {
                        $request['thumbnailImage'] =  $request['oldThumbnail'];
                    }
                }
                $sliderData = array(
                    'slider_id' => $request['sliderId'],
                    'slider_title' => $request['sliderTitle'],
                    'slider_subtitle' => $request['subtitle'],
                    'status' => isset($request['status']) ? '1' : '0',
                    'slider_image' => $request['thumbnailImage']
                );

                $result = $this->generalModel->upsert_data('slider', $sliderData);
                if ($result) {
                    return redirect()->to('slider')->with('success', 'Sliders Update Successfully');
                } else {
                    return redirect()->to('slider')->with('failed', 'Unable to Update Sliders');
                }
            } else {
                return redirect()->to('slider')->with('failed', 'Invalid Recaptcha Token');
            }
        }

        $menuData = $this->request->menuData;
        $sliderData = $this->generalModel->fetch_single_data('slider');
        return view('admin/slider', compact('menuData', 'sliderData'));
    }

    public function events()
    {
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'eventTitle' => [
                        'label'  => 'Event Title',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],
                    'eventVenue' => [
                        'label'  => 'Event Venue',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],
                    'thumbnailImage' => [
                        'label'  => 'Thumbnail Image',
                        'rules'  => 'mime_in[thumbnailImage,image/jpg,image/png,image/jpeg]|ext_in[thumbnailImage,png,jpg,jpeg]|max_dims[thumbnailImage,450,500]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                            'max_dims' => 'file size should be  450*500'
                        ],
                    ],
                    'main_images' => [
                        'label'  => 'Thumbnail Image',
                        'rules'  => 'mime_in[main_images,image/jpg,image/png,image/jpeg]|ext_in[main_images,png,jpg,jpeg]|max_dims[main_images,900,500]',
                        'errors' => [
                            'ext_in' => 'Only PNG,JPEG and JPG is valid',
                            'mime_in' => 'Only PNG,JPEG and JPG is valid',
                            'max_dims' => 'file size should be  900*500'
                        ],
                    ],

                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    if ($this->request->getFile('thumbnailImage')->getSize() > 0) {
                        $img = $this->request->getFile('thumbnailImage');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $thumbNailName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/events/', $thumbNailName);
                            $request['thumbnailImage'] = $thumbNailName;
                        }
                    }
                    if ($this->request->getFile('main_images')->getSize() > 0) {
                        $img = $this->request->getFile('main_images');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $mainImageName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/events/', $mainImageName);

                            $request['main_images'] = $mainImageName;
                        }
                    }
                    helper('util');
                    $eventData = array(
                        'event_id' => $request['eventId'],
                        'event_title' => $request['eventTitle'],
                        'event_short_description' => $request['shortDescription'],
                        'event_long_description' => $request['longDescription'],
                        'event_date_time' => $request['schedule'],
                        'event_venue' => $request['eventVenue'],
                        'event_venue_city' => $request['eventVenueCity'],
                        'event_contact' => $request['contact'],
                        'thumbnail_image' => $request['thumbnailImage'],
                        'main_image' => $request['main_images'],
                        'is_upcoming' => isset($request['upcoming']) ? '1' : '0',
                        'status' => isset($request['status']) ? '1' : '0',
                    );

                    $result = $this->generalModel->insert_data('events', $eventData);
                    if ($result) {
                        return redirect()->to('event')->with('success', 'Event Inserted Successfully');
                    } else {
                        return redirect()->to('evemt')->with('failed', 'Unable to Insert Event');
                    }
                    echo "<pre>";
                    print_r($request);
                    die;
                }
            } else {
                return redirect()->to('event')->with('failed', 'Invalid Recaptcha Token');
            }
        }
        $menuData = $this->request->menuData;
        $eventData = $this->generalModel->fetch_data('events');
        return view('admin/events', compact('menuData', 'eventData'));
    }

    public function eventView()
    {
        $eventId = $this->request->getGet('event_id');
        $causeData = $this->generalModel->fetch_single_data('events', array('event_id' => $eventId));

        echo json_encode($causeData);
    }
    public function eventEdit($eventId)
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        $eventData = $this->generalModel->fetch_single_data('events', array('event_id' => urldecode(base64_decode($eventId))));
        $menuData = $this->request->menuData;
        return view('admin/event_edit', compact('menuData', 'eventData'));
    }

    public function eventEditAction()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {

            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'eventTitle' => [
                        'label'  => 'Event Title',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],
                    'eventVenue' => [
                        'label'  => 'Event Venue',
                        'rules'  => 'required',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                        ],
                    ],

                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $multipleImages = [];
                    if ($this->request->getFile('thumbnailImage')->getSize() > 0) {
                        $img = $this->request->getFile('thumbnailImage');
                        if ($img->isValid() && !$img->hasMoved()) {
                            $thumbNailName = $img->getRandomName();
                            $img->move('assets/backend/assets/images/events', $thumbNailName);
                            unlink('assets/backend/assets/images/events/' . $request['oldThumbnail']);
                            $request['thumbnailImage'] = $thumbNailName;
                        }
                    } else {
                        $request['thumbnailImage'] =  $request['oldThumbnail'];
                    }

                    if ($this->request->getFile('main_images')->getSize() > 0) {
                        $mainImage = $this->request->getFile('main_images');
                        if ($mainImage->isValid() && !$mainImage->hasMoved()) {
                            $mainImg = $mainImage->getRandomName();
                            $mainImage->move('assets/backend/assets/images/events', $mainImg);
                            unlink('assets/backend/assets/images/events' . $request['old_main_images']);
                            $request['main_images'] = $thumbNailName;
                        }
                    } else {
                        $request['main_images'] =  $request['old_main_images'];
                    }
                    $eventData = array(
                        'event_id' => $request['eventId'],
                        'event_title' => $request['eventTitle'],
                        'event_short_description' => $request['shortDescription'],
                        'event_long_description' => $request['longDescription'],
                        'event_date_time' => $request['schedule'],
                        'event_venue' => $request['eventVenue'],
                        'event_venue_city' => $request['eventVenueCity'],
                        'event_contact' => $request['contact'],
                        'thumbnail_image' => $request['thumbnailImage'],
                        'main_image' => $request['main_images'],
                        'is_upcoming' => isset($request['upcoming']) ? '1' : '0',
                        'status' => isset($request['status']) ? '1' : '0',
                    );
                    $result = $this->generalModel->update_data('events', $eventData, array('event_id' => $request['eventId']));
                    if ($result) {
                        return redirect()->to('event')->with('success', 'Event Update Successfully');
                    } else {
                        return redirect()->to('event')->with('failed', 'Unable to Update Event');
                    }
                }
            } else {
                return redirect()->to('event')->with('failed', 'Invalid Recaptcha Token');
            }
        }
    }

    public function contacts()
    {
        $session = session();
        $user = $session->get('user');
        if (empty($user)) {
            return redirect()->to('sign-in');
        }
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {

                $validation = \Config\Services::validation();
                $validation->setRules([
                    'email' => [
                        'label'  => 'Email Id',
                        'rules'  => 'required|valid_email',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'valid_email' => 'Enter Valid Email Id',
                        ],
                    ],
                    'phoneNumber' => [
                        'label'  => 'Phone Number',
                        'rules'  => 'required|max_length[10]|is_natural',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'max_length' => 'Phone number must be of 10 digit',
                            'is_natural' => 'Enter valid phone Number'
                        ],
                    ]
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $sliderData = array(
                        'contact_id' => $request['contactId'],
                        'email' => $request['email'],
                        'phone_number' => $request['phoneNumber'],
                        'address' => $request['address'],
                        'facebook' => $request['facebook'],
                        'instagram' => $request['instagram'],
                        'linkedin' => $request['linkedin'],
                        'twitter' => $request['twitter'],
                        'status' => isset($request['status']) ? '1' : '0'
                    );

                    $result = $this->generalModel->upsert_data('contact', $sliderData);
                    if ($result) {
                        return redirect()->to('contacts')->with('success', 'Contacts Update Successfully');
                    } else {
                        return redirect()->to('contacts')->with('failed', 'Unable to Update Contacts');
                    }
                }
            } else {
                return redirect()->to('contacts')->with('failed', 'Invalid Recaptcha Token');
            }
        }
        $menuData = $this->request->menuData;
        $contact = $this->generalModel->fetch_single_data('contact', array('status' => '1'));
        return view('admin/contact', compact('menuData', 'contact'));
    }
}

<?php

namespace App\Controllers;

use App\Controllers\BaseController;
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
    }
    public function menu()
    {
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
                helper('util');
                $menu = array(
                    'menu_id' => generateRandom('alnum', 16),
                    'menu_name' => $request['menuName'],
                    'menu_icon' => $request['menuIcon'],
                    'menu_url' => $request['menuUrl'],
                    'parent_id' => !empty($request['parentMenu']) ? $request['parentMenu'] : "0",
                    'status' => $request['status']
                );
                $result = $this->menuModel->insertMenuData($menu);
                if ($result) {
                    return redirect()->to('menu')->with('success', 'Menu Inserted Successfully');
                } else {
                    return redirect()->to('menu')->with('failed', 'Unable to Insert Menu');
                } 
            }

        $menu = iterator_to_array($this->menuModel->getAllMenu(array('status' => '1')));
        $menuIcon = iterator_to_array($this->menuModel->getAllMenuIcon('menu_icons'));
        $menuData = $this->request->menuData;
        foreach ($menu as $key => $value) {
            if ($value['parent_id'] != "0") {
                $parent =  iterator_to_array($this->menuModel->getMenu(array('menu_id' => $value['parent_id'])));
                $menu[$key]['parent_name'] = $parent['menu_name'];
            }
        }
        return view('admin/menu', compact('menu', 'menuIcon', 'menuData'));
    }

    public function getParentMenu()
    {
        $session = session();
        $menu = iterator_to_array($this->menuModel->getAllMenu(array('status' => '1')));
       // 
        if (!empty($menu)) {
            foreach ($menu as $key => $value) {
                if ($value['parent_id'] != 0) {
                    $parentMenu = iterator_to_array($this->menuModel->getMenu(array('menu_id' => $value['parent_id'])));
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
        $menuId = $this->request->getGet('menu_id');

        $menu = iterator_to_array($this->menuModel->getMenu(array('status' => '1', 'menu_id' => $menuId)));
        
        
            $menuData['data'] = array(
                'menu_id' => $menu['menu_id'],
                'menu_name' => $menu['menu_name'],
                'parentName' => iterator_to_array($this->menuModel->getAllMenu( array('parent_id' => '0'))),
                'status' =>  $menu['status']
            );
        echo json_encode($menuData);
    }

    public function menuEdit()
    {
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
                helper('util');
                $menu = array(
                    'menu_name' => $request['menuName'],
                    'parent_id' => !empty($request['parentMenu']) ? $request['parentMenu'] : "0",
                    'status' => $request['status']
                );

                $result = $this->menuModel->updateMenuData( $menu, array('menu_id' => $request['menu_id']));
                if ($result) {
                    return redirect()->to('menu')->with('success', 'Menu Update Successfully');
                } else {
                    return redirect()->to('menu')->with('failed', 'Unable to Update Menu');
                }
            
        }
    }

    public function role()
    {
        
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
                helper('util');
                $roleId = generateRandom('alnum', 16);
                $role = array(
                    'role_id' => $roleId,
                    'role_name' => $request['roleName'],
                    'status' => $request['status']
                );


                $result = $this->roleModel->insertRoleData($role);
                if ($result) {
                    foreach ($request['menu'] as $key => $value) {
                        $menuData = array(
                            'menu_id' => $value,
                            'role_id' => $roleId,
                        );
                        $this->roleModel->insertMenuMapping($menuData);
                    }
                }
                if ($result) {
                    return redirect()->to('role')->with('success', 'Role Inserted Successfully');
                } else {
                    return redirect()->to('role')->with('failed', 'Unable to Insert Role');
                }
           
        }
        $menu = iterator_to_array($this->menuModel->getAllMenu(array('parent_id' => '0')));
        
        foreach ($menu as $key => $value) {
            $parent =  iterator_to_array($this->menuModel->getAllMenu(array('parent_id' => $value['menu_id'])));
            $menu[$key]['child_menu'] = $parent;
        }
        $role = $this->roleModel->getRole();
        $menuData = $this->request->menuData;
        return view('admin/role', compact('role', 'menu', 'menuData'));
    }

    public function getRoleById()
    {
        
        $roleId = $this->request->getGet('role_id');
        $role = $this->roleModel->getSingleRole(array('role_id' => $roleId));
        $roleData['data'] = array(
            'role_id' => $role['role_id'],
            'role_name' => $role['role_name'],
            'status' =>  $role['status']
        );
        echo json_encode($roleData);
    }

    public function roleEdit()
    {
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
                $role = array(
                    'role_name' => $request['roleName'],
                    'status' => $request['status']
                );
                $result = $this->roleModel->updateRole( $role, array('role_id' => $request['role_id']));
                if ($result) {
                    return redirect()->to('role')->with('success', 'Role Update Successfully');
                } else {
                    return redirect()->to('role')->with('failed', 'Unable to Update role');
                }
            } 
        }

    public function user()
    {
               if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
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
                            'valid_email' => 'Enter Valid Email Id'
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
                        "user_profile_image" =>"",
                        'status' => $request['status'],
                        "created_at"=>"",
                        "modified_at"=>"",
                    );
                    $result = $this->userModel->insertUserData( $userData);

                    if ($result) {
                        return redirect()->to('user')->with('success', 'User Generate Successfully');
                    } else {
                        return redirect()->to('user')->with('failed', 'Unable to Create User');
                    }
                }
            } 
        $role = iterator_to_array($this->roleModel->getRole('role'));
        $menuData = $this->request->menuData;
        $userData = $this->userModel->getAllUser();
        return view('admin/user', compact('role', 'userData', 'menuData'));
    }
    public function userDataEdit()
    {
        $user_id = $this->request->getGet('user_id');
        $user = iterator_to_array($this->userModel->getUser($user_id));
        echo json_encode($user[0]);
    }
    public function profile()
    {
        $session = session();
        $user_id = $session->get('userId');
        $user = iterator_to_array($this->userModel->getUser($user_id));
        //echo "<pre>";print_r($user);die;
        $menuData = $this->request->menuData;
        return view('admin/profile', compact('user', 'menuData'));
    }

    public function userEdit()
    {
              if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
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
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->back()->withInput()->with('validationError', $validation->getErrors());
                } else {
                    
                    $userData = array(
                        'user_name' => $request['userName'],
                        'user_email' => $request['userEmail'],
                        'user_phone' => $request['phoneNumber'],
                        'user_password' => base64_encode($request['password']),
                    );
                    $result = $this->userModel->updateUserData($userData, array('user_id' => $request['user_id']));
                    if ($result) {
                        return redirect()->to('profile')->with('success', 'Profile Update Successfully');
                    } else {
                        return redirect()->to('profile')->with('failed', 'Unable to Update Profile');
                    }
                }
        }
    }

    public function userAccessEdit()
    {

        $role_id = $this->request->getGet('role_id');
        $role['role'] = $this->roleModel->getSingleRole(array('role_id' => $role_id));
        $menuAccess = iterator_to_array($this->menuModel->getNavigation(array('role_id' => $role_id)));
       
        $menu = iterator_to_array($this->menuModel->getAllMenu(array('parent_id' => '0')));
        foreach ($menu as $key => $value) {
            $parent =  iterator_to_array($this->menuModel->getAllMenu(array('parent_id' => $value['menu_id'])));
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
        $roleId = $this->request->getGet('role_id');
        $menuId = $this->request->getGet('menu_id');

        $menuData = $this->menuMappingModel->getAllMenu(array('role_id' => $roleId, 'menu_id' => $menuId));
       
        if (!empty($menuData)) {
            if ($menuData['status'] == '1') {
                $this->menuMappingModel->updateRole(array('menu_id'=>$menuId,"role_id"=>$roleId),array('status' => '0'));
            } else if ($menuData['status'] == '0') {
                $this->menuMappingModel->updateRole(array('menu_id'=>$menuId,"role_id"=>$roleId),array('status' => '1'));
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
public function survey(){
    $menuData = $this->request->menuData;
    return view('admin/survey',compact('menuData'));
}
}

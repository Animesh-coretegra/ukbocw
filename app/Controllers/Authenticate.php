<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\GeneralModel;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Authenticate extends BaseController
{
    private $generalModel;

    public function initController(
        RequestInterface $request,
        ResponseInterface $response,
        LoggerInterface $logger
    ) {
        parent::initController($request, $response, $logger);
        $this->generalModel = new GeneralModel();
    }
    public function auth()
    {
        helper(['cookie', 'util']);
        if ($this->request->getMethod() == 'post') {
            $request = $this->request->getPost();
            $recaptcha = new \ReCaptcha\ReCaptcha(getenv('RECAPTCHA_SECRET_V3_KEY'));
            $resp = $recaptcha->setExpectedHostname($_SERVER['SERVER_NAME'])
                ->verify($request['g-recaptcha-response'], $_SERVER['REMOTE_ADDR']);
            if ($resp->isSuccess()) {
                $validation = \Config\Services::validation();
                $validation->setRules([
                    'password' => [
                        'label'  => 'Password',
                        'rules'  => 'required|max_length[16]|min_length[8]|regex_match[/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,16}$/]',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'min_length' => 'Your {field} is too short. You want to get hacked?',
                            'regex_match' => 'Password length must be 8 and at least 1 special symbol,1 lowercase and 1 uppercase'
                        ],
                    ],
                    'username' => [
                        'label'  => 'Email Id',
                        'rules'  => 'required|valid_email',
                        'errors' => [
                            'required' => 'All accounts must have {field} provided',
                            'valid_email' => 'Enter Valid Email Id',
                        ],
                    ],
                ]);

                if (!$validation->withRequest($this->request)->run()) {
                    return redirect()->to('sign-in')->withInput()->with('validationError', $validation->getErrors());
                } else {
                    $condition = array(
                        'user_email' => $request['username'],
                        'user_password' => base64_encode($request['password']),
                        'status' => '1'
                    );
                    $user = $this->generalModel->fetch_single_data('user', $condition);
                    if (!empty($user)) {
                        if (isset($request['rememberMe'])) {
                            $userValue = array(
                                'username' => $request['username'],
                                'password' => $request['password']
                            );
                            setcookie("userData", encryptData($userValue));
                        }
                        $session = session();
                        $userSession = [
                            'userId'  => $user['user_id'],
                            'username'  => $user['user_name'],
                            'profile'  => $user['user_profile_image'],
                        ];
                        $session->set('user', $userSession);
                        $session->set('role', $user['user_role']);
                        return redirect()->to('/dashboard');
                    } else {
                        return redirect()->to('/sign-in')->withInput()->with('failed', 'Invalid username & Password');
                    }
                }
            }
        }
        return view('login');
    }

    public function forgotPassword()
    {
        return view('forgotPassword');
    }
    public function recoverPassword()
    {
        return view('recoverPassword');
    }
    public function logout()
    {
        $session = session();
        $session->destroy();
        return redirect()->to('/sign-in')->withInput()->with('success', 'Logout Successful');
    }
}

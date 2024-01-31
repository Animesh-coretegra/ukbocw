<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use GuzzleHttp\Client;
use Exception;

class Authenticate extends BaseController
{
    public function auth()
    {
        helper('jwt');
        try {
            $header = [
                'uri' => $this->request->getPath(),
            ];
            $request = $this->request->getPost();
           
                $client = new Client(['verify' => 'D:\wamp64\bin\php\php8.2.0\extras\ssl\cacert.pem']);
                $header = array(
                    'Accept'     => 'application/json',
                    'x-api-key' => getenv('API_KEY'),
                );

                $data = $client->request('post', base_url('api/v1/auth'), ['body' => json_encode($request), 'headers' => $header]);
                if ($data->getStatusCode()) {
                    $session = \Config\Services::session($config = null);
                    $response = json_decode($data->getBody()->read(2048), true);
                    $session->set('access-token', $response['access-token']);
                    $session->set('role', $response['user']['user_role']);
                    $session->set('username', $response['user']['user_name']);
                    $session->set('userId', $response['user']['user_id']);
                    return redirect()->to("dashboard");
                } else {
                throw new Exception('Invalid Username and Password.');
            }
        } catch (Exception $e) {
            if ($e->getCode() == 400) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            } else {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        }
    }

    public function forgotPassword()
    {
        $request = $this->request->getPost();
        $rules = [
            'username' => 'required|min_length[6]|max_length[50]|valid_email'
        ];
        $validation = \Config\Services::validation();
        if (!$this->validateRequest($request, $rules)) {
            return redirect()->to('/forget-password')->with('validation', $validation->getErrors());
        } else {
            try {
                
                    $header = array(
                        'Accept'     => 'application/json',
                        'x-api-key' => getenv('API_KEY'),
                    );
                    $authModel = new AuthModel();
                    $user = json_decode($authModel->findUserByEmailAddress($request['username']), true);
                    if (!empty($user)) {
                        return redirect()->to('/reset-password')->withInput();
                    }
            } catch (Exception $e) {
                return redirect()->back()->withInput()->with('error', $e->getMessage());
            }
        }
    }

    public function resetPassword(){
        $request = $this->request->getPost();
                $client = new Client(['verify' => 'D:\wamp64\bin\php\php8.2.0\extras\ssl\cacert.pem']);
                $header = array(
                    'Accept'     => 'application/json',
                    'x-api-key' => getenv('API_KEY'),
                );
                $requestBody = array(
                    'username'=>$request['username'],
                    'password'=>$request['password'],
                    'confirm_password'=>$request['confirm_password'],
                );
                try{
                $data = $client->request('post', base_url('api/v1/reset-password'), ['body' => json_encode($requestBody), 'headers' => $header]);
                $response = json_decode($data->getBody()->read(2048),true);
                if(!empty($response)){
                    return redirect()->to('/')->with('success','Password updated successfully');
                }
                }catch(Exception $e){
                    if(in_array($e->getCode(),[400,500])){
                        return redirect()->back()->withInput()->with('error', $e->getMessage());
                    }
                    return redirect()->back()->withInput()->with('error', $e->getMessage());
                }
    }

    public function logout(){
        $session = session();
        $session->destroy();
    return redirect()->to('/');
    }
}

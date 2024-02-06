<?php

namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AuthModel;
use CodeIgniter\HTTP\ResponseInterface;
use Exception;

class Api extends BaseController
{
    public function Login()
    {
        if ($this->request->getMethod() == 'post') {
            if ($this->request->hasHeader('x-api-key') && $this->request->header('x-api-key')->getValue() == getenv('API_KEY')) {
                $validation = \Config\Services::validation();
                $rules = [
                    'username' => 'required|min_length[6]|max_length[50]|valid_email',
                    'password' => 'required|min_length[8]|max_length[16]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/]'
                ];
                $header = [
                    'uri' => $this->request->getPath(),
                ];
                $request = $this->request->getBody();
                $resArr = json_decode($request, true);

                if (!$this->validateRequest($resArr, $rules)) {
                    return $this->getSuccessResponse(
                        [
                            'message' =>  $validation->getErrors(),
                        ],
                        $header,
                        ResponseInterface::HTTP_BAD_REQUEST
                    );
                } else {
                    try {
                        helper(['jwt', 'passwordEncryptDecrypt']);
                        $model = new AuthModel();
                        $password = passwordEncrypt($resArr['password']);
                        $user = $model->checkUserExist($resArr['username'], $password);
                        if (!empty($user)) {
                            $token = getSignedJWTForUser($resArr['username']);
                            return $this->getSuccessResponse(
                                [
                                    'status_code' => ResponseInterface::HTTP_OK,
                                    'status' => 'success',
                                    'message' => 'User authenticate successfully',
                                    'user' => $user,
                                    'access-token' => $token
                                ],
                                $header,
                                ResponseInterface::HTTP_OK,
                            );
                        }
                    } catch (Exception $e) {
                        return $this->getSuccessResponse(
                            [
                                'status_code' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                                'status' => 'failed',
                                'message' => $e->getMessage()
                            ],
                            $header,
                            ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                        );
                    }
                }
            } else {
                return $this->getSuccessResponse(
                    [
                        'status_code' => ResponseInterface::HTTP_NOT_FOUND,
                        'status' => 'failed',
                        'message' => 'key not found.'
                    ],
                    [
                        'uri' => $this->request->getPath(),
                    ],
                    ResponseInterface::HTTP_NOT_FOUND,
                );
            }
        } else {
            return  $this->getSuccessResponse(
                [
                    'status_code' => ResponseInterface::HTTP_METHOD_NOT_ALLOWED,
                    'status' => 'failed',
                    'message' => 'The data provided for insertion is invalid. Please check your input and try again.'
                ],
                [
                    'uri' => $this->request->getPath(),
                ],
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
    public function resetPassword()
    {
        if ($this->request->hasHeader('x-api-key') && $this->request->header('x-api-key')->getValue() == getenv('API_KEY')) {
            $validation = \Config\Services::validation();
            $rules = [
                'password' => 'required|min_length[8]|max_length[16]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/]',
                'confirm_password' => 'required|min_length[8]|max_length[16]|regex_match[/^(?=.*[0-9])(?=.*[a-z])(?=.*[A-Z])(?=.*\W)(?!.* ).{8,16}$/]|matches[password]'
            ];
            $header = [
                'uri' => $this->request->getPath(),
            ];
            $request = $this->request->getBody();
            $resArr = json_decode($request, true);
            if (!$this->validateRequest($resArr, $rules)) {

                return $this->getSuccessResponse(
                    [
                        'message' =>  $validation->getErrors(),
                    ],
                    $header,
                    ResponseInterface::HTTP_BAD_REQUEST
                );
            }
            try {
                helper(['jwt', 'passwordEncryptDecrypt']);
                $password = passwordEncrypt($resArr['password']);
                $model = new AuthModel();
                $updatedUser = $model->updateUserPassword($resArr['username'], $password);
                if (!empty($updatedUser)) {
                    return $this->getSuccessResponse(
                        [
                            'status_code' => ResponseInterface::HTTP_RESET_CONTENT,
                            'status' => 'success',
                            'message' => 'User password update successfully',
                            'user' => $updatedUser,
                        ],
                        $header,
                        ResponseInterface::HTTP_RESET_CONTENT,
                    );
                }
            } catch (Exception $e) {
                return $this->getSuccessResponse(
                    [
                        'status_code' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                        'status' => 'failed',
                        'message' => $e->getMessage()
                    ],
                    $header,
                    ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                );
            }
        }
    }

    public function survey()
    {
        if ($this->request->getMethod() == 'post') {
            if ($this->request->hasHeader('x-api-key') && $this->request->header('x-api-key')->getValue() == getenv('API_KEY')) {
                if ($this->request->hasHeader('access-token') && !empty($this->request->getHeader('access-token'))) {
                    $accessToken = $this->request->getHeader('access-token');
                    $requestValue = $this->request->getBody();
                    $header = [
                        'uri' => $this->request->getPath(),
                    ];
                    $requestArray = json_decode($requestValue, true);
                    $surveyData = json_decode(base64_decode($requestArray['survey']), true);
                    helper('util');
                    $surveyData['survey_id'] = generateRandom("alnum",16);
                    $survey = new AuthModel();
                    $insertId = $survey->insertSurveyData($surveyData);
                    if (!empty($insertId)) {
                        return $this->getSuccessResponse(
                            [
                                'status_code' => ResponseInterface::HTTP_OK,
                                'status' => 'success',
                                'data' => $insertId
                            ],
                            $header,
                            ResponseInterface::HTTP_OK,
                        );
                    }
                } else {
                    return  $this->getSuccessResponse(
                        [
                            'status_code' => ResponseInterface::HTTP_UNAUTHORIZED,
                            'status' => 'failed',
                            'message' => 'Unauthorized User'
                        ],
                        [
                            'uri' => $this->request->getPath(),
                        ],
                        ResponseInterface::HTTP_UNAUTHORIZED
                    );
                }
            } else {
                return  $this->getSuccessResponse(
                    [
                        'status_code' => ResponseInterface::HTTP_UNAUTHORIZED,
                        'status' => 'failed',
                        'message' => 'Unauthorized Request'
                    ],
                    [
                        'uri' => $this->request->getPath(),
                    ],
                    ResponseInterface::HTTP_UNAUTHORIZED
                );
            }
        }else{
            return  $this->getSuccessResponse(
                [
                    'status_code' => ResponseInterface::HTTP_INTERNAL_SERVER_ERROR,
                    'status' => 'failed',
                    'message' => 'Internal Server Error'
                ],
                [
                    'uri' => $this->request->getPath(),
                ],
                ResponseInterface::HTTP_INTERNAL_SERVER_ERROR
            );
        }
    }
}

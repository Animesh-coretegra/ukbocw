<?php

namespace App\Filters;

use App\Models\MenuMappingModel;
use App\Models\MenuModel;
use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class MenuDataFilter implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();
        $role = $session->get('role');
        $menuModel = new MenuModel();
        $menu = $menuModel->getNavigation(array('role_id' => $role));

        if (!empty($menu)) {
            foreach ($menu as $key => $value) {
                $parent =  $menuModel->getMenu(array('menu_id' => $value['menu_id']));
                $menu[$key]['menu'] = $parent;
            }
        }
        $menuData =  [];
        foreach ($menu as $key => $value) {
            if ($value['menu']['parent_id'] == '0')
                $menuData[$key] = $value;
        }
        $i = 0;
        foreach ($menuData as $p_key => $menuValue) {
            foreach ($menu as $key => $value) {
                if ($value['menu']['parent_id'] == $menuValue['menu_id'])
                    $menuData[$p_key]['child_menu'][$i++] = $value['menu'];
            }
            $i = 0;
        }

        $request->menuData = $menuData;
        return $request;
    }

    /**
     * Allows After filters to inspect and modify the response
     * object as needed. This method does not allow any way
     * to stop execution of other after filters, short of
     * throwing an Exception or Error.
     *
     * @param RequestInterface  $request
     * @param ResponseInterface $response
     * @param array|null        $arguments
     *
     * @return mixed
     */
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        //
    }
}

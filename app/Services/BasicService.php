<?php
/**
 * Created by PhpStorm.
 * User: stasi
 * Date: 19.05.2022
 * Time: 1:44
 */

namespace App\Services;


/**
 * Class BasicService
 * @package App\Services
 */
class BasicService
{
    /**
     * @param int $status
     * @param array $data
     * @return array
     */
    protected function errorResponse($status = 404, $data = [])
    {
        return [
            'status' => $status,
            'data' => $data
        ];
    }

    /**
     * @param int $status
     * @param array $data
     * @return array
     */
    protected function successResponse($status = 204, $data = [])
    {
        return [
            'status' => $status,
            'data' => $data
        ];
    }
}

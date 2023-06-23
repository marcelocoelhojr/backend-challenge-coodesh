<?php

namespace App\Http\Controllers;

use App\Http\Resources\CronLogResource;
use App\Services\CronLog\CronLogService;
use Illuminate\Http\JsonResponse;

class CronLogController extends Controller
{
    /**
     * Get cron API details
     *
     * @return JsonResponse
     */
    public function getApidetails(): JsonResponse
    {
        $cronService = new CronLogService();
        $log = $cronService->getApiCronDetails();

        return apiResponse(new CronLogResource($log), 'detalhes da api');
    }

    /**
     * Get cron API details by product code
     *
     * @param int $id
     * @return JsonResponse
     */
    public function getProductDetails(int $id): JsonResponse
    {
        $cronService = new CronLogService();
        $log = $cronService->getProductDetails($id);

        return apiResponse($log, 'detalhes da api');
    }

    /**
     * List products by log code
     *
     * @param int $id
     * @return JsonResponse
     */
    public function listProductLog(int $id): JsonResponse
    {
        $cronService = new CronLogService();
        $log = $cronService->listProductLog($id);

        return apiResponse($log, 'detalhes da api');
    }
}

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
}

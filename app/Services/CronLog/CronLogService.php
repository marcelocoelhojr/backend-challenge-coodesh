<?php

namespace App\Services\CronLog;

use App\Models\CronLog;
use App\Models\Product;
use Illuminate\Support\Collection;

class CronLogService
{
    /**
     * Get cron API details
     *
     * @return CronLog
     */
    public function getApiCronDetails(): CronLog
    {
        return CronLog::latest('executed_at')->first();
    }

     /**
     * Get cron API details by product code
     *
     * @param int $id
     * @return CronLog
     */
    public function getProductDetails(int $id): CronLog
    {
        return CronLog::with('product')->where('id', $id)->first();
    }

    /**
     * List products by log code
     *
     * @param int $id
     * @return CronLog
     */
    public function listProductLog(int $id): CronLog
    {
        $cronLog = CronLog::with('productsLog')->where('id', $id)->first();
 
        return $cronLog;
    }
}

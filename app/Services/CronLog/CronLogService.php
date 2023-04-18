<?php

namespace App\Services\CronLog;

use App\Models\CronLog;

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
}

<?php

namespace App\Traits;

use App\Models\CronLog as ModelsCronLog;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

trait CronLog
{
    /**
     * Save cron log to database
     *
     * @return void
     */
    public function saveCronLog(...$params): void
    {
        $name = $params[0];
        $time = $params[1];
        $memory = $params[2];
        ModelsCronLog::create([
            'name' => $name,
            'time' => $time,
            'memory' => $memory,
            'executed_at' => Carbon::now()->format('Y-m-d H:i:s'),
            'status_connection_database' => $this->getDatabaseConnectionStatus()
        ]);
    }

    /**
     * Get database connection status
     *
     * @return string
     */
    private function getDatabaseConnectionStatus(): string
    {
        return DB::connection()->getPdo() ? 'SUCCESS' : 'FAILURE';
    }
}

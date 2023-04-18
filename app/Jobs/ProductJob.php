<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Traits\CronLog;


class ProductJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels, CronLog;

    protected string $fileName;
    protected string $provider;
    protected int $startTime;

    const PRODUCT_CLASS_NAMESPACE = 'App\\Services\\Product\\';

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(string $provider, string $fileName)
    {
        $this->startTime =  microtime(true);
        $this->provider = ucfirst($provider);
        $this->fileName = $fileName;
    }

    /**
     * Execute the job.
     *
     * @return void
     * @throws Exception
     */
    public function handle(): void
    {
        $providerClass =  self::PRODUCT_CLASS_NAMESPACE . $this->provider . "\\" . $this->provider . "Service";
        $providerService = new $providerClass($this->fileName);
        $providerService->getProductFile();
        $this->saveCronLog($this->provider, $this->getTimeInterval(), memory_get_usage());
    }

    /**
     * Get time interval
     *
     * @return integer
     */
    private function getTimeInterval(): int
    {
        return microtime(true) - $this->startTime;
    }
}

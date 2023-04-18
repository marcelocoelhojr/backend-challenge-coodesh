<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CronLogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'database_connection' => $this->status_connection_database,
            'cron' => [
                'time' => $this->time,
                'memory' => $this->memory,
                'executed_at' => $this->executed_at
            ]
        ];
    }
}

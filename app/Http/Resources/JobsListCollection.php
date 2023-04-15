<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class JobsListCollection extends ResourceCollection
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        $jobs = $this->collection['data'];
        unset($this->collection['data']);
        return [
            'jobs' => $jobs,
            'paginate' => $this->collection->all()
        ];
    }
}

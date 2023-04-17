<?php

namespace App\Services\Product\OpenFood;

use App\Models\Product;
use App\Services\Product\ProductValidation;
use Carbon\Carbon;

class OpenFoodValidation extends ProductValidation
{
    /**
     * @inheritdoc
     */
    protected function extractFindCode(): int
    {
        return (int)preg_replace('/[^0-9]/', '', $this->product->code);
    }

    /**
     * @inheritdoc
     */
    protected function setProductApiData(): Product
    {
        $model = new Product();
        $model->external_id = $this->extractFindCode();
        $model->product_name = $this->product->product_name;
        $model->status = 'published';
        $model->imported_t = Carbon::now()->format('Y-m-d H:i:s');
        $model->url =  $this->product->url;
        $model->product_file = $this->fileName;
        $model->payload = json_encode($this->product);

        return $model;
    }
}

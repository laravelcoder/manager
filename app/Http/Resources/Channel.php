<?php

declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Channel extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {

            // 'ad_name' => $this->resource['ad_name'],
        // 'channel' => $this->resource['channel'],
        // 'discovered' => $this->resource['discovered'],
        // 'refered_host_ss' => $this->resource['refered_host_ss'],
        // 'duration' => $this->resource['duration'],
        // 'ad_id' => $this->resource['ad_id'],
        // 'matched' => $this->resource['matched'],
        // 'dd_id' => $this->resource['dd_id'],

        return parent::toArray($request);
    }
}

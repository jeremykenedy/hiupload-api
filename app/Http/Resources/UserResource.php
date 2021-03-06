<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name'          => $this->name,
            'email'         => $this->email,
            'subscribed'    => $this->subscribed('default'),
            'ends_at'       => optional(optional($this->subscription('default'))->ends_at)->toDateTimeString(),
            'plan'          => new PlanResource($this->plan),
        ];
    }
}

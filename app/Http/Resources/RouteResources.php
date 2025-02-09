<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RouteResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'success' => true,
            'message' => 'data berhasil ditambahkan',
            'nik' => $request->userid,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
        ];
    }
}

<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResources extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $routetoday = $this->routes->last();
        return [
            'success' => true,
            'token' => $this->createToken('API Token')->plainTextToken,
            'nik'=>$this->nik,
            'name'=>$this->name,
            'role'=>$this->role,
            'last_seen'=>$this->last_seen,
            'route'=>$routetoday,
        ];
    }
}

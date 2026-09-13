<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'firstName' => $this->first_name,
            'lastName' => $this->last_name,
            'name' => $this->full_name,
            'email' => $this->email,
            'phone' => $this->phone,
            'avatarUrl' => $this->avatar_url,
            'gender' => $this->gender,
            'birthday' => $this->birthday,
            'role' => $this->role,
            'emailVerifiedAt' => $this->email_verified_at,
            'createdAt' => $this->created_at,
        ];
    }
}

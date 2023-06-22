<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Carbon;

class ScheduleResource extends JsonResource
{

    public function toArray($request)
    {
        return [
          'id' => $this->id,
          'user' => [
              'id' => $this->user->id,
              'first_name' => $this->user->first_name,
              'last_name' => $this->user->last_name,

          ],
          'date' => [
              'date' => Carbon::make($this->date)->format('d-y'),
              'monthName' => Carbon::make($this->date)->month,
          ],
          'time' => $this->time,
          'status' => $this->status
        ];
    }
}

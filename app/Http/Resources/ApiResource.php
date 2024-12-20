<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ApiResource extends JsonResource
{
    public $status;
    public $pesan;
    public $data;

    public function __construct($resources, $pesan, $status)
    {
        parent::__construct($resources);
        $this->status = $status;
        $this->pesan = $pesan;
    }
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return array(
            "pesan" => $this->pesan,
            "status" => $this->status,
            "data" => $this->resource
        );
    }
}

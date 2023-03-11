<?php

namespace App\Exports;

use App\Models\Invitation; 
use Maatwebsite\Excel\Concerns\Exportable; 
use Maatwebsite\Excel\Concerns\FromQuery; 

class InvitationPublicExport implements FromQuery
{
    use Exportable;
    protected $val;
    public function __construct(string $val)
    {
        $this->val = $val;
    }

    public function query()
    {
        return Invitation::query()->where('is_attentions', $this->val);
    }
}

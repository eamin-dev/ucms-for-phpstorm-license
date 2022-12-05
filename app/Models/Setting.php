<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    /**
     * @return \string[][]
     */
    public static function platform(): array
    {
        return [
            1 => ['id'=>1, 'name' => 'RapidPro'],
            2 => ['id'=>2, 'name' => 'IoGT'],
            3 => ['id'=>3, 'name' => 'Both'],
        ];
    }

    /**
     * @return \string[][]
     */
    public static function status(): array
    {
        return [
            1 => 'Active',
            2 => 'Inactive',
            3 => 'Pending',
            4 => 'Approved',
            5 => 'Deleted',
            6 => 'Suspended',
            7 => 'Expired',
            8 => 'Banned',
            9 => 'Rejected',
            10 => 'Draft',
            11 => 'Blocked',
            12 => 'Archived'
        ];
    }
}

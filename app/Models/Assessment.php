<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;

    protected function setKeysForSaveQuery($query)
    {
        $query
            ->where('user_id', '=', $this->getAttribute('user_id'))
            ->where('role', '=', $this->getAttribute('role'))
            ->where('assessmentNumber', '=', $this->getAttribute('assessmentNumber'));

        return $query;
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $table = "projects";
    protected $guarded = [];


    public function persist($data, $save = true)
    {
        foreach ($data as $key => $value)
        {
            $this->$key = $value;
        }

        if ($save)
        {
            $this->save();
        }

        return $this;
    }
}

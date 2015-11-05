<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $fillable = [ 'name', 'features', ];


    public function getFeaturesAttribute($features)
    {
        return join(', ', json_decode($features));
    }


    public function getFeaturesArrayAttribute()
    {
        return json_decode($this->attributes['features']);
    }

    public function setFeaturesAttribute($features)
    {
        $this->attributes['features'] = json_encode(array_map('trim',
          explode(',', $features)));
    }
}

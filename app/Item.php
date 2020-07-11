<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    protected $fillable = ['description', 'color', 'print_text'];
  
    /**
     * Set the categories
     *
     */
    public function setCatAttribute($value)
    {
        $this->attributes['description'] = json_encode($value);
        $this->attributes['color'] = json_encode($value);
    }
  
    /**
     * Get the categories
     *
     */
    public function getCatAttribute($value)
    {
        return $this->attributes['description'] = json_decode($value);
        return $this->attributes['color'] = json_decode($value);
    }
}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Job extends Model
{
    use HasFactory;

    // Verbindt de juiste tabel
    protected $table = 'job_listings';

    // Vulbare velden
    protected $guarded = [''];
 
    // Definieer de relatie naar het Employer model
    public function employer()
    {
        return $this->belongsTo(Employer::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'job_tags', 'job_listing_id', 'tag_id');


    }
}

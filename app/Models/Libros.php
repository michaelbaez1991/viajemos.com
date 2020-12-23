<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'libros';

    /**
     * Get the post that owns the comment.
    */
    public function editoriales()
    {
        return $this->belongsTo(Editoriales::class);
    }
}

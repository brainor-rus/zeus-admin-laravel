<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Zeus\Admin\Cms\Models\ZeusAdminFile;

class City extends Model
{
    protected $fillable = [
        'name',
    ];

    public function zaGalleryImages() {
        return $this->morphToMany(ZeusAdminFile::class, 'zeus_admin_fileble');
    }
}

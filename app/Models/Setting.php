<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $fillable = [
        'site_name',
        'site_description',
        'site_facebook',
        'site_instagram',
        'site_twitter',
        'site_linkedin',
        'site_behance',
        'site_dribbble',
        'site_email',
        'site_field_one',
        'site_field_one_value',
        'site_field_two',
        'site_field_two_value',
        'site_field_three',
        'site_field_three_value',
        'site_field_four',
        'site_field_four_value',
        'site_copyright',
        'site_creator_name',
        'site_creator_link',
    ];
}

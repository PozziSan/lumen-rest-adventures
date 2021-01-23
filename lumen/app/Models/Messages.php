<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Messages extends Model
{
    protected array $fillable = [
        "id",
        "user_id",
        "description",
        "created_at",
        "updated_at"
    ];

    public static array $rules = [
        "user_id" => "required|numeric|exists:users,id",
        "description" => "required|max:255"
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(App\Users::class);
    }

}

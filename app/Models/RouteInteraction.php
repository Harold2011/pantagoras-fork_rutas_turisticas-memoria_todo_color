<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

Use App\Models\User;
Use App\Models\route;

// Eeste modelo sirve para llevar cuenta de las interacciones de un usuario 
// a un producto de la tienda a través de la galería
class RouteInteraction extends Model
{
    use HasFactory;

    protected $table = 'route_interactions';
    protected $fillable = ['route_id', 'user_id'];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function product()
    {
        return $this->belongsTo(route::class, 'route_id');
    }
}
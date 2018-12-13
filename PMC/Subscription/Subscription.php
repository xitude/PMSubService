<?php
namespace PMC\Subscription;

use Illuminate\Database\Eloquent\Model;
use PMC\Product\Product;
use PMC\User\User;

class Subscription extends Model
{
    protected $table = 'subscriptions';

    protected $fillable = [
        'msisdn'
    ];

    public function subscribers()
    {
        return $this->belongsToMany(User::class, 'subscription_subscribers')
            ->withTimestamps();
    }

    public function products()
    {
        return $this->belongsToMany(Product::class, 'subscription_products')
            ->withTimestamps();
    }
}
<?php
namespace PMC\Product;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use PMC\Subscription\Subscription;

class Product extends Model
{
    use Sluggable, SluggableScopeHelpers;

    protected $table = 'products';

    protected $fillable = [
        'name', 'slug'
    ];

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    public function subscriptions()
    {
        return $this->belongsToMany(Subscription::class, 'subscription_products')
            ->withTimestamps();
    }
}
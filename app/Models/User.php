<?php

namespace App\Models;

use App\Models\File;
use App\Models\Plan;
use Laravel\Cashier\Subscription;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Cashier\Billable;

class User extends Authenticatable
{
    use Billable, HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function files()
    {
        return $this->hasMany(File::class);
    }

    public function oldPlan()
    {
        return $this->hasOneThrough(Plan::class, Subscription::class, 'user_id', 'stripe_id', 'id','stripe_plan')
                    ->whereNotNull('subscriptions.ends_at');
    }

    public function plan()
    {
        return $this->hasOneThrough(Plan::class, Subscription::class, 'user_id', 'stripe_id', 'id','stripe_plan')
                    ->whereNull('subscriptions.ends_at')
                    ->withDefault(Plan::free()->toArray());
    }

    public function usage()
    {
        return $this->files->sum('size');
    }

    public function canDowngradeToPlan(Plan $plan)
    {
        return $this->usage() <= $plan->storage;
    }
}

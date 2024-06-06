<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

/* ----- SWAGGER OA --------- */
/**
 * @OA\Schema(
 *      title="user",
 *      description="Properties of model user",
 *      required={"name", "email", "password"},
 * 	    @OA\Property(
 *          property="name",
 *          type="string",
 *          example="Levron Abigail"
 *      ),
 *      @OA\Property(
 *          property="email",
 *          type="string",
 *          example="levron.abigail@gmail.com"
 *      ),
 *      @OA\Property(
 *          property="password",
 *          type="string",
 *          example="l3vg41L"
 *      )
 * )
 */

class User extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}

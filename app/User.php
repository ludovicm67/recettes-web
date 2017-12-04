<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pseudo', 'display_name', 'mail', 'password'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * Check if user is admin.
     *
     * @return bool
     */
    public function isAdmin()
    {
         return $this->admin;
    }

    /**
    * Renvoie les régimes associés à cet utilisateur
    */
    public function regimes() {
      return $this->belongsToMany('App\User', 'user_regime', 'id_regime', 'id_user');
    }

    /**
    * Renvoie les ingrédients possédés par cet utilisateur
    */
    public function ingredients() {
      return $this->belongsToMany('App\Ingredient', 'ingredient_user',
                                  'id_user', 'id_ingredient');
    }

    /**
    * Renvoie les ingrédients voulus par cet utilisateur
    */
    public function ingredients_achat() {
      return $this->belongsToMany('App\Ingredient', 'user_achat_ingredient',
                                  'id_user', 'id_ingredient');
    }

    /**
    * Renvoie les ingrédients qui ont été voulus par cet utilisateur
    */
    public function ingredients_achat_archive() {
      return $this->belongsToMany('App\Ingredient', 'user_achat_ingredient_archive',
                                  'id_user', 'id_ingredient');
    }
}

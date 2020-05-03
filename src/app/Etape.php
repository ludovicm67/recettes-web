<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Etape extends Model
{
  /**
   * The table associated with the model.
   *
   * @var string
   */
  protected $table = 'etapes';

  public $timestamps = false;


  /**
  * Renvoie le type associé à l'étape
  */
  public function type() {
    return $this->belongsTo('App\Type', 'id_etape_types');
  }
}

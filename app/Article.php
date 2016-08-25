<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    protected $table='article';

    protected $fillable = array('name','description','price','total_in_shelf','total_in_vault');
	
	
	protected $hidden = ['created_at','updated_at']; 

	public function store()
	{
		
		return $this->belongsTo('App\Store');
	}

}

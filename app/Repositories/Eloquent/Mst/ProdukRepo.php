<?php 

namespace App\Repositories\Eloquent\Mst;

use App\Models\Mst\Produk as Model;
use App\Repositories\Contracts\Mst\ProdukRepoInterface;
use App\Repositories\Eloquent\defaultRepoTrait;
use App\Repositories\Eloquent\dropdownableRepoTrait;


class ProdukRepo implements ProdukRepoInterface {

	// CRUD default
	use defaultRepoTrait, dropdownableRepoTrait;

	protected $model;

	public function __construct(Model $model){
		$this->model = $model;
	}
 




}
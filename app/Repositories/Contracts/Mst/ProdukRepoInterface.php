<?php 

namespace App\Repositories\Contracts\Mst;

interface ProdukRepoInterface 
{

	/**
	 * custom create data Produk
	 * @param  array  $data [description]
	 * @return [type]       [description]
	 */
	public function create(array $data);

 

	/**
	 * get total keseluruhan stok barang yg ada
	 * @return integer
	 */
	public function getTotalJmlStok();


}
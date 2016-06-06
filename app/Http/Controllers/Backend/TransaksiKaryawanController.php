<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Jobs\Transaksi\exportTransaksiJob;
use App\Repositories\Contracts\Mst\CabangRepoInterface;
use App\Repositories\Contracts\Mst\TransaksiRepoInterface;
use Illuminate\Http\Request;

class TransaksiKaryawanController extends Controller
{
    private $base_view = 'konten.backend.transaksi_karyawan.';

    protected $transaksi;

    public function __construct(TransaksiRepoInterface $transaksi){
    	$this->transaksi = $transaksi;
    	view()->share('backend_transaksi_karyawan', true);
    	view()->share('base_view', $this->base_view);
    }


    public function index(Request $request)
    {
    	$cabangId = $request->get('cabangId');
    	if($cabangId){
    		$filter = ['mst_cabang_id' => $cabangId];
    	}else{
    		$filter = [];
    	}
    	$transaksi = $this->transaksi->all(10, $filter);
    	$vars = compact('transaksi');
    	return view($this->base_view.'index', $vars);
    }


    public function filter_export(CabangRepoInterface $c_obj)
    {
    	$cabang = $c_obj->getAllDropdown('cabang');
    	$vars = compact('cabang');
    	return view($this->base_view.'popup.filter_export', $vars);
    }

    public function do_export(Request $request)
    {
    	$mst_cabang_id = $request->get('mst_cabang_id');
    	$thn = $request->get('thn');
    	$bln = $request->get('bln');
    	$job = new exportTransaksiJob($mst_cabang_id, $thn, $bln);
    	return $this->dispatch($job);
    }




}

<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Report_model extends CI_Model {

	public function laporan_periode($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('retur');
			$this->db->join('suppliers','suppliers.supplier_id = retur.supplier_id');
			$this->db->join('products','products.product_id = retur.product_id');
			$this->db->where('tgl_retur >=',$tanggal1);
			$this->db->where('tgl_retur <=',$tanggal2);
			$query = $this->db->get();
			return $query->result();

		}

	public function laporan_default()//
		{ 
			$this->db->select('*');
			$this->db->from('retur');
			$this->db->join('suppliers','suppliers.supplier_id = retur.supplier_id');
			$this->db->join('products','products.product_id = retur.product_id');
			$query = $this->db->get();
			return $query->result();

		}
		public function laporan_default_stok()//
		{ 
			$this->db->select('*');
			$this->db->from('products');
			$this->db->where('stok <=', 3);
			$query = $this->db->get();
			return $query->result();

		}
		public function laporan_default_stock()//
		{ 
			$this->db->select('*');
			$this->db->from('products');
			$query = $this->db->get();
			return $query->result();

		}
		public function laporan_periode_stok($product_id)//
		{ 
			$this->db->select('*','products.product_id, COUNT(products.product_id) as total');
			$this->db->group_by('product_id');
			$this->db->order_by('stok','desc');
			$this->db->where('product_id',$product_id);
			$query = $this->db->get('products');
			return $query->result();

		}

		public function laporan_periode_order($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('products','products.product_id = order.product_id');
			$this->db->where('tgl_order >=',$tanggal1);
			$this->db->where('tgl_order <=',$tanggal2);
			$query = $this->db->get();
			return $query->result();

		}

		public function laporan_default_order()//
		{ 
			$this->db->select('*');
			$this->db->from('order');
			$this->db->join('products','products.product_id = order.product_id');
			$query = $this->db->get();
			return $query->result();

		}

		public function sum_order()//
		{ 
			$this->db->select_sum('qty');
			$query = $this->db->get('order');
			return $query->result();

		}

		public function laporan_periode_internal($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('pengambilan');
			$this->db->join('products','products.product_id = pengambilan.product_id');
			$this->db->where('tgl >=',$tanggal1);
			$this->db->where('tgl <=',$tanggal2);
			$query = $this->db->get();
			return $query->result();

		}

		public function laporan_default_internal()//
		{ 
			$this->db->select('*');
			$this->db->from('pengambilan');
			$this->db->join('products','products.product_id = pengambilan.product_id');
			$query = $this->db->get();
			return $query->result();

		}

		public function laporan_periode_recived($tanggal1,$tanggal2)//
		{ 
			$this->db->select('*');
			$this->db->from('penerimaan');
			$this->db->join('products','products.product_id = penerimaan.product_id');
			$this->db->where('tgl_recived >=',$tanggal1);
			$this->db->where('tgl_recived <=',$tanggal2);
			$query = $this->db->get();
			return $query->result();

		}

		public function laporan_default_recived()//
		{ 
			$this->db->select('*');
			$this->db->from('penerimaan');
			$this->db->join('products','products.product_id = penerimaan.product_id');
			$query = $this->db->get();
			return $query->result();

		}
		// public function get_all_query()//
		// { 
			

		// }

	// public function laporan_default()//
 //    {
 //        $query="SELECT t.tanggal_transaksi,o.nama_lengkap,sum(td.harga*td.qty) as total
 //                FROM transaksi as t,transaksi_detail as td,operator as o
 //                WHERE td.transaksi_id=t.transaksi_id and o.operator_id=t.operator_id 
 //                and t.tanggal_transaksi between '$tanggal1' and '$tanggal2'
 //                group by t.transaksi_id";
 //        return $this->db->query($query);
 //    }


}

/* End of file report_model.php */
/* Location: ./application/models/report_model.php */
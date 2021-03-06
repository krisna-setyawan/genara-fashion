<?php

class M_data_kota extends CI_Model
{
	// start datatables
	var $column_order = array(null, 'nama_kota', 'id_provinsi'); //set column field database for datatable orderable
	var $column_search = array('nama_kota'); //set column field database for datatable searchable
	var $order = array('nama_provinsi' => 'asc'); // default order

	private function _get_datatables_query()
	{
		$this->db->select('kota.*, provinsi.nama_provinsi as provinsi');
		$this->db->from('kota');
		$this->db->join('provinsi', 'kota.id_provinsi = provinsi.id_provinsi', 'left');

		$i = 0;
		foreach ($this->column_search as $item) { // loop column
			if (@$_POST['search']['value']) { // if datatable send POST for search
				if ($i === 0) { // first loop
					$this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
					$this->db->like($item, $_POST['search']['value']);
				} else {
					$this->db->or_like($item, $_POST['search']['value']);
				}
				if (count($this->column_search) - 1 == $i) //last loop
					$this->db->group_end(); //close bracket
			}
			$i++;
		}

		if (isset($_POST['order'])) { // here order processing
			$this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
		} else if (isset($this->order)) {
			$order = $this->order;
			$this->db->order_by(key($order), $order[key($order)]);
		}
	}
	function get_datatables()
	{
		$this->_get_datatables_query();
		if (@$_POST['length'] != -1)
			$this->db->limit(@$_POST['length'], @$_POST['start']);
		$query = $this->db->get();
		return $query->result();
	}
	function count_filtered()
	{
		$this->_get_datatables_query();
		$query = $this->db->get();
		return $query->num_rows();
	}
	function count_all()
	{
		$this->db->from('kota');
		return $this->db->count_all_results();
	}
	// end datatables
}

<?php

class M_data_kecamatan extends CI_Model
{
    public function get_data()
    {
        return $this->db->get('kecamatan')->result();
    }

    public function add_data($data)
    {
        $this->db->insert('kecamatan', $data);
    }

    public function get_data_by_id($id)
    {
        $query = "SELECT kecamatan.*, kota.* FROM kecamatan JOIN kota ON kecamatan.id_kota = kota.id_kota WHERE id_kecamatan = $id";
        return $this->db->query($query)->result();
    }

    public function edit_data($id, $data)
    {
        $this->db->where('id_kecamatan', $id);
        $this->db->update('kecamatan', $data);
    }

    public function delete($where)
    {
        $this->db->where($where);
        $this->db->delete('kecamatan');
    }

    public function get_kota($id)
    {
        return $this->db->get_where('kota', ['id_kota' => $id])->row_array();
    }

    public function get_kota_by_prov($where)
    {
        $this->db->order_by('nama_kota', 'ASC');
        return $this->db->get_where('kota', $where)->result();
    }



    // start datatables
    var $column_order = array(null, 'nama_kecamatan', 'id_kota'); //set column field database for datatable orderable
    var $column_search = array('nama_kecamatan'); //set column field database for datatable searchable
    var $order = array('nama_kecamatan' => 'asc'); // default order

    private function _get_datatables_query()
    {
        $this->db->select('kecamatan.*');
        $this->db->from('kecamatan');
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
        $this->db->from('kecamatan');
        return $this->db->count_all_results();
    }
    // end datatables




}

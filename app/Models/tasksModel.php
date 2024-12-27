<?php
namespace App\Models;
use CodeIgniter\Model;

Class tasksModel extends Model {

    protected $table = 'tasks';

    public function get()
    {
        $query = $this->db->table('tasks');
        return $query->get()->getResultArray();
    }

    public function addTask($data){
        $query = $this->db->table($this->table)->insert($data);
        return $this->db->insertID();
    }

    public function updateTask($id, $data){
        
        $actualizar = $this->db->table('tasks');
        $actualizar->where("Id", $id);
        $actualizar->update($data);
        return '1';
    }
}
?>
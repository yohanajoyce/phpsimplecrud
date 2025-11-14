<?php

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class MasterData extends Database {

    // Method untuk mendapatkan daftar program studi
    public function getTable(){
        $query = "SELECT * FROM tb_table";
        $result = $this->conn->query($query);
        $table = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $table[] = [
                    'id' => $row['id_table'],
                    'nomor' => $row['no_table']
                ];
            }
        }
        return $table;
    }

    // Method untuk mendapatkan daftar provinsi
    public function getMenu(){
        $query = "SELECT * FROM tb_menu";
        $result = $this->conn->query($query);
        $menu = [];
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                $menu[] = [
                    'id' => $row['id_menu'],
                    'nama' => $row['nama_menu']
                ];
            }
        }
        return $menu;
    }

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                        

    // Method untuk input data program studi
    public function inputTable($data){
        $idTable = $data['id'];
        $nomorTable = $data['nomor'];
        $query = "INSERT INTO tb_table (id_table, no_table) VALUES (?, ?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $idTable, $nomorTable);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data program studi berdasarkan kode
    public function getUpdateTable($id){
        $query = "SELECT * FROM tb_table WHERE id_table = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $table = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $table = [
                'id' => $row['id_table'],
                'nomor' => $row['no_table']
                
            ];
        }
        $stmt->close();
        return $table;
    }

    // Method untuk mengedit data program studi
    public function updateTable($data){
        $idTable = $data['id'];
        $nomorTable = $data['nomor'];
        $query = "UPDATE tb_table SET no_table = ? WHERE id_table = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("ss", $nomorTable, $idTable);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data program studi
    public function deleteTable($id){
        $query = "DELETE FROM tb_table WHERE id_table = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk input data provinsi
    public function inputMenu($data){
        $namaMenu = $data['nama'];
        $query = "INSERT INTO tb_menu (nama_menu) VALUES (?)";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("s", $namaMenu);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk mendapatkan data provinsi berdasarkan id
    public function getUpdateMenu($id){
        $query = "SELECT * FROM tb_menu WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $menu = null;
        if($result->num_rows > 0){
            $row = $result->fetch_assoc();
            $menu = [
                'id' => $row['id_menu'],
                'nama' => $row['nama_menu']
            ];
        }
        $stmt->close();
        return $menu;
    }

    // Method untuk mengedit data provinsi
    public function updateMenu($data){
        $idMenu = $data['id'];
        $namaMenu = $data['nama'];
        $query = "UPDATE tb_menu SET nama_menu = ? WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("si", $namaMenu, $idMenu);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // Method untuk menghapus data provinsi
    public function deleteMenu($id){
        $query = "DELETE FROM tb_menu WHERE id_menu = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

}

?>
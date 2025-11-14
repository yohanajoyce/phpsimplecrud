<?php 

// Memasukkan file konfigurasi database
include_once 'db-config.php';

class Customer extends Database {

    // Method untuk input data customer
    public function inputCustomer($data){
        // Mengambil data dari parameter $data
        $no      = $data['no'];
        $date      = $data['date'];
        $nama     = $data['nama'];
        $table    = $data['table'];
        $menu     = $data['menu'];
        $telp     = $data['telp'];
        $email    = $data['email'];
        // Menyiapkan query SQL untuk insert data menggunakan prepared statement
        $query = "INSERT INTO tb_customer (no_reservasi, reservasi_date, nama_cust, nomor_table, menu_makan, telp, email) VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($query);
        // Mengecek apakah statement berhasil disiapkan
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssss", $no, $date, $nama, $table, $menu,$telp, $email);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mengambil semua data mahasiswa
    public function getAllCustomer(){
        // Menyiapkan query SQL untuk mengambil data mahasiswa beserta prodi dan provinsi
        $query = "SELECT id_customer, no_reservasi, reservasi_date, nama_cust, no_table, nama_menu, telp, email
                  FROM tb_customer
                  JOIN tb_table ON nomor_table = id_table
                  JOIN tb_menu ON menu_makan = id_menu";
        $result = $this->conn->query($query);
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $customer = [];
        // Mengecek apakah ada data yang ditemukan
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                $customer[] = [
                    'id' => $row['id_customer'],
                    'no' => $row['no_reservasi'],
                    'date' => $row['reservasi_date'],
                    'nama' => $row['nama_cust'],
                    'table' => $row['no_table'],
                    'menu' => $row['nama_menu'],
                    'telp' => $row['telp'],
                    'email' => $row['email']

                ];
            }
        }
        // Mengembalikan array data mahasiswa
        return $customer;
    }

    // Method untuk mengambil data mahasiswa berdasarkan ID
    public function getUpdateCustomer($id){
        // Menyiapkan query SQL untuk mengambil data mahasiswa berdasarkan ID menggunakan prepared statement
        $query = "SELECT * FROM tb_customer WHERE id_customer = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();
        $data = false;
        if($result->num_rows > 0){
            // Mengambil data mahasiswa  
            $row = $result->fetch_assoc();
            // Menyimpan data dalam array
            $data = [
                    'id' => $row['id_customer'],
                    'no' => $row['no_reservasi'],
                    'date' => $row['reservasi_date'],
                    'nama' => $row['nama_cust'],
                    'table' => $row['nomor_table'],
                    'menu' => $row['menu_makan'],
                    'telp' => $row['telp'],
                    'email' => $row['email']
            ];
        }
        $stmt->close();
        // Mengembalikan data mahasiswa
        return $data;
    }

    // Method untuk mengedit data mahasiswa
    public function editCustomer($data){
        // Mengambil data dari parameter $data
        $id       = $data['id'];
        $no      = $data['no'];
        $date      = $data['date'];
        $nama     = $data['nama'];
        $table    = $data['table'];
        $menu    = $data['menu'];
        $telp     = $data['telp'];
        $email    = $data['email'];
        // Menyiapkan query SQL untuk update data menggunakan prepared statement
        $query = "UPDATE tb_customer SET no_reservasi = ?, reservasi_date = ?, nama_cust = ?, nomor_table = ?, menu_makan = ?, telp = ?, email = ? WHERE id_customer = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("sssssssi", $no, $date, $nama, $table, $menu, $telp , $email, $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk menghapus data mahasiswa
    public function deleteCustomer($id){
        // Menyiapkan query SQL untuk delete data menggunakan prepared statement
        $query = "DELETE FROM tb_customer WHERE id_customer = ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            return false;
        }
        $stmt->bind_param("i", $id);
        $result = $stmt->execute();
        $stmt->close();
        // Mengembalikan hasil eksekusi query
        return $result;
    }

    // Method untuk mencari data mahasiswa berdasarkan kata kunci
    public function searchCustomer($kataKunci){
        // Menyiapkan LIKE query untuk pencarian
        $likeQuery = "%".$kataKunci."%";
        // Menyiapkan query SQL untuk pencarian data mahasiswa menggunakan prepared statement
        $query = "SELECT id_customer, no_reservasi, reservasi_date, nama_cust, no_table, nama_menu, telp, email 
                  FROM tb_customer
                  JOIN tb_table ON nomor_table = id_table
                  JOIN tb_menu ON menu_makan = id_menu
                  WHERE no_reservasi LIKE ? OR nama_cust LIKE ?";
        $stmt = $this->conn->prepare($query);
        if(!$stmt){
            // Mengembalikan array kosong jika statement gagal disiapkan
            return [];
        }
        // Memasukkan parameter ke statement
        $stmt->bind_param("ss", $likeQuery, $likeQuery);
        $stmt->execute();
        $result = $stmt->get_result();
        // Menyiapkan array kosong untuk menyimpan data mahasiswa
        $customer = [];
        if($result->num_rows > 0){
            // Mengambil setiap baris data dan memasukkannya ke dalam array
            while($row = $result->fetch_assoc()) {
                // Menyimpan data mahasiswa dalam array
                $customer[] = [
                  'id' => $row['id_customer'],
                    'no' => $row['no_reservasi'],
                    'date' => $row['reservasi_date'],
                    'nama' => $row['nama_cust'],
                    'table' => $row['no_table'],
                    'menu' => $row['nama_menu'],
                    'telp' => $row['telp'],
                    'email' => $row['email']
                ];
            }
        }
        $stmt->close();
        // Mengembalikan array data mahasiswa yang ditemukan
        return $customer;
    }

}

?>
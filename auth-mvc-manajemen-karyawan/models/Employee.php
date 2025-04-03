<?php 
    class Employee {
        public static function all(){
            global $pdo;
            $sql = "SELECT * FROM karyawan";
            $stmt = $pdo->query($sql);
            return $stmt->fetchAll(PDO::FETCH_ASSOC);
        }

        public static function create($name, $address, $salary){
            global $pdo;
            // insert data to database
            $sql = "INSERT INTO karyawan (nama, alamat, gaji) VALUES (:nama, :alamat, :gaji)";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nama' => $name, 'alamat' => $address, 'gaji'=>$salary]);
        }

        public static function find($id){
            global $pdo;
            $sql = "SELECT * FROM karyawan WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);
            return $stmt->fetch(PDO::FETCH_ASSOC);
        }
        public static function update($id,$name, $address, $salary){
            global $pdo;
            $sql = "UPDATE karyawan SET nama = :nama, alamat = :alamat, gaji= :gaji WHERE id =:id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['nama' => $name, 'alamat' => $address, 'gaji'=>$salary, 'id' =>$id]);
        }
      
        public static function delete($id){
            global $pdo;
            $sql = "DELETE FROM karyawan WHERE id = :id";
            $stmt = $pdo->prepare($sql);
            $stmt->execute(['id' => $id]);

        }
    }

?>
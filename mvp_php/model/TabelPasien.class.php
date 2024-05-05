<?php

/******************************************
Asisten Pemrogaman 13
 ******************************************/

class TabelPasien extends DB
{
	function getPasien()
	{
		// Query mysql select data pasien
		$query = "SELECT * FROM pasien";
		// Mengeksekusi query
		return $this->execute($query);
	}
	function getPasienById($id) {
		$data = $id['id'];
        $query = "SELECT * FROM pasien WHERE id = '$data'";
		return $this->execute($query);
        // $result = $this->execute($query);
        // return mysqli_fetch_assoc($result);
    }

	function add($data)
	{
		$nik = $data['nik'];
		$nama = $data['nama'];
		$tempat = $data['tempat'];
		$tl = $data['tl'];
		$gender = $data['gender'];
		$email = $data['email'];
		$telp = $data['telp'];
	
		$query = "INSERT INTO pasien (nik, nama, tempat, tl, gender, email, telp) VALUES ('$nik','$nama','$tempat','$tl','$gender','$email','$telp')";
	
		// Mengeksekusi query
		$result = $this->execute($query);
		
		if (!$result) {
			// Tangani kesalahan eksekusi query
			echo "Error: " . mysqli_error($this->db_link);
			return false;
		}
	
		return $result;
	}
	function del($id)
	{
		try {
			$query = "DELETE FROM pasien WHERE id = '$id'";
			// Mengeksekusi query
			$result = $this->execute($query);
			
			if (!$result) {
				// Handle execution query error
				echo "Error: " . mysqli_error($this->db_link);
				return false;
			}
			
			return $result;
		} catch (Exception $e) {
			// Handle error appropriately, such as logging or taking suitable action
			echo "Error: " . $e->getMessage();
		}
	}
	function edit($data)
    {
        $id = $data['id'];
        $nik = $data['nik'];
        $nama = $data['nama'];
        $tempat = $data['tempat'];
        $tl = $data['tl'];
        $gender = $data['gender'];
        $email = $data['email'];
        $telp = $data['telp'];
		
        $nik = mysqli_real_escape_string($this->db_link, $nik);
        $nama = mysqli_real_escape_string($this->db_link, $nama);
        $tempat = mysqli_real_escape_string($this->db_link, $tempat);
        $email = mysqli_real_escape_string($this->db_link, $email);
        $telp = mysqli_real_escape_string($this->db_link, $telp);
        $tl = mysqli_real_escape_string($this->db_link, $tl);
        $gender = mysqli_real_escape_string($this->db_link, $gender);
    
        $query = "UPDATE pasien SET nik = '$nik', nama = '$nama', email = '$email', telp = '$telp', tl = '$tl', gender = '$gender', tempat = '$tempat' WHERE id = '$id'";
    
        // Mengeksekusi query
        return $this->execute($query);
    }
}

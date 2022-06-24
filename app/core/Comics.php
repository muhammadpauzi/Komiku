<?php
class Comics extends App
{
    public function insert($data)
    {
        // Change judul to lowercase and replace whitespace to strip
        $slug = htmlspecialchars(strtolower(str_replace(' ', '-', $data['judul'])));
        $gambar = $this->_upload($slug);

        if (!$gambar) {
            return false;
        }

        // VALIDATIONS
        // If empty
        if (empty($data['judul']) || empty($data['penulis']) || empty($data['penerbit'])) {
            Message::setMessage('insertMessage', 'Semua input harus diisi!.', 'danger');
            return false;
        }

        // If judul has been ... in the table
        $this->db->query("SELECT judul FROM komik WHERE judul=:judul");
        $this->db->bind(':judul', $data['judul']);
        $this->db->execute();
        if ($this->db->row_count() == 1) {
            Message::setMessage('insertMessage', 'Judul sudah terdaftar', 'danger');
            return false;
        }

        // Prepare
        $this->db->query("INSERT INTO komik VALUES(:id,:judul,:slug,:penulis,:penerbit,:gambar)");
        $this->db->bind('id', null);
        $this->db->bind('judul', htmlspecialchars($data['judul']));
        $this->db->bind('slug', $slug);
        $this->db->bind('penulis', htmlspecialchars($data['penulis']));
        $this->db->bind('penerbit', htmlspecialchars($data['penerbit']));
        $this->db->bind('gambar', htmlspecialchars($gambar));
        // Insert
        $this->db->execute();
        // Set message
        Message::setMessage('homeMessage', 'Data komik berhasil ditambahkan', 'success');
        // Redirect to root or index.php
        redirect('');
    }

    public function delete($table, $id = null)
    {
        if (!is_null($id)) {
            // Query get name gambar for delete image file in the folder img
            $this->db->query("SELECT gambar FROM $table WHERE id=:id");
            $this->db->bind(':id', $id);
            $nameFileImage = $this->db->result_array();
            // Query Delete
            $this->db->query("DELETE FROM $table WHERE id=:id");
            $this->db->bind(':id', $id);
            $this->db->execute();
            // Delete image file
            unlink('assets/img/comic-images/' . $nameFileImage[0]['gambar']);
            Message::setMessage('homeMessage', 'Data komik berhasil dihapus', 'success');
            redirect('');
        }
    }

    private function _upload($slug)
    {
        if (is_uploaded_file($_FILES['gambar']['tmp_name'])) {
            if ($_FILES['gambar']['size'] > 3000000) {
                Message::setMessage('insertMessage', 'Ukuran file terlalu besar. Maximal 3 MB.', 'danger');
                return false;
            }
            // Notice how to grab MIME type
            $mime_type = mime_content_type($_FILES['gambar']['tmp_name']);

            // If you want to allow certain files
            $allowed_file_types = ['image/png', 'image/jpeg'];
            if (!in_array($mime_type, $allowed_file_types)) {
                Message::setMessage('insertMessage', 'File yang anda upload bukan gambar.', 'danger');
                return false;
            }

            // Set name file
            $nameFileImage = $slug . '.' . pathinfo($_FILES['gambar']['name'], PATHINFO_EXTENSION);

            // Set up destination of the file
            $destination = 'assets/img/comic-images/' . $nameFileImage;

            // Now you move/upload your file
            move_uploaded_file($_FILES['gambar']['tmp_name'], $destination);
            return $nameFileImage;
        }
        Message::setMessage('insertMessage', 'Pilih gambar komik terlebih dahulu', 'danger');
        return false;
    }

    public function update($data)
    {
        // Change judul to lowercase and replace whitespace to strip
        $slug = htmlspecialchars(strtolower(str_replace(' ', '-', $data['judul'])));
        if ($_FILES['gambar']['error'] == 4) {
            $gambar = $data['gambar'];
        } else {
            $gambar = $this->_upload($slug);
            if (!$gambar) {
                return false;
            }
        }
        // VALIDATIONS
        // If empty
        if (empty($data['judul']) || empty($data['penulis']) || empty($data['penerbit'])) {
            Message::setMessage('insertMessage', 'Semua input harus diisi!.', 'danger');
            return false;
        }

        // If judul has been ... in the table
        $this->db->query("SELECT judul FROM komik WHERE id=:id");
        $this->db->bind('id', $data['id']);
        $judul = $this->db->row_array();

        // If title comic has row in the table komik and not same with judul.. bla bla..
        if ($this->db->row_count() > 0 && strtolower($data['judul']) != strtolower($judul['judul'])) {
            Message::setMessage('insertMessage', 'Judul sudah terdaftar', 'danger');
            return false;
        }

        // Prepare
        $this->db->query("UPDATE komik SET judul=:judul, slug=:slug, penulis=:penulis, penerbit=:penerbit, gambar=:gambar WHERE id=:id");
        $this->db->bind(':id', $data['id']);
        $this->db->bind(':judul', htmlspecialchars($data['judul']));
        $this->db->bind(':slug', $slug);
        $this->db->bind(':penulis', htmlspecialchars($data['penulis']));
        $this->db->bind(':penerbit', htmlspecialchars($data['penerbit']));
        $this->db->bind(':gambar', htmlspecialchars($data['gambar']));
        // Insert
        $this->db->execute();
        // Set message
        Message::setMessage('homeMessage', 'Data komik berhasil diubah', 'success');
        // Redirect to root or index.php
        redirect('');
    }
}

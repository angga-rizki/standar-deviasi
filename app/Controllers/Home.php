<?php

namespace App\Controllers;

use App\Models\PasienModel;
use CodeIgniter\Controller;
use Spreadsheet_Excel_Reader;
use SpreadsheetReader;

class Home extends Controller {

    public function index() {
        $session = session();
        if (!$session->has('authenticated')) {
            return redirect()->to(site_url('auth'));
        }

        $data['title'] = 'Home';

        echo view('templates/header', $data);
        echo view('home');
        echo view('templates/footer');
    }

    public function upload() {
        $session = session();
        $model = new PasienModel();

        if (!$this->validate([
                    'fileExcel' => 'uploaded[fileExcel]|ext_in[fileExcel,xls,xlsx,csv]'
                ])) {
            $session->setflashdata($this->setMessageFlashData('Upload gagal atau file excel tidak valid!', 'error'));
            return redirect()->to(site_url('home'));
        }

        $fileUpload = $this->request->getFile('fileExcel');
        $pathUpload = $fileUpload->store('/tmp');
        $fileExcel = new \CodeIgniter\Files\File(WRITEPATH . 'uploads' . $pathUpload);
        $fileExtension = $fileExcel->guessExtension();

        if (!$fileUpload->hasMoved()) {
            $session->setflashdata($this->setMessageFlashData('File excel gagal di-upload!', 'error'));
            return redirect()->to(site_url('home'));
        }
        $Reader = new SpreadsheetReader($fileExcel->getPathname());
        foreach ($Reader as $Row => $Value) {

            if (($fileExtension == 'xlsx' && $Row == 0) || ($fileExtension == 'xls' || $fileExtension == 'csv' && $Row == 1)) {
                if (in_array('', $Value)) {
                    $session->setflashdata($this->setMessageFlashData('Format excel salah!', 'error'));
                    return redirect()->to(site_url('home'));
                }
                $namaKolom = str_replace('.', '_', $Value);
            }

            if (empty($namaKolom)) {
                $session->setflashdata($this->setMessageFlashData('File excel kosong!', 'error'));
                return redirect()->to(site_url('home'));
            }

            $sql = 'CREATE TABLE IF NOT EXISTS pasien (
                id INT(9) NOT NULL AUTO_INCREMENT,
                ' . implode(' DOUBLE NULL, ', $namaKolom) . ' DOUBLE NULL,
                PRIMARY KEY(id)
                )';

            if (!db_connect()->query($sql)) {
                $session->setflashdata($this->setMessageFlashData('Gagal membuat tabel!', 'error'));
                return redirect()->to(site_url('home'));
            }

            if (($fileExtension == 'xlsx' && $Row > 0) || ($fileExtension == 'xls' || $fileExtension == 'csv' && $Row > 1)) {
                $data[] = array_combine($namaKolom, $Value);
            }
        }

        if (!$model->protect(false)
                        ->insertBatch($data)) {
            $session->setflashdata($this->setMessageFlashData('Gagal memasukkan data!', 'error'));
            return redirect()->to(site_url('home'));
        }

        helper('filesystem');
        delete_files(WRITEPATH . 'uploads/tmp');
        $session->setflashdata($this->setMessageFlashData('Sukses!', 'sukses'));
        return redirect()->to(site_url('home'));
    }

    public function cleardata() {
        $session = session();
        $sql = 'DROP TABLE IF EXISTS pasien';
        if (!db_connect()->query($sql)) {
            $session->setflashdata($this->setMessageFlashData('Gagal menghapus data!', 'error'));
            return redirect()->to(site_url('home'));
        }

        $session->setflashdata($this->setMessageFlashData('Sukses!', 'sukses'));
        return redirect()->to(site_url('home'));
    }

    function setMessageFlashData($message, $status) {
        $flash_data = [
            'message' => $message,
            'status' => $status
        ];
        return $flash_data;
    }

}

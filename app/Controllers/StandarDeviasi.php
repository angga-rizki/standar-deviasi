<?php

namespace App\Controllers;

use App\Models\PasienModel;
use CodeIgniter\Controller;

class StandarDeviasi extends Controller {

    public function index() {
        $session = session();
        $model = new PasienModel();

        if (!$session->has('authenticated')) {
            return redirect()->to(site_url('auth'));
        }

        $data_header['title'] = 'Standar Deviasi';

        $data = [
            'kolomX' => $model->getKolomX(),
            'kolomY' => $model->getKolomY(),
            'x' => $model->getAllX(),
            'y' => $model->getAllY(),
            'hasil' => $model->getHasil()
        ];

        echo view('templates/header', $data_header);
        echo view('standar_deviasi', $data);
        echo view('templates/footer');
    }
    
    public function getdata() {
        $model = new PasienModel();

        $id = $this->request->getVar('id');
        $result = $model->getData($id);

        return $this->response->setJSON($result);
    }

    public function savedata() {
        $session = session();
        $model = new PasienModel();

        if (!$this->validate([
                    'id' => 'max_length[9]'
                ])) {
            $session->setflashdata($this->setMessageFlashData('ID tidak valid!', 'error'));
            return redirect()->to(site_url('standardeviasi'));
        }

        $id = $this->request->getVar('id');
        $data_x = $this->request->getVar('data_x');
        $data_y = $this->request->getVar('data_y');

        foreach (array_keys($data_x) as $kolom) {
            //$kolom = X1, X2, X3, etc
            $rata_x['rata_' . strtolower($kolom)] = array_sum($data_x[$kolom]) / count($data_x[$kolom]);
        }

        $rata_y = array_sum($data_y) / count($data_y);

        //Menghapus parent data_x untuk menjadikan single dimension array lalu di combine dengan nama kolom X sebagai key
        $data_x = array_combine($model->getKolomX(), call_user_func_array('array_merge', $data_x));
        
        $data_y = array_combine($model->getKolomY(), $data_y);

        //Menggabungkan semua array data
        $data = array_merge($data_x, $data_y, $rata_x, ['rata_y' => $rata_y]);

        //Update Data
        if (!empty($id) && !$model->protect(false)->update($id, $data)) {
            $session->setflashdata($this->setMessageFlashData('Gagal meng-edit data!', 'error'));
            return redirect()->to(site_url('standardeviasi'));
        }
        
        //Insert Data
        if (empty($id) && !$model->protect(false)->insert($data, false)) {
            $session->setflashdata($this->setMessageFlashData('Gagal menambah data!', 'error'));
            return redirect()->to(site_url('standardeviasi'));
        }        
        
        $model->protect(true);
        
        $session->setflashdata($this->setMessageFlashData('Sukses!', 'sukses'));
        return redirect()->to(site_url('standardeviasi'));
    }
    
    public function delete($id) {
        $model = new PasienModel();
        $session = session();

        if (!$model->delete($id)) {
            $session->setflashdata($this->setMessageFlashData('Gagal menghapus data!', 'error'));
            return redirect()->to(site_url('standardeviasi'));
        }

        $session->setflashdata($this->setMessageFlashData('Sukses!', 'sukses'));
        return redirect()->to(site_url('standardeviasi'));
    }

    function setMessageFlashData($message, $status) {
        $data = [
            'message' => $message,
            'status' => $status
        ];
        return $data;
    }
}

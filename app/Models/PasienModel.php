<?php

namespace App\Models;

use CodeIgniter\Model;

class PasienModel extends Model {

    protected $table = 'pasien';
    protected $primaryKey = 'id';
    
    function getData($id) {
        return $this->asObject()
                        ->where(['id' => $id])
                        ->first();
    }

    function getKolomWildcard($variable) {
        if (!db_connect()->tableExists('pasien')) {
            return null;
        }

        $result = $this->asArray()->first(); //Ambil satu data saja sebagai array untuk mengambil nama kolom (key dari data)
        if (empty($result)) {
            return null;
        }

        foreach (array_keys($result) as $namaKolom) {
            if (!empty(strstr($namaKolom, $variable))) {
                $kolom[] = strstr($namaKolom, $variable);
            }
        }

        if (empty($kolom)) {
            return null;
        }

        return $kolom;
    }

    function getSql($function, $selectVariable) {
        if ($function == 'MIN' || $function == 'MAX') {
            return 'SELECT ' . $function . '(t) result FROM (SELECT ' . implode(' AS t FROM pasien UNION ALL SELECT ', $selectVariable) . ' AS t FROM pasien) AS t';
        }

        return 'SELECT ROUND(' . $function . '(' . $selectVariable . '),2) result FROM pasien';
    }

    function getAll() {
        return $this->findAll();
    }

    function getKolomX() {
        $kolom_x = $this->getKolomWildcard('X');

        return $kolom_x;
    }

    function getKolomY() {
        $kolom_y = $this->getKolomWildcard('Y');

        return $kolom_y;
    }

    function getKolomRata() {
        $kolom_rata = $this->getKolomWildcard('rata_');

        return $kolom_rata;
    }

    function getAllX() {
        $kolom_x = $this->getKolomX();

        if (empty($kolom_x)) {
            return null;
        }

        $sql = 'SELECT id, ' . implode(', ', $kolom_x) . ' FROM pasien';

        return db_connect()->query($sql)->getResultObject();
    }

    function getAllY() {
        $kolom_y = $this->getKolomY();

        if (empty($kolom_y)) {
            return null;
        }

        $sql = 'SELECT id, ' . implode(', ', $kolom_y) . ' FROM pasien';

        return db_connect()->query($sql)->getResultObject();
    }

    function getAllRata() {
        $kolom_rata = $this->getKolomRata();

        if (empty($kolom_rata)) {
            return null;
        }

        $sql = 'SELECT ' . implode(', ', $kolom_rata) . ' FROM pasien';

        return db_connect()->query($sql)->getResultObject();
    }

    function getHasil() {
        $kolom_x = $this->getKolomX();
        $kolom_y = $this->getKolomY();
        $kolom_rata = $this->getKolomRata();

        //Validasi
        if (empty($kolom_x) || empty($kolom_y) || empty($kolom_rata)) {
            return null;
        }

        //Mengambil 3 karakter awal dari nama kolom_x lalu menghilangkan '_' jika ada untuk membuat variabel_x
        foreach ($kolom_x as $namaKolom) {
            $newKolom_x[] = str_replace('_', '', substr($namaKolom, 0, 3));
        }

        //Menghapus variable duplikat
        $variable_x = array_values(array_unique($newKolom_x));
        //Membangun semua variable untuk digunakan sebagai key di hasil
        $allVariable = array_merge($variable_x, ['Y']);

        //Membuat SQL
        foreach ($variable_x as $namaVariable) {
            //Dynamic variable dari isi array $variable_x (X1, X2, X3, etc) dan sebagai wildcard untuk mencari kolom (X1_1, X1_2, X2_1, X2_2, etc)
            ${$namaVariable} = $this->getKolomWildcard($namaVariable);
            $sqlX_max[] = $this->getSql('MAX', ${$namaVariable});
            $sqlX_min[] = $this->getSql('MIN', ${$namaVariable});
        }

        $sqlY_max = $this->getSql('MAX', $kolom_y);
        $sqlY_min = $this->getSql('MIN', $kolom_y);

        foreach ($kolom_rata as $namaKolom) {
            $sql_avg[] = $this->getSql('AVG', $namaKolom);
            $sql_std[] = $this->getSql('STDDEV_SAMP', $namaKolom);
            $sql_var[] = $this->getSql('VAR_SAMP', $namaKolom);
        }

        //Menjalankan SQL dan mendapatkan nilai
        foreach ($sqlX_max as $sql) {
            $max_x_value[] = db_connect()->query($sql)->getResult()[0]->result;
        }


        foreach ($sqlX_min as $sql) {
            $min_x_value[] = db_connect()->query($sql)->getResult()[0]->result;
        }

        $max_y_value = db_connect()->query($sqlY_max)->getResult()[0]->result;
        $min_y_value = db_connect()->query($sqlY_min)->getResult()[0]->result;

        foreach ($sql_avg as $sql) {
            $avg_value[] = db_connect()->query($sql)->getResult()[0]->result;
        }

        foreach ($sql_var as $sql) {
            $var_value[] = db_connect()->query($sql)->getResult()[0]->result;
        }

        foreach ($sql_std as $sql) {
            $std_value[] = db_connect()->query($sql)->getResult()[0]->result;
        }

        //Mendapatkan nilai capaian
        $skalaQuesioner = 4; //Skala dari 1-4
        foreach ($avg_value as $nilai) {
            $nilaiCapain_value[] = ($nilai / $skalaQuesioner) * 100;
        }

        //Menyusun hasil
        //
        /* Membangun array berisi nilai max, min, mean, var, dan std dengan 
          menggabungkan max_x dan max_y dan menggunakan array_combine untuk membentuk key => value
          dengan $variable_x (X1, X2, etc) dan $allVariable (X1, X2, X3, Y etc) sebagai key */
        $max = array_merge(array_combine($variable_x, $max_x_value), ['Y' => $max_y_value]);
        $min = array_merge(array_combine($variable_x, $min_x_value), ['Y' => $min_y_value]);
        $mean = array_combine($allVariable, $avg_value);
        $var = array_combine($allVariable, $var_value);
        $std = array_combine($allVariable, $std_value);
        $nilai_capaian = array_combine($allVariable, $nilaiCapain_value);

        /* Membangun hasil dengan membentuk dynamic variable berdasarkan dari $allVariable (X1, X2, X3) 
          menjadi bentuk x1['max'], x1['min'], x1['mean'], etc untuk membangun array yang berisi nilai dari
          array $min, $max , $mean, etc sebelumnya.
          Setelah itu membangun array hasil berbentuk hasil['x1'], etc dengan nilai array $x1, etc yang telah dibentuk. */
        foreach ($allVariable as $namaVariable) {
            ${$namaVariable}['max'] = $max[$namaVariable];
            ${$namaVariable}['min'] = $min[$namaVariable];
            ${$namaVariable}['mean'] = $mean[$namaVariable];
            ${$namaVariable}['var'] = $var[$namaVariable];
            ${$namaVariable}['std'] = $std[$namaVariable];
            ${$namaVariable}['nilai_capaian'] = $nilai_capaian[$namaVariable] . '%';

            $hasil[$namaVariable] = (object) ${$namaVariable};
        }

        return $hasil;
    }

}

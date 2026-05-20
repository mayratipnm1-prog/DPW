<?php

class akunBank
{
    protected $accountNumber;
    protected $jmlUang;
    protected $nama; 

    public function __construct($nomorAkun, $nominal)
    {
        $this->accountNumber = $nomorAkun;
        $this->jmlUang       = $nominal;
    }

    public function getNama()       { return $this->nama; }
    public function setNama($nama)  { $this->nama = $nama; }

    public function getNomorAkun()  { return $this->accountNumber; }

    public function getSaldo()      { return $this->jmlUang; }

    public function tambahUang($jumlah)
    {
        $this->jmlUang += $jumlah;
        return "Berhasil menambahkan Rp " . number_format($jumlah, 0, ',', '.');
    }

    public function kurangUang($jumlah)
    {
        if ($jumlah > $this->jmlUang) {
            return "Saldo tidak mencukupi.";
        }
        $this->jmlUang -= $jumlah;
        return "Berhasil menarik Rp " . number_format($jumlah, 0, ',', '.');
    }

    public function tampilUang()
    {
        return "Rp " . number_format($this->jmlUang, 0, ',', '.');
    }

    public function hitungPajak()
    {
        $pajak = $this->jmlUang * 0.11;
        return "Rp " . number_format($pajak, 0, ',', '.');
    }
}
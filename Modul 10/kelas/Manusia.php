<?php

class Manusia
{
    protected $name;
    protected $nik = "123212131243243";
    protected $umur; // Ditambahkan sesuai tugas no. 2

    public function getNama()
    {
        return $this->name;
    }

    public function setNama($name)
    {
        $this->name = $name;
    }

    public function getNIK()
    {
        return "NIK: {$this->nik}";
    }

    public function getUmur()
    {
        return $this->umur;
    }

    public function setUmur($umur)
    {
        $this->umur = $umur;
    }
}
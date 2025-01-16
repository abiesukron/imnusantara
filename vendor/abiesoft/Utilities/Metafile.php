<?php

namespace AbieSoft\AsetCode\Utilities;

class Metafile
{

    public function approver(string $nama): string
    {
        $result = "";
        $filename = str_replace(" ", "", str_replace("-", "", str_replace("~", "", Input::file($nama, "name"))));
        $filetipe = pathinfo($filename, PATHINFO_EXTENSION);
        $filetmpname = Input::file($nama, "tmp_name");
        $filesize = Input::file($nama, "size");

        if ($this->tipe($filetipe) == "image" || $this->tipe($filetipe) == "media" || $this->tipe($filetipe) == "dokumen") {
            $result = $this->size($this->tipe($filetipe), $filesize);
            if (is_string($result)) {
                $folder = __DIR__ . "/../../../" . config::envReader("PUBLIC_FOLDER") . "/assets/storage/" . $result . "/" . date("d_m_y");
                if (!is_dir($folder)) {
                    mkdir($folder, 0777);
                }
                $kode = substr(sha1(date('Y-m-d H:i:s')), 0, 10);
                $namabaru = $kode . "_" . $filename;
                move_uploaded_file($filetmpname, $folder . "/" . $namabaru);
                $result = "assets/storage/" . $result . "/" . date("d_m_y") . "/" . $namabaru;
            } else {
                $result = "Ukuran file tidak boleh melebihi " . $result;
            }
        } else if ($this->tipe($filetipe) == "ditolak") {
            $result = "File tipe " . $filetipe . " tidak diijinkan";
        } else {
            $result = "Error file";
        }

        return $result;
    }


    protected function tipe(string $filetipe)
    {
        $result = "ditolak";
        $imageFile = explode(",", Config::envReader("FILE_TIPE_IMAGE"));
        $mediaFile = explode(",", Config::envReader("FILE_TIPE_MEDIA"));
        $dokumenFile = explode(",", Config::envReader("FILE_TIPE_DOKUMEN"));

        for ($i = 0; $i < count($imageFile); $i++) {
            if ($imageFile[$i] == $filetipe) {
                $result = "image";
            }
        }

        for ($i = 0; $i < count($mediaFile); $i++) {
            if ($mediaFile[$i] == $filetipe) {
                $result = "media";
            }
        }

        for ($i = 0; $i < count($dokumenFile); $i++) {
            if ($dokumenFile[$i] == $filetipe) {
                $result = "dokumen";
            }
        }

        return $result;
    }

    protected function size(string $tipe, string $filesize)
    {
        $result = $tipe;

        $size = Config::envReader("FILE_SIZE_" . strtoupper($tipe));

        if ((int)$filesize <= (int)$size) {
            $result = $tipe;
        } else {
            $result = (int)$size;
        }

        return $result;
    }
}

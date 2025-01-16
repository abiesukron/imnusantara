<?php

namespace AbieSoft\AsetCode\Package;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use Exception;
use PHPMailer\PHPMailer\PHPMailer;

class Email
{
    public static function kirim(string $tujuan, string $judul, string $isi): bool
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Penerima lain
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            /*
                Konten
            */
            $mail->isHTML(true);                                  //Email format html
            $mail->Subject = $judul;
            $mail->Body    = $isi;
            //$mail->AltBody = 'digunakan untuk text non HTML';

            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }


    public static function beritabaru($berita = [])
    {

        $tujuan = "";
        $judul = "";
        $isi = "";
        $cek = DB::terhubung()->query("SELECT email FROM langganan");
        if ($cek->hitung()) {
            foreach ($cek->hasil() as $c) {
                $tujuan = $c->email;
                $judul = $berita['judul'];

                $isi = "
                    <div style='width: 100%; position: relative'>
                        <div style='width: 500px; margin: 0 auto; border: 1px solid #eee; padding: 20px;'>
                            <img src='" . Config::baseURL() . "/assets/images/logo_tagline_id.png' style='width: 200px; margin: 0 auto;'>
                            <div>
                                <h2 style='padding-top: 20px; font-family: Arial;'>
                                    " . $judul . "
                                </h2>
                            </div>
                            <img src='" . $berita['gambar'] . "' style='width: 100%; margin: 0 auto;'>
                            <div style='margin-top: 15px; font-size: 12pt;'>" . $berita['potongan'] . " ...[]</div>
                            <div style='margin-top: 20px;'><a style='background: #df6513; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;' href='" . $berita['link'] . "'>Lihat Di Website</a></div>
                        </div>
                    </div>
                ";

                $mail = new PHPMailer(true);
                try {
                    /*
                        Konfigurasi Email lihat di file .env
                        $mail->SMTPDebug = SMTP::DEBUG_SERVER;
                    */
                    $mail->isSMTP();
                    $mail->Host       = Config::envReader('EMAIL_SMTP');
                    $mail->SMTPAuth   = true;
                    $mail->Username   = Config::envReader('EMAIL_AKUN');
                    $mail->Password   = Config::envReader('EMAIL_PASSWORD');
                    $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
                    $mail->Port       = Config::envReader('EMAIL_PORT');

                    /*
                        Email seting
                    */
                    $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
                    $mail->addAddress($tujuan);     // Penerima Email
                    //---$mail->addAddress('ellen@example.com');               //Penerima lain
                    //$mail->addReplyTo('info@example.com', 'Information');
                    //---$mail->addCC('cc@example.com');
                    //---$mail->addBCC('bcc@example.com');

                    //Attachments
                    //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
                    //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

                    /*
                        Konten
                    */
                    $mail->isHTML(true);                                  //Email format html
                    $mail->Subject = $judul;
                    $mail->Body    = $isi;
                    //$mail->AltBody = 'digunakan untuk text non HTML';

                    $mail->send();

                    //return true;
                } catch (Exception $e) {
                    // return false;
                }
            }
        } else {
            // return false;
        }
    }


    public static function verifikasi(string $tujuan, string $judul, string $kode): bool
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Penerima lain
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            /*
                Konten
            */
            $link = Config::baseURL() . "api/email/verifikasi/" . $kode . "/next";
            $mail->isHTML(true);                                  //Email format html
            $mail->Subject = $judul;
            $mail->Body    = "
                <div style='width: 100%; position: relative'>
                    <div style='width: 500px; margin: 0 auto; border: 1px solid #eee; padding: 20px;'>
                        <img src='" . Config::baseURL() . "/assets/images/logo_tagline_id_logo.png' style='width: 200px; margin: 0 auto;'>
                        <div>
                            <h2 style='padding-top: 20px; font-family: Arial;'>Verifikasi Email</h2>
                        </div>
                        <div>Berikut adalah link verifikasi anda :</div>
                        <div style='margin: 20px 0; display: block; padding: 20px 0;'>
                            <a style='background: #df6513; color: #fff; padding: 10px 15px; border: none; border-radius: 4px; cursor: pointer;' href='" . $link . "'>Verifikasi</a>
                        </div>
                        <div>Klik Link tersebut atau abaikan jika tidak ingin melakukan verifikasi</div>
                        <div style='margin-top: 20px; font-weight: 600;'>Tim " . Config::envReader("APP_NAME") . "</div>
                    </div>
                </div>   
            ";
            //$mail->AltBody = 'digunakan untuk text non HTML';

            $terkirim = $mail->send();
            if ($terkirim) {
                return true;
            } else {
                return false;
            }
        } catch (Exception $e) {
            return false;
        }
    }

    public static function emailreset(string $tujuan, string $judul, string $kode): bool
    {
        $mail = new PHPMailer(true);
        try {
            /*
                Konfigurasi Email lihat di file .env
                $mail->SMTPDebug = SMTP::DEBUG_SERVER;
            */
            $mail->isSMTP();
            $mail->Host       = Config::envReader('EMAIL_SMTP');
            $mail->SMTPAuth   = true;
            $mail->Username   = Config::envReader('EMAIL_AKUN');
            $mail->Password   = Config::envReader('EMAIL_PASSWORD');
            $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;
            $mail->Port       = Config::envReader('EMAIL_PORT');

            /*
                Email seting
            */
            $mail->setFrom(Config::envReader('EMAIL_PENGIRIM'), Config::envReader('EMAIL_NAMA_PENGIRIM'));
            $mail->addAddress($tujuan);     // Penerima Email
            //---$mail->addAddress('ellen@example.com');               //Penerima lain
            //$mail->addReplyTo('info@example.com', 'Information');
            //---$mail->addCC('cc@example.com');
            //---$mail->addBCC('bcc@example.com');

            //Attachments
            //---$mail->addAttachment('/var/tmp/file.tar.gz');         //Tambah Lampiran Email
            //---$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    

            /*
                Konten
            */
            $mail->isHTML(true);                                  //Email format html
            $mail->Subject = $judul;
            $mail->Body    = "
                <div style='display: flex; justify-centent: center; align-items: center; background-color: #eee; padding: 40px'>
                    <div style='max-width: 350px; position: relative; margin-left: auto; margin-right: auto; padding: 30px; border-radius: 8px; background-color: #fff;'>
                        <div style='font-size: 10pt; text-align: center;'>Kode Reset Anda :</div>
                        <div style='font-weight: bold; font-size: 28pt; text-align:center; padding: 10px 0;'>$kode</div>
                        <div style='font-size: 10pt; text-align:center;'>Rahasiakan kode ini dari orang lain. Pastikan anda yang menggunakan kode ini.</div>
                        <div style='margin-top: 8px; font-size: 10pt; text-align:center;'>dari <strong>" . Config::envReader('APP_NAME') . "'s Team.</strong></div>
                    </div>
                </div>    
            ";
            //$mail->AltBody = 'digunakan untuk text non HTML';

            $mail->send();

            return true;
        } catch (Exception $e) {
            return false;
        }
    }
}

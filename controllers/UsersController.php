<?php

namespace App\Controller;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Controller;
use AbieSoft\AsetCode\Http\Lanjut;
use AbieSoft\AsetCode\Http\Middleware;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Config;
use AbieSoft\AsetCode\Utilities\ConverterText;
use AbieSoft\AsetCode\Utilities\Tanggal;
use App\Model\Berita;
use App\Model\Log;
use App\Model\Seting;
use App\Model\Users;
use App\Model\Verifikasi;
use Nette\Utils\Html;

class UsersController extends Controller
{

    use Middleware;

    protected string $nama,
        $keterangan,
        $icon,
        $status;

    public function index()
    {
        $this->indexMiddleware("users");
        $auth = new Authentication;
        if ($auth->getNamaGrup() == "Administrator") {
            return $this->view(
                page: 'users/index',
                data: [
                    'title' => 'Users',
                ]
            );
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/");
        }
    }

    public function add()
    {
        $this->createMiddleware("users");
        $auth = new Authentication;
        if ($auth->getNamaGrup() == "Administrator") {
            return $this->view(
                page: 'users/add',
                data: [
                    'title' => 'Users',
                    'grup' => DB::terhubung()->query("SELECT id, nama FROM grup")->hasil(),
                ]
            );
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/");
        }
    }

    public function edit($id)
    {
        $this->editMiddleware("users");
        $auth = new Authentication;
        if ($auth->getNamaGrup() == "Administrator") {
            $idgrup = "";
            $namagrup = "";
            $namauser = "";
            $email = "";
            $grup = DB::terhubung()->query("SELECT users.id as idusers, grup.id as idgrup, grup.nama as namagrup, users.nama as namauser, users.email as email FROM users,grup WHERE users.grupid = grup.id AND users.id = '" . $id . "' ");

            if ($grup->hitung() != 0) {
                foreach ($grup->hasil() as $g) {
                    $idgrup = $g->idgrup;
                    $namagrup = $g->namagrup;
                    $namauser = $g->namauser;
                    $email = $g->email;
                    $id = $g->idusers;
                }
                return $this->view(
                    page: 'users/edit',
                    data: [
                        'title' => 'Users',
                        'grup' => DB::terhubung()->query("SELECT id, nama FROM grup")->hasil(),
                        'idgrup' => $idgrup,
                        'namagrup' => $namagrup,
                        'namauser' => $namauser,
                        'email' => $email,
                        'id' => $id
                    ]
                );
            } else {
                Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/users");
            }
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/");
        }
    }

    public function read($parameter)
    {

        $this->readMiddleware("users");

        $email = str_replace("@", "", $parameter[0]) . "@";
        $auth = new Authentication;

        $cekuser = DB::terhubung()->query("SELECT email FROM users WHERE email LIKE '%" . $email . "%' ORDER BY id LIMIT 1");
        if ($cekuser->hitung() == 1) {
            foreach ($cekuser->hasil() as $h) {
                $email = $h->email;
            }
        }
        $tab = $parameter[1];

        if ($email == $auth->getEmail()) {
            return match ($tab) {
                'tugas' => $this->tugas($email),
                'aktifitas' => $this->aktifitas($email),
                'seting' => $this->seting($email),
                default => $this->profilekamu()
            };
        } else {
            if ($tab != "profile") {
                Lanjut::ke("users/read/" . $parameter[0] . "/profile");
            } else {
                $this->profileoranglain($email);
            }
        }
    }

    public function profilekamu()
    {
        $auth = new Authentication;
        $saldo = DB::terhubung()->query("SELECT id FROM berita WHERE penulis = '" . $auth->getId() . "' AND editor != 0 AND publikasi = 'terbit' ")->hitung() * Config::envReader("HONOR_PERBERITA");
        return $this->view(
            page: 'users/profile',
            data: [
                'title' => 'Profile',
                'totalkonten' => 0,
                'namagrup' => $auth->getNamaGrup(),
                'saldo' => ConverterText::formatUang($saldo),
                'verified' => Verifikasi::only(id: 'email|' . $auth->getEmail(), output: 'hitung')
            ]
        );
    }

    public function profileoranglain(string $email)
    {
        $cekprofile = DB::terhubung()->query("SELECT users.id, users.nama, users.photo, users.email,grup.nama as namagrup  FROM users, grup WHERE users.grupid = grup.id AND email = '" . $email . "' ORDER BY id LIMIT 1");
        if ($cekprofile->hitung()) {
            $id = "";
            $nama = "";
            $email = "";
            $namagrup = "";
            $photo = "";
            foreach ($cekprofile->hasil() as $p) {
                $id = $p->id;
                $nama = $p->nama;
                $email = $p->email;
                $namagrup = $p->namagrup;
                $photo = $p->photo;
            }

            return $this->view(
                page: 'users/viewprofile',
                data: [
                    'title' => 'Profile',
                    'nama' => $nama,
                    'email' => $email,
                    'namagrup' => $namagrup,
                    'photo' => $photo,
                    'totalkonten' => 0,
                    'loginterakhir' => (Log::only(select: 'login', id: 'email|' . $email, output: 'string')) ? Tanggal::simpelAndTime(Log::only(select: 'login', id: 'email|' . $email, output: 'string')) : "-",
                    'device' => (Log::only(select: 'device', id: 'email|' . $email, output: 'string')) ? Log::only(select: 'device', id: 'email|' . $email, output: 'string') : "-"
                ]
            );
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/users");
        }
    }

    public function tugas(string $email)
    {
        return $this->view(
            page: 'users/tugas',
            data: [
                'title' => 'Tugas'
            ]
        );
    }

    public function aktifitas(string $email)
    {
        return $this->view(
            page: 'users/aktifitas',
            data: [
                'title' => 'Aktifitas',
                'aktifitas' => Log::only(id: 'email|' . $email)
            ]
        );
    }

    public function seting(string $email)
    {
        $auth = new Authentication;
        if ($auth->getNamaGrup() == "Administrator") {
            return $this->view(
                page: 'users/seting',
                data: [
                    'title' => 'Seting',
                    'seting' => Seting::all()
                ]
            );
        } else {
            Lanjut::ke(Config::envReader("ADMIN_PREFIX") . "/");
        }
    }
}

<?php

namespace App\Service\Api;

use AbieSoft\AsetCode\Auth\Authentication;
use AbieSoft\AsetCode\Http\Middleware;
use AbieSoft\AsetCode\Mysql\DB;
use AbieSoft\AsetCode\Utilities\Generate;
use AbieSoft\AsetCode\Utilities\Guard;
use AbieSoft\AsetCode\Utilities\Input;
use AbieSoft\AsetCode\Utilities\Metafile;
use App\Service\Service;
use Shuchkin\SimpleXLSXGen;

class UsersApi extends Service
{

    use Middleware;

    public function load()
    {
        return match (strtolower($_SERVER['REQUEST_METHOD'])) {
            'get' => $this->list(),
            default => $this->post()
        };
    }

    protected function post()
    {
        $method = Input::get('__method');
        return match ($method) {
            'DELETE' => $this->remove(),
            'PATCH' => $this->replace(),
            'EDIT_USER' => $this->edit(),
            default => $this->keep()
        };
    }

    public function excel()
    {
        $this->authentication("get");
        $data = [
            ["Nama User", "Email", "nama Grup"]
        ];

        $cek = DB::terhubung()->query("SELECT users.nama as namauser, users.email, grup.nama as namagrup  FROM users, grup WHERE users.grupid = grup.id")->hasil();

        foreach ($cek as $c) {
            $item = [];
            $item[] = $c->namauser;
            $item[] = $c->email;
            $item[] = $c->namagrup;
            array_push($data, $item);
        }

        SimpleXLSXGen::fromArray($data)->saveAs('assets/download/users_tabel.xlsx');

        $result = [];
        $result['code'] = 200;
        $result['message'] = "OK";
        $result['data'] = ["assets/download/users_tabel.xlsx"];
        echo json_encode($result);
    }

    protected function list()
    {
        $this->authentication("get");
        $data = [];
        $cek = DB::terhubung()->query("SELECT users.id, users.nama, users.email, grup.nama as grup FROM users, grup WHERE users.grupid = grup.id ORDER BY users.id DESC");
        if ($cek->hitung()) {
            $data = $cek->hasil();
        }
        $result = [];
        $result['code'] = 200;
        $result['message'] = "OK";
        $result['data'] = $data;
        $result['opsi'] = $this->routeMiddleware()["users"];
        echo json_encode($result);
    }

    protected function keep()
    {
        $this->authentication("post");
        $nama = Input::get('nama');
        $email = Input::get('email');
        $grupid = Input::get('grupid');
        $csrf = Input::get('__csrf');
        $photo = "assets/images/default.png";
        $salt = Generate::salt();
        $psw = Generate::make("1234", $salt);

        if (Guard::formChecker($csrf)) {
            $cek = DB::terhubung()->query("SELECT id FROM users WHERE email = '" . $email . "' ");
            if ($cek->hitung() > 0) {
                die("Email <strong>" . $email . "</strong> sudah ada.");
            } else {
                $input = DB::terhubung()->input("users", [
                    'nama' => $nama,
                    'email' => $email,
                    'grupid' => $grupid,
                    'photo' => $photo,
                    'psw' => $psw,
                    'salt' => $salt
                ]);
                if ($input) {
                    die("Berhasil");
                } else {
                    die("Gagal membuat kategori");
                }
            }
        } else {
            die("Token Expire");
        }
    }

    protected function edit()
    {
        $this->authentication("post");
        $id = Input::get('id');
        $csrf = Input::get('__csrf');
        if (Guard::formChecker($csrf)) {
            $email = Input::get('email');
            $cekemail = DB::terhubung()->query(" SELECT id FROM users WHERE email = '" . $email . "' AND id !='" . $id . "' ");
            if (!$cekemail->hitung()) {
                if (Input::file("photo", "name") != "") {
                    return $this->editWithFile();
                } else {
                    return $this->editWithoutFile();
                }
            } else {
                die("Email <strong>" . $email . "</strong> sudah ada");
            }
        } else {
            die("Token Expire");
        }
    }

    protected function editWithFile()
    {
        $meta = new Metafile;
        if (count(explode("/", $meta->approver("photo"))) > 2) {
            $photo = $meta->approver("photo");
            return $this->editWithoutFile($photo);
        } else {
            die($meta->approver("photo"));
        }
    }

    protected function editWithoutFile($photo = "")
    {
        $auth = new Authentication;
        if ($photo != "") {
            $photo = $photo;
        } else {
            $photo = $auth->getPhoto();
        }
        $id = Input::get('id');
        $nama = Input::get('nama');
        $email = Input::get('email');
        $grupid = Input::get('grupid');
        $password = Input::get('password');
        $perbarui = "";
        if ($password != "") {
            $salt = Generate::salt();
            $psw = Generate::make($password, $salt);
            $perbarui = DB::terhubung()->perbarui("users", $id, [
                'nama' => $nama,
                'email' => $email,
                'grupid' => $grupid,
                'salt' => $salt,
                'psw' => $psw,
                'photo' => $photo,
                'diupdate' => date("Y-m-d H:i:s")
            ]);
        } else {
            $perbarui = DB::terhubung()->perbarui("users", $id, [
                'nama' => $nama,
                'email' => $email,
                'grupid' => $grupid,
                'photo' => $photo,
                'diupdate' => date("Y-m-d H:i:s")
            ]);
        }

        if ($perbarui) {
            die("Berhasil");
        } else {
            die("Gagal memperbarui data");
        }
    }

    protected function replace()
    {
        $this->authentication("post");
        $id = Input::get('id');
        $csrf = Input::get('__csrf');
        if (Guard::formChecker($csrf)) {
            $email = Input::get('email');
            $cekemail = DB::terhubung()->query(" SELECT id FROM users WHERE email = '" . $email . "' AND id !='" . $id . "' ");
            if (!$cekemail->hitung()) {
                if (Input::file("photo", "name") != "") {
                    return $this->postWithFile();
                } else {
                    return $this->postWithoutFile();
                }
            } else {
                die("Email <strong>" . $email . "</strong> sudah ada");
            }
        } else {
            die("Token Expire");
        }
    }

    protected function postWithFile()
    {
        $meta = new Metafile;
        if (count(explode("/", $meta->approver("photo"))) > 2) {
            $photo = $meta->approver("photo");
            return $this->postWithoutFile($photo);
        } else {
            die($meta->approver("photo"));
        }
    }

    protected function postWithoutFile($photo = "")
    {
        $auth = new Authentication;
        if ($photo != "") {
            $photo = $photo;
        } else {
            $photo = $auth->getPhoto();
        }
        $id = Input::get('id');
        $nama = Input::get('nama');
        $email = Input::get('email');
        $password = Input::get('password');
        $perbarui = "";

        if ($password != "") {
            $salt = Generate::salt();
            $psw = Generate::make($password, $salt);
            $perbarui = DB::terhubung()->perbarui("users", $id, [
                'nama' => $nama,
                'email' => $email,
                'salt' => $salt,
                'psw' => $psw,
                'photo' => $photo,
                'diupdate' => date("Y-m-d H:i:s")
            ]);
        } else {
            $perbarui = DB::terhubung()->perbarui("users", $id, [
                'nama' => $nama,
                'email' => $email,
                'photo' => $photo,
                'diupdate' => date("Y-m-d H:i:s")
            ]);
        }

        if ($photo != "") {
            if ($perbarui) {
                die($photo);
            } else {
                die("Gagal memperbarui data");
            }
        } else {
            if ($perbarui) {
                die("Berhasil");
            } else {
                die("Gagal memperbarui data");
            }
        }
    }

    protected function remove()
    {
        $this->authentication("post");
        $id = Input::get('id');
        $csrf = Input::get('__csrf');
        $nama = "";
        if (Guard::formChecker($csrf)) {
            $data = DB::terhubung()->query("SELECT nama FROM users WHERE id='" . $id . "' ");
            foreach ($data->hasil() as $d) {
                $nama = $d->nama;
            }
            $hapus = DB::terhubung()->hapus("users", ["id", "=", $id]);
            if ($hapus) {
                die("Berhasil|User <strong>" . $nama . "</strong> sudah dihapus");
            }
        } else {
            die("Token Expire");
        }
    }
}

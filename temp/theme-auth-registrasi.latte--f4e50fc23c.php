<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page//../theme/auth/registrasi.latte */
final class Template_f4e50fc23c extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page//../theme/auth/registrasi.latte';

	public const Blocks = [
		['css' => 'blockCss', 'title' => 'blockTitle', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="Prefix" content="';
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 6 */;
		echo '">
    <meta name="Baseurl" content="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 7 */;
		echo '">
    <meta name="x-API-key" content="oIalAsd2Iamfj.plqjs">
    <meta name="x-Form-Key" content="">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
		echo 'assets/css/authstyle.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo 'assets/package/icon8/css/line-awesome.min.css" >
';
		$this->renderBlock('css', get_defined_vars()) /* line 12 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 13 */;
		echo '</title>
</head>
<body>

    <div class="auth-container">
        <div class="form">
            <div class="card">
                <div class="logo"><img src=\'assets/images/logo_tagline_putih.png\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 20 */;
		echo '"></div>
                <div class="label"><h3>';
		echo LR\Filters::escapeHtmlText($page) /* line 21 */;
		echo '</h3></div>
                <form method="post" id="formInput" name="formInput">
                    <div class="form-grup">
                        <label for="nama">Nama</label>
                        <input class="form-control" id="nama" name="nama" value="';
		echo LR\Filters::escapeHtmlAttr($googleNama) /* line 25 */;
		echo '" placeholder="Nama anda" autofocus>
                    </div>
                    <div class="form-grup">
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" value="';
		echo LR\Filters::escapeHtmlAttr($googleEmail) /* line 29 */;
		echo '" placeholder="contoh: email@email.com">
                    </div>
                    <div class="form-grup">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="***">
                    </div>
                    <div class="form-button">
                        <input type="hidden" id="__method" name="__method" value="REGISTRASI">
                        <button><span id="btnSubmit">Registrasi</span></button>
                    </div>
                </form>
                <div class="link-area mt-10">Sudah punya akun? <a href="/login">Login</a></div>
';
		if ($linkgooglelogin != '') /* line 41 */ {
			echo '                    <div class="line"><span>atau</span></div>
                    <div class="form-button">
                        <button type="button" onClick="window.location.href=this.dataset.link" data-link="';
			echo LR\Filters::escapeHtmlAttr($linkgooglelogin) /* line 44 */;
			echo '"><img src="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 44 */;
			echo 'assets/images/google.png"><span>Login dengan Google</span></button>
                    </div>
';
		}
		echo '            </div>
        </div>
        <div class="cover">
            <img class="logo" src="assets/images/new_tagline_id_logo.png">
        </div>
    </div>
    <div id="toasthere"></div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 55 */;
		echo 'assets/js/jquery-3.7.0.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 56 */;
		echo 'assets/js/authstyle.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 57 */;
		echo 'assets/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 58 */;
		echo 'assets/js/toast.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 59 */;
		echo '</body>
</html>';
	}


	/** {block css} on line 12 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 13 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 13 */;
	}


	/** {block js} on line 59 */
	public function blockJs(array $ʟ_args): void
	{
		echo '        <script>
            let formInput = el("#formInput");
            formInput.addEventListener("submit", (e)=>{
                e.preventDefault();
                let nama = document.forms["formInput"]["nama"];
                let email = document.forms["formInput"]["email"];
                let password = document.forms["formInput"]["password"];
                let btnSubmit = el("#btnSubmit");

                if(setText(nama.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Nama \'+setText(nama.value)
                    });
                    nama.focus();
                }else if(setEmail(email.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Email \'+setEmail(email.value)
                    });
                    email.focus();
                }else if(setText(password.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Password \'+setText(password.value)
                    });
                    password.focus();
                }else{
                    btnSubmit.innerHTML = "Menyimpan..";
                    const form = document.querySelector(\'form[id="formInput"]\');
                    const formData = new FormData(form);
                    fetch(Baseurl + \'api/auth\', {
                        method: \'POST\',
                        headers: HEADERFORM,
                        body: formData
                    }).then(response => response.text()).then(pesan => {
                        btnSubmit.innerHTML = "Registrasi";
                        if(pesan == "Logged"){
                            window.location.href = Baseurl+Prefix;
                        }else{
                            Toast({
                                tipe: \'error\',
                                message: pesan
                            });
                        }
                    }).catch(error => {
                        btnSubmit.innerHTML = "Registrasi";
                        Toast({
                            tipe: \'error\',
                            message: error
                        });
                    });
                }
            });
        </script>
';
	}
}

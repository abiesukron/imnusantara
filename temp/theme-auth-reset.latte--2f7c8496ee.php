<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page//../theme/auth/reset.latte */
final class Template_2f7c8496ee extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page//../theme/auth/reset.latte';

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
    <meta name="Baseurl" content="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 6 */;
		echo '">
    <meta name="x-API-key" content="oIalAsd2Iamfj.plqjs">
    <meta name="x-Form-Key" content="">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 9 */;
		echo 'assets/css/authstyle.css">
    <link rel="stylesheet" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
		echo 'assets/package/icon8/css/line-awesome.min.css" >
';
		$this->renderBlock('css', get_defined_vars()) /* line 11 */;
		echo '    <title>';
		$this->renderBlock('title', get_defined_vars()) /* line 12 */;
		echo '</title>
</head>
<body>

    <div class="auth-container">
        <div class="form">
            <div class="card">
                <div class="logo"><img src=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 19 */;
		echo 'assets/images/logo_tagline_putih.png\' onClick=\'window.location.href=this.dataset.link\' data-link="';
		echo LR\Filters::escapeHtmlAttr($url) /* line 19 */;
		echo '"></div>
                <div class="label"><h3>';
		echo LR\Filters::escapeHtmlText($page) /* line 20 */;
		echo '</h3></div>
                <form method="post" id="formInput" name="formInput">
                    <div class="form-grup">
                        <label for="passwordbaru">Password Baru</label>
                        <input type="password" class="form-control" id="passwordbaru" name="passwordbaru" placeholder="***">
                    </div>
                    <div class="form-grup">
                        <label for="password">Konfirmasi Password</label>
                        <input type="password" class="form-control" id="konfirmasipassword" name="konfirmasipassword" placeholder="***">
                    </div>
                    <div class="form-grup">
                        <div class="warning">Kode reset sudah dikirim ke email <strong>';
		echo LR\Filters::escapeHtmlText($email) /* line 31 */;
		echo '</strong>. Silahkan cek email terlebih dahulu untuk melanjutkan mengubah password.</div>
                        <label for="kode">Kode Reset</label>
                        <input class="form-control pt34-center" id="kode" name="kode" maxLength="6" placeholder="Kode reset">
                    </div>
                    <div class="form-button">
                        <input type="hidden" id="__method" name="__method" value="UBAHPASSWORD">
                        <button><span id="btnSubmit">Ubah Password</span></button>
                    </div>
                </form>
            </div>
        </div>
        <div class="cover">
            <img class="logo" src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 44 */;
		echo 'assets/images/new_tagline_id_logo.png">
        </div>
    </div>
    <div id="toasthere"></div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 48 */;
		echo 'assets/js/jquery-3.7.0.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 49 */;
		echo 'assets/js/authstyle.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 50 */;
		echo 'assets/js/validasi.js"></script>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 51 */;
		echo 'assets/js/toast.js"></script>
';
		$this->renderBlock('js', get_defined_vars()) /* line 52 */;
		echo '</body>
</html>';
	}


	/** {block css} on line 11 */
	public function blockCss(array $ʟ_args): void
	{
	}


	/** {block title} on line 12 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 12 */;
	}


	/** {block js} on line 52 */
	public function blockJs(array $ʟ_args): void
	{
		echo '        <script>
            let formInput = el("#formInput");
            formInput.addEventListener("submit", (e)=>{
                e.preventDefault();
                let passwordbaru = document.forms["formInput"]["passwordbaru"];
                let konfirmasipassword = document.forms["formInput"]["konfirmasipassword"];
                let btnSubmit = el("#btnSubmit");

                if(setText(passwordbaru.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Password baru \'+setText(passwordbaru.value)
                    });
                    passwordbaru.focus();
                }else if(setText(konfirmasipassword.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Konfirmasi baru \'+setText(konfirmasipassword.value)
                    });
                    konfirmasipassword.focus();
                }else if(passwordbaru.value != konfirmasipassword.value){
                    Toast({
                        tipe: \'error\',
                        message: \'Konfirmasi password tidak sama\'
                    });
                    konfirmasipassword.value = "";
                    konfirmasipassword.focus();
                }else if(setText(kode.value)){
                    Toast({
                        tipe: \'error\',
                        message: \'Kode \'+setText(kode.value)
                    });
                    kode.focus();
                }else{
                    btnSubmit.innerHTML = "Menyimpan..";
                    const form = document.querySelector(\'form[id="formInput"]\');
                    const formData = new FormData(form);
                    fetch(Baseurl + \'api/auth\', {
                        method: \'POST\',
                        headers: HEADERFORM,
                        body: formData
                    }).then(response => response.text()).then(pesan => {
                        btnSubmit.innerHTML = "Ubah Password";
                        if(pesan == "Berhasil"){
                            Toast({
                                tipe: \'success\',
                                message: \'Password telah diubah\'
                            });
                            setTimeout(()=>{
                                window.location.href=Baseurl+"login";
                            },1000);
                        }else{
                            Toast({
                                tipe: \'error\',
                                message: pesan
                            });
                        }
                    }).catch(error => {
                        btnSubmit.innerHTML = "Ubah Password";
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

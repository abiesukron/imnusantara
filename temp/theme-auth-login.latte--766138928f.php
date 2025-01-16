<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page//../theme/auth/login.latte */
final class Template_766138928f extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page//../theme/auth/login.latte';

	public const Blocks = [
		['css' => 'blockCss', 'title' => 'blockTitle'],
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
                        <label for="email">Email</label>
                        <input class="form-control" id="email" name="email" placeholder="contoh: email@email.com" autofocus>
                    </div>
                    <div class="form-grup">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" id="password" name="password" placeholder="***">
                        <div class="link-area" id="resetArea"></div>
                    </div>
                    <div class="form-button">
                        <button><span id="btnSubmit">Login</span></button>
                    </div>
                </form>
';
		if ($linkRegistrasi != 'off') /* line 36 */ {
			echo '                <div class="flex-center mt-10">
                    <div class="link-area">Belum punya akun? <a href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 38 */;
			echo 'registrasi">Registrasi</a></div>
                </div>
';
		}
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
		echo '                
                
            </div>
        </div>
        <div class="cover">
            <img class="logo" src="assets/images/new_tagline_id_logo.png">
        </div>
    </div>
    <div id="toasthere"></div>
    <script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 57 */;
		echo 'assets/js/jquery-3.7.0.js"></script><script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 57 */;
		echo 'assets/js/authstyle.js"></script><script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 57 */;
		echo 'assets/js/validasi.js"></script><script src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 57 */;
		echo 'assets/js/toast.js"></script><script>  let fi = el("#formInput"); fi.addEventListener("submit", (e)=>{ e.preventDefault(); let ra = el("#resetArea"); let em = document.forms["formInput"]["email"]; let ps = document.forms["formInput"]["password"]; let bs = el("#btnSubmit"); if(setEmail(em.value)){ Toast({ tipe: \'error\', message: \'Email \'+setEmail(em.value) }); em.focus(); }else if(setText(ps.value)){ Toast({ tipe: \'error\', message: \'Password \'+setText(ps.value) }); ps.focus(); }else{ bs.innerHTML = "Mengauthentkasi.."; const f = document.querySelector(\'form[id="formInput"]\'); const fd = new FormData(f); fetch(Baseurl + \'api/auth\', { method: \'POST\', headers: HEADERFORM, body: fd }).then(response => response.text()).then(pesan => { if(pesan == "notfound"){ bs.innerHTML = "Login"; Toast({ tipe: \'error\', message: \'Login Gagal\' }); ra.innerHTML = ``; }else if(pesan == "errorpassword"){ bs.innerHTML = "Login"; ps.value = ""; ps.focus(); Toast({ tipe: \'error\', message: \'Login Gagal\' }); 
    
    
    ra.innerHTML = `Lupa password ? <a href="javascript:rst(\'`+em.value+`\')">Reset Password</a>`;
    
    
    }else if(pesan == "errorsession"){ bs.innerHTML = "Login"; ps.value = ""; ps.focus(); Toast({ tipe: \'error\', message: \'Login Gagal\' }); }else{ bs.innerHTML = "Mengalihkan.."; window.location.href = Baseurl+Prefix; } }).catch(error => { bs.innerHTML = "Login"; Toast({ tipe: \'error\', message: error }); }); } });
    
    function rst(email) {
        Toast({
            tipe: \'warning\',
            message: \'Mengirim kode reset ..\'
        });
        fetch(Baseurl + "api/email/request/kode/reset/"+email.replace(".","/"), {
            method: \'GET\',
            headers: HEADER,
        }).then(response => response.json()).then(result => {
            if(result.message == "OK"){
                Toast({
                    tipe: \'success\',
                    message: \'Kode reset sudah dikirim ke email\'
                });
                setTimeout(()=>{
                    window.location.href=Baseurl+"reset/kode/"+result.data.kode;
                },1000);
            }else{
                Toast({
                    tipe: \'error\',
                    message: \'Permintaan verifikasi error\'
                });
            }
        }).catch(error => {
            console.log(error);
        }); 
    }
    
    </script>
</body>
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
}

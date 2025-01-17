<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\vendor\abiesoft\Http/../../../templates/page/users/profile.latte */
final class Template_55337208b4 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\vendor\\abiesoft\\Http/../../../templates/page/users/profile.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		echo "\n";
		$this->renderBlock('js', get_defined_vars()) /* line 131 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		$this->parentName = '../../main.latte';
		return get_defined_vars();
	}


	/** {block title} on line 2 */
	public function blockTitle(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo LR\Filters::escapeHtmlText($title) /* line 2 */;
	}


	/** {block content} on line 3 */
	public function blockContent(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '
<form method="post" id="formInput" name="formInput">
    <div class="page">
        <div class="page-header">
            <div class="page-info">
                <div class="display-6">';
		echo LR\Filters::escapeHtmlText($title) /* line 9 */;
		echo '</div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 13 */;
		echo '\'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                                </svg>
                            </a>
                        </li>
                        <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 19 */;
		echo 'users\'>Users</a></li>
                        <li>Profile</li>
                    </ul>
                </div>
            </div>
            <div class="page-option"></div>
        </div>
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-body">
                        <div class="flex-between box">
                            <div>
                                <div class="title" id="namauser2">';
		echo LR\Filters::escapeHtmlText($nama_sesi) /* line 36 */;
		echo '</div>
                                <div id="grupuser">';
		echo LR\Filters::escapeHtmlText($namagrup_sesi) /* line 37 */;
		echo '</div>
                            </div>
                            <div class="cover"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 39 */;
		echo LR\Filters::escapeHtmlAttr($photo_sesi) /* line 39 */;
		echo '" data-img="photouser"></div>
                        </div>
                        <div class="flex-between box">
                            <div>Email</div>
                            <div class="flex-between">
                                <div id="emailuser2">';
		echo LR\Filters::escapeHtmlText($email_sesi) /* line 44 */;
		echo '</div>
';
		if ($verified) /* line 45 */ {
			echo '                                    <div class="verified" title="Email sudah diverifikasi">
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                            <path stroke-linecap="round" stroke-linejoin="round" d="M9 12.75 11.25 15 15 9.75M21 12c0 1.268-.63 2.39-1.593 3.068a3.745 3.745 0 0 1-1.043 3.296 3.745 3.745 0 0 1-3.296 1.043A3.745 3.745 0 0 1 12 21c-1.268 0-2.39-.63-3.068-1.593a3.746 3.746 0 0 1-3.296-1.043 3.745 3.745 0 0 1-1.043-3.296A3.745 3.745 0 0 1 3 12c0-1.268.63-2.39 1.593-3.068a3.745 3.745 0 0 1 1.043-3.296 3.746 3.746 0 0 1 3.296-1.043A3.746 3.746 0 0 1 12 3c1.268 0 2.39.63 3.068 1.593a3.746 3.746 0 0 1 3.296 1.043 3.746 3.746 0 0 1 1.043 3.296A3.745 3.745 0 0 1 21 12Z"></path>
                                        </svg>
                                    </div>
';
		} else /* line 51 */ {
			echo '                                    <button type="button" id="btnVerifikasi" class="btn-small" data-email="';
			echo LR\Filters::escapeHtmlAttr($email_sesi) /* line 52 */;
			echo '">Verifikasi</button>
';
		}
		echo '                            </div>
                        </div>
';
		if ($totalkonten != 0) /* line 56 */ {
			echo '                            <div class="flex-between box">
                                <div>Total Konten</div>
                                <div class="flex-between">
                                    <div>';
			echo LR\Filters::escapeHtmlText($totalkonten) /* line 60 */;
			echo '</div>
                                    <button type="button" class="btn-small">Lihat</button>
                                </div>
                            </div>
';
		}
		echo '                    </div>
                    <div class="card-form hideForm" id="formHide">
                            <div class="form-grup">
                                <label for="nama">Nama</label>
                                <input class="form-control" id="nama" name="nama" placeholder="Nama anda" value="';
		echo LR\Filters::escapeHtmlAttr($nama_sesi) /* line 69 */;
		echo '">
                            </div>
                            <div class="form-grup">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" data-tipe="email" placeholder="contoh: email@email.com" value="';
		echo LR\Filters::escapeHtmlAttr($email_sesi) /* line 73 */;
		echo '">
                            </div>
                            <div class="form-grup">
                                <label for="password">Password</label>
                                <input type="password" class="form-control" id="password" name="password" data-tipe="password" placeholder="Password baru">
                                <small>Kosongkan jika tidak ingin mengganti password</small>
                            </div>
                            <div class="form-grup">
                                <label for="photo">Photo</label>
                                <input type="file" class="form-control" id="photo" name="photo">
                                <small>Abaikan jika tidak ingin mengganti photo</small>
                            </div>
                            <div class="form-button">
                                <input type="hidden" id="__method" name="__method" value="PATCH">
                                <input type="hidden" id="id" name="id" value="';
		echo LR\Filters::escapeHtmlAttr($id_sesi) /* line 87 */;
		echo '">
                                <button class="btn btn-primary"><span id="btnSubmit">Simpan Perubahan</span></button>
                            </div>
                        
                    </div>
                    <div class="card-footer flex-start">
                        <button type="button" id="showHideButton">
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10"></path>
                            </svg>
                        </button>
                    </div>
                </div>
            </div>


';
		if ($namagrup == 'Penulis') /* line 103 */ {
			echo '                <div class="col-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="display-7">Saldo Kamu,</div>
                            <div class="flex-between my-10">
                                <span class="display-7">Rp.</span>
                                <span class="display-6">';
			echo LR\Filters::escapeHtmlText($saldo) /* line 110 */;
			echo '</span>
                            </div>
                        </div>
                        <div class="card-footer flex-between">
                            <div><a href="">Riwayat Transaksi</a></div>
                            <button class="block-button" type="button">
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                                    <path d="M11.47 1.72a.75.75 0 0 1 1.06 0l3 3a.75.75 0 0 1-1.06 1.06l-1.72-1.72V7.5h-1.5V4.06L9.53 5.78a.75.75 0 0 1-1.06-1.06l3-3ZM11.25 7.5V15a.75.75 0 0 0 1.5 0V7.5h3.75a3 3 0 0 1 3 3v9a3 3 0 0 1-3 3h-9a3 3 0 0 1-3-3v-9a3 3 0 0 1 3-3h3.75Z"></path>
                                </svg>
                                <span>Tarik Saldo</span>
                            </button>
                        </div>
                    </div>
                </div>   
';
		}
		echo '
        </div>
    </div>
</form>
';
	}


	/** {block js} on line 131 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
if(showHideButton){
    showHideButton.addEventListener("click", ()=>{
        let formHide = el("#formHide");
        let showHideButton = el("#showHideButton");
        if(formHide){
            if(formHide.classList.contains("showForm")) {
                formHide.classList.remove("showForm");
                showHideButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="m16.862 4.487 1.687-1.688a1.875 1.875 0 1 1 2.652 2.652L10.582 16.07a4.5 4.5 0 0 1-1.897 1.13L6 18l.8-2.685a4.5 4.5 0 0 1 1.13-1.897l8.932-8.931Zm0 0L19.5 7.125M18 14v4.75A2.25 2.25 0 0 1 15.75 21H5.25A2.25 2.25 0 0 1 3 18.75V8.25A2.25 2.25 0 0 1 5.25 6H10" />
                </svg>`;
                showHideButton.classList.remove("active");
            }else{
                formHide.classList.add("showForm");
                showHideButton.innerHTML = `<svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6 18 18 6M6 6l12 12" />
                    </svg>
                `;
                showHideButton.classList.add("active");
            }
        }
    });
}

let formInput = el("#formInput");
formInput.addEventListener("submit", (e)=>{
    e.preventDefault();
    let nama = document.forms["formInput"]["nama"];
    let email = document.forms["formInput"]["email"];
    let grupid = document.forms["formInput"]["grupid"];
    let password = document.forms["formInput"]["password"];
    let photo = document.forms["formInput"]["photo"];
    let btnSubmit = el("#btnSubmit");


    let val = validasi({
        formID: "formInput",
        validate: [
            \'nama|setText\',
            \'email|setEmail\'
        ]
    });

    if(val){

        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector(\'form[id="formInput"]\');
        const formData = new FormData(form);
        fetch(Baseurl + \'api/users\', {
            method: \'POST\',
            headers: HEADERFORM,
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan Perubahan";
            if(pesan.split("/").length > 2){
                password.value = "";
                photo.value = "";
                el("#namauser1").innerHTML = nama.value;
                el("#namauser2").innerHTML = nama.value;
                el("#emailuser1").innerHTML = email.value;
                el("#emailuser2").innerHTML = email.value;
                let imgphotouser = document.querySelectorAll("img[data-img=\'photouser\']");
                if(imgphotouser){
                    for(let i=0; i<imgphotouser.length; i++){
                        imgphotouser[i].src = Baseurl+pesan;
                    }
                }
                Toast({
                    tipe: \'success\',
                    message: \'User diperbarui\'
                });
            }else if(pesan == "Berhasil"){
                password.value = "";
                photo.value = "";
                el("#namauser1").innerHTML = nama.value;
                el("#namauser2").innerHTML = nama.value;
                el("#emailuser1").innerHTML = email.value;
                el("#emailuser2").innerHTML = email.value;
                Toast({
                    tipe: \'success\',
                    message: \'User diperbarui\'
                });
            }else{
                Toast({
                    tipe: \'error\',
                    message: pesan
                });
            }
        }).catch(error => {
            btnSubmit.innerHTML = "Simpan Perubahan";
            Toast({
                tipe: \'error\',
                message: error
            });
        });

    }

});

let btnVerifikasi = el("#btnVerifikasi");
if(btnVerifikasi){
    btnVerifikasi.addEventListener("click", (e)=>{
        e.preventDefault();
        Toast({
            tipe: \'warning\',
            message: \'Mengirim email verifikasi\'
        });
        fetch(Baseurl + "api/email/request/kode", {
            method: \'GET\',
            headers: HEADER,
        }).then(response => response.json()).then(result => {
            if(result.message == "OK"){
                Toast({
                    tipe: \'success\',
                    message: \'Email verifikasi sudah dikirim\'
                });
            }else{
                Toast({
                    tipe: \'error\',
                    message: \'Permintaan verifikasi error\'
                });
            }
        }).catch(error => {
            console.log(error);
        });
    });
}

</script>
';
	}
}

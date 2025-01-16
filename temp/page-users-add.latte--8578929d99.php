<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/users/add.latte */
final class Template_8578929d99 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/users/add.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 63 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['g' => '45'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
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

		echo '<form id="formInput" name="formInput" method="post">
    <div class="page">
        <div class="page-header">
            <div class="page-info">
                <div class="display-6">';
		echo LR\Filters::escapeHtmlText($title) /* line 8 */;
		echo '</div>
                <div class="breadcrumb">
                    <ul>
                        <li>
                            <a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 12 */;
		echo '\'>
                                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                                </svg>
                            </a>
                        </li>
                        <li><a href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 18 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 18 */;
		echo '/users">Users</a></li>
                        <li>Form User</li>
                    </ul>
                </div>
            </div>
            <div class="page-option"></div>
        </div>
        <div class="row">

            <div class="col-6">
                <div class="card">
                    <div class="card-header">
                        <div>Form Users</div>
                    </div>
                    <div class="card-form">
                            <div class="form-grup">
                                <label for="nama">Nama</label>
                                <input class="form-control" id="nama" name="nama" placeholder="Masukan nama user" autocomplete="off" autofocus>
                            </div>
                            <div class="form-grup">
                                <label for="email">Email</label>
                                <input class="form-control" id="email" name="email" placeholder="Contoh: email@email.com">
                            </div>
                            <div class="form-grup">
                                <label for="grup">Grup</label>
                                <select class="form-control" id="grupid" name="grupid">
                                    <option value="">Pilih Grup</option>
';
		foreach ($grup as $g) /* line 45 */ {
			echo '                                        <option value="';
			echo LR\Filters::escapeHtmlAttr($g->id) /* line 46 */;
			echo '">';
			echo LR\Filters::escapeHtmlText($g->nama) /* line 46 */;
			echo '</option>
';

		}

		echo '                                </select>
                            </div>
                            <div class="form-button">
                                <button class="btn btn-primary"><span id="btnSubmit">Simpan</span></button>
                            </div>
                        
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
';
	}


	/** {block js} on line 63 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
let formInput = el("#formInput");
formInput.addEventListener("submit", (e)=>{
    e.preventDefault();
    let nama = document.forms["formInput"]["nama"];
    let email = document.forms["formInput"]["email"];
    let grupid = document.forms["formInput"]["grupid"];
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
    }else if(setPilihan(grupid.value)){
        Toast({
            tipe: \'error\',
            message: \'Grup \'+setPilihan(grupid.value)
        });
        grupid.focus();
    }else{
        btnSubmit.innerHTML = "Menyimpan..";
        const form = document.querySelector(\'form[id="formInput"]\');
        const formData = new FormData(form);
        fetch(Baseurl + \'api/users\', {
            method: \'POST\',
            headers: HEADERFORM,
            body: formData
        }).then(response => response.text()).then(pesan => {
            btnSubmit.innerHTML = "Simpan";
            if(pesan == "Berhasil"){
                nama.value = "";
                email.value = "";
                grupid.value = "";
                nama.focus();
                Toast({
                    tipe: \'success\',
                    message: \'User baru sudah dibuat\'
                });
            }else{
                Toast({
                    tipe: \'error\',
                    message: pesan
                });
            }
        }).catch(error => {
            btnSubmit.innerHTML = "Simpan";
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

<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/users/seting.latte */
final class Template_0c95659381 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/users/seting.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 56 */;
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['s' => '32'], $this->params) as $ʟ_v => $ʟ_l) {
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

		echo '<div class="page">
    <div class="page-header">
        <div class="page-info">
            <div class="display-6">';
		echo LR\Filters::escapeHtmlText($title) /* line 7 */;
		echo '</div>
            <div class="breadcrumb">
                <ul>
                    <li>
                        <a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo '\'>
                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 12 8.954-8.955c.44-.439 1.152-.439 1.591 0L21.75 12M4.5 9.75v10.125c0 .621.504 1.125 1.125 1.125H9.75v-4.875c0-.621.504-1.125 1.125-1.125h2.25c.621 0 1.125.504 1.125 1.125V21h4.125c.621 0 1.125-.504 1.125-1.125V9.75M8.25 21h8.25"></path>
                            </svg>
                        </a>
                    </li>
                    <li><a href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 17 */;
		echo 'users\'>Users</a></li>
                    <li>Seting</li>
                </ul>
            </div>
        </div>
        <div class="page-option"></div>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div>Seting</div>
                </div>
                <div class="card-body">
';
		foreach ($seting as $s) /* line 32 */ {
			echo '                    <div class="list-seting">
                        <div class="flex-between item">
                            <div class="flex-between">
                                <div class="icon">';
			echo $s->icon /* line 35 */;
			echo '</div>
                                <div class="label">
                                    <div class="display-7">';
			echo LR\Filters::escapeHtmlText($s->nama) /* line 37 */;
			echo '</div>
                                    <div>';
			echo LR\Filters::escapeHtmlText($s->keterangan) /* line 38 */;
			echo '</div>
                                </div>
                            </div>
                            <div class="onoff">
                                <button>
                                    <span class=\'';
			if ($s->status == 'on') /* line 43 */ {
				echo 'active';
			}
			echo '\' data-id="';
			echo LR\Filters::escapeHtmlAttr($s->id) /* line 43 */;
			echo '" data-label="';
			echo LR\Filters::escapeHtmlAttr($s->nama) /* line 43 */;
			echo '"></span>
                                </button>
                            </div>
                        </div>       
                    </div>             
';

		}

		echo '                </div>
            </div>
        </div>

    </div>
</div>
';
	}


	/** {block js} on line 56 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>
let btnonof = document.querySelectorAll(".onoff");
if(btnonof){
    for(let i =0; i<btnonof.length; i++){
        btnonof[i].children[0].addEventListener("click", ()=>{
            let span = btnonof[i].children[0].children[0];
            let spanID = span.dataset.id;
            let spanLabel = span.dataset.label;
            let dataonof = "on";
            if(span.classList.contains("active")){
                dataonof = "off";
            }
            fetch(Baseurl + "api/seting/swicthseting/"+spanID+"/"+dataonof, {
                method: \'GET\',
                headers: HEADER,
            }).then(response => response.json()).then(result => {
                if(result.message == "OK"){
                    if(span.classList.contains("active")){
                        span.classList.remove("active");
                    }else{
                        span.classList.add("active");
                    }
                    Toast({
                        tipe: \'success\',
                        message: \'Setingan \'+spanLabel+\' telah diperbarui\'
                    });
                }else{
                    Toast({
                        tipe: \'error\',
                        message: \'Gagal memperbarui setingan\'
                    });
                }
            }).catch(error => {
                console.log(error);
            });
        });
    }
}
</script>
';
	}
}

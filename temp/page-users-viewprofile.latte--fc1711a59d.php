<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/users/viewprofile.latte */
final class Template_fc1711a59d extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/users/viewprofile.latte';

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
		$this->renderBlock('js', get_defined_vars()) /* line 79 */;
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
                                <div class="title">';
		echo LR\Filters::escapeHtmlText($nama) /* line 36 */;
		echo '</div>
                                <div>';
		echo LR\Filters::escapeHtmlText($namagrup) /* line 37 */;
		echo '</div>
                            </div>
                            <div class="cover"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 39 */;
		echo LR\Filters::escapeHtmlAttr($photo) /* line 39 */;
		echo '" data-img="photouser"></div>
                        </div>
                        <div class="flex-between box">
                            <div>Email</div>
                            <div class="flex-between">
                                <div>';
		echo LR\Filters::escapeHtmlText($email) /* line 44 */;
		echo '</div>
                                <button type="button" onClick=\'window.location.href=this.dataset.link\' data-link=\'mailto:';
		echo LR\Filters::escapeHtmlAttr($email) /* line 45 */;
		echo '\' class="btn-icon-round-small"><i class="las la-envelope"></i></button>
                            </div>
                        </div>
';
		if ($totalkonten != 0) /* line 48 */ {
			echo '                            <div class="flex-between box">
                                <div>Total Konten</div>
                                <div class="flex-between">
                                    <div>';
			echo LR\Filters::escapeHtmlText($totalkonten) /* line 52 */;
			echo '</div>
                                    <button type="button" class="btn-small">Lihat</button>
                                </div>
                            </div>
';
		}
		echo '                        <div class="flex-between box">
                            <div>Login Terakhir</div>
                            <div>';
		echo LR\Filters::escapeHtmlText($loginterakhir) /* line 59 */;
		echo '</div>
                        </div>
                        <div class="flex-between box">
                            <div>Perangkat</div>
                            <div>';
		echo LR\Filters::escapeHtmlText($device) /* line 63 */;
		echo '</div>
                        </div>
                    </div>
                    <div class="card-footer flex-start">
                        <button type="button">
                            <i class="las la-trash"></i>
                        </button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</form>
';
	}


	/** {block js} on line 79 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>

</script>
';
	}
}

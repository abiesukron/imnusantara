<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\vendor\abiesoft\Http/../../../templates/page/home/editor.latte */
final class Template_2cb4f2afad extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\vendor\\abiesoft\\Http/../../../templates/page/home/editor.latte';

	public const Blocks = [
		['title' => 'blockTitle', 'content' => 'blockContent', 'popup' => 'blockPopup', 'js' => 'blockJs'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('title', get_defined_vars()) /* line 2 */;
		echo "\n";
		$this->renderBlock('content', get_defined_vars()) /* line 3 */;
		$this->renderBlock('popup', get_defined_vars()) /* line 55 */;
		$this->renderBlock('js', get_defined_vars()) /* line 58 */;
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
                    <li>Dashboard</li>
                </ul>
            </div>
        </div>
        <div class="page-option">
            <form>
                <div class="form-grup">
                    <select class="form-control">
                        <option>Januari</option>
                        <option>Februari</option>
                        <option>Maret</option>
                        <option>April</option>
                    </select>
                </div>
                <div class="btn-grup">
                    <button><i class="las la-check"></i><span>Set</span></button>
                </div>
            </form>
        </div>
    </div>
    <div class="row">

        <div class="col-12">
            <div class="card">
                <div class="card-body">
                    <div class="center label">Total Berita</div>
                    <div class="center display-5" id=\'totalberita\'>
                        <div class="loader" style="width: 35px; height: 35px;"></div>
                    </div>
                </div>
            </div>
        </div>

        

    </div>
</div>
';
	}


	/** {block popup} on line 55 */
	public function blockPopup(array $ʟ_args): void
	{
		echo '<div class="popup none"></div>
';
	}


	/** {block js} on line 58 */
	public function blockJs(array $ʟ_args): void
	{
		echo '<script>

 fetch(Baseurl + "api/home", {
    method: \'GET\',
    headers: HEADER,
}).then(response => response.json()).then(result => {
    let totalberita = el("#totalberita");
    let beritapopuler = el("#populer");
    let totalpengunjung = el("#totalpengunjung");
    let totalkunjungan = el("#totalkunjungan");
    let statistikbulanan = el("#statistikbulanan");
    let totalkategori = el("#totalkategori");
    let barKategori = el("#barKategori");
    totalberita.innerHTML = result.data.totalberita;
    beritapopuler.innerHTML = result.data.beritapopuler;
    totalpengunjung.innerHTML = result.data.totalpengunjung;
    totalkunjungan.innerHTML = result.data.totalkunjungan;
    statistikbulanan.innerHTML = result.data.statistikbulanan;
    totalkategori.innerHTML = result.data.totalkategori;
    barKategori.innerHTML = result.data.kategori;
}).catch(error => {
    console.log(error);
}); 

</script>
';
	}
}

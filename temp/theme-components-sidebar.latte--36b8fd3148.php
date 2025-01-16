<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\tagline\templates\theme\components\sidebar.latte */
final class Template_36b8fd3148 extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\tagline\\templates\\theme\\components\\sidebar.latte';

	public const Blocks = [
		['sidebar' => 'blockSidebar'],
	];


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		$this->renderBlock('sidebar', get_defined_vars()) /* line 1 */;
	}


	/** {block sidebar} on line 1 */
	public function blockSidebar(array $ʟ_args): void
	{
		extract($this->params);
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<sidebar>
    <div class="brand">
        <div class="logo"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 4 */;
		echo 'assets/images/logo_tagline_putih.png"></div>
        <div class="label">
            <div>Tagline</div>
        </div>
    </div>
    <div class="profile-info">
        <div class="info">
            <div class="cover"><img src="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 11 */;
		echo LR\Filters::escapeHtmlAttr($photo_sesi) /* line 11 */;
		echo '" data-img="photouser"></div>
            <div class="nama" id="namauser1">';
		echo LR\Filters::escapeHtmlText($nama_sesi) /* line 12 */;
		echo '</div>
            <div class="email" id="emailuser1">';
		echo LR\Filters::escapeHtmlText($email_sesi) /* line 13 */;
		echo '</div>
        </div>
    </div>
    <div class="menu">
        <ul>
            <li>
                <a data-toggle="menu" href=\'';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 22 */;
		echo '\'>
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path d="M15.75 8.25a.75.75 0 0 1 .75.75c0 1.12-.492 2.126-1.27 2.812a.75.75 0 1 1-.992-1.124A2.243 2.243 0 0 0 15 9a.75.75 0 0 1 .75-.75Z"></path>
                        <path fill-rule="evenodd" d="M12 2.25c-5.385 0-9.75 4.365-9.75 9.75s4.365 9.75 9.75 9.75 9.75-4.365 9.75-9.75S17.385 2.25 12 2.25ZM4.575 15.6a8.25 8.25 0 0 0 9.348 4.425 1.966 1.966 0 0 0-1.84-1.275.983.983 0 0 1-.97-.822l-.073-.437c-.094-.565.25-1.11.8-1.267l.99-.282c.427-.123.783-.418.982-.816l.036-.073a1.453 1.453 0 0 1 2.328-.377L16.5 15h.628a2.25 2.25 0 0 1 1.983 1.186 8.25 8.25 0 0 0-6.345-12.4c.044.262.18.503.389.676l1.068.89c.442.369.535 1.01.216 1.49l-.51.766a2.25 2.25 0 0 1-1.161.886l-.143.048a1.107 1.107 0 0 0-.57 1.664c.369.555.169 1.307-.427 1.605L9 13.125l.423 1.059a.956.956 0 0 1-1.652.928l-.679-.906a1.125 1.125 0 0 0-1.906.172L4.575 15.6Z" clip-rule="evenodd"></path>
                    </svg>

                    <span>Lihat Website</span>
                </a>    
            </li>
            <li>
                <a data-toggle="menu" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 32 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 32 */;
		echo '">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M2.25 2.25a.75.75 0 0 0 0 1.5H3v10.5a3 3 0 0 0 3 3h1.21l-1.172 3.513a.75.75 0 0 0 1.424.474l.329-.987h8.418l.33.987a.75.75 0 0 0 1.422-.474l-1.17-3.513H18a3 3 0 0 0 3-3V3.75h.75a.75.75 0 0 0 0-1.5H2.25Zm6.54 15h6.42l.5 1.5H8.29l.5-1.5Zm8.085-8.995a.75.75 0 1 0-.75-1.299 12.81 12.81 0 0 0-3.558 3.05L11.03 8.47a.75.75 0 0 0-1.06 0l-3 3a.75.75 0 1 0 1.06 1.06l2.47-2.47 1.617 1.618a.75.75 0 0 0 1.146-.102 11.312 11.312 0 0 1 3.612-3.321Z" clip-rule="evenodd"></path>
                    </svg>
                    <span>Dashboard</span>
                </a>
            </li>
            
            <!-- Admin, Editor, Pimpinan Redaksi
';
		if ($grupid_sesi == 1 || $grupid_sesi == 3 || $grupid_sesi == 6) /* line 41 */ {
			echo '            <li><a href="';
			echo LR\Filters::escapeHtmlComment($url) /* line 42 */;
			echo LR\Filters::escapeHtmlComment(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 42 */;
			echo '/users/read/@';
			echo LR\Filters::escapeHtmlComment(explode('@', $email_sesi)[0]) /* line 42 */;
			echo '/tugas"><i class="las la-list-alt"></i><span>Tugas</span></a></li>
            ';
		}
		echo ' -->

            <li><label>Menu</label></li>
            <li>
                <a data-toggle="menu" href="';
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 47 */;
		echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 47 */;
		echo '/berita">
                <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M12 7.5h1.5m-1.5 3h1.5m-7.5 3h7.5m-7.5 3h7.5m3-9h3.375c.621 0 1.125.504 1.125 1.125V18a2.25 2.25 0 0 1-2.25 2.25M16.5 7.5V18a2.25 2.25 0 0 0 2.25 2.25M16.5 7.5V4.875c0-.621-.504-1.125-1.125-1.125H4.125C3.504 3.75 3 4.254 3 4.875V18a2.25 2.25 0 0 0 2.25 2.25h13.5M6 7.5h3v3H6v-3Z"></path>
                </svg>
                <span>Berita</span>
                </a>
            </li>

';
		if ($grupid_sesi == 1) /* line 55 */ {
			echo '                <li><label>Seting</label></li>
                <li>
                    <a data-toggle="menu" href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 58 */;
			echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 58 */;
			echo '/users">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M7.5 6a4.5 4.5 0 1 1 9 0 4.5 4.5 0 0 1-9 0ZM3.751 20.105a8.25 8.25 0 0 1 16.498 0 .75.75 0 0 1-.437.695A18.683 18.683 0 0 1 12 22.5c-2.786 0-5.433-.608-7.812-1.7a.75.75 0 0 1-.437-.695Z" clip-rule="evenodd"></path>
                        </svg>
                        <span>Users</span>
                    </a>
                </li>
                <li>
                    <a data-toggle="menu" href="';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 66 */;
			echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 66 */;
			echo '/grup">
                        <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                            <path fill-rule="evenodd" d="M8.25 6.75a3.75 3.75 0 1 1 7.5 0 3.75 3.75 0 0 1-7.5 0ZM15.75 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM2.25 9.75a3 3 0 1 1 6 0 3 3 0 0 1-6 0ZM6.31 15.117A6.745 6.745 0 0 1 12 12a6.745 6.745 0 0 1 6.709 7.498.75.75 0 0 1-.372.568A12.696 12.696 0 0 1 12 21.75c-2.305 0-4.47-.612-6.337-1.684a.75.75 0 0 1-.372-.568 6.787 6.787 0 0 1 1.019-4.38Z" clip-rule="evenodd"></path>
                            <path d="M5.082 14.254a8.287 8.287 0 0 0-1.308 5.135 9.687 9.687 0 0 1-1.764-.44l-.115-.04a.563.563 0 0 1-.373-.487l-.01-.121a3.75 3.75 0 0 1 3.57-4.047ZM20.226 19.389a8.287 8.287 0 0 0-1.308-5.135 3.75 3.75 0 0 1 3.57 4.047l-.01.121a.563.563 0 0 1-.373.486l-.115.04c-.567.2-1.156.349-1.764.441Z"></path>
                        </svg>
                        <span>Grup</span>
                    </a>
                </li>    
';
		}
		echo '        </ul>
    </div>
    <div class="footer">
        <div class="tanggal">';
		echo LR\Filters::escapeHtmlText(\AbieSoft\AsetCode\Utilities\Tanggal::simpel()) /* line 78 */;
		echo '</div>
        <div class="btn-grup-icon">
';
		if ($namagrup_sesi == 'Administrator') /* line 80 */ {
			echo '                <button data-toggle="menu" onClick=\'window.location.href=this.dataset.link\' data-link="';
			echo LR\Filters::escapeHtmlAttr($url) /* line 81 */;
			echo LR\Filters::escapeHtmlAttr(\AbieSoft\AsetCode\Utilities\Config::envReader('ADMIN_PREFIX')) /* line 81 */;
			echo '/users/read/@';
			echo LR\Filters::escapeHtmlAttr(explode('@', $email_sesi)[0]) /* line 81 */;
			echo '/seting">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M11.078 2.25c-.917 0-1.699.663-1.85 1.567L9.05 4.889c-.02.12-.115.26-.297.348a7.493 7.493 0 0 0-.986.57c-.166.115-.334.126-.45.083L6.3 5.508a1.875 1.875 0 0 0-2.282.819l-.922 1.597a1.875 1.875 0 0 0 .432 2.385l.84.692c.095.078.17.229.154.43a7.598 7.598 0 0 0 0 1.139c.015.2-.059.352-.153.43l-.841.692a1.875 1.875 0 0 0-.432 2.385l.922 1.597a1.875 1.875 0 0 0 2.282.818l1.019-.382c.115-.043.283-.031.45.082.312.214.641.405.985.57.182.088.277.228.297.35l.178 1.071c.151.904.933 1.567 1.85 1.567h1.844c.916 0 1.699-.663 1.85-1.567l.178-1.072c.02-.12.114-.26.297-.349.344-.165.673-.356.985-.57.167-.114.335-.125.45-.082l1.02.382a1.875 1.875 0 0 0 2.28-.819l.923-1.597a1.875 1.875 0 0 0-.432-2.385l-.84-.692c-.095-.078-.17-.229-.154-.43a7.614 7.614 0 0 0 0-1.139c-.016-.2.059-.352.153-.43l.84-.692c.708-.582.891-1.59.433-2.385l-.922-1.597a1.875 1.875 0 0 0-2.282-.818l-1.02.382c-.114.043-.282.031-.449-.083a7.49 7.49 0 0 0-.985-.57c-.183-.087-.277-.227-.297-.348l-.179-1.072a1.875 1.875 0 0 0-1.85-1.567h-1.843ZM12 15.75a3.75 3.75 0 1 0 0-7.5 3.75 3.75 0 0 0 0 7.5Z" clip-rule="evenodd"></path>
                    </svg>
                </button>
';
		}
		echo '            <form data-toggle="menu" method="POST" id="formLogout" name="formLogout" data-nama="';
		echo LR\Filters::escapeHtmlAttr($nama_sesi) /* line 87 */;
		echo '">
                <input type="hidden" id="__method" name="__method" value="LOGOUT">
                <button href="javascript:void(0)">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                        <path fill-rule="evenodd" d="M12 2.25a.75.75 0 0 1 .75.75v9a.75.75 0 0 1-1.5 0V3a.75.75 0 0 1 .75-.75ZM6.166 5.106a.75.75 0 0 1 0 1.06 8.25 8.25 0 1 0 11.668 0 .75.75 0 1 1 1.06-1.06c3.808 3.807 3.808 9.98 0 13.788-3.807 3.808-9.98 3.808-13.788 0-3.808-3.807-3.808-9.98 0-13.788a.75.75 0 0 1 1.06 0Z" clip-rule="evenodd"></path>
                    </svg>
                </button>
            </form>
        </div>
    </div>
</sidebar>
';
	}
}

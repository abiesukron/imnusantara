<?php

use Latte\Runtime as LR;

/** source: D:\Sukron\Project\php\imnusantara\templates\website\home\section\block1.latte */
final class Template_96e814ea7a extends Latte\Runtime\Template
{
	public const Source = 'D:\\Sukron\\Project\\php\\imnusantara\\templates\\website\\home\\section\\block1.latte';


	public function main(array $ʟ_args): void
	{
		extract($ʟ_args);
		unset($ʟ_args);

		echo '<section>
    <div class="container">
        <div class="row">
            <div class="col-8">
                <div class="card">
                    <div class="cover-home owl-carousel owl-theme" style=\'height: 580px;\'>

';
		foreach ($beritautama as $bu) /* line 9 */ {
			echo '                            <a href=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 10 */;
			echo 'berita/baca/';
			echo LR\Filters::escapeHtmlAttr(explode(' ', str_replace('-', '/', $bu->dibuat))[0]) /* line 10 */;
			echo '/';
			echo LR\Filters::escapeHtmlAttr($bu->slug) /* line 10 */;
			echo '\' class=\'item i\'> 
                                <div class=\'cover\'>
                                    <img src=\'';
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($url)) /* line 12 */;
			echo LR\Filters::escapeHtmlAttr($bu->cover) /* line 12 */;
			echo '\'>
                                </div>
                                <div class=\'title\'>
                                    <h4>';
			echo LR\Filters::escapeHtmlText($bu->judul) /* line 15 */;
			echo '</h4>
                                </div>
                            </a>
';

		}

		echo '                    </div> 
                </div>
            </div>
            <div class="col-4">
                <div class="card">
                    <div class="card-badge">
                        <label class="badge-label">Terbaru</label>
                    </div>
                    <div class="card-list" id="terbaru">

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>

                        <a class="item-list">
                            <div class="cover-list">
                                <div class="shimmer" style="width: 100%; height: 100%; background: #eee;"></div>
                            </div>
                            <div class="info-list">
                                <div class="judul">
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee;"></div>
                                    <div class="shimmer" style="width: 100%; height: 17px; background: #eee; margin-top: 2px"></div>
                                    <div class="shimmer" style="width:58%; height: 17px; background: #eee; margin-top: 2px"></div>
                                </div>
                                <div class="time"><div class="shimmer" style="width:28%; height: 13px; background: #eee; margin-top: 2px"></div></div>
                            </div>
                        </a>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>';
	}


	public function prepare(): array
	{
		extract($this->params);

		if (!$this->getReferringTemplate() || $this->getReferenceType() === 'extends') {
			foreach (array_intersect_key(['bu' => '9'], $this->params) as $ʟ_v => $ʟ_l) {
				trigger_error("Variable \$$ʟ_v overwritten in foreach on line $ʟ_l");
			}
		}
		return get_defined_vars();
	}
}

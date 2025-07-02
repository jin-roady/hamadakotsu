</div>

<footer class="footer" role="contentinfo">
<div class="outer-footer">
	<div class="inner-footer">
		<div id="menu">
			<div class="footer_menu">
				<?php
					$i = 0;
					foreach($Pages as $pn => $pg){
						if($pg["menu"]){
							$i++;
							$link = $pg["url"];
							if(!$link){
								$link = link_to($pn);
							}
				?>
							<a href="<?= $link ?>"><img src="<?= get_stylesheet_directory_uri() ?>/images/fm_0<?= $i ?>.jpg" alt="<?= $pg["menu"] ?>" /></a>
				<?php
						}
					}
				?>
			</div>
		</div>
		<div id="f_logo">
			<img src="<?= get_stylesheet_directory_uri() ?>/images/f_logo.png">
		</div>
		<div class="flex">
			<div class="footer-info flex">
				<div>
					<p>浜田本社<br>
						〒697-0005<br>
						島根県浜田市上府町イ306-2<br>
						TEL：0855-24-8381<br>
						FAX：0855-24-8382
					</p>
				</div>
				<div>
					<p>益田営業所<br>
						〒699-3676<br>
						島根県益田市遠田町2358<br>
						TEL：0856-27-0339<br>
						FAX：0856-27-1214
					</p>
				</div>
				<div>
					<p>大田営業所<br>
						〒699-2301<br>
						島根県大田市仁摩町仁万1523-3<br>
						TEL：0854-88-3030<br>
						FAX：0854-88-3033
					</p>
				</div>
			</div>
			<div>
				<iframe src="https://www.facebook.com/plugins/page.php?href=https%3A%2F%2Fwww.facebook.com%2F%25E6%259C%2589%25E6%25B5%259C%25E7%2594%25B0%25E4%25BA%25A4%25E9%2580%259A-535176463484384&tabs=timeline&width=340&height=70&small_header=false&adapt_container_width=true&hide_cover=false&show_facepile=true&appId" width="340" height="70" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
			</div>
		</div>
	</div>
</div>

<div id="copyright"><?= $copyright ?></div>
</footer>

<a href="#" class="topBtn" id="topBtn" style="display: none;">TOP</a>

<?php wp_footer(); ?>
</body>

</html>

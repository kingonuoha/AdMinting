  // Setting JS - Start
  // --------------------------------------------------

	function bd_settings_append($x) {
		var settings = $('body');
		let dark;
		$x == true ? dark = 'd-block' : dark = 'd-none';
		var settings_html = `<div class="bd-theme-settings-area d-none">
		<div class="bd-theme-wrapper">
		   <div class="bd-theme-header text-center">
			  <h4 class="bd-theme-header-title">Template Settings</h4>
		   </div>

		   <!-- THEME TOGGLER -->
		   <div class="bd-theme-toggle mb-20 d-none ${dark}">
			  <label class="bd-theme-toggle-main" for="bd-theme-toggler">
				 <span class="bd-theme-toggle-dark"><i class="fa-light fa-moon"></i> Dark</span>
					<input type="checkbox" id="bd-theme-toggler">
					<i class="bd-theme-toggle-slide"></i>
				 <span class="bd-theme-toggle-light active"><i class="fa-light fa-sun-bright"></i> Light</span>
			  </label>
		   </div>

		   <!--  RTL SETTINGS -->
		   <div class="bd-theme-dir mb-20">
			  <label class="bd-theme-dir-main" for="bd-dir-toggler">
				 <span class="bd-theme-dir-rtl"> RTL</span>
					<input type="checkbox" id="bd-dir-toggler">
					<i class="bd-theme-dir-slide"></i>
				 <span class="bd-theme-dir-ltr active"> LTR</span>
			  </label>
		   </div>

		   <!-- COLOR SETTINGS -->
		   <div class="bd-theme-settings">
			  <div class="bd-theme-settings-wrapper">
				 <div class="bd-theme-settings-open">
					<button class="bd-theme-settings-open-btn">
					   <span class="bd-theme-settings-gear">
					   <i class="far fa-cog"></i>
					   </span>
					   <span class="bd-theme-settings-close">
						  <i class="fa-regular fa-xmark"></i>
					   </span>
					</button>
				 </div>
				 <div class="color-check-wrapper row-cols-4 gy-2 gx-2">
					<div class="">
					   <div class="bd-theme-color-item bd-color-active">
						  <button class="bd-theme-color-btn bd-color-settings-btn d-none" data-color-default="#FFC444" type="button" data-color="#FFC444"></button>
						  <button class="bd-theme-color-btn bd-color-settings-btn" type="button" data-color="#FFC444"></button>
					   </div>
					</div>
					<div class="">
					   <div class="bd-theme-color-item bd-color-active">
						  <button class="bd-theme-color-btn bd-color-settings-btn" type="button" data-color="#008080"></button>
					   </div>
					</div>
					<div class="">
					   <div class="bd-theme-color-item bd-color-active">
						  <button class="bd-theme-color-btn bd-color-settings-btn" type="button" data-color="#2CAE76"></button>
					   </div>
					</div>
					<div class="">
					   <div class="bd-theme-color-item bd-color-active">
						  <button class="bd-theme-color-btn bd-color-settings-btn" type="button" data-color="#F87A58"></button>
					   </div>
					</div>
				 </div>
			  </div>
			  <div class="bd-theme-color-input">
				 <h6>Choose Custom Color</h6>
				 <input type="color" id="bd-color-setings-input" value="#FFC444">
				 <label id="bd-theme-color-label" for="bd-color-setings-input"></label>
			  </div>
		   </div>
		</div>
	 </div>`;

		settings.append(settings_html);
	}
	bd_settings_append(true); // if want to enable dark light mode then send "true";

	// settings open btn
	$(".bd-theme-settings-open-btn").on("click", function () {
		$(".bd-theme-settings-area").toggleClass("settings-opened");
	});

	// rtl settings
	function bd_rtl_settings() {

		$('#bd-dir-toggler').on("change", function () {
			toggle_rtl();
			window.location.reload(true);

		});


		// set toggle theme scheme
		function bd_set_scheme(bd_dir) {
			localStorage.setItem('bd_dir', bd_dir);
			document.documentElement.setAttribute("dir", bd_dir);

			if (bd_dir === 'rtl') {
				var list = $("[href='assets/css/bootstrap.min.css']");
				$(list).attr("href", "assets/css/bootstrap.rtl.min.css");
			} else {
				var list = $("[href='assets/css/bootstrap.min.css']");
				$(list).attr("href", "assets/css/bootstrap.min.css");
			}
		}

		// toogle theme scheme
		function toggle_rtl() {
			if (localStorage.getItem('bd_dir') === 'rtl') {
				bd_set_scheme('ltr');
				var list = $("[href='assets/css/bootstrap.rtl.min.css']");
				$(list).attr("href", "assets/css/bootstrap.min.css");
			} else {
				bd_set_scheme('rtl');
				var list = $("[href='assets/css/bootstrap.min.css']");
				$(list).attr("href", "assets/css/bootstrap.rtl.min.css");
			}
		}

		// set the first theme scheme
		function bd_init_dir() {
			if (localStorage.getItem('bd_dir') === 'rtl') {
				bd_set_scheme('rtl');
				var list = $("[href='assets/css/bootstrap.min.css']");
				$(list).attr("href", "assets/css/bootstrap.rtl.min.css");
				document.getElementById('bd-dir-toggler').checked = true;
			} else {
				bd_set_scheme('ltr');
				document.getElementById('bd-dir-toggler').checked = false;
				var list = $("[href='assets/css/bootstrap.min.css']");
				$(list).attr("href", "assets/css/bootstrap.min.css");
			}
		}
		bd_init_dir();
	}
	if ($("#bd-dir-toggler").length > 0) {
		bd_rtl_settings();
	}

	// dark light mode toggler
	function bd_theme_toggler() {

		$('#bd-theme-toggler').on("change", function () {
			toggleTheme();

		});


		// set toggle theme scheme
		function bd_set_scheme(bd_theme) {
			localStorage.setItem('bd_theme_scheme', bd_theme);
			document.documentElement.setAttribute("bd-theme", bd_theme);
		}

		// toogle theme scheme
		function toggleTheme() {
			if (localStorage.getItem('bd_theme_scheme') === 'bd-theme-light') {
				bd_set_scheme('bd-theme-dark');
			} else {
				bd_set_scheme('bd-theme-light');
			}
		}

		// set the first theme scheme
		function bd_init_theme() {
			if (localStorage.getItem('bd_theme_scheme') === 'bd-theme-light') {
				bd_set_scheme('bd-theme-light');
				document.getElementById('bd-theme-toggler').checked = false;
			} else {
				bd_set_scheme('bd-theme-dark');
				document.getElementById('bd-theme-toggler').checked = true;
			}
		}
		bd_init_theme();
	}
	if ($("#bd-theme-toggler").length > 0) {
		bd_theme_toggler();
	}

	// color settings
	function bd_color_settings() {

		// set color scheme
		function bd_set_color(ep_color_scheme) {
			localStorage.setItem('ep_color_scheme', ep_color_scheme);
			document.querySelector(':root').style.setProperty('--clr-theme-1', ep_color_scheme);
			document.getElementById("bd-color-setings-input").value = ep_color_scheme;
			document.getElementById("bd-theme-color-label").style.backgroundColor = ep_color_scheme;
		}

		// set color
		function bd_set_input() {
			var color = localStorage.getItem('ep_color_scheme');
			document.getElementById("bd-color-setings-input").value = color;
			document.getElementById("bd-theme-color-label").style.backgroundColor = color;


		}
		bd_set_input();

		function bd_init_color() {
			var defaultColor = $(".bd-color-settings-btn").attr('data-color-default');
			var setColor = localStorage.getItem('ep_color_scheme');

			if (setColor != null) {

			} else {
				setColor = defaultColor;
			}

			if (defaultColor !== setColor) {
				document.querySelector(':root').style.setProperty('--clr-theme-1', setColor);
				document.getElementById("bd-color-setings-input").value = setColor;
				document.getElementById("bd-theme-color-label").style.backgroundColor = setColor;
				bd_set_color(setColor);
			} else {
				document.querySelector(':root').style.setProperty('--clr-theme-1', defaultColor);
				document.getElementById("bd-color-setings-input").value = defaultColor;
				document.getElementById("bd-theme-color-label").style.backgroundColor = defaultColor;
				bd_set_color(defaultColor);
			}
		}
		bd_init_color();


		let themeButtons = document.querySelectorAll('.bd-color-settings-btn');

		themeButtons.forEach(color => {
			color.addEventListener('click', () => {
				let datacolor = color.getAttribute('data-color');
				document.querySelector(':root').style.setProperty('--clr-theme-1', datacolor);
				document.getElementById("bd-theme-color-label").style.backgroundColor = datacolor;
				bd_set_color(datacolor);
			});
		});

		const colorInput = document.querySelector('#bd-color-setings-input');
		const colorVariable = '--clr-theme-1';


		colorInput.addEventListener('change', function (e) {
			var clr = e.target.value;
			document.documentElement.style.setProperty(colorVariable, clr);
			bd_set_color(clr);
			bd_set_check(clr);
		});


		function bd_set_check(clr) {
			const arr = Array.from(document.querySelectorAll('[data-color]'));

			var a = localStorage.getItem('ep_color_scheme');

			let test = arr.map(color => {
				let datacolor = color.getAttribute('data-color');

				return datacolor;
			}).filter(color => color == a);

			var arrLength = test.length;

			if (arrLength == 0) {
				$('.bd-color-active').removeClass('active');
			} else {
				$('.bd-color-active').addClass('active');
			}
		}

		function bd_check_color() {
			var a = localStorage.getItem('ep_color_scheme');

			var list = $(`[data-color="${a}"]`);

			list.parent().addClass('active').parent().siblings().find('.bd-color-active').removeClass('active')
		}
		bd_check_color();

		$('.bd-color-active').on('click', function () {
			$(this).addClass('active').parent().siblings().find('.bd-color-active').removeClass('active');
		});

	}
	if (($(".bd-color-settings-btn").length > 0) && ($("#bd-color-setings-input").length > 0) && ($("#bd-theme-color-label").length > 0)) {
		bd_color_settings();
	}

 // Setting JS - End
  // --------------------------------------------------

	
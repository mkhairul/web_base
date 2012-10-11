<!DOCTYPE html>

<!--[if IEMobile 7]><html class="no-js iem7 oldie linen"><![endif]-->
<!--[if (IE 7)&!(IEMobile)]><html class="no-js ie7 oldie linen" lang="en"><![endif]-->
<!--[if (IE 8)&!(IEMobile)]><html class="no-js ie8 oldie linen" lang="en"><![endif]-->
<!--[if (IE 9)&!(IEMobile)]><html class="no-js ie9 linen" lang="en"><![endif]-->
<!--[if (gt IE 9)|(gt IEMobile 7)]><!--><html class="no-js linen" lang="en"><!--<![endif]-->

<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title>Developr</title>
	<meta name="description" content="">
	<meta name="author" content="">

	<!-- http://davidbcalhoun.com/2010/viewport-metatag -->
	<meta name="HandheldFriendly" content="True">
	<meta name="MobileOptimized" content="320">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">

	<!-- For all browsers -->
	<link rel="stylesheet" href="<?php echo $path_css; ?>reset.css?v=1">
	<link rel="stylesheet" href="<?php echo $path_css; ?>style.css?v=1">
	<link rel="stylesheet" href="<?php echo $path_css; ?>colors.css?v=1">
	<link rel="stylesheet" media="print" href="<?php echo $path_css; ?>print.css?v=1">
	<!-- For progressively larger displays -->
	<link rel="stylesheet" media="only all and (min-width: 480px)" href="<?php echo $path_css; ?>480.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 768px)" href="<?php echo $path_css; ?>768.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 992px)" href="<?php echo $path_css; ?>992.css?v=1">
	<link rel="stylesheet" media="only all and (min-width: 1200px)" href="<?php echo $path_css; ?>1200.css?v=1">
	<!-- For Retina displays -->
	<link rel="stylesheet" media="only all and (-webkit-min-device-pixel-ratio: 1.5), only screen and (-o-min-device-pixel-ratio: 3/2), only screen and (min-device-pixel-ratio: 1.5)" href="<?php echo $path_css; ?>2x.css?v=1">

	<!-- Additional styles -->
	<link rel="stylesheet" href="<?php echo $path_css; ?>styles/form.css?v=1">
	<link rel="stylesheet" href="<?php echo $path_css; ?>styles/switches.css?v=1">

	<!-- Login pages styles -->
	<link rel="stylesheet" media="screen" href="<?php echo $path_css; ?>login.css?v=1">

	<!-- JavaScript at bottom except for Modernizr -->
	<script src="<?php echo $path_js; ?>libs/modernizr.custom.js"></script>

	<!-- For Modern Browsers -->
	<link rel="shortcut icon" href="<?php echo $path_images; ?>favicons/favicon.png">
	<!-- For everything else -->
	<link rel="shortcut icon" href="<?php echo $path_images; ?>favicons/favicon.ico">
	<!-- For retina screens -->
	<link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo $path_images; ?>favicons/apple-touch-icon-retina.png">
	<!-- For iPad 1-->
	<link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo $path_images; ?>favicons/apple-touch-icon-ipad.png">
	<!-- For iPhone 3G, iPod Touch and Android -->
	<link rel="apple-touch-icon-precomposed" href="<?php echo $path_images; ?>favicons/apple-touch-icon.png">

	<!-- iOS web-app metas -->
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">

	<!-- Startup image for web apps -->
	<link rel="apple-touch-startup-image" href="<?php echo $path_images; ?>splash/ipad-landscape.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:landscape)">
	<link rel="apple-touch-startup-image" href="<?php echo $path_images; ?>splash/ipad-portrait.png" media="screen and (min-device-width: 481px) and (max-device-width: 1024px) and (orientation:portrait)">
	<link rel="apple-touch-startup-image" href="<?php echo $path_images; ?>splash/iphone.png" media="screen and (max-device-width: 320px)">

	<!-- Microsoft clear type rendering -->
	<meta http-equiv="cleartype" content="on">

	<!-- IE9 Pinned Sites: http://msdn.microsoft.com/en-us/library/gg131029.aspx -->
	<meta name="application-name" content="Developr Admin Skin">
	<meta name="msapplication-tooltip" content="Cross-platform admin template.">
	<meta name="msapplication-starturl" content="http://www.display-inline.fr/demo/developr">
	<!-- These custom tasks are examples, you need to edit them to show actual pages -->
	<meta name="msapplication-task" content="name=Agenda;action-uri=http://www.display-inline.fr/demo/developr/agenda.html;icon-uri=http://www.display-inline.fr/demo/developr/<?php echo $path_images; ?>favicons/favicon.ico">
	<meta name="msapplication-task" content="name=My profile;action-uri=http://www.display-inline.fr/demo/developr/profile.html;icon-uri=http://www.display-inline.fr/demo/developr/<?php echo $path_images; ?>favicons/favicon.ico">
</head>

<body>

	<div id="container">

		<hgroup id="login-title" class="large-margin-bottom">
			<h1 class="login-title-image">Developr</h1>
			<h5>&copy; Your Company</h5>
		</hgroup>

		<form method="post" action="" id="form-login">
			<ul class="inputs black-input large">
				<!-- The autocomplete="off" attributes is the only way to prevent webkit browsers from filling the inputs with yellow -->
				<li><span class="icon-user mid-margin-right"></span><input type="text" name="login" id="login" value="" class="input-unstyled" placeholder="Login" autocomplete="off"></li>
				<li><span class="icon-lock mid-margin-right"></span><input type="password" name="pass" id="pass" value="" class="input-unstyled" placeholder="Password" autocomplete="off"></li>
			</ul>

			<button type="submit" class="button glossy full-width huge">Login</button>
		</form>

	</div>

	<!-- JavaScript at the bottom for fast page loading -->

	<!-- Scripts -->
	<script src="<?php echo $path_js; ?>libs/jquery-1.7.2.min.js"></script>
	<script src="<?php echo $path_js; ?>setup.js"></script>

	<!-- Template functions -->
	<script src="<?php echo $path_js; ?>developr.input.js"></script>
	<script src="<?php echo $path_js; ?>developr.message.js"></script>
	<script src="<?php echo $path_js; ?>developr.notify.js"></script>
	<script src="<?php echo $path_js; ?>developr.tooltip.js"></script>

	<script>

		/*
		 * How do I hook my login script to this?
		 * --------------------------------------
		 *
		 * This script is meant to be non-obtrusive: if the user has disabled javascript or if an error occurs, the login form
		 * works fine without ajax.
		 *
		 * The only part you need to edit is the login script between the EDIT SECTION tags, which does inputs validation
		 * and send data to server. For instance, you may keep the validation and add an AJAX call to the server with the
		 * credentials, then redirect to the dashboard or display an error depending on server return.
		 *
		 * Or if you don't trust AJAX calls, just remove the event.preventDefault() part and let the form be submitted.
		 */

		$(document).ready(function()
		{
			/*
			 * JS login effect
			 * This script will enable effects for the login page
			 */
				// Elements
			var doc = $('html').addClass('js-login'),
				container = $('#container'),
				formLogin = $('#form-login'),

				// If layout is centered
				centered;

			/******* EDIT THIS SECTION *******/

			/*
			 * AJAX login
			 * This function will handle the login process through AJAX
			 */
			formLogin.submit(function(event)
			{
				// Values
				var login = $.trim($('#login').val()),
					pass = $.trim($('#pass').val());

				// Check inputs
				if (login.length === 0)
				{
					// Display message
					displayError('Please fill in your login');
					return false;
				}
				else if (pass.length === 0)
				{
					// Remove empty login message if displayed
					formLogin.clearMessages('Please fill in your login');

					// Display message
					displayError('Please fill in your password');
					return false;
				}
				else
				{
					// Remove previous messages
					formLogin.clearMessages();

					// Show progress
					displayLoading('Checking credentials...');
					event.preventDefault();

					// Stop normal behavior
					event.preventDefault();

					/*
					 * This is where you may do your AJAX call, for instance:
					 * $.ajax(url, {
					 * 		data: {
					 * 			login:	login,
					 * 			pass:	pass
					 * 		},
					 * 		success: function(data)
					 * 		{
					 * 			if (data.logged)
					 * 			{
					 * 				document.location.href = 'index.html';
					 * 			}
					 * 			else
					 * 			{
					 * 				formLogin.clearMessages();
					 * 				displayError('Invalid user/password, please try again');
					 * 			}
					 * 		},
					 * 		error: function()
					 * 		{
					 * 			formLogin.clearMessages();
					 * 			displayError('Error while contacting server, please try again');
					 * 		}
					 * });
					 */

					// Simulate server-side check
					//setTimeout(function() {
					//	document.location.href = './'
					//}, 2000);
					
					$.ajax('<?php echo site_url('login/enter'); ?>', {
						dataType: 'json',
						type: 'POST',
						data: {
							username:	login,
							password:	pass
						},
						success: function(data)
						{
							if (data.status == 'success')
							{
								document.location.href = data.url;
							}
							else
							{
								formLogin.clearMessages();
								displayError('Invalid user/password, please try again');
							}
						},
						error: function()
						{
							formLogin.clearMessages();
							displayError('Error while contacting server, please try again');
						}
					});
				}
			});

			/******* END OF EDIT SECTION *******/

			// Handle resizing (mostly for debugging)
			function handleLoginResize()
			{
				// Detect mode
				centered = (container.css('position') === 'absolute');

				// Set min-height for mobile layout
				if (!centered)
				{
					container.css('margin-top', '');
				}
				else
				{
					if (parseInt(container.css('margin-top'), 10) === 0)
					{
						centerForm(false);
					}
				}
			};

			// Register and first call
			$(window).bind('normalized-resize', handleLoginResize);
			handleLoginResize();

			/*
			 * Center function
			 * @param boolean animate whether or not to animate the position change
			 * @param string|element|array any jQuery selector, DOM element or set of DOM elements which should be ignored
			 * @return void
			 */
			function centerForm(animate, ignore)
			{
				// If layout is centered
				if (centered)
				{
					var siblings = formLogin.siblings(),
						finalSize = formLogin.outerHeight();

					// Ignored elements
					if (ignore)
					{
						siblings = siblings.not(ignore);
					}

					// Get other elements height
					siblings.each(function(i)
					{
						finalSize += $(this).outerHeight(true);
					});

					// Setup
					container[animate ? 'animate' : 'css']({ marginTop: -Math.round(finalSize/2)+'px' });
				}
			};

			// Initial vertical adjust
			centerForm(false);

			/**
			 * Function to display error messages
			 * @param string message the error to display
			 */
			function displayError(message)
			{
				// Show message
				var message = formLogin.message(message, {
					append: false,
					arrow: 'bottom',
					classes: ['red-gradient'],
					animate: false					// We'll do animation later, we need to know the message height first
				});

				// Vertical centering (where we need the message height)
				centerForm(true, 'fast');

				// Watch for closing and show with effect
				message.bind('endfade', function(event)
				{
					// This will be called once the message has faded away and is removed
					centerForm(true, message.get(0));

				}).hide().slideDown('fast');
			}

			/**
			 * Function to display loading messages
			 * @param string message the message to display
			 */
			function displayLoading(message)
			{
				// Show message
				var message = formLogin.message('<strong>'+message+'</strong>', {
					append: false,
					arrow: 'bottom',
					classes: ['blue-gradient', 'align-center'],
					stripes: true,
					darkStripes: false,
					closable: false,
					animate: false					// We'll do animation later, we need to know the message height first
				});

				// Vertical centering (where we need the message height)
				centerForm(true, 'fast');

				// Watch for closing and show with effect
				message.bind('endfade', function(event)
				{
					// This will be called once the message has faded away and is removed
					centerForm(true, message.get(0));

				}).hide().slideDown('fast');
			}
		});
	</script>

</body>
</html>
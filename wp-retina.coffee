class WP_Retina
	
	simulate_retina = false
	debug_mode = false
	
	constructor: () ->	
		if window.devicePixelRatio > 1 or simulate_retina is true
			new Cookie "IsRetina", "1", "365"
			console.log "retina" if debug_mode is true
		else
			new Cookie "IsRetina", "0", "365"
			console.log "no retina"  if debug_mode is true

class Cookie
	constructor: (name, value, days) ->
		if days
			date = new Date()
			date.setTime(date.getTime() + (days * 24 * 60 * 60 * 1000))
			expires = "expires=" + date.toGMTString()
		else
			expires = ""

		cookieString = "#{name}=#{value}"
		document.cookie = cookieString

new WP_Retina()
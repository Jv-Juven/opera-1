
postLogin = (e)->
	username = $("#user-name").val()
	password = $("#password").val()
	captcha = $("#verify-input").val()

	$.post "/user/login", {username: username, password: password, captcha: captcha}, (res)->
		if res.errCode is 0
			alert("登录成功")
			window.location.href = "/"
		else
			alert res.message

$ ->
	$confirmBtn = $("#confirm-btn")

	$confirmBtn.click postLogin

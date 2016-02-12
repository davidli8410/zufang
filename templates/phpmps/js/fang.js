String.prototype.format = function() {
	var a = arguments;
	return this.replace(/{(\d+)}/g, function(b, c) {
		return typeof a[c] != "undefined" ? a[c] : b
	})
};
function isNumber(a) {
	return !isNaN(parseFloat(a)) && isFinite(a)
}
function validateEmail(a) {
	var b = /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
	return b.test(a)
}
function validatePhone(a) {
	var b = /^\s*\+?\d{0,4}-?\d{5,16}\s*$/;
	return b.test(a)
}
function validatePassword(a) {
	var b = /^\+?\d{0,4}-?\d{5,16}$/;
	return b.test(phone)
};
$(function() {
	$.ShowRegisterModal = function() {
		$("#register-error-msg-list").empty();
		$("#register_result_msg").text("");
		$("#register_username").parent().removeClass("has-error");
		$("#register_email").parent().removeClass("has-error");
		$("#register_password").parent().removeClass("has-error");
		$("#register_modal").modal("show")
	};
	$.ShowLoginModal = function(a) {
		$("#login-error-msg-list").empty();
		$("#login_result_msg").text("");
		$("#login_email").parent().removeClass("has-error");
		$("#login_password").parent().removeClass("has-error");
		if (a != "") {
			$("#login_email").val(a)
		}
		$("#login_modal").modal("show")
	};
	$.ShowForgotModal = function() {
		$("#forgot-error-msg-list").empty();
		$("#forgot_result_msg").text("");
		$("#forgot_email").parent().removeClass("has-error");
		$("#forgot_password_modal").modal("show")
	};
	$(".trigger_forgot_password").click(function(a) {
		$("#login_modal").modal("hide");
		$.ShowForgotModal()
	});
	$(".trigger_login").on("click", function(a) {
		$("#register_modal").modal("hide");
		$.ShowLoginModal("")
	});
	$(".trigger_register").on("click", function(a) {
		$("#login_modal").modal("hide");
		$.ShowRegisterModal()
	});
	$("#register_link").click(function(a) {
		$.ShowRegisterModal()
	});
	$("#login_link").click(function(a) {
		$.ShowLoginModal("")
	});
	$("#login_button_id").click(
			function(d) {
				email = $("#login_email").val();
				password = $("#login_password").val();
				$("#login-error-msg-list").empty();
				var c = true;
//				if (validateEmail(email) == false) {
//					$("#login_email").parent().addClass("has-error");
//					var b = $("#error-msg-template").html();
//					var a = b.format(email_error_msg);
//					$("#login-error-msg-list").append(a);
//					c = false
//				} else {
//					$("#login_email").parent().removeClass("has-error")
//				}
				if (password.length < PASSWORD_MIN_LENGTH
						|| password.length > PASSWORD_MAX_LENGTH) {
					$("#login_password").parent().addClass("has-error");
					var b = $("#error-msg-template").html();
//					var a = b.format(password_error_msg);
					$("#login-error-msg-list").append(password_error_msg);
					c = false
				} else {
					$("#login_password").parent().removeClass("has-error")
				}
				if (c == true) {
					$.Login(email, password)
				}
			});
	$("#register_button_id").click(
			function(c) {
				username = $("#register_username").val();
				email = $("#register_email").val();
				password = $("#register_password").val();
				$("#register-error-msg-list").empty();
				pass = true;
				if (username.length < USERNAME_MIN_LENGTH
						|| username.length > USERNAME_MAX_LENGTH) {
					$("#register_username").parent().addClass("has-error");
					var b = $("#error-msg-template").html();
					//var a = b.format(username_error_msg);
					$("#register-error-msg-list").append(username_error_msg);
					pass = false
				} else {
					$("#register_username").parent().removeClass("has-error")
				}
				if (validateEmail(email) == false) {
					$("#register_email").parent().addClass("has-error");
					var b = $("#error-msg-template").html();
					//var a = b.format(email_error_msg);
					$("#register-error-msg-list").append(email_error_msg);
					pass = false
				} else {
					$("#register_email").parent().removeClass("has-error")
				}
				if (password.length < PASSWORD_MIN_LENGTH
						|| password.length > PASSWORD_MAX_LENGTH) {
					$("#register_password").parent().addClass("has-error");
					var b = $("#error-msg-template").html();
					//var a = b.format(password_error_msg);
					$("#register-error-msg-list").append(password_error_msg);
					pass = false
				} else {
					$("#register_password").parent().removeClass("has-error")
				}
				if (pass == true) {
					$("#register_result_msg")
							.text(register_form_inprogress_str);
					$.Register(username, email, password)
				}
			});
	$("#forgot_password_button_id").click(function(c) {
		email = $("#forgot_email").val();
		$("#forgot-error-msg-list").empty();
		pass = true;
		if (validateEmail(email) == false) {
			$("#forgot_email").parent().addClass("has-error");
			var b = $("#error-msg-template").html();
			var a = b.format(email_error_msg);
			$("#forgot-error-msg-list").append(a);
			pass = false
		} else {
			$("#forgot_email").parent().removeClass("has-error")
		}
		if (pass == true) {
			$("#forgot_result_msg").text(forgot_form_inprogress_str);
			$.Forgot(email)
		}
	});
	$("#logout_link").on("click", function(a) {
		$.Logout()
	});
	$.Login = function(b, a) {
		$("#login_indicator").css("display", "inline");
		$("#login_result_msg").removeClass("result-text-red");
		$("#login_result_msg").removeClass("result-text-green");
		$("#login_result_msg").text(login_form_inprogress_str);
		$("#login_button_id").attr("disabled", "true");
		$.post("/login.php?act=act_login", {
			username_or_email : b,
			password : a
		}, function(c) {
			$("#login_indicator").css("display", "none");
			if (c.login_status == "SCMD_LOGIN_WRONG") {
				$("#login_result_msg").removeClass("result-text-green");
				$("#login_result_msg").addClass("result-text-red");
				$("#login_result_msg").text(login_form_error_str)
			} else {
				if (c.login_status == "SCMD_LOGIN_SUCCEED"
						|| c.login_status == "SCMD_LOGIN_ONE_TIME") {
					$("#login_result_msg").removeClass("result-text-red");
					$("#login_result_msg").addClass("result-text-green");
					if (c.login_status == "SCMD_LOGIN_SUCCEED") {
						$("#login_result_msg").text(login_form_correct_str)
					} else {
						$("#login_result_msg").text(login_form_onetime_str)
					}
					login_status = true;
					setTimeout(function() {
						$("#login_modal").modal("hide")
					}, 1500);
					if (c.login_status == "SCMD_LOGIN_SUCCEED") {
						location.reload();
					} else {
						window.location = "/web/account/"
					}
				} else {
					$("#login_result_msg").removeClass("result-text-green");
					$("#login_result_msg").addClass("result-text-red");
					$("#login_result_msg").text(unknown_error_str)
				}
			}
			$("#login_button_id").removeAttr("disabled")
		}, "json")
	};
	$.Register = function(c, b, a) {
		$("#register_indicator").css("display", "inline");
		$("#register_result_msg").removeClass("result-text-red");
		$("#register_result_msg").removeClass("result-text-green");
		$("#register_result_msg").text(register_form_inprogress_str);
		$("#register_button_id").attr("disabled", "true");
		user_type = $("input[name*='usertype_radios']:checked").val();
		$.ajax({
			type : "POST",
			url : "/register.php?act=act_register",
			data : {
				username : c,
				email : b,
				password : a
			},
			success : function(d) {
				$("#register_indicator").css("display", "none");
				if (d == "SCMD_REG_ERROR_USERNAME_EXIST") {
					$("#register_result_msg").removeClass("result-text-green");
					$("#register_result_msg").addClass("result-text-red");
					$("#register_result_msg").text(
							register_form_username_exist_str);
					$("#register_username").parent().addClass("has-error")
				} else {
					if (d == "SCMD_REG_ERROR_EMAIL_EXIST") {
						$("#register_result_msg").removeClass(
								"result-text-green");
						$("#register_result_msg").addClass("result-text-red");
						$("#register_result_msg").text(
								register_form_email_exist_str);
						$("#register_email").parent().addClass("has-error")
					} else {
						if (d == "SCMD_REG_SUCCEED") {
							$("#register_result_msg").removeClass(
									"result-text-red");
							$("#register_result_msg").addClass(
									"result-text-green");
							$("#register_result_msg").text(
									register_form_correct_str);
							setTimeout(function() {
								location.reload();
							}, 500);
						} else {
							$("#register_result_msg").removeClass(
									"result-text-green");
							$("#register_result_msg").addClass(
									"result-text-red");
							$("#register_result_msg").text(unknown_error_str)
						}
					}
				}
				$("#register_button_id").removeAttr("disabled")
			},
			async : true
		})
	};
	$.Forgot = function(a) {
		$("#forgot_indicator").css("display", "inline");
		$("#forgot_result_msg").removeClass("result-text-red");
		$("#forgot_result_msg").removeClass("result-text-green");
		$("#forgot_result_msg").text(forgot_form_inprogress_str);
		$("#forgot_button_id").attr("disabled", "true");
		$.ajax({
			type : "GET",
			url : "/SA/forgot/" + a + "/",
			success : function(b) {
				$("#forgot_indicator").css("display", "none");
				if (b == "SCMD_FORGET_EMAIL_NOT_EXIST") {
					$("#forgot_result_msg").removeClass("result-text-green");
					$("#forgot_result_msg").addClass("result-text-red");
					$("#forgot_result_msg").text(forgot_form_nonexist_str);
					$("#forgot_email").parent().addClass("has-error")
				} else {
					if (b == "SCMD_FORGET_NEW_PSW_SENT") {
						$("#forgot_result_msg").removeClass("result-text-red");
						$("#forgot_result_msg").addClass("result-text-green");
						$("#forgot_result_msg").text(forgot_form_correct_str)
					} else {
						$("#forgot_result_msg")
								.removeClass("result-text-green");
						$("#forgot_result_msg").addClass("result-text-red");
						$("#forgot_result_msg").text(unknown_error_str)
					}
				}
				$("#forgot_button_id").removeAttr("disabled")
			},
			async : true
		})
	};
	$.Logout = function() {
		$.post("/SA/logout/", function(a) {
			login_status = false;
			window.location = "/"
		})
	};
	$("#login_modal").on("hide.bs.modal", function() {
		$("#login_modal_msg").text(login_modal_normal_msg)
	})
});
$(window).on("resize load", function() {
	$("body").css({
		"padding-top" : $(".navbar").height() + 5 + "px"
	})
});
$(document).ready(function() {
	var a = document.location.href;
	if (a[a.length - 1] == "/") {
		a = a.substring(0, a.length - 1)
	}
	var b = a.substring(a.lastIndexOf("/") + 1).toLowerCase();
	switch (b) {
	case "my_post":
		$("#my_post").addClass("active");
		break;
	case "my_alert":
		$("#my_alert").addClass("active");
		break;
	case "my_favorite":
		$("#my_favorite").addClass("active");
		break;
	case "account":
		$("#account").addClass("active");
		break
	}
});
UserVoice = window.UserVoice || [];
(function() {
	var b = document.createElement("script");
	b.type = "text/javascript";
	b.async = true;
	b.src = "//widget.uservoice.com/0VhWlPOz0lz1Owod7EUGPw.js";
	var a = document.getElementsByTagName("script")[0];
	a.parentNode.insertBefore(b, a)
})();
UserVoice.push([ "set", {
	accent_color : "#448dd6",
	trigger_color : "white",
	trigger_background_color : "rgba(46, 49, 51, 0.6)"
} ]);
UserVoice.push([ "identify", {} ]);
UserVoice.push([ "addTrigger", {
	mode : "contact",
	trigger_position : "bottom-right"
} ]);
UserVoice.push([ "autoprompt", {} ]);
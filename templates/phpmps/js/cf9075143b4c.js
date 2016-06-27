function Validator(frmname) {
	this.validate_on_killfocus = false;
	this.formobj = document.forms[frmname];
	if (!this.formobj) {
		alert("Error: couldnot get Form object " + frmname);
		return;
	}
	if (this.formobj.onsubmit) {
		this.formobj.old_onsubmit = this.formobj.onsubmit;
		this.formobj.onsubmit = null;
	} else {
		this.formobj.old_onsubmit = null;
	}
	this.formobj._sfm_form_name = frmname;
	this.formobj.onsubmit = form_submit_handler;
	this.addValidation = add_validation;
	this.formobj.addnlvalidations = new Array();
	this.addAddnlValidationFunction = add_addnl_vfunction;
	this.formobj.runAddnlValidations = run_addnl_validations;
	this.setAddnlValidationFunction = set_addnl_vfunction;
	this.clearAllValidations = clear_all_validations;
	this.focus_disable_validations = false;
	document.error_disp_handler = new sfm_ErrorDisplayHandler();
	this.EnableOnPageErrorDisplay = validator_enable_OPED;
	this.EnableOnPageErrorDisplaySingleBox = validator_enable_OPED_SB;
	this.show_errors_together = false;
	this.EnableMsgsTogether = sfm_enable_show_msgs_together;
	document.set_focus_onerror = true;
	this.EnableFocusOnError = sfm_validator_enable_focus;
	this.formobj.error_display_loc = 'right';
	this.SetMessageDisplayPos = sfm_validator_message_disp_pos;
	this.formobj.DisableValidations = sfm_disable_validations;
	this.formobj.validatorobj = this;
}
function sfm_validator_enable_focus(enable) {
	document.set_focus_onerror = enable;
}
function add_addnl_vfunction() {
	var proc = {};
	proc.func = arguments[0];
	proc.arguments = [];
	for (var i = 1; i < arguments.length; i++) {
		proc.arguments.push(arguments[i]);
	}
	this.formobj.addnlvalidations.push(proc);
}
function set_addnl_vfunction(functionname) {
	if (functionname.constructor == String) {
		alert("Pass the function name like this: validator.setAddnlValidationFunction(DoCustomValidation)\n "
				+ "rather than passing the function name as string");
		return;
	}
	this.addAddnlValidationFunction(functionname);
}
function run_addnl_validations() {
	var ret = true;
	for (var f = 0; f < this.addnlvalidations.length; f++) {
		var proc = this.addnlvalidations[f];
		var args = proc.arguments || [];
		if (!proc.func.apply(null, args)) {
			ret = false;
		}
	}
	return ret;
}
function sfm_set_focus(objInput) {
	if (document.set_focus_onerror) {
		if (!objInput.disabled && objInput.type != 'hidden') {
			objInput.focus();
		}
	}
}
function sfm_disable_validations() {
	if (this.old_onsubmit) {
		this.onsubmit = this.old_onsubmit;
	} else {
		this.onsubmit = null;
	}
}
function sfm_enable_show_msgs_together() {
	this.show_errors_together = true;
	this.formobj.show_errors_together = true;
}
function sfm_validator_message_disp_pos(pos) {
	this.formobj.error_display_loc = pos;
}
function clear_all_validations() {
	for (var itr = 0; itr < this.formobj.elements.length; itr++) {
		this.formobj.elements[itr].validationset = null;
	}
}
function form_submit_handler() {
	var bRet = true;
	document.error_disp_handler.clear_msgs();
	for (var itr = 0; itr < this.elements.length; itr++) {
		if (this.elements[itr].validationset
				&& !this.elements[itr].validationset.validate()) {
			bRet = false;
		}
		if (!bRet && !this.show_errors_together) {
			break;
		}
	}
	if (this.show_errors_together || bRet && !this.show_errors_together) {
		if (!this.runAddnlValidations()) {
			bRet = false;
		}
	}
	if (!bRet) {
		document.error_disp_handler.FinalShowMsg();
		return false;
	}
	return true;
}
function add_validation(itemname, descriptor, errstr) {
	var condition = null;
	if (arguments.length > 3) {
		condition = arguments[3];
	}
	if (!this.formobj) {
		alert("Error: The form object is not set properly");
		return;
	}
	var itemobj = this.formobj[itemname];
	if (itemobj.length && isNaN(itemobj.selectedIndex)) {
		itemobj = itemobj[0];
	}
	if (!itemobj) {
		alert("Error: Couldnot get the input object named: " + itemname);
		return;
	}
	if (true == this.validate_on_killfocus) {
		itemobj.onblur = handle_item_on_killfocus;
	}
	if (!itemobj.validationset) {
		itemobj.validationset = new ValidationSet(itemobj,
				this.show_errors_together);
	}
	itemobj.validationset.add(descriptor, errstr, condition);
	itemobj.validatorobj = this;
}
function handle_item_on_killfocus() {
	if (this.validatorobj.focus_disable_validations == true) {
		this.validatorobj.focus_disable_validations = false;
		return false;
	}
	if (null != this.validationset) {
		document.error_disp_handler.clear_msgs();
		if (false == this.validationset.validate()) {
			document.error_disp_handler.FinalShowMsg();
			return false;
		}
	}
}
function validator_enable_OPED() {
	document.error_disp_handler.EnableOnPageDisplay(false);
}
function validator_enable_OPED_SB() {
	document.error_disp_handler.EnableOnPageDisplay(true);
}
function sfm_ErrorDisplayHandler() {
	this.msgdisplay = new AlertMsgDisplayer();
	this.EnableOnPageDisplay = edh_EnableOnPageDisplay;
	this.ShowMsg = edh_ShowMsg;
	this.FinalShowMsg = edh_FinalShowMsg;
	this.all_msgs = new Array();
	this.clear_msgs = edh_clear_msgs;
}
function edh_clear_msgs() {
	this.msgdisplay.clearmsg(this.all_msgs);
	this.all_msgs = new Array();
}
function edh_FinalShowMsg() {
	if (this.all_msgs.length == 0) {
		return;
	}
	this.msgdisplay.showmsg(this.all_msgs);
}
function edh_EnableOnPageDisplay(single_box) {
	if (true == single_box) {
		this.msgdisplay = new SingleBoxErrorDisplay();
	} else {
		this.msgdisplay = new DivMsgDisplayer();
	}
}
function edh_ShowMsg(msg, input_element) {
	var objmsg = new Array();
	objmsg["input_element"] = input_element;
	objmsg["msg"] = msg;
	this.all_msgs.push(objmsg);
}
function AlertMsgDisplayer() {
	this.showmsg = alert_showmsg;
	this.clearmsg = alert_clearmsg;
}
function alert_clearmsg(msgs) {
}
function alert_showmsg(msgs) {
	var whole_msg = "";
	var first_elmnt = null;
	for (var m = 0; m < msgs.length; m++) {
		if (null == first_elmnt) {
			first_elmnt = msgs[m]["input_element"];
		}
		whole_msg += msgs[m]["msg"] + "\n";
	}
	alert(whole_msg);
	if (null != first_elmnt) {
		sfm_set_focus(first_elmnt);
	}
}
function sfm_show_error_msg(msg, input_elmt) {
	document.error_disp_handler.ShowMsg(msg, input_elmt);
}
function SingleBoxErrorDisplay() {
	this.showmsg = sb_div_showmsg;
	this.clearmsg = sb_div_clearmsg;
}
function sb_div_clearmsg(msgs) {
	var divname = form_error_div_name(msgs);
	sfm_show_div_msg(divname, "");
}
function sb_div_showmsg(msgs) {
	var whole_msg = "<ul>\n";
	for (var m = 0; m < msgs.length; m++) {
		whole_msg += "<li>" + msgs[m]["msg"] + "</li>\n";
	}
	whole_msg += "</ul>";
	var divname = form_error_div_name(msgs);
	var anc_name = divname + "_loc";
	whole_msg = "<a name='" + anc_name + "' >" + whole_msg;
	sfm_show_div_msg(divname, whole_msg);
	window.location.hash = anc_name;
}
function form_error_div_name(msgs) {
	var input_element = null;
	for ( var m in msgs) {
		input_element = msgs[m]["input_element"];
		if (input_element) {
			break;
		}
	}
	var divname = "";
	if (input_element) {
		divname = input_element.form._sfm_form_name + "_errorloc";
	}
	return divname;
}
function sfm_show_div_msg(divname, msgstring) {
	if (divname.length <= 0)
		return false;
	if (document.layers) {
		divlayer = document.layers[divname];
		if (!divlayer) {
			return;
		}
		divlayer.document.open();
		divlayer.document.write(msgstring);
		divlayer.document.close();
	} else if (document.all) {
		divlayer = document.all[divname];
		if (!divlayer) {
			return;
		}
		divlayer.innerHTML = msgstring;
	} else if (document.getElementById) {
		divlayer = document.getElementById(divname);
		if (!divlayer) {
			return;
		}
		divlayer.innerHTML = msgstring;
	}
	divlayer.style.visibility = "visible";
	return false;
}
function DivMsgDisplayer() {
	this.showmsg = div_showmsg;
	this.clearmsg = div_clearmsg;
}
function div_clearmsg(msgs) {
	for ( var m in msgs) {
		var divname = element_div_name(msgs[m]["input_element"]);
		show_div_msg(divname, "");
	}
}
function element_div_name(input_element) {
	var divname = input_element.form._sfm_form_name + "_" + input_element.name
			+ "_errorloc";
	divname = divname.replace(/[\[\]]/gi, "");
	return divname;
}
function div_showmsg(msgs) {
	var whole_msg;
	var first_elmnt = null;
	for ( var m in msgs) {
		if (null == first_elmnt) {
			first_elmnt = msgs[m]["input_element"];
		}
		var divname = element_div_name(msgs[m]["input_element"]);
		show_div_msg(divname, msgs[m]["msg"]);
	}
	if (null != first_elmnt) {
		sfm_set_focus(first_elmnt);
	}
}
function show_div_msg(divname, msgstring) {
	if (divname.length <= 0)
		return false;
	if (document.layers) {
		divlayer = document.layers[divname];
		if (!divlayer) {
			return;
		}
		divlayer.document.open();
		divlayer.document.write(msgstring);
		divlayer.document.close();
	} else if (document.all) {
		divlayer = document.all[divname];
		if (!divlayer) {
			return;
		}
		divlayer.innerHTML = msgstring;
	} else if (document.getElementById) {
		divlayer = document.getElementById(divname);
		if (!divlayer) {
			return;
		}
		divlayer.innerHTML = msgstring;
	}
	divlayer.style.visibility = "visible";
}
function ValidationDesc(inputitem, desc, error, condition) {
	this.desc = desc;
	this.error = error;
	this.itemobj = inputitem;
	this.condition = condition;
	this.validate = vdesc_validate;
}
function vdesc_validate() {
	if (this.condition != null) {
		if (!eval(this.condition)) {
			return true;
		}
	}
	if (!validateInput(this.desc, this.itemobj, this.error)) {
		this.itemobj.validatorobj.focus_disable_validations = true;
		sfm_set_focus(this.itemobj);
		return false;
	}
	return true;
}
function ValidationSet(inputitem, msgs_together) {
	this.vSet = new Array();
	this.add = add_validationdesc;
	this.validate = vset_validate;
	this.itemobj = inputitem;
	this.msgs_together = msgs_together;
}
function add_validationdesc(desc, error, condition) {
	this.vSet[this.vSet.length] = new ValidationDesc(this.itemobj, desc, error,
			condition);
}
function vset_validate() {
	var bRet = true;
	for (var itr = 0; itr < this.vSet.length; itr++) {
		bRet = bRet && this.vSet[itr].validate();
		if (!bRet && !this.msgs_together) {
			break;
		}
	}
	return bRet;
}
function validateEmail(email) {
	var splitted = email.match("^(.+)@(.+)$");
	if (splitted == null)
		return false;
	if (splitted[1] != null) {
		var regexp_user = /^\"?[\w-_\.]*\"?$/;
		if (splitted[1].match(regexp_user) == null)
			return false;
	}
	if (splitted[2] != null) {
		var regexp_domain = /^[\w-\.]*\.[A-Za-z]{2,4}$/;
		if (splitted[2].match(regexp_domain) == null) {
			var regexp_ip = /^\[\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}\]$/;
			if (splitted[2].match(regexp_ip) == null)
				return false;
		}
		return true;
	}
	return false;
}
function TestComparison(objValue, strCompareElement, strvalidator, strError) {
	var bRet = true;
	var objCompare = null;
	if (!objValue.form) {
		sfm_show_error_msg("Error: No Form object!", objValue);
		return false
	}
	objCompare = objValue.form.elements[strCompareElement];
	if (!objCompare) {
		sfm_show_error_msg("Error: Element with name" + strCompareElement
				+ " not found !", objValue);
		return false;
	}
	var objval_value = objValue.value;
	var objcomp_value = objCompare.value;
	if (strvalidator != "eqelmnt" && strvalidator != "neelmnt") {
		objval_value = objval_value.replace(/\,/g, "");
		objcomp_value = objcomp_value.replace(/\,/g, "");
		if (isNaN(objval_value)) {
			sfm_show_error_msg(objValue.name + ": Should be a number ",
					objValue);
			return false;
		}
		if (isNaN(objcomp_value)) {
			sfm_show_error_msg(objCompare.name + ": Should be a number ",
					objCompare);
			return false;
		}
	}
	var cmpstr = "";
	switch (strvalidator) {
	case "eqelmnt": {
		if (objval_value != objcomp_value) {
			cmpstr = " should be equal to ";
			bRet = false;
		}
		break;
	}
	case "ltelmnt": {
		if (eval(objval_value) >= eval(objcomp_value)) {
			cmpstr = " should be less than ";
			bRet = false;
		}
		break;
	}
	case "leelmnt": {
		if (eval(objval_value) > eval(objcomp_value)) {
			cmpstr = " should be less than or equal to";
			bRet = false;
		}
		break;
	}
	case "gtelmnt": {
		if (eval(objval_value) <= eval(objcomp_value)) {
			cmpstr = " should be greater than";
			bRet = false;
		}
		break;
	}
	case "geelmnt": {
		if (eval(objval_value) < eval(objcomp_value)) {
			cmpstr = " should be greater than or equal to";
			bRet = false;
		}
		break;
	}
	case "neelmnt": {
		if (objval_value.length > 0 && objcomp_value.length > 0
				&& objval_value == objcomp_value) {
			cmpstr = " should be different from ";
			bRet = false;
		}
		break;
	}
	}
	if (bRet == false) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + cmpstr + objCompare.name;
		}
		sfm_show_error_msg(strError, objValue);
	}
	return bRet;
}
function TestSelMin(objValue, strMinSel, strError) {
	var bret = true;
	var objcheck = objValue.form.elements[objValue.name];
	var chkcount = 0;
	if (objcheck.length) {
		for (var c = 0; c < objcheck.length; c++) {
			if (objcheck[c].checked == "1") {
				chkcount++;
			}
		}
	} else {
		chkcount = (objcheck.checked == "1") ? 1 : 0;
	}
	var minsel = eval(strMinSel);
	if (chkcount < minsel) {
		if (!strError || strError.length == 0) {
			strError = "Please Select atleast" + minsel + " check boxes for"
					+ objValue.name;
		}
		sfm_show_error_msg(strError, objValue);
		bret = false;
	}
	return bret;
}
function TestSelMax(objValue, strMaxSel, strError) {
	var bret = true;
	var objcheck = objValue.form.elements[objValue.name];
	var chkcount = 0;
	if (objcheck.length) {
		for (var c = 0; c < objcheck.length; c++) {
			if (objcheck[c].checked == "1") {
				chkcount++;
			}
		}
	} else {
		chkcount = (objcheck.checked == "1") ? 1 : 0;
	}
	var maxsel = eval(strMaxSel);
	if (chkcount > maxsel) {
		if (!strError || strError.length == 0) {
			strError = "Please Select atmost " + maxsel + " check boxes for"
					+ objValue.name;
		}
		sfm_show_error_msg(strError, objValue);
		bret = false;
	}
	return bret;
}
function IsCheckSelected(objValue, chkValue) {
	var selected = false;
	var objcheck = objValue.form.elements[objValue.name];
	if (objcheck.length) {
		var idxchk = -1;
		for (var c = 0; c < objcheck.length; c++) {
			if (objcheck[c].value == chkValue) {
				idxchk = c;
				break;
			}
		}
		if (idxchk >= 0) {
			if (objcheck[idxchk].checked == "1") {
				selected = true;
			}
		}
	} else {
		if (objValue.checked == "1") {
			selected = true;
		}
	}
	return selected;
}
function TestDontSelectChk(objValue, chkValue, strError) {
	var pass = true;
	pass = IsCheckSelected(objValue, chkValue) ? false : true;
	if (pass == false) {
		if (!strError || strError.length == 0) {
			strError = "Can't Proceed as you selected " + objValue.name;
		}
		sfm_show_error_msg(strError, objValue);
	}
	return pass;
}
function TestShouldSelectChk(objValue, chkValue, strError) {
	var pass = true;
	pass = IsCheckSelected(objValue, chkValue) ? true : false;
	if (pass == false) {
		if (!strError || strError.length == 0) {
			strError = "You should select" + objValue.name;
		}
		sfm_show_error_msg(strError, objValue);
	}
	return pass;
}
function TestRequiredInput(objValue, strError) {
	var ret = true;
	if (VWZ_IsEmpty(objValue.value)) {
		ret = false;
	} else if (objValue.getcal && !objValue.getcal()) {
		ret = false;
	}
	if (!ret) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " : Required Field";
		}
		sfm_show_error_msg(strError, objValue);
	}
	return ret;
}
function TestFileExtension(objValue, cmdvalue, strError) {
	var ret = false;
	var found = false;
	if (objValue.value.length <= 0) {
		return true;
	}
	var extns = cmdvalue.split(";");
	for (var i = 0; i < extns.length; i++) {
		ext = objValue.value.substr(objValue.value.length - extns[i].length,
				extns[i].length);
		ext = ext.toLowerCase();
		if (ext == extns[i]) {
			found = true;
			break;
		}
	}
	if (!found) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " allowed file extensions are: "
					+ cmdvalue;
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	} else {
		ret = true;
	}
	return ret;
}
function TestMaxLen(objValue, strMaxLen, strError) {
	var ret = true;
	if (eval(objValue.value.length) > eval(strMaxLen)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " : " + strMaxLen
					+ " characters maximum ";
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestMinLen(objValue, strMinLen, strError) {
	var ret = true;
	if (eval(objValue.value.length) < eval(strMinLen)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " : " + strMinLen
					+ " characters minimum  ";
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestInputType(objValue, strRegExp, strError, strDefaultError) {
	var ret = true;
	var charpos = objValue.value.search(strRegExp);
	if (objValue.value.length > 0 && charpos >= 0) {
		if (!strError || strError.length == 0) {
			strError = strDefaultError;
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestEmail(objValue, strError) {
	var ret = true;
	if (objValue.value.length > 0 && !validateEmail(objValue.value)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + ": Enter a valid Email address ";
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestLessThan(objValue, strLessThan, strError) {
	var ret = true;
	var obj_value = objValue.value.replace(/\,/g, "");
	strLessThan = strLessThan.replace(/\,/g, "");
	if (isNaN(obj_value)) {
		sfm_show_error_msg(objValue.name + ": Should be a number ", objValue);
		ret = false;
	} else if (eval(obj_value) >= eval(strLessThan)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " : value should be less than "
					+ strLessThan;
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestGreaterThan(objValue, strGreaterThan, strError) {
	var ret = true;
	var obj_value = objValue.value.replace(/\,/g, "");
	strGreaterThan = strGreaterThan.replace(/\,/g, "");
	if (isNaN(obj_value)) {
		sfm_show_error_msg(objValue.name + ": Should be a number ", objValue);
		ret = false;
	} else if (eval(obj_value) <= eval(strGreaterThan)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + " : value should be greater than "
					+ strGreaterThan;
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestRegExp(objValue, strRegExp, strError) {
	var ret = true;
	if (objValue.value.length > 0 && !objValue.value.match(strRegExp)) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + ": Invalid characters found ";
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestDontSelect(objValue, dont_sel_value, strError) {
	var ret = true;
	if (objValue.value == null) {
		sfm_show_error_msg("Error: dontselect command for non-select Item",
				objValue);
		ret = false;
	} else if (objValue.value == dont_sel_value) {
		if (!strError || strError.length == 0) {
			strError = objValue.name + ": Please Select one option ";
		}
		sfm_show_error_msg(strError, objValue);
		ret = false;
	}
	return ret;
}
function TestSelectOneRadio(objValue, strError) {
	var objradio = objValue.form.elements[objValue.name];
	var one_selected = false;
	for (var r = 0; r < objradio.length; r++) {
		if (objradio[r].checked == "1") {
			one_selected = true;
			break;
		}
	}
	if (false == one_selected) {
		if (!strError || strError.length == 0) {
			strError = "Please select one option from " + objValue.name;
		}
		sfm_show_error_msg(strError, objValue);
	}
	return one_selected;
}
function TestSelectRadio(objValue, cmdvalue, strError, testselect) {
	var objradio = objValue.form.elements[objValue.name];
	var selected = false;
	for (var r = 0; r < objradio.length; r++) {
		if (objradio[r].value == cmdvalue && objradio[r].checked == "1") {
			selected = true;
			break;
		}
	}
	if (testselect == true && false == selected || testselect == false
			&& true == selected) {
		sfm_show_error_msg(strError, objValue);
		return false;
	}
	return true;
}
function validateInput(strValidateStr, objValue, strError) {
	var ret = true;
	var epos = strValidateStr.search("=");
	var command = "";
	var cmdvalue = "";
	if (epos >= 0) {
		command = strValidateStr.substring(0, epos);
		cmdvalue = strValidateStr.substr(epos + 1);
	} else {
		command = strValidateStr;
	}
	switch (command) {
	case "req":
	case "required": {
		ret = TestRequiredInput(objValue, strError)
		break;
	}
	case "maxlength":
	case "maxlen": {
		ret = TestMaxLen(objValue, cmdvalue, strError)
		break;
	}
	case "minlength":
	case "minlen": {
		ret = TestMinLen(objValue, cmdvalue, strError)
		break;
	}
	case "alnum":
	case "alphanumeric": {
		ret = TestInputType(objValue, "[^A-Za-z0-9]", strError, objValue.name
				+ ": Only alpha-numeric characters allowed ");
		break;
	}
	case "alnum_s":
	case "alphanumeric_space": {
		ret = TestInputType(objValue, "[^A-Za-z0-9\\s]", strError,
				objValue.name
						+ ": Only alpha-numeric characters and space allowed ");
		break;
	}
	case "num":
	case "numeric":
	case "dec":
	case "decimal": {
		if (objValue.value.length > 0
				&& !objValue.value.match(/^[\-\+]?[\d\,]*\.?[\d]*$/)) {
			sfm_show_error_msg(strError, objValue);
			ret = false;
		}
		break;
	}
	case "alphabetic":
	case "alpha": {
		ret = TestInputType(objValue, "[^A-Za-z]", strError, objValue.name
				+ ": Only alphabetic characters allowed ");
		break;
	}
	case "alphabetic_space":
	case "alpha_s": {
		ret = TestInputType(objValue, "[^A-Za-z\\s]", strError, objValue.name
				+ ": Only alphabetic characters and space allowed ");
		break;
	}
	case "email": {
		ret = TestEmail(objValue, strError);
		break;
	}
	case "lt":
	case "lessthan": {
		ret = TestLessThan(objValue, cmdvalue, strError);
		break;
	}
	case "gt":
	case "greaterthan": {
		ret = TestGreaterThan(objValue, cmdvalue, strError);
		break;
	}
	case "regexp": {
		ret = TestRegExp(objValue, cmdvalue, strError);
		break;
	}
	case "dontselect": {
		ret = TestDontSelect(objValue, cmdvalue, strError)
		break;
	}
	case "dontselectchk": {
		ret = TestDontSelectChk(objValue, cmdvalue, strError)
		break;
	}
	case "shouldselchk": {
		ret = TestShouldSelectChk(objValue, cmdvalue, strError)
		break;
	}
	case "selmin": {
		ret = TestSelMin(objValue, cmdvalue, strError);
		break;
	}
	case "selmax": {
		ret = TestSelMax(objValue, cmdvalue, strError);
		break;
	}
	case "selone_radio":
	case "selone": {
		ret = TestSelectOneRadio(objValue, strError);
		break;
	}
	case "dontselectradio": {
		ret = TestSelectRadio(objValue, cmdvalue, strError, false);
		break;
	}
	case "selectradio": {
		ret = TestSelectRadio(objValue, cmdvalue, strError, true);
		break;
	}
	case "eqelmnt":
	case "ltelmnt":
	case "leelmnt":
	case "gtelmnt":
	case "geelmnt":
	case "neelmnt": {
		return TestComparison(objValue, cmdvalue, command, strError);
		break;
	}
	case "req_file": {
		ret = TestRequiredInput(objValue, strError);
		break;
	}
	case "file_extn": {
		ret = TestFileExtension(objValue, cmdvalue, strError);
		break;
	}
	}
	return ret;
}
function VWZ_IsListItemSelected(listname, value) {
	for (var i = 0; i < listname.options.length; i++) {
		if (listname.options[i].selected == true
				&& listname.options[i].value == value) {
			return true;
		}
	}
	return false;
}
function VWZ_IsChecked(objcheck, value) {
	if (objcheck.length) {
		for (var c = 0; c < objcheck.length; c++) {
			if (objcheck[c].checked == "1" && objcheck[c].value == value) {
				return true;
			}
		}
	} else {
		if (objcheck.checked == "1") {
			return true;
		}
	}
	return false;
}
function sfm_str_trim(strIn) {
	return strIn.replace(/^\s\s*/, '').replace(/\s\s*$/, '');
}
function VWZ_IsEmpty(value) {
	value = sfm_str_trim(value);
	return (value.length) == 0 ? true : false;
}
$(function() {
	$(window).scroll(function() {
		if ($(this).scrollTop()) {
			$("#toTop").fadeIn()
		} else {
			$("#toTop").fadeOut()
		}
	});
	$("#toTop").click(function() {
		window.scrollTo(0, 0)
	})
});
var region = "", mrt = "", min_price = "", max_price = "", term = "", is_share_type = "";
var is_common_type = "", is_master_type = "", is_unit_type = "", is_other_type = "";
var post_id = "", post_header_num = "", user_type = "", language = "";
var include_negotiable = true;
var returned_item_count = 0;
$(function() {
	$.ShortenTitle = function(c, a) {
		var e = /^[ 0-9a-zA-Z.,?\/\\\!\@\#\$\%\^\&\*\(\)]$/;
		var d = 0;
		var b = 0;
		for (; b < c.length; b++) {
			if (c[b].match(e)) {
				d += 0.6
			} else {
				d += 1
			}
			if (d >= a) {
				break
			}
		}
		if (b < c.length - 1) {
			return c.substring(0, b) + " ..."
		} else {
			return c
		}
	};
	$.GeneralLoad = function(b) {
		if (b == "new") {
			post_id = "0"
		}
		var a = "/PR/FI/" + region + "/" + mrt + "/" + min_price + "/"
				+ max_price + "/" + is_negotiable + "/" + term + "/"
				+ is_share_type + "/" + is_common_type + "/" + is_master_type
				+ "/" + is_unit_type + "/" + is_other_type + "/" + post_id
				+ "/" + post_header_num + "/" + user_type + "/" + language
				+ "/";
		$.GetHeaders(a, b)
	};
	$.PhoneLoad = function(c, a) {
		if (c == "new") {
			post_id = "0"
		}
		var b = "/PR/FBP/" + a + "/" + post_id + "/" + post_header_num + "/";
		$.GetHeaders(b, c)
	};
	$.GetHeaders = function(a, b) {
		$
				.getJSON(
						a,
						function(c) {
							$
									.each(
											c,
											function(j, u) {
												post_id = u.post_id;
												var g = u.title;
												if (g == "") {
													g = no_title_str
												} else {
													g = $.ShortenTitle(g, 60)
												}
												var m = "";
												var k = false;
												if (u.is_share_type == "1") {
													m += share_str;
													k = true
												}
												if (u.is_common_type == "1") {
													if (k) {
														m += "|"
													}
													m += common_str;
													k = true
												}
												if (u.is_master_type == "1") {
													if (k) {
														m += "|"
													}
													m += master_str;
													k = true
												}
												if (u.is_unit_type == "1") {
													if (k) {
														m += "|"
													}
													m += unit_str;
													k = true
												}
												if (u.is_other_type == "1") {
													if (k) {
														m += "|"
													}
													m += other_str;
													k = true
												}
												var e = "";
												var n = u.time
														.replace(" ", "T");
												var t = Date.parse(Date())
														- Date.parse(n);
												var h = Math
														.floor(t / 86400000);
												if (h > 0) {
													e = h.toString() + " "
															+ day_postfix
												} else {
													var s = Math
															.floor(t / 3600000);
													if (s > 0) {
														e = s.toString() + " "
																+ hour_postfix
													} else {
														var q = Math
																.floor(t / 60000);
														if (q < 0) {
															q = 0
														}
														e = q.toString() + " "
																+ min_postfix
													}
												}
												var f = "";
												var v = "";
												if (u.user_type == "landlord") {
													f = owner_str;
													v = "success"
												} else {
													if (u.user_type == "agent") {
														f = agent_str;
														v = "warning"
													}
												}
												var d = u.price;
												var r = "";
												var o = "";
												if (u.term == "day") {
													r = term_day_str;
													o = price_day_postfix
												} else {
													r = term_month_str;
													o = price_month_postfix
												}
												if (d == "0") {
													d = "";
													o = rental_unknown_str
												}
												var p = "";
												var i = "none";
												if (u.source.substring(0, 3) == "sgc") {
													p = sgc_str
												} else {
													if (u.source
															.substring(0, 5) == "sgxin") {
														p = sgxin_str
													} else {
														if (u.source.substring(
																0, 5) == "xinyu") {
															p = xinyu_str
														} else {
															if (u.source
																	.substring(
																			0,
																			5) == "sofun") {
																p = sofun_str
															} else {
																if (u.source
																		.substring(
																				0,
																				6) == "sgyuan") {
																	p = sgyuan_str
																} else {
																	if (u.source
																			.substring(
																					0,
																					6) == "sgroom") {
																		p = sgroom_str;
																		i = "post-block-highlight"
																	} else {
																		if (u.source
																				.substring(
																						0,
																						6) == "zufang") {
																			p = zufang_str
																		} else {
																			if (u.source
																					.substring(
																							0,
																							7) == "huasing") {
																				p = huasing_str
																			} else {
																				if (u.source
																						.substring(
																								0,
																								7) == "roomsdb") {
																					p = roomsdb_str
																				} else {
																					if (u.source
																							.substring(
																									0,
																									7) == "gumtree") {
																						p = gumtree_str
																					} else {
																						if (u.source
																								.substring(
																										0,
																										7) == "soufang") {
																							p = soufang_str
																						} else {
																							if (u.source
																									.substring(
																											0,
																											7) == "singxin") {
																								p = singxin_str
																							} else {
																								if (u.source
																										.substring(
																												0,
																												8) == "singfang") {
																									p = soufang_str
																								} else {
																									if (u.source
																											.substring(
																													0,
																													11) == "shichengbbs") {
																										p = shichengbbs_str
																									} else {
																										p = ""
																									}
																								}
																							}
																						}
																					}
																				}
																			}
																		}
																	}
																}
															}
														}
													}
												}
												is_top_display = "none";
												not_top_display = "inline";
												if (u.is_top == "1") {
													is_top_display = "inline";
													not_top_display = "none"
												}
												has_image_display = "none";
												if (u.has_image == "1") {
													has_image_display = "inline"
												}
												var l = $("#post-template")
														.html();
												var w = l.format(
														is_top_display, i,
														u.post_id, g, d, o, m,
														r, v, f, p, e,
														has_image_display,
														not_top_display);
												$("#post-list").append(w)
											});
							$.SetLoadingStatus(false);
							if (c.length == 0) {
								if (b == "new") {
									$("#loading-text").text(
											search_no_result_str)
								} else {
									$("#loading-text").text(
											search_no_more_result_str)
								}
							} else {
								$("#loading-text").text(search_normal_str)
							}
						})
	};
	$.ClearPost = function() {
		$("#post-list").html("")
	};
	$.SetLoadingStatus = function(a) {
		if (a == true) {
			$("#loading-indicator").css("display", "inline");
			$("#loading-text").text(loading_str)
		} else {
			$("#loading-indicator").css("display", "none");
			$("#loading-text").text(view_more_str)
		}
	}
});
$(function() {
	if (show_popover) {
		setTimeout(function() {
			$("#alert-button").popover("show")
		}, 1000);
		setTimeout(function() {
			$("#alert-button").popover("hide")
		}, 6000)
	}
	$("#searchTab a").click(function(b) {
		b.preventDefault();
		$(this).tab("show")
	});
	$.validateSearchConditions = function() {
		min_price = $("#min_rental").val();
		max_price = $("#max_rental").val();
		if (isNumber(min_price) != true || isNumber(max_price != true)) {
			if (isNumber(min_price) != true) {
				$("#min_rental").parent().addClass("has-error")
			}
			if (isNumber(max_price) != true) {
				$("#max_rental").parent().addClass("has-error")
			}
			$("#rental_validation_msg").removeClass("validation-text-green");
			$("#rental_validation_msg").addClass("validation-text-red");
			$("#rental_validation_msg").text(rental_form_error_str);
			return false
		} else {
			$("#min_rental").parent().removeClass("has-error");
			$("#max_rental").parent().removeClass("has-error");
			$("#rental_validation_msg").removeClass("validation-text-red");
			$("#rental_validation_msg").addClass("validation-text-green");
			$("#rental_validation_msg").text(rental_form_correct_str);
			return true
		}
	};
	$.getParameters = function() {
		
		region = $(
		"div.two-level-selection-block.active .two-level-selection-pane-active")
		.find(".all-selection text-selection-item-selected").attr("id");
		alert(region);
		if ($(".two-level-selection-block.active").attr("id") == "region-selection") {
			region = $(
					"div.two-level-selection-block.active .two-level-selection-pane-active")
					.find(".text-selection-item-selected").attr("id");
			region = region.toLowerCase();
		} 
		min_price = $("#min_rental").val();
		max_price = $("#max_rental").val();
		if ($("#negotiable-checkbox").is(":checked")) {
			is_negotiable = "1"
		} else {
			is_negotiable = "0"
		}
		
		term = $("div.text-selection-block.term-selection").find(
				".text-selection-item-selected").attr("id");
		is_share_type = "0";
		is_common_type = "0";
		is_master_type = "0";
		is_unit_type = "0";
		is_other_type = "0";
		if ($("div.text-selection-block.house-type-selection").find(
				".text-selection-item-selected").attr("id") == "any") {
			is_share_type = "1";
			is_common_type = "1";
			is_master_type = "1";
			is_unit_type = "1";
			is_other_type = "1"
		} else {
			if ($("div.text-selection-block.house-type-selection").find(
					".text-selection-item-selected").attr("id") == "share") {
				is_share_type = "1"
			} else {
				if ($("div.text-selection-block.house-type-selection").find(
						".text-selection-item-selected").attr("id") == "common") {
					is_common_type = "1"
				} else {
					if ($("div.text-selection-block.house-type-selection")
							.find(".text-selection-item-selected").attr("id") == "master") {
						is_master_type = "1"
					} else {
						if ($("div.text-selection-block.house-type-selection")
								.find(".text-selection-item-selected").attr(
										"id") == "unit") {
							is_unit_type = "1"
						} else {
							if ($(
									"div.text-selection-block.house-type-selection")
									.find(".text-selection-item-selected")
									.attr("id") == "other") {
								is_other_type = "1"
							}
						}
					}
				}
			}
		}
	};
	$(
			".text-selection-item, .text-selection-item-selected, .two-level-selection-item, .two-level-selection-item-selected, .search-tab")
			.click(function(b) {
				$.NewSearch()
			});
	$("#min_rental, #max_rental, #negotiable-checkbox").change(function() {
		$.NewSearch()
	});
	$.NewSearch = function() {
		if ($.validateSearchConditions() == false) {
			return
		}
		$.getParameters();
		post_header_num = "-50";
		$.ClearPost();
		$.SetLoadingStatus(true);
		$.GeneralLoad("new")
	};
	$(document).ready(function() {
	});
	var a = document.getElementById("loadmore-block");
	a.style.cursor = "pointer";
	a.onclick = function() {
		$.getParameters();
		post_header_num = "-40";
		$.SetLoadingStatus(true);
		$.GeneralLoad("more")
	};
	$.SwitchSelection = function(g, e, h) {
		var f = "";
		var d = "";
		if (g != "any") {
			f = "region-selection";
			d = g;
			if (h != "any") {
				f = "institute-selection";
				d = h
			}
		} else {
			f = "mrt-selection";
			d = e
		}
		$("a[href='#" + f + "']").tab("show");
		var b = $("#" + f).find("[id='" + d + "']");
		var c = "#" + $(b[0]).parent().parent().attr("id");
		$.TwoLevelHeaderClick($("[id='" + c + "']")[0]);
		$.TextSelectionItemClick(b[0])
	};
	$("#alert-button").click(function(b) {
		if (login_status == false) {
			$("#login_modal").modal("show");
			$("#login_modal_msg").text(login_modal_alert)
		} else {
			$.ShowAlertModal()
		}
	});
	$.CreateAlert = function() {
		$("#alert-error-msg-list").empty();
		var e = $(".frequency-select").val();
		var b = $("#alert-name").val();
		$.getParameters();
		if (b.length == 0) {
			var d = $("#error-msg-template").html();
			var c = d.format(alert_name_error_msg);
			$("#alert-error-msg-list").append(c);
			$("#alert-name").parent().addClass("has-error");
			return
		} else {
			$("#alert-name").parent().removeClass("has-error")
		}
		$("#alert_indicator").css("display", "inline");
		$("#alert_result_msg").removeClass("result-text-red");
		$("#alert_result_msg").removeClass("result-text-green");
		$("#alert_result_msg").text(alert_form_inprogress_str);
		$("#alert-creat-button").attr("disabled", "true");
		$
				.ajax({
					type : "POST",
					url : "/SA/alert/c",
					data : {
						region : region,
						mrt : mrt,
						min_price : min_price,
						max_price : max_price,
						is_negotiable : is_negotiable,
						term : term,
						is_share_type : is_share_type,
						period_minutes : e,
						is_common_type : is_common_type,
						is_master_type : is_master_type,
						is_unit_type : is_unit_type,
						is_other_type : is_other_type,
						user_type : user_type,
						language : language,
						alert_name : b
					},
					success : function(f) {
						$("#alert_indicator").css("display", "none");
						$("#alert-creat-button").attr("disabled", "false");
						if (f == "SCMD_PN_NEW_ERROR_OVERFLOW") {
							$("#alert_result_msg").removeClass(
									"result-text-green");
							$("#alert_result_msg").addClass("result-text-red");
							$("#alert_result_msg")
									.text(alert_form_overflow_str)
						} else {
							if (f == "SCMD_PN_NEW_SUCCEED") {
								$("#alert_result_msg").removeClass(
										"result-text-red");
								$("#alert_result_msg").addClass(
										"result-text-green");
								$("#alert_result_msg").text(
										alert_form_correct_str);
								setTimeout(function() {
									$("#alert_modal").modal("hide")
								}, 2000);
								$("#alert-badge").text(
										parseInt($("#alert-badge").text()) + 1)
							} else {
								$("#alert_result_msg").removeClass(
										"result-text-green");
								$("#alert_result_msg").addClass(
										"result-text-red");
								$("#alert_result_msg").text(unknown_error_str)
							}
						}
						$("#alert-creat-button").removeAttr("disabled")
					},
					async : true
				})
	};
	$("#alert-creat-button").click(function(b) {
		$.CreateAlert()
	});
	$(document).on(
			"shown.bs.tab",
			'a[data-toggle="tab"]',
			function(b) {
				if ($(b.target).attr("href") == "#booking-search") {
					$(".search-condition-row, .post-panel, .subscribe-div")
							.css("display", "none")
				} else {
					$(".search-condition-row, .post-panel, .subscribe-div")
							.css("display", "block")
				}
			});
	$.ShowAlertModal = function() {
		$("#alert_indicator").css("display", "none");
		$("#alert_result_msg").text("");
		$("#alert-error-msg-list").empty();
		$("#alert-name").parent().removeClass("has-error");
		var d = "";
		var b = "";
		var e = "";
		var f = "";
		var g = "";
		var c = "";
		d = $("div.two-level-selection-block.active").find(
				".two-level-selection-item-selected").text();
		d += "-"
				+ $(
						"div.two-level-selection-block.active .two-level-selection-pane-active")
						.find(".text-selection-item-selected").text();
		e = $("#min_rental").val() + "~" + $("#max_rental").val();
		if ($("#negotiable-checkbox").is(":checked")) {
			e += "(" + $("#label-negotiable").text() + ")"
		}
		b = $("div.text-selection-block.term-selection").find(
				".text-selection-item-selected").text();
		f = $("div.text-selection-block.house-type-selection").find(
				".text-selection-item-selected").text();
		g = $("div.text-selection-block.user-type-selection").find(
				".text-selection-item-selected").text();
		c = $("div.text-selection-block.post-language-selection").find(
				".text-selection-item-selected").text();
		$("#alert-modal-region-mrt").text(d);
		$("#alert-modal-term").text(b);
		$("#alert-modal-rental").text(e);
		$("#alert-modal-house-type").text(f);
		$("#alert-modal-user-type").text(g);
		$("#alert-modal-language").text(c);
		$("#alert-name").val(alert_name_str + d);
		$("#alert_modal").modal("show")
	}
});
$(function() {
	$.SwitchSelection("all-region-central", "any", "any");
	post_id = 2447314;
})
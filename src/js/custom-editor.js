  var formatPalette = ['h1', 'h2', 'h3', 'h4', 'h5', 'h6'];
  var headingPalette = $('.heading-palette');
 
  for (var i = 0; i < formatPalette.length; i++) {
	 headingPalette.append('<a href="#" onclick="formatDoc(\'formatblock\',\'<'+ formatPalette[i] + '>\');" style="color:#000;" class="palette-item">'+formatPalette[i]+'</a>');
  }


$(document).ready(function(){
	$('#fore-palette').ColorPicker({
		color: '#00ffff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			formatDoc('forecolor','#'+hex);
		}
	});
	$('#back-palette').ColorPicker({
		color: '#00ffff',
		onShow: function (colpkr) {
			$(colpkr).fadeIn(500);
			return false;
		},
		onHide: function (colpkr) {
			$(colpkr).fadeOut(500);
			return false;
		},
		onChange: function (hsb, hex, rgb) {
			formatDoc('backcolor','#'+hex);
		}
	});
});

var oDoc, sDefTxt;

function initDoc() {
  oDoc = document.getElementById("textBox");
  sDefTxt = oDoc.innerHTML;
  console.log(sDefTxt);
  if (document.compForm.switchMode.checked) { setDocMode(true); }
}
function SelectAll(id)
{
    document.getElementById(id).focus();
    document.getElementById(id).select();
}
function formatDoc(sCmd, sValue) {
  if (validateMode()) { document.execCommand(sCmd, false, sValue); oDoc.focus(); }
}

function validateMode() {
  if (!document.compForm.switchMode.checked) { return true ; }
  alert("Uncheck \"Show HTML\".");
  oDoc.focus();
  return false;
}

function setDocMode(bToSource) {
  var oContent;
  if (bToSource) {
    oContent = document.createTextNode(oDoc.innerHTML);
    oDoc.innerHTML = "";
    var oPre = document.createElement("pre");
    oDoc.contentEditable = false;
    oPre.id = "sourceText";
    oPre.contentEditable = true;
    oPre.appendChild(oContent);
    oDoc.appendChild(oPre);
  } else {
    if (document.all) {
      oDoc.innerHTML = oDoc.innerText;
    } else {
      oContent = document.createRange();
      oContent.selectNodeContents(oDoc.firstChild);
      oDoc.innerHTML = oContent.toString();
    }
    oDoc.contentEditable = true;
  }
  oDoc.focus();
}
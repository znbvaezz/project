!function(l){"function"==typeof define&&define.amd?define(["jquery","datatables.net","datatables.net-buttons"],function(t){return l(t,window,document)}):"object"==typeof exports?module.exports=function(t,e){return t||(t=window),e&&e.fn.dataTable||(e=require("datatables.net")(t,e).$),e.fn.dataTable.Buttons||require("datatables.net-buttons")(t,e),l(e,t,t.document)}:l(jQuery,window,document)}(function(v,r,i,w){"use strict";var n=v.fn.dataTable,a={version:"1.0.4-TableTools2",clients:{},moviePath:"",nextId:1,$:function(t){return"string"==typeof t&&(t=i.getElementById(t)),t.addClass||(t.hide=function(){this.style.display="none"},t.show=function(){this.style.display=""},t.addClass=function(t){this.removeClass(t),this.className+=" "+t},t.removeClass=function(t){this.className=this.className.replace(new RegExp("\\s*"+t+"\\s*")," ").replace(/^\s+/,"").replace(/\s+$/,"")},t.hasClass=function(t){return!!this.className.match(new RegExp("\\s*"+t+"\\s*"))}),t},setMoviePath:function(t){this.moviePath=t},dispatch:function(t,e,l){var o=this.clients[t];o&&o.receiveEvent(e,l)},log:function(t){console.log("Flash: "+t)},register:function(t,e){this.clients[t]=e},getDOMObjectPosition:function(t){var e={left:0,top:0,width:t.width?t.width:t.offsetWidth,height:t.height?t.height:t.offsetHeight};for(""!==t.style.width&&(e.width=t.style.width.replace("px","")),""!==t.style.height&&(e.height=t.style.height.replace("px",""));t;)e.left+=t.offsetLeft,e.top+=t.offsetTop,t=t.offsetParent;return e},Client:function(t){this.handlers={},this.id=a.nextId++,this.movieId="ZeroClipboard_TableToolsMovie_"+this.id,a.register(this.id,this),t&&this.glue(t)}};a.Client.prototype={id:0,ready:!1,movie:null,clipText:"",fileName:"",action:"copy",handCursorEnabled:!0,cssEffects:!0,handlers:null,sized:!1,sheetName:"",glue:function(t,e){this.domElement=a.$(t);var l=99;this.domElement.style.zIndex&&(l=parseInt(this.domElement.style.zIndex,10)+1);var o=a.getDOMObjectPosition(this.domElement);this.div=i.createElement("div");var n=this.div.style;n.position="absolute",n.left="0px",n.top="0px",n.width=o.width+"px",n.height=o.height+"px",n.zIndex=l,void 0!==e&&""!==e&&(this.div.title=e),0!==o.width&&0!==o.height&&(this.sized=!0),this.domElement&&(this.domElement.appendChild(this.div),this.div.innerHTML=this.getHTML(o.width,o.height).replace(/&/g,"&amp;"))},positionElement:function(){var t=a.getDOMObjectPosition(this.domElement),e=this.div.style;if(e.position="absolute",e.width=t.width+"px",e.height=t.height+"px",0!==t.width&&0!==t.height){this.sized=!0;var l=this.div.childNodes[0];l.width=t.width,l.height=t.height}},getHTML:function(t,e){var l="",o="id="+this.id+"&width="+t+"&height="+e;navigator.userAgent.match(/MSIE/)?l+='<object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="'+(location.href.match(/^https/i)?"https://":"http://")+'download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=10,0,0,0" width="'+t+'" height="'+e+'" id="'+this.movieId+'" align="middle"><param name="allowScriptAccess" value="always" /><param name="allowFullScreen" value="false" /><param name="movie" value="'+a.moviePath+'" /><param name="loop" value="false" /><param name="menu" value="false" /><param name="quality" value="best" /><param name="bgcolor" value="#ffffff" /><param name="flashvars" value="'+o+'"/><param name="wmode" value="transparent"/></object>':l+='<embed id="'+this.movieId+'" src="'+a.moviePath+'" loop="false" menu="false" quality="best" bgcolor="#ffffff" width="'+t+'" height="'+e+'" name="'+this.movieId+'" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="../www.macromedia.com/go/getflashplayer" flashvars="'+o+'" wmode="transparent" />';return l},hide:function(){this.div&&(this.div.style.left="-2000px")},show:function(){this.reposition()},destroy:function(){var l=this;this.domElement&&this.div&&(v(this.div).remove(),this.domElement=null,this.div=null,v.each(a.clients,function(t,e){e===l&&delete a.clients[t]}))},reposition:function(t){if(t&&(this.domElement=a.$(t),this.domElement||this.hide()),this.domElement&&this.div){var e=a.getDOMObjectPosition(this.domElement),l=this.div.style;l.left=e.left+"px",l.top=e.top+"px"}},clearText:function(){this.clipText="",this.ready&&this.movie.clearText()},appendText:function(t){this.clipText+=t,this.ready&&this.movie.appendText(t)},setText:function(t){this.clipText=t,this.ready&&this.movie.setText(t)},setFileName:function(t){this.fileName=t,this.ready&&this.movie.setFileName(t)},setSheetData:function(t){this.ready&&this.movie.setSheetData(JSON.stringify(t))},setAction:function(t){this.action=t,this.ready&&this.movie.setAction(t)},addEventListener:function(t,e){t=t.toString().toLowerCase().replace(/^on/,""),this.handlers[t]||(this.handlers[t]=[]),this.handlers[t].push(e)},setHandCursor:function(t){this.handCursorEnabled=t,this.ready&&this.movie.setHandCursor(t)},setCSSEffects:function(t){this.cssEffects=!!t},receiveEvent:function(t,e){var l;switch(t=t.toString().toLowerCase().replace(/^on/,"")){case"load":if(this.movie=i.getElementById(this.movieId),!this.movie)return l=this,void setTimeout(function(){l.receiveEvent("load",null)},1);if(!this.ready&&navigator.userAgent.match(/Firefox/)&&navigator.userAgent.match(/Windows/))return l=this,setTimeout(function(){l.receiveEvent("load",null)},100),void(this.ready=!0);this.ready=!0,this.movie.clearText(),this.movie.appendText(this.clipText),this.movie.setFileName(this.fileName),this.movie.setAction(this.action),this.movie.setHandCursor(this.handCursorEnabled);break;case"mouseover":this.domElement&&this.cssEffects&&this.recoverActive&&this.domElement.addClass("active");break;case"mouseout":this.domElement&&this.cssEffects&&(this.recoverActive=!1,this.domElement.hasClass("active")&&(this.domElement.removeClass("active"),this.recoverActive=!0));break;case"mousedown":this.domElement&&this.cssEffects&&this.domElement.addClass("active");break;case"mouseup":this.domElement&&this.cssEffects&&(this.domElement.removeClass("active"),this.recoverActive=!1)}if(this.handlers[t])for(var o=0,n=this.handlers[t].length;o<n;o++){var a=this.handlers[t][o];"function"==typeof a?a(this,e):"object"==typeof a&&2==a.length?a[0][a[1]](this,e):"string"==typeof a&&r[a](this,e)}}},a.hasFlash=function(){try{if(new ActiveXObject("ShockwaveFlash.ShockwaveFlash"))return!0}catch(t){if(navigator.mimeTypes&&navigator.mimeTypes["application/x-shockwave-flash"]!==w&&navigator.mimeTypes["application/x-shockwave-flash"].enabledPlugin)return!0}return!1},r.ZeroClipboard_TableTools=a;var s=function(t,e){e.attr("id");e.parents("html").length?t.glue(e[0],""):setTimeout(function(){s(t,e)},500)},B=function(t,e){var l=e.match(/[\s\S]{1,8192}/g)||[];t.clearText();for(var o=0,n=l.length;o<n;o++)t.appendText(l[o])},c=function(t){return t.newline?t.newline:navigator.userAgent.match(/Windows/)?"\r\n":"\n"},d=function(t,e){for(var l=c(e),o=t.buttons.exportData(e.exportOptions),n=e.fieldBoundary,a=e.fieldSeparator,r=new RegExp(n,"g"),i=e.escapeChar!==w?e.escapeChar:"\\",s=function(t){for(var e="",l=0,o=t.length;l<o;l++)0<l&&(e+=a),e+=n?n+(""+t[l]).replace(r,i+n)+n:t[l];return e},d=e.header?s(o.header)+l:"",p=e.footer&&o.footer?l+s(o.footer):"",m=[],f=0,h=o.body.length;f<h;f++)m.push(s(o.body[f]));return{str:d+m.join(l)+p,rows:m.length}},t={available:function(){return a.hasFlash()},init:function(e,l,o){a.moviePath=n.Buttons.swfPath;var t=new a.Client;t.setHandCursor(!0),t.addEventListener("mouseDown",function(t){o._fromFlash=!0,e.button(l[0]).trigger(),o._fromFlash=!1}),s(t,l),o._flash=t},destroy:function(t,e,l){l._flash.destroy()},fieldSeparator:",",fieldBoundary:'"',exportOptions:{},title:"*",messageTop:"*",messageBottom:"*",filename:"*",extension:".csv",header:!0,footer:!1};function C(t){for(var e="A".charCodeAt(0),l="Z".charCodeAt(0)-e+1,o="";0<=t;)o=String.fromCharCode(t%l+e)+o,t=Math.floor(t/l)-1;return o}function T(t,e,l){var o=t.createElement(e);return l&&(l.attr&&v(o).attr(l.attr),l.children&&v.each(l.children,function(t,e){o.appendChild(e)}),null!==l.text&&l.text!==w&&o.appendChild(t.createTextNode(l.text))),o}function E(t,e){var l,o,n,a=t.header[e].length;t.footer&&t.footer[e].length>a&&(a=t.footer[e].length);for(var r=0,i=t.body.length;r<i;r++){var s=t.body[r][e];if(-1!==(n=null!==s&&s!==w?s.toString():"").indexOf("\n")?((o=n.split("\n")).sort(function(t,e){return e.length-t.length}),l=o[0].length):l=n.length,a<l&&(a=l),40<a)return 52}return 6<(a*=1.3)?a:6}var k,S="";S=void 0===r.XMLSerializer?new function(){this.serializeToString=function(t){return t.xml}}:new XMLSerializer;var N={"_rels/.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="../schemas.openxmlformats.org/officeDocument/2006/relationships/officeDocument" Target="xl/workbook.xml"/></Relationships>',"xl/_rels/workbook.xml.rels":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Relationships xmlns="http://schemas.openxmlformats.org/package/2006/relationships"><Relationship Id="rId1" Type="../schemas.openxmlformats.org/officeDocument/2006/relationships/worksheet" Target="worksheets/sheet1.xml"/><Relationship Id="rId2" Type="../schemas.openxmlformats.org/officeDocument/2006/relationships/styles" Target="styles.xml"/></Relationships>',"[Content_Types].xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><Types xmlns="http://schemas.openxmlformats.org/package/2006/content-types"><Default Extension="xml" ContentType="application/xml" /><Default Extension="rels" ContentType="application/vnd.openxmlformats-package.relationships+xml" /><Default Extension="jpeg" ContentType="image/jpeg" /><Override PartName="../xl/workbook.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.sheet.main+xml" /><Override PartName="../xl/worksheets/sheet1.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.worksheet+xml" /><Override PartName="../xl/styles.xml" ContentType="application/vnd.openxmlformats-officedocument.spreadsheetml.styles+xml" /></Types>',"xl/workbook.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><workbook xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships"><fileVersion appName="xl" lastEdited="5" lowestEdited="5" rupBuild="24816"/><workbookPr showInkAnnotation="0" autoCompressPictures="0"/><bookViews><workbookView xWindow="0" yWindow="0" windowWidth="25600" windowHeight="19020" tabRatio="500"/></bookViews><sheets><sheet name="" sheetId="1" r:id="rId1"/></sheets></workbook>',"xl/worksheets/sheet1.xml":'<?xml version="1.0" encoding="UTF-8" standalone="yes"?><worksheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:r="http://schemas.openxmlformats.org/officeDocument/2006/relationships" xmlns:mc="../../../../../../schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="../../../../../../schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><sheetData/><mergeCells count="0"/></worksheet>',"xl/styles.xml":'<?xml version="1.0" encoding="UTF-8"?><styleSheet xmlns="http://schemas.openxmlformats.org/spreadsheetml/2006/main" xmlns:mc="http://schemas.openxmlformats.org/markup-compatibility/2006" mc:Ignorable="x14ac" xmlns:x14ac="../../../../../../schemas.microsoft.com/office/spreadsheetml/2009/9/ac"><numFmts count="6"><numFmt numFmtId="164" formatCode="#,##0.00_- [$$-45C]"/><numFmt numFmtId="165" formatCode="&quot;£&quot;#,##0.00"/><numFmt numFmtId="166" formatCode="[$€-2] #,##0.00"/><numFmt numFmtId="167" formatCode="0.0%"/><numFmt numFmtId="168" formatCode="#,##0;(#,##0)"/><numFmt numFmtId="169" formatCode="#,##0.00;(#,##0.00)"/></numFmts><fonts count="5" x14ac:knownFonts="1"><font><sz val="11" /><name val="Calibri" /></font><font><sz val="11" /><name val="Calibri" /><color rgb="FFFFFFFF" /></font><font><sz val="11" /><name val="Calibri" /><b /></font><font><sz val="11" /><name val="Calibri" /><i /></font><font><sz val="11" /><name val="Calibri" /><u /></font></fonts><fills count="6"><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="none" /></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD9D9D9" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="FFD99795" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6efce" /><bgColor indexed="64" /></patternFill></fill><fill><patternFill patternType="solid"><fgColor rgb="ffc6cfef" /><bgColor indexed="64" /></patternFill></fill></fills><borders count="2"><border><left /><right /><top /><bottom /><diagonal /></border><border diagonalUp="false" diagonalDown="false"><left style="thin"><color auto="1" /></left><right style="thin"><color auto="1" /></right><top style="thin"><color auto="1" /></top><bottom style="thin"><color auto="1" /></bottom><diagonal /></border></borders><cellStyleXfs count="1"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" /></cellStyleXfs><cellXfs count="61"><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="0" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="0" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="2" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="3" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="4" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="1" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="2" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="3" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="4" fillId="5" borderId="1" applyFont="1" applyFill="1" applyBorder="1"/><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="left"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="center"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="right"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment horizontal="fill"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment textRotation="90"/></xf><xf numFmtId="0" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyAlignment="1"><alignment wrapText="1"/></xf><xf numFmtId="9"   fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="164" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="165" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="166" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="167" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="168" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="169" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="3" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/><xf numFmtId="4" fontId="0" fillId="0" borderId="0" applyFont="1" applyFill="1" applyBorder="1" xfId="0" applyNumberFormat="1"/></cellXfs><cellStyles count="1"><cellStyle name="Normal" xfId="0" builtinId="0" /></cellStyles><dxfs count="0" /><tableStyles count="0" defaultTableStyle="TableStyleMedium9" defaultPivotStyle="PivotStyleMedium4" /></styleSheet>'},A=[{match:/^\-?\d+\.\d%$/,style:60,fmt:function(t){return t/100}},{match:/^\-?\d+\.?\d*%$/,style:56,fmt:function(t){return t/100}},{match:/^\-?\$[\d,]+.?\d*$/,style:57},{match:/^\-?£[\d,]+.?\d*$/,style:58},{match:/^\-?€[\d,]+.?\d*$/,style:59},{match:/^\([\d,]+\)$/,style:61,fmt:function(t){return-1*t.replace(/[\(\)]/g,"")}},{match:/^\([\d,]+\.\d{2}\)$/,style:62,fmt:function(t){return-1*t.replace(/[\(\)]/g,"")}},{match:/^[\d,]+$/,style:63},{match:/^[\d,]+\.\d{2}$/,style:64}];return n.Buttons.swfPath="../../../../../../cdn.datatables.net/buttons/"+n.Buttons.version+"/swf/flashExport.swf",n.Api.register("buttons.resize()",function(){v.each(a.clients,function(t,e){e.domElement!==w&&e.domElement.parentNode&&e.positionElement()})}),n.ext.buttons.copyFlash=v.extend({},t,{className:"buttons-copy buttons-flash",text:function(t){return t.i18n("buttons.copy","Copy")},action:function(t,e,l,o){if(o._fromFlash){this.processing(!0);var n=o._flash,a=d(e,o),r=e.buttons.exportInfo(o),i=c(o),s=a.str;r.title&&(s=r.title+i+i+s),r.messageTop&&(s=r.messageTop+i+i+s),r.messageBottom&&(s=s+i+i+r.messageBottom),o.customize&&(s=o.customize(s,o)),n.setAction("copy"),B(n,s),this.processing(!1),e.buttons.info(e.i18n("buttons.copyTitle","Copy to clipboard"),e.i18n("buttons.copySuccess",{_:"Copied %d rows to clipboard",1:"Copied 1 row to clipboard"},data.rows),3e3)}},fieldSeparator:"\t",fieldBoundary:""}),n.ext.buttons.csvFlash=v.extend({},t,{className:"buttons-csv buttons-flash",text:function(t){return t.i18n("buttons.csv","CSV")},action:function(t,e,l,o){var n=o._flash,a=d(e,o),r=o.customize?o.customize(a.str,o):a.str;n.setAction("csv"),n.setFileName(_filename(o)),B(n,r)},escapeChar:'"'}),n.ext.buttons.excelFlash=v.extend({},t,{className:"buttons-excel buttons-flash",text:function(t){return t.i18n("buttons.excel","Excel")},action:function(t,e,l,p){this.processing(!0);var m,f,o,n,a=p._flash,h=0,c=v.parseXML(N["xl/worksheets/sheet1.xml"]),u=c.getElementsByTagName("sheetData")[0],r={_rels:{".rels":v.parseXML(N["_rels/.rels"])},xl:{_rels:{"workbook.xml.rels":v.parseXML(N["xl/_rels/workbook.xml.rels"])},"workbook.xml":v.parseXML(N["xl/workbook.xml"]),"styles.xml":v.parseXML(N["xl/styles.xml"]),worksheets:{"sheet1.xml":c}},"[Content_Types].xml":v.parseXML(N["[Content_Types].xml"])},i=e.buttons.exportData(p.exportOptions),s=function(t){f=T(c,"row",{attr:{r:m=h+1}});for(var e=0,l=t.length;e<l;e++){var o=C(e)+""+m,n=null;if(null===t[e]||t[e]===w||""===t[e]){if(!0!==p.createEmptyCells)continue;t[e]=""}t[e]=v.trim(t[e]);for(var a=0,r=A.length;a<r;a++){var i=A[a];if(t[e].match&&!t[e].match(/^0\d+/)&&t[e].match(i.match)){var s=t[e].replace(/[^\d\.\-]/g,"");i.fmt&&(s=i.fmt(s)),n=T(c,"c",{attr:{r:o,s:i.style},children:[T(c,"v",{text:s})]});break}}if(!n)if("number"==typeof t[e]||t[e].match&&t[e].match(/^-?\d+(\.\d+)?$/)&&!t[e].match(/^0\d+/))n=T(c,"c",{attr:{t:"n",r:o},children:[T(c,"v",{text:t[e]})]});else{var d=t[e].replace?t[e].replace(/[\x00-\x09\x0B\x0C\x0E-\x1F\x7F-\x9F]/g,""):t[e];n=T(c,"c",{attr:{t:"inlineStr",r:o},children:{row:T(c,"is",{children:{row:T(c,"t",{text:d})}})}})}f.appendChild(n)}u.appendChild(f),h++};v("sheets sheet",r.xl["workbook.xml"]).attr("name",(n="Sheet1",(o=p).sheetName&&(n=o.sheetName.replace(/[\[\]\*\/\\\?\:]/g,"")),n)),p.customizeData&&p.customizeData(i);var d=function(t,e){var l=v("mergeCells",c);l[0].appendChild(T(c,"mergeCell",{attr:{ref:"A"+t+":"+C(e)+t}})),l.attr("count",l.attr("count")+1),v("row:eq("+(t-1)+") c",c).attr("s","51")},y=e.buttons.exportInfo(p);y.title&&(s([y.title]),d(h,i.header.length-1)),y.messageTop&&(s([y.messageTop]),d(h,i.header.length-1)),p.header&&(s(i.header),v("row:last c",c).attr("s","2"));for(var I=0,x=i.body.length;I<x;I++)s(i.body[I]);p.footer&&i.footer&&(s(i.footer),v("row:last c",c).attr("s","2")),y.messageBottom&&(s([y.messageBottom]),d(h,i.header.length-1));var F=T(c,"cols");v("worksheet",c).prepend(F);for(var b=0,g=i.header.length;b<g;b++)F.appendChild(T(c,"col",{attr:{min:b+1,max:b+1,width:E(i,b),customWidth:1}}));p.customize&&p.customize(r),function p(m){k===w&&(k=-1===S.serializeToString(v.parseXML(N["xl/worksheets/sheet1.xml"])).indexOf("xmlns:r")),v.each(m,function(t,e){if(v.isPlainObject(e))p(e);else{if(k){var l,o,n=e.childNodes[0],a=[];for(l=n.attributes.length-1;0<=l;l--){var r=n.attributes[l].nodeName,i=n.attributes[l].nodeValue;-1!==r.indexOf(":")&&(a.push({name:r,value:i}),n.removeAttribute(r))}for(l=0,o=a.length;l<o;l++){var s=e.createAttribute(a[l].name.replace(":","_dt_b_namespace_token_"));s.value=a[l].value,n.setAttributeNode(s)}}var d=S.serializeToString(e);k&&(-1===d.indexOf("<?xml")&&(d='<?xml version="1.0" encoding="UTF-8" standalone="yes"?>'+d),d=d.replace(/_dt_b_namespace_token_/g,":")),d=d.replace(/<([^<>]*?) xmlns=""([^<>]*?)>/g,"<$1 $2>"),m[t]=d}})}(r),a.setAction("excel"),a.setFileName(y.filename),a.setSheetData(r),B(a,""),this.processing(!1)},extension:".xlsx",createEmptyCells:!1}),n.ext.buttons.pdfFlash=v.extend({},t,{className:"buttons-pdf buttons-flash",text:function(t){return t.i18n("buttons.pdf","PDF")},action:function(t,e,l,o){this.processing(!0);var n=o._flash,a=e.buttons.exportData(o.exportOptions),r=e.buttons.exportInfo(o),i=e.table().node().offsetWidth,s=e.columns(o.columns).indexes().map(function(t){return e.column(t).header().offsetWidth/i});n.setAction("pdf"),n.setFileName(r.filename),B(n,JSON.stringify({title:r.title||"",messageTop:r.messageTop||"",messageBottom:r.messageBottom||"",colWidth:s.toArray(),orientation:o.orientation,size:o.pageSize,header:o.header?a.header:null,footer:o.footer?a.footer:null,body:a.body})),this.processing(!1)},extension:".pdf",orientation:"portrait",pageSize:"A4",newline:"\n"}),n.Buttons});
!function(e,t){"function"==typeof define&&define.amd?define([],t):"object"==typeof exports?module.exports=t():e.sortable=t()}(this,function(){"use strict";var x,w,I=[],C=[],A=function(e,t,n){if(void 0===n)return e&&e.h5s&&e.h5s.data&&e.h5s.data[t];e.h5s=e.h5s||{},e.h5s.data=e.h5s.data||{},e.h5s.data[t]=n},S=function(e,t){return(e.matches||e.matchesSelector||e.msMatchesSelector||e.mozMatchesSelector||e.webkitMatchesSelector||e.oMatchesSelector).call(e,t)},D=function(e,t){if(!t)return Array.prototype.slice.call(e);for(var n=[],r=0;r<e.length;++r)"string"==typeof t&&S(e[r],t)&&n.push(e[r]),-1!==t.indexOf(e[r])&&n.push(e[r]);return n},L=function(e,t,n){if(e instanceof Array)for(var r=0;r<e.length;++r)L(e[r],t,n);else e.addEventListener(t,n),e.h5s=e.h5s||{},e.h5s.events=e.h5s.events||{},e.h5s.events[t]=n},O=function(e,t){if(e instanceof Array)for(var n=0;n<e.length;++n)O(e[n],t);else e.h5s&&e.h5s.events&&e.h5s.events[t]&&(e.removeEventListener(t,e.h5s.events[t]),delete e.h5s.events[t])},T=function(e,t,n){if(e instanceof Array)for(var r=0;r<e.length;++r)T(e[r],t,n);else e.setAttribute(t,n)},s=function(e,t){if(e instanceof Array)for(var n=0;n<e.length;++n)s(e[n],t);else e.removeAttribute(t)},W=function(e){var t=e.getClientRects()[0];return{left:t.left+window.scrollX,top:t.top+window.scrollY}},M=function(e){O(e,"dragstart"),O(e,"dragend"),O(e,"selectstart"),O(e,"dragover"),O(e,"dragenter"),O(e,"drop")},N=function(e){O(e,"dragover"),O(e,"dragenter"),O(e,"drop")},P=function(e,t){var n,r,a,i,o={draggedItem:t};n=e,(r=o).x||(r.x=parseInt(n.pageX-W(r.draggedItem).left)),r.y||(r.y=parseInt(n.pageY-W(r.draggedItem).top)),i=o=r,(a=e).dataTransfer.effectAllowed="move",a.dataTransfer.setData("text","arbitrary-content"),a.dataTransfer.setDragImage&&a.dataTransfer.setDragImage(i.draggedItem,i.x,i.y)},_=function(e,t){return e===t||void 0!==A(e,"connectWith")&&A(e,"connectWith")===A(t,"connectWith")},z=function(e,t){var n,r=[];if(!t)return e;for(var a=0;a<e.length;++a)n=e[a].querySelectorAll(t),r=r.concat(Array.prototype.slice.call(n));return r},t=function(e){var t,n,r,a=A(e,"opts")||{},i=D(H(e),a.items),o=z(i,a.handle);N(e),(n=t=e).h5s&&delete n.h5s.data,s(t,"aria-dropeffect"),O(o,"mousedown"),M(i),s(r=i,"aria-grabbed"),s(r,"draggable"),s(r,"role")},Y=function(e){var t=A(e,"opts"),n=D(H(e),t.items),r=z(n,t.handle);T(e,"aria-dropeffect","move"),A(e,"_disabled","false"),T(r,"draggable","true"),"function"!=typeof(document||window.document).createElement("span").dragDrop||t.disableIEFix||L(r,"mousedown",function(){if(-1!==n.indexOf(this))this.dragDrop();else{for(var e=this.parentElement;-1===n.indexOf(e);)e=e.parentElement;e.dragDrop()}})},q=function(e){return e.parentElement?Array.prototype.indexOf.call(e.parentElement.children,e):0},B=function(e){return!!e.parentNode},F=function(e,t){e.parentElement.insertBefore(t,e.nextElementSibling)},X=function(e){e.parentNode&&e.parentNode.removeChild(e)},j=function(e,t){var n=document.createEvent("Event");return t&&(n.detail=t),n.initEvent(e,!1,!0),n},k=function(t,n){C.forEach(function(e){_(t,e)&&e.dispatchEvent(n)})};var H=function(e){return e.children},R=function(e){return D(H(e),A(e,"items"))},$=function(e,b){var E=String(b);if((b=function(e){var t={connectWith:!1,placeholder:null,disableIEFix:!1,placeholderClass:"sortable-placeholder",draggingClass:"sortable-dragging",hoverClass:!1,debounce:0,maxItems:0};for(var n in e)t[n]=e[n];return t}(b))&&"function"==typeof b.getChildren&&(H=b.getChildren),"string"==typeof e&&(e=document.querySelectorAll(e)),e instanceof window.Element&&(e=[e]),e=Array.prototype.slice.call(e),/serialize/.test(E)){var t=[];return e.forEach(function(e){t.push({list:e,children:R(e)})}),t}return e.forEach(function(n){if(/enable|disable|destroy/.test(E))return $[E](n);var e,t,r,a;b=A(n,"opts")||b,A(n,"opts",b),t=A(e=n,"opts"),r=D(H(e),t.items),a=z(r,t.handle),A(e,"_disabled","false"),M(r),O(a,"mousedown"),N(e);var i,o,s,l,d=D(H(n),b.items),c=b.placeholder;if(c||(c=document.createElement(/^ul|ol$/i.test(n.tagName)?"li":"div")),(c=function(e,t){if("string"!=typeof e)return e;var n=document.createElement(t);return n.innerHTML=e,n.firstChild}(c,n.tagName)).classList.add.apply(c.classList,b.placeholderClass.split(" ")),!n.getAttribute("data-sortable-id")){var f=C.length;C[f]=n,T(n,"data-sortable-id",f),T(d,"data-item-sortable-id",f)}if(A(n,"items",b.items),I.push(c),b.connectWith&&A(n,"connectWith",b.connectWith),Y(n),T(d,"role","option"),T(d,"aria-grabbed","false"),b.hoverClass){var u="sortable-over";"string"==typeof b.hoverClass&&(u=b.hoverClass),L(d,"mouseenter",function(){this.classList.add(u)}),L(d,"mouseleave",function(){this.classList.remove(u)})}b.maxItems&&"number"==typeof b.maxItems&&(l=b.maxItems),L(d,"dragstart",function(e){e.stopImmediatePropagation(),b.handle&&!S(e.target,b.handle)||"false"===this.getAttribute("draggable")||(P(e,this),this.classList.add(b.draggingClass),T(x=this,"aria-grabbed","true"),i=q(x),w=parseInt(window.getComputedStyle(x).height),o=this.parentElement,s=R(o),k(n,j("sortstart",{item:x,placeholder:c,startparent:o})))}),L(d,"dragend",function(){var e;x&&(x.classList.remove(b.draggingClass),T(x,"aria-grabbed","false"),x.style.display=x.oldDisplay,delete x.oldDisplay,I.forEach(X),e=this.parentElement,k(n,j("sortstop",{item:x,startparent:o})),i===q(x)&&o===e||k(n,j("sortupdate",{item:x,index:D(H(e),A(e,"items")).indexOf(x),oldindex:d.indexOf(x),elementIndex:q(x),oldElementIndex:i,startparent:o,endparent:e,newEndList:R(e),newStartList:R(o),oldStartList:s})),w=x=null)}),L([n,c],"drop",function(e){var t;_(n,x.parentElement)&&(e.preventDefault(),e.stopPropagation(),t=I.filter(B)[0],F(t,x),x.dispatchEvent(j("dragend")))});var p,h,g,m,v=(p=function(e,t){var n,r;if(x)if(-1!==d.indexOf(e)){var a=parseInt(window.getComputedStyle(e).height),i=q(c),o=q(e);if(b.forcePlaceholderSize&&(c.style.height=w+"px"),w<a){var s=a-w,l=W(e).top;if(i<o&&t<l+s)return;if(o<i&&l+a-s<t)return}void 0===x.oldDisplay&&(x.oldDisplay=x.style.display),"none"!==x.style.display&&(x.style.display="none"),i<o?F(e,c):(r=c,(n=e).parentElement.insertBefore(r,n)),I.filter(function(e){return e!==c}).forEach(X)}else-1!==I.indexOf(e)||D(H(e),b.items).length||(I.forEach(X),e.appendChild(c))},h=b.debounce,m=null,0===h?p:function(){var e=g||this,t=arguments;clearTimeout(m),m=setTimeout(function(){p.apply(e,t)},h)}),y=function(e){x&&_(n,x.parentElement)&&"true"!==A(n,"_disabled")&&(l&&D(H(n),A(n,"items")).length>=l||(e.preventDefault(),e.stopPropagation(),e.dataTransfer.dropEffect="move",v(this,e.pageY)))};L(d.concat(n),"dragover",y),L(d.concat(n),"dragenter",y)}),e};return $.destroy=function(e){t(e)},$.enable=function(e){Y(e)},$.disable=function(e){var t,n,r,a;n=A(t=e,"opts"),r=D(H(t),n.items),a=z(r,n.handle),T(t,"aria-dropeffect","none"),A(t,"_disabled","true"),T(a,"draggable","false"),O(a,"mousedown")},$});
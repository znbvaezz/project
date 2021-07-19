!function(n){"function"==typeof define&&define.amd?define(["jquery","datatables.net"],function(t){return n(t,window,document)}):"object"==typeof exports?module.exports=function(t,e){return t||(t=window),e&&e.fn.dataTable||(e=require("datatables.net")(t,e).$),n(e,t,t.document)}:n(jQuery,window,document)}(function(f,p,o,h){"use strict";var r=f.fn.dataTable,s=function(t,e){if(!r.versionCheck||!r.versionCheck("1.10.10"))throw"DataTables Responsive requires DataTables 1.10.10 or newer";this.s={dt:new r.Api(t),columns:[],current:[]},this.s.dt.settings()[0].responsive||(e&&"string"==typeof e.details?e.details={type:e.details}:e&&!1===e.details?e.details={type:!1}:e&&!0===e.details&&(e.details={type:"inline"}),this.c=f.extend(!0,{},s.defaults,r.defaults.responsive,e),(t.responsive=this)._constructor())};f.extend(s.prototype,{_constructor:function(){var s=this,i=this.s.dt,t=i.settings()[0],e=f(p).width();i.settings()[0]._responsive=this,f(p).on("resize.dtr orientationchange.dtr",r.util.throttle(function(){var t=f(p).width();t!==e&&(s._resize(),e=t)})),t.oApi._fnCallbackReg(t,"aoRowCreatedCallback",function(t,e,n){-1!==f.inArray(!1,s.s.current)&&f(">td, >th",t).each(function(t){var e=i.column.index("toData",t);!1===s.s.current[e]&&f(this).css("display","none")})}),i.on("destroy.dtr",function(){i.off(".dtr"),f(i.table().body()).off(".dtr"),f(p).off("resize.dtr orientationchange.dtr"),f.each(s.s.current,function(t,e){!1===e&&s._setColumnVis(t,!0)})}),this.c.breakpoints.sort(function(t,e){return t.width<e.width?1:t.width>e.width?-1:0}),this._classLogic(),this._resizeAuto();var n=this.c.details;!1!==n.type&&(s._detailsInit(),i.on("column-visibility.dtr",function(t,e,n,i,r){r&&(s._classLogic(),s._resizeAuto(),s._resize())}),i.on("draw.dtr",function(){s._redrawChildren()}),f(i.table().node()).addClass("dtr-"+n.type)),i.on("column-reorder.dtr",function(t,e,n){s._classLogic(),s._resizeAuto(),s._resize()}),i.on("column-sizing.dtr",function(){s._resizeAuto(),s._resize()}),i.on("preXhr.dtr",function(){var t=[];i.rows().every(function(){this.child.isShown()&&t.push(this.id(!0))}),i.one("draw.dtr",function(){s._resizeAuto(),s._resize(),i.rows(t).every(function(){s._detailsDisplay(this,!1)})})}),i.on("init.dtr",function(t,e,n){s._resizeAuto(),s._resize(),f.inArray(!1,s.s.current)&&i.columns.adjust()}),this._resize()},_columnsVisiblity:function(e){var t,n,i=this.s.dt,r=this.s.columns,s=r.map(function(t,e){return{columnIdx:e,priority:t.priority}}).sort(function(t,e){return t.priority!==e.priority?t.priority-e.priority:t.columnIdx-e.columnIdx}),o=f.map(r,function(t){return(!t.auto||null!==t.minWidth)&&(!0===t.auto?"-":-1!==f.inArray(e,t.includeIn))}),a=0;for(t=0,n=o.length;t<n;t++)!0===o[t]&&(a+=r[t].minWidth);var d=i.settings()[0].oScroll,l=d.sY||d.sX?d.iBarWidth:0,c=i.table().container().offsetWidth-l-a;for(t=0,n=o.length;t<n;t++)r[t].control&&(c-=r[t].minWidth);var u=!1;for(t=0,n=s.length;t<n;t++){var h=s[t].columnIdx;"-"===o[h]&&!r[h].control&&r[h].minWidth&&(u||c-r[h].minWidth<0?(u=!0,o[h]=!1):o[h]=!0,c-=r[h].minWidth)}var p=!1;for(t=0,n=r.length;t<n;t++)if(!r[t].control&&!r[t].never&&!o[t]){p=!0;break}for(t=0,n=r.length;t<n;t++)r[t].control&&(o[t]=p);return-1===f.inArray(!0,o)&&(o[0]=!0),o},_classLogic:function(){var a=this,d=this.c.breakpoints,s=this.s.dt,l=s.columns().eq(0).map(function(t){var e=this.column(t),n=e.header().className,i=s.settings()[0].aoColumns[t].responsivePriority;if(i===h){var r=f(e.header()).data("priority");i=r!==h?1*r:1e4}return{className:n,includeIn:[],auto:!1,control:!1,never:!!n.match(/\bnever\b/),priority:i}}),c=function(t,e){var n=l[t].includeIn;-1===f.inArray(e,n)&&n.push(e)},u=function(t,e,n,i){var r,s,o;if(n){if("max-"===n)for(r=a._find(e).width,s=0,o=d.length;s<o;s++)d[s].width<=r&&c(t,d[s].name);else if("min-"===n)for(r=a._find(e).width,s=0,o=d.length;s<o;s++)d[s].width>=r&&c(t,d[s].name);else if("not-"===n)for(s=0,o=d.length;s<o;s++)-1===d[s].name.indexOf(i)&&c(t,d[s].name)}else l[t].includeIn.push(e)};l.each(function(t,s){for(var e=t.className.split(" "),o=!1,n=0,i=e.length;n<i;n++){var a=f.trim(e[n]);if("all"===a)return o=!0,void(t.includeIn=f.map(d,function(t){return t.name}));if("none"===a||t.never)return void(o=!0);if("control"===a)return o=!0,void(t.control=!0);f.each(d,function(t,e){var n=e.name.split("-"),i=new RegExp("(min\\-|max\\-|not\\-)?("+n[0]+")(\\-[_a-zA-Z0-9])?"),r=a.match(i);r&&(o=!0,r[2]===n[0]&&r[3]==="-"+n[1]?u(s,e.name,r[1],r[2]+r[3]):r[2]!==n[0]||r[3]||u(s,e.name,r[1],r[2]))})}o||(t.auto=!0)}),this.s.columns=l},_detailsDisplay:function(t,e){var n=this,i=this.s.dt,r=this.c.details;if(r&&!1!==r.type){var s=r.display(t,e,function(){return r.renderer(i,t[0],n._detailsObj(t[0]))});!0!==s&&!1!==s||f(i.table().node()).triggerHandler("responsive-display.dt",[i,t,s,e])}},_detailsInit:function(){var i=this,r=this.s.dt,t=this.c.details;"inline"===t.type&&(t.target="td:first-child, th:first-child"),r.on("draw.dtr",function(){i._tabIndexes()}),i._tabIndexes(),f(r.table().body()).on("keyup.dtr","td, th",function(t){13===t.keyCode&&f(this).data("dtr-keyboard")&&f(this).click()});var s=t.target,e="string"==typeof s?s:"td, th";f(r.table().body()).on("click.dtr mousedown.dtr mouseup.dtr",e,function(t){if(f(r.table().node()).hasClass("collapsed")&&-1!==f.inArray(f(this).closest("tr").get(0),r.rows().nodes().toArray())){if("number"==typeof s){var e=s<0?r.columns().eq(0).length+s:s;if(r.cell(this).index().column!==e)return}var n=r.row(f(this).closest("tr"));"click"===t.type?i._detailsDisplay(n,!1):"mousedown"===t.type?f(this).css("outline","none"):"mouseup"===t.type&&f(this).blur().css("outline","")}})},_detailsObj:function(n){var i=this,r=this.s.dt;return f.map(this.s.columns,function(t,e){if(!t.never&&!t.control)return{title:r.settings()[0].aoColumns[e].sTitle,data:r.cell(n,e).render(i.c.orthogonal),hidden:r.column(e).visible()&&!i.s.current[e],columnIndex:e,rowIndex:n}})},_find:function(t){for(var e=this.c.breakpoints,n=0,i=e.length;n<i;n++)if(e[n].name===t)return e[n]},_redrawChildren:function(){var n=this,i=this.s.dt;i.rows({page:"current"}).iterator("row",function(t,e){i.row(e);n._detailsDisplay(i.row(e),!0)})},_resize:function(){var t,e,n=this,i=this.s.dt,r=f(p).width(),s=this.c.breakpoints,o=s[0].name,a=this.s.columns,d=this.s.current.slice();for(t=s.length-1;0<=t;t--)if(r<=s[t].width){o=s[t].name;break}var l=this._columnsVisiblity(o);this.s.current=l;var c=!1;for(t=0,e=a.length;t<e;t++)if(!1===l[t]&&!a[t].never&&!a[t].control){c=!0;break}f(i.table().node()).toggleClass("collapsed",c);var u=!1,h=0;i.columns().eq(0).each(function(t,e){!0===l[e]&&h++,l[e]!==d[e]&&(u=!0,n._setColumnVis(t,l[e]))}),u&&(this._redrawChildren(),f(i.table().node()).trigger("responsive-resize.dt",[i,this.s.current]),0===i.page.info().recordsDisplay&&f("td",i.table().body()).eq(0).attr("colspan",h))},_resizeAuto:function(){var n=this.s.dt,i=this.s.columns;if(this.c.auto&&-1!==f.inArray(!0,f.map(i,function(t){return t.auto}))){f.isEmptyObject(u)||f.each(u,function(t){var e=t.split("-");c(n,1*e[0],1*e[1])});n.table().node().offsetWidth,n.columns;var t=n.table().node().cloneNode(!1),e=f(n.table().header().cloneNode(!1)).appendTo(t),r=f(n.table().body()).clone(!1,!1).empty().appendTo(t),s=n.columns().header().filter(function(t){return n.column(t).visible()}).to$().clone(!1).css("display","table-cell").css("min-width",0);f(r).append(f(n.rows({page:"current"}).nodes()).clone(!1)).find("th, td").css("display","");var o=n.table().footer();if(o){var a=f(o.cloneNode(!1)).appendTo(t),d=n.columns().footer().filter(function(t){return n.column(t).visible()}).to$().clone(!1).css("display","table-cell");f("<tr/>").append(d).appendTo(a)}f("<tr/>").append(s).appendTo(e),"inline"===this.c.details.type&&f(t).addClass("dtr-inline collapsed"),f(t).find("[name]").removeAttr("name");var l=f("<div/>").css({width:1,height:1,overflow:"hidden",clear:"both"}).append(t);l.insertBefore(n.table().node()),s.each(function(t){var e=n.column.index("fromVisible",t);i[e].minWidth=this.offsetWidth||0}),l.remove()}},_setColumnVis:function(t,e){var n=this.s.dt,i=e?"":"none";f(n.column(t).header()).css("display",i),f(n.column(t).footer()).css("display",i),n.column(t).nodes().to$().css("display",i),f.isEmptyObject(u)||n.cells(null,t).indexes().each(function(t){c(n,t.row,t.column)})},_tabIndexes:function(){var t=this.s.dt,e=t.cells({page:"current"}).nodes().to$(),n=t.settings()[0],i=this.c.details.target;e.filter("[data-dtr-keyboard]").removeData("[data-dtr-keyboard]");var r="number"==typeof i?":eq("+i+")":i;"td:first-child, th:first-child"===r&&(r=">td:first-child, >th:first-child"),f(r,t.rows({page:"current"}).nodes()).attr("tabIndex",n.iTabIndex).data("dtr-keyboard",1)}}),s.breakpoints=[{name:"desktop",width:1/0},{name:"tablet-l",width:1024},{name:"tablet-p",width:768},{name:"mobile-l",width:480},{name:"mobile-p",width:320}],s.display={childRow:function(t,e,n){return e?f(t.node()).hasClass("parent")?(t.child(n(),"child").show(),!0):void 0:t.child.isShown()?(t.child(!1),f(t.node()).removeClass("parent"),!1):(t.child(n(),"child").show(),f(t.node()).addClass("parent"),!0)},childRowImmediate:function(t,e,n){return!e&&t.child.isShown()||!t.responsive.hasHidden()?(t.child(!1),f(t.node()).removeClass("parent"),!1):(t.child(n(),"child").show(),f(t.node()).addClass("parent"),!0)},modal:function(s){return function(t,e,n){if(e)f("div.dtr-modal-content").empty().append(n());else{var i=function(){r.remove(),f(o).off("keypress.dtr")},r=f('<div class="dtr-modal"/>').append(f('<div class="dtr-modal-display"/>').append(f('<div class="dtr-modal-content"/>').append(n())).append(f('<div class="dtr-modal-close">&times;</div>').click(function(){i()}))).append(f('<div class="dtr-modal-background"/>').click(function(){i()})).appendTo("body");f(o).on("keyup.dtr",function(t){27===t.keyCode&&(t.stopPropagation(),i())})}s&&s.header&&f("div.dtr-modal-content").prepend("<h2>"+s.header(t)+"</h2>")}}};var u={};function c(t,e,n){var i=e+"-"+n;if(u[i]){for(var r=t.cell(e,n).node(),s=u[i][0].parentNode.childNodes,o=[],a=0,d=s.length;a<d;a++)o.push(s[a]);for(var l=0,c=o.length;l<c;l++)r.appendChild(o[l]);u[i]=h}}s.renderer={listHiddenNodes:function(){return function(n,t,e){var i=f('<ul data-dtr-index="'+t+'" class="dtr-details"/>'),r=!1;f.each(e,function(t,e){e.hidden&&(f('<li data-dtr-index="'+e.columnIndex+'" data-dt-row="'+e.rowIndex+'" data-dt-column="'+e.columnIndex+'"><span class="dtr-title">'+e.title+"</span> </li>").append(f('<span class="dtr-data"/>').append(function(t,e,n){var i=e+"-"+n;if(u[i])return u[i];for(var r=[],s=t.cell(e,n).node().childNodes,o=0,a=s.length;o<a;o++)r.push(s[o]);return u[i]=r}(n,e.rowIndex,e.columnIndex))).appendTo(i),r=!0)});return!!r&&i}},listHidden:function(){return function(t,e,n){var i=f.map(n,function(t){return t.hidden?'<li data-dtr-index="'+t.columnIndex+'" data-dt-row="'+t.rowIndex+'" data-dt-column="'+t.columnIndex+'"><span class="dtr-title">'+t.title+'</span> <span class="dtr-data">'+t.data+"</span></li>":""}).join("");return!!i&&f('<ul data-dtr-index="'+e+'" class="dtr-details"/>').append(i)}},tableAll:function(r){return r=f.extend({tableClass:""},r),function(t,e,n){var i=f.map(n,function(t){return'<tr data-dt-row="'+t.rowIndex+'" data-dt-column="'+t.columnIndex+'"><td>'+t.title+":</td> <td>"+t.data+"</td></tr>"}).join("");return f('<table class="'+r.tableClass+' dtr-details" width="100%"/>').append(i)}}},s.defaults={breakpoints:s.breakpoints,auto:!0,details:{display:s.display.childRow,renderer:s.renderer.listHidden(),target:0,type:"inline"},orthogonal:"display"};var t=f.fn.dataTable.Api;return t.register("responsive()",function(){return this}),t.register("responsive.index()",function(t){return{column:(t=f(t)).data("dtr-index"),row:t.parent().data("dtr-index")}}),t.register("responsive.rebuild()",function(){return this.iterator("table",function(t){t._responsive&&t._responsive._classLogic()})}),t.register("responsive.recalc()",function(){return this.iterator("table",function(t){t._responsive&&(t._responsive._resizeAuto(),t._responsive._resize())})}),t.register("responsive.hasHidden()",function(){var t=this.context[0];return!!t._responsive&&-1!==f.inArray(!1,t._responsive.s.current)}),t.registerPlural("columns().responsiveHidden()","column().responsiveHidden()",function(){return this.iterator("column",function(t,e){return!!t._responsive&&t._responsive.s.current[e]},1)}),s.version="2.2.1-dev",f.fn.dataTable.Responsive=s,f.fn.DataTable.Responsive=s,f(o).on("preInit.dt.dtr",function(t,e,n){if("dt"===t.namespace&&(f(e.nTable).hasClass("responsive")||f(e.nTable).hasClass("dt-responsive")||e.oInit.responsive||r.defaults.responsive)){var i=e.oInit.responsive;!1!==i&&new s(e,f.isPlainObject(i)?i:{})}}),s});
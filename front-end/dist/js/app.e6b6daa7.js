(function(e){function t(t){for(var a,r,c=t[0],u=t[1],l=t[2],s=0,d=[];s<c.length;s++)r=c[s],Object.prototype.hasOwnProperty.call(o,r)&&o[r]&&d.push(o[r][0]),o[r]=0;for(a in u)Object.prototype.hasOwnProperty.call(u,a)&&(e[a]=u[a]);f&&f(t);while(d.length)d.shift()();return i.push.apply(i,l||[]),n()}function n(){for(var e,t=0;t<i.length;t++){for(var n=i[t],a=!0,r=1;r<n.length;r++){var c=n[r];0!==o[c]&&(a=!1)}a&&(i.splice(t--,1),e=u(u.s=n[0]))}return e}var a={},r={app:0},o={app:0},i=[];function c(e){return u.p+"js/"+({}[e]||e)+"."+{"chunk-1ff03810":"051daf82","chunk-08d2e2d7":"14566b5a","chunk-28a68124":"e6eaac17","chunk-e07f6816":"b60b624d","chunk-23777429":"cc9a4202","chunk-155c4c60":"c3d10946","chunk-2d3dffb0":"6c323cad","chunk-60e63fe2":"9e5e3e73","chunk-2d2082ec":"5201e8e7","chunk-6e0d5090":"2fd898ec"}[e]+".js"}function u(t){if(a[t])return a[t].exports;var n=a[t]={i:t,l:!1,exports:{}};return e[t].call(n.exports,n,n.exports,u),n.l=!0,n.exports}u.e=function(e){var t=[],n={"chunk-1ff03810":1,"chunk-08d2e2d7":1,"chunk-28a68124":1,"chunk-e07f6816":1,"chunk-23777429":1,"chunk-155c4c60":1,"chunk-2d3dffb0":1,"chunk-60e63fe2":1,"chunk-6e0d5090":1};r[e]?t.push(r[e]):0!==r[e]&&n[e]&&t.push(r[e]=new Promise((function(t,n){for(var a="css/"+({}[e]||e)+"."+{"chunk-1ff03810":"6996d583","chunk-08d2e2d7":"26ce2a45","chunk-28a68124":"00507849","chunk-e07f6816":"701fefe9","chunk-23777429":"a5e8530b","chunk-155c4c60":"85a62f4e","chunk-2d3dffb0":"50c1f813","chunk-60e63fe2":"ea80b38f","chunk-2d2082ec":"31d6cfe0","chunk-6e0d5090":"2451dc80"}[e]+".css",o=u.p+a,i=document.getElementsByTagName("link"),c=0;c<i.length;c++){var l=i[c],s=l.getAttribute("data-href")||l.getAttribute("href");if("stylesheet"===l.rel&&(s===a||s===o))return t()}var d=document.getElementsByTagName("style");for(c=0;c<d.length;c++){l=d[c],s=l.getAttribute("data-href");if(s===a||s===o)return t()}var f=document.createElement("link");f.rel="stylesheet",f.type="text/css",f.onload=t,f.onerror=function(t){var a=t&&t.target&&t.target.src||o,i=new Error("Loading CSS chunk "+e+" failed.\n("+a+")");i.code="CSS_CHUNK_LOAD_FAILED",i.request=a,delete r[e],f.parentNode.removeChild(f),n(i)},f.href=o;var h=document.getElementsByTagName("head")[0];h.appendChild(f)})).then((function(){r[e]=0})));var a=o[e];if(0!==a)if(a)t.push(a[2]);else{var i=new Promise((function(t,n){a=o[e]=[t,n]}));t.push(a[2]=i);var l,s=document.createElement("script");s.charset="utf-8",s.timeout=120,u.nc&&s.setAttribute("nonce",u.nc),s.src=c(e);var d=new Error;l=function(t){s.onerror=s.onload=null,clearTimeout(f);var n=o[e];if(0!==n){if(n){var a=t&&("load"===t.type?"missing":t.type),r=t&&t.target&&t.target.src;d.message="Loading chunk "+e+" failed.\n("+a+": "+r+")",d.name="ChunkLoadError",d.type=a,d.request=r,n[1](d)}o[e]=void 0}};var f=setTimeout((function(){l({type:"timeout",target:s})}),12e4);s.onerror=s.onload=l,document.head.appendChild(s)}return Promise.all(t)},u.m=e,u.c=a,u.d=function(e,t,n){u.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},u.r=function(e){"undefined"!==typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},u.t=function(e,t){if(1&t&&(e=u(e)),8&t)return e;if(4&t&&"object"===typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(u.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var a in e)u.d(n,a,function(t){return e[t]}.bind(null,a));return n},u.n=function(e){var t=e&&e.__esModule?function(){return e["default"]}:function(){return e};return u.d(t,"a",t),t},u.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},u.p="/",u.oe=function(e){throw console.error(e),e};var l=window["webpackJsonp"]=window["webpackJsonp"]||[],s=l.push.bind(l);l.push=t,l=l.slice();for(var d=0;d<l.length;d++)t(l[d]);var f=s;i.push([0,"chunk-vendors"]),n()})({0:function(e,t,n){e.exports=n("56d7")},"56d7":function(e,t,n){"use strict";n.r(t);n("e260"),n("e6cf"),n("cca6"),n("a79d");var a=n("2b0e"),r=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-app",{attrs:{id:"app"}},[n("router-view")],1)],1)},o=[],i={name:"App"},c=i,u=n("2877"),l=n("6544"),s=n.n(l),d=n("7496"),f=Object(u["a"])(c,r,o,!1,null,null,null),h=f.exports;s()(f,{VApp:d["a"]});var m=n("9483");Object(m["a"])("".concat("/","service-worker.js"),{ready:function(){console.log("App is being served from cache by a service worker.\nFor more details, visit https://goo.gl/AFskqB")},registered:function(){console.log("Service worker has been registered.")},cached:function(){console.log("Content has been cached for offline use.")},updatefound:function(){console.log("New content is downloading.")},updated:function(){console.log("New content is available; please refresh.")},offline:function(){console.log("No internet connection found. App is running in offline mode.")},error:function(e){console.error("Error during service worker registration:",e)}});n("d3b7"),n("3ca3"),n("ddb0");var p=n("8c4f"),v=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-col",{attrs:{cols:"12"}},[n("v-text-field",{attrs:{label:"Qual sua tarefa?",outlined:"",clearable:""},on:{keyup:function(t){return!t.type.indexOf("key")&&e._k(t.keyCode,"enter",13,t.key,"Enter")?null:e.handleAddTarefa.apply(null,arguments)}},model:{value:e.campoInput,callback:function(t){e.campoInput=t},expression:"campoInput"}})],1),n("v-list",{attrs:{flat:"",subheader:""}},[n("v-subheader",[e._v("Lista de Tarefas")]),n("v-list-item-group",{attrs:{multiple:"","active-class":""}},e._l(e.$store.state.tarefas,(function(e,t){return n("div",{key:t},[n("Tarefa",{attrs:{tarefa:e}})],1)})),0)],1)],1)},g=[],b=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-list-item",{class:{"blue lighten-4":e.tarefa.concluido},on:{click:function(t){e.tarefa.concluido=!e.tarefa.concluido}},scopedSlots:e._u([{key:"default",fn:function(t){return[n("v-list-item-action",[n("v-checkbox",{attrs:{"input-value":e.tarefa.concluido}})],1),n("v-list-item-content",[n("v-list-item-title",{class:{"text-decoration-line-through":e.tarefa.concluido}},[e._v(e._s(e.tarefa.titulo))])],1),n("v-list-item-action",[n("TarefaMenu",{attrs:{tarefa:e.tarefa}})],1)]}}])}),n("v-divider")],1)},k=[],_=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-menu",{attrs:{"offset-y":""},scopedSlots:e._u([{key:"activator",fn:function(t){var a=t.on,r=t.attrs;return[n("v-btn",e._g(e._b({attrs:{icon:""}},"v-btn",r,!1),a),[n("v-icon",[e._v(" mdi-dots-vertical ")])],1)]}}])},[n("v-list",e._l(e.items,(function(t,a){return n("v-list-item",{key:a,on:{click:function(e){return t.click()}}},[n("v-icon",{attrs:{left:""}},[e._v(e._s(t.icone))]),n("v-list-item-title",[e._v(e._s(t.title))])],1)})),1)],1),e.items[0].modal?n("ModalEditar",{attrs:{tarefa:e.tarefa},on:{fechaModal:function(t){e.items[0].modal=!1}}}):e._e(),e.items[1].modal?n("ModalDelete",{attrs:{tarefa:e.tarefa},on:{fechaModal:function(t){e.items[1].modal=!1}}}):e._e()],1)},x=[],y=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-dialog",{attrs:{persistent:"","max-width":"290"},model:{value:e.dialog,callback:function(t){e.dialog=t},expression:"dialog"}},[n("v-card",[n("v-card-title",{staticClass:"text-h5"},[e._v("Editar Tarefa")]),n("v-divider"),n("v-card-text",{staticClass:"mt-2"},[e._v("Informe um novo título.")]),n("v-text-field",{staticClass:"px-6",attrs:{label:"Título",outlined:""},model:{value:e.titulo,callback:function(t){e.titulo=t},expression:"titulo"}}),n("v-card-actions",[n("v-spacer"),n("v-btn",{attrs:{color:"red darken-1",text:""},on:{click:function(t){return e.$emit("fechaModal")}}},[e._v(" Cancelar ")]),n("v-btn",{attrs:{color:"primary",text:""},on:{click:e.handleEditar}},[e._v(" Editar ")])],1)],1)],1)],1)},T=[],w={name:"ModalEditar",props:["tarefa"],data:function(){return{dialog:!0,titulo:null}},created:function(){this.titulo=this.tarefa.titulo},methods:{handleEditar:function(){var e={titulo:this.titulo,id:this.tarefa.id};this.$store.commit("editTarefa",e),this.$emit("fechaModal")}}},V=w,j=n("8336"),C=n("b0af"),E=n("99d9"),S=n("169a"),O=n("ce7e"),A=n("2fa4"),I=n("8654"),L=Object(u["a"])(V,y,T,!1,null,null,null),M=L.exports;s()(L,{VBtn:j["a"],VCard:C["a"],VCardActions:E["a"],VCardText:E["b"],VCardTitle:E["c"],VDialog:S["a"],VDivider:O["a"],VSpacer:A["a"],VTextField:I["a"]});var P=function(){var e=this,t=e.$createElement,n=e._self._c||t;return n("div",[n("v-dialog",{attrs:{persistent:"","max-width":"290"},model:{value:e.dialog,callback:function(t){e.dialog=t},expression:"dialog"}},[n("v-card",[n("v-card-title",{staticClass:"text-h5"},[e._v("Excluir Tarefa")]),n("v-divider"),n("v-card-text",{staticClass:"mt-2"},[e._v("Deseja excluir a tarefa?")]),n("v-card-actions",[n("v-spacer"),n("v-btn",{attrs:{color:"red darken-1",text:""},on:{click:function(t){return e.$emit("fechaModal")}}},[e._v(" Cancelar ")]),n("v-btn",{attrs:{color:"primary",text:""},on:{click:e.handleDeleta}},[e._v(" Excluir ")])],1)],1)],1)],1)},$=[],D={name:"ModalDelete",props:["tarefa"],data:function(){return{dialog:!0}},methods:{handleDeleta:function(){this.$store.commit("removeTarefa",this.tarefa.id),this.$emit("fechaModal")}}},N=D,U=Object(u["a"])(N,P,$,!1,null,null,null),R=U.exports;s()(U,{VBtn:j["a"],VCard:C["a"],VCardActions:E["a"],VCardText:E["b"],VCardTitle:E["c"],VDialog:S["a"],VDivider:O["a"],VSpacer:A["a"]});var B={name:"TarefaMenu",props:["tarefa"],data:function(){return{items:[{icone:"mdi-pencil",title:"Editar",modal:!1,click:function(){console.log("editar"),this.modal=!0}},{icone:"mdi-trash-can",title:"Excluir",modal:!1,click:function(){console.log("excluir"),this.modal=!0}}]}},components:{ModalEditar:M,ModalDelete:R}},G=B,F=n("132d"),q=n("8860"),H=n("da13"),J=n("5d23"),z=n("e449"),K=Object(u["a"])(G,_,x,!1,null,null,null),Q=K.exports;s()(K,{VBtn:j["a"],VIcon:F["a"],VList:q["a"],VListItem:H["a"],VListItemTitle:J["b"],VMenu:z["a"]});var W={name:"Tarefa",props:["tarefa"],components:{TarefaMenu:Q},methods:{handleRemoveTarefa:function(e){this.$store.commit("removeTarefa",e)}}},X=W,Y=n("ac7c"),Z=n("1800"),ee=Object(u["a"])(X,b,k,!1,null,null,null),te=ee.exports;s()(ee,{VCheckbox:Y["a"],VDivider:O["a"],VListItem:H["a"],VListItemAction:Z["a"],VListItemContent:J["a"],VListItemTitle:J["b"]});var ne={name:"Tarefas",components:{Tarefa:te},data:function(){return{campoInput:null}},methods:{handleAddTarefa:function(){this.$store.commit("addTarefa",this.campoInput),this.campoInput=null}}},ae=ne,re=n("62ad"),oe=n("1baa"),ie=n("e0c7"),ce=Object(u["a"])(ae,v,g,!1,null,null,null),ue=ce.exports;s()(ce,{VCol:re["a"],VList:q["a"],VListItemGroup:oe["a"],VSubheader:ie["a"],VTextField:I["a"]}),a["a"].use(p["a"]);var le=function(){return Promise.all([n.e("chunk-1ff03810"),n.e("chunk-28a68124")]).then(n.bind(null,"7c52"))},se=function(){return Promise.all([n.e("chunk-1ff03810"),n.e("chunk-e07f6816")]).then(n.bind(null,"5e41"))},de=function(){return Promise.all([n.e("chunk-1ff03810"),n.e("chunk-08d2e2d7")]).then(n.bind(null,"dd55"))},fe=[{path:"*",name:"NotFound",component:function(){return Promise.all([n.e("chunk-23777429"),n.e("chunk-60e63fe2")]).then(n.bind(null,"361e"))}},{path:"/dashboard",name:"Dashboard",component:function(){return n.e("chunk-6e0d5090").then(n.bind(null,"5c3a"))},children:[{path:"/dashboard/tarefas",name:"Tarefas",component:ue},{path:"/dashboard/sobre",name:"Sobre",component:function(){return n.e("chunk-2d2082ec").then(n.bind(null,"a469"))}}]},{path:"/",name:"Página Inicial",component:function(){return Promise.all([n.e("chunk-23777429"),n.e("chunk-2d3dffb0")]).then(n.bind(null,"7d6f"))}},{path:"/:unit_slug",component:function(){return Promise.all([n.e("chunk-23777429"),n.e("chunk-155c4c60")]).then(n.bind(null,"24b0"))},children:[{path:"/:unit_slug",component:le,meta:{breadcrumb:[{text:"Home",href:"/unisaojose",disabled:!1},{text:"Categorias",href:"/unisaojose",disabled:!1}]}},{path:"/:unit_slug/:categorie_slug",component:se,meta:{breadcrumb:[{text:"Home",href:"/unisaojose"},{text:"Categorias",href:"/unisaojose"},{text:"Subcategorias",href:"/unisaojose/subcategorias"}]}},{path:"/:unit_slug/:categorie_slug/:subcategorie_slug/:article_slug",component:de,meta:{breadcrumb:[{text:"Home",href:"/unisaojose"},{text:"Categorias",href:"/unisaojose"},{text:"Subcategorias",href:"/unisaojose/subcategorias"},{text:"Artigos"}]}}]}],he=new p["a"]({mode:"history",base:"/",routes:fe}),me=he,pe=n("2f62"),ve={tarefas:[{id:1,titulo:"Ir ao médico",concluido:!1},{id:2,titulo:"Comprar ração",concluido:!1}],unitsAll:[],unitSlug:[],categoriesSlug:[]},ge=(n("4de4"),{addTarefa:function(e,t){t&&e.tarefas.push({id:(new Date).getTime(),titulo:t,concluido:!1})},removeTarefa:function(e,t){e.tarefas=e.tarefas.filter((function(e){return e.id!==t}))},editTarefa:function(e,t){var n=e.tarefas.filter((function(e){return e.id==t.id}))[0];n.titulo=t.titulo},UNITS_ALL:function(e,t){e.unitsAll=t},UNIT_SLUG:function(e,t){e.unitSlug=t},CATEGORIE_SLUG:function(e,t){e.categoriesSlug=t}}),be=n("2909"),ke=n("1da1"),_e=(n("96cf"),n("d722")),xe={getUnitsAll:function(e){return Object(ke["a"])(regeneratorRuntime.mark((function t(){var n;return regeneratorRuntime.wrap((function(t){while(1)switch(t.prev=t.next){case 0:return n=e.commit,t.next=3,_e["a"].get("/unidades").then((function(e){n("UNITS_ALL",Object(be["a"])(e.data.data))})).catch((function(e){console.log(e)}));case 3:case"end":return t.stop()}}),t)})))()},getUnitBySlug:function(e,t){return Object(ke["a"])(regeneratorRuntime.mark((function n(){var a;return regeneratorRuntime.wrap((function(n){while(1)switch(n.prev=n.next){case 0:return a=e.commit,n.next=3,_e["a"].get("/unidade/"+t.unit_slug).then((function(e){a("UNIT_SLUG",Object(be["a"])(e.data.data))})).catch((function(e){console.log(e)}));case 3:case"end":return n.stop()}}),n)})))()},getCategoriesByUnitSlug:function(e,t){return Object(ke["a"])(regeneratorRuntime.mark((function n(){var a;return regeneratorRuntime.wrap((function(n){while(1)switch(n.prev=n.next){case 0:return a=e.commit,n.next=3,_e["a"].get("/categoria/unidade/"+t.unit_slug).then((function(e){a("CATEGORIE_SLUG",Object(be["a"])(e.data.data))})).catch((function(e){t.error=!0,e.response?(console.log(e.response.data),console.log(e.response.status),console.log(e.response.headers),t.status_error=e.response.data.error,t.message_error=e.response.data.messages.error):e.request?console.log(e.request):console.log("Error",e.message)})).finally((function(){return t.loading=!1}));case 3:case"end":return n.stop()}}),n)})))()}};a["a"].use(pe["a"]);var ye=new pe["a"].Store({state:ve,mutations:ge,actions:xe,modules:{}}),Te=n("f309");a["a"].use(Te["a"]);var we=new Te["a"]({});a["a"].config.productionTip=!1,new a["a"]({router:me,store:ye,vuetify:we,render:function(e){return e(h)}}).$mount("#app")},d722:function(e,t,n){"use strict";var a=n("bc3a"),r=n.n(a),o=r.a.create({baseURL:"https://wiki.escolasz.com.br/backend/wiki/api/v1"});t["a"]=o}});
//# sourceMappingURL=app.e6b6daa7.js.map
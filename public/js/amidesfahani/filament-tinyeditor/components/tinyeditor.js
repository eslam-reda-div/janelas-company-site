function I({state:c,statePath:n,selector:d,plugins:u,toolbar:m,language:p="en",language_url:h=null,directionality:f="ltr",max_height:g=0,min_height:b=500,skin:_="oxide",content_css:y="default",toolbar_sticky:w=!1,templates:k="",menubar:C=!1,font_size_formats:v="",fontfamily:a="",relative_urls:E=!0,image_list:T=null,image_advtab:x=!1,image_description:F=!1,image_class_list:A=null,remove_script_host:$=!0,convert_urls:P=!0,custom_configs:z={},setup:r=null,disabled:B=!1,locale:H="en",license_key:D="gpl",placeholder:J=null}){let l=window.filamentTinyEditors||{};return{id:null,state:c,statePath:n,selector:d,language:p,language_url:h,directionality:f,max_height:g,min_height:b,skin:_,content_css:y,plugins:u,toolbar:m,toolbar_sticky:w,templates:k,menubar:C,relative_urls:E,remove_script_host:$,convert_urls:P,font_size_formats:v,fontfamily:a,setup:r,image_list:T,image_advtab:x,image_description:F,image_class_list:A,license_key:D,custom_configs:z,updatedAt:Date.now(),disabled:B,locale:H,init(){this.initEditor(c.initialValue),window.filamentTinyEditors=l,this.$watch("state",(e,o)=>{e==="<p></p>"&&e!==this.editor().getContent()&&(l[this.statePath].destroy(),this.initEditor(e)),this.editor().container&&e!==this.editor().getContent()&&(this.editor().resetContent(e||""),this.putCursorToEnd())})},editor(){return tinymce.get(l[this.statePath])},initEditor(e){let o=this,V=this.$wire;tinymce.init({selector:d,language:p,language_url:h,directionality:f,statusbar:!1,promotion:!1,max_height:g,min_height:b,skin:_,content_css:y,plugins:u,toolbar:m,toolbar_sticky:w,toolbar_sticky_offset:64,toolbar_mode:"sliding",templates:k,menubar:C,menu:{file:{title:"File",items:"newdocument restoredraft | preview | export print | deleteallconversations"},edit:{title:"Edit",items:"undo redo | cut copy paste pastetext | selectall | searchreplace"},view:{title:"View",items:"code | visualaid visualchars visualblocks | spellchecker | preview fullscreen | showcomments"},insert:{title:"Insert",items:"image link media addcomment pageembed template codesample inserttable | charmap emoticons hr | pagebreak nonbreaking anchor tableofcontents | insertdatetime"},format:{title:"Format",items:"bold italic underline strikethrough superscript subscript codeformat | styles blocks fontfamily fontsize align lineheight | forecolor backcolor | language | removeformat"},tools:{title:"Tools",items:"spellchecker spellcheckerlanguage | a11ycheck code wordcount"},table:{title:"Table",items:"inserttable | cell row column | advtablesort | tableprops deletetable"},help:{title:"Help",items:"help"}},font_size_formats:v,fontfamily:a,font_family_formats:a,relative_urls:E,remove_script_host:$,convert_urls:P,image_list:T,image_advtab:x,image_description:F,image_class_list:A,license_key:D,...z,setup:function(t){window.tinySettingsCopy||(window.tinySettingsCopy=[]),t.settings&&!window.tinySettingsCopy.some(i=>i.id===t.settings.id)&&window.tinySettingsCopy.push(t.settings),t.on("blur",function(i){o.updatedAt=Date.now(),o.state=t.getContent()}),t.on("init",function(i){l[o.statePath]=t.id,e!=null&&t.setContent(e)}),typeof r=="function"&&r(t)},images_upload_handler:(t,i)=>new Promise((S,U)=>{if(!t.blob())return;let j=()=>{V.getFormComponentFileAttachmentUrl(n).then(s=>{if(!s){U("error");return}S(s)})},q=()=>{},G=s=>{i(s.detail.progress)};V.upload(`componentFileAttachments.${n}`,t.blob(),j,q,G)}),automatic_uploads:!0})},updateEditorContent(e){this.editor().setContent(e)},putCursorToEnd(){this.editor().selection.select(this.editor().getBody(),!0),this.editor().selection.collapse(!1)}}}export{I as default};

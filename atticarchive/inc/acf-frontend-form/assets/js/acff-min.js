var modalLevel=1,narrowfy=0,$controls=[];!function(e){function t(e){container.find(".content-container").html(e),acf.doAction("append",container)}function a(t){let a=e('input[type="file"]:not([disabled])',t);a.each((function(t,a){a.files.length>0||e(a).prop("disabled",!0)}));var i=new FormData(t[0]);i.append("action","acff/form_submit"),a.prop("disabled",!1),acf.lockForm(t),e.ajax({url:acf.get("ajaxurl"),type:"post",data:i,cache:!1,processData:!1,contentType:!1,success:function(a){if(a.success){var i=a.data;if(i.redirect)window.location=i.redirect;else{if(acf.unlockForm(t),successMessage='<div class="acff-message"><div class="acf-notice -success acf-success-message"><p class="success-msg">'+i.success_message+'</p><span class="acff-dismiss close-msg acf-notice-dismiss acf-icon -cancel small"></span></div></div>',i.append)!function(t){var a=t.data.append;if(modalLevel--,narrowfy-=20,"edit"==a.action)e(".acf-field div.values").find("span[data-id="+a.id+"]").html(a.text+'<a href="#" class="acf-icon -minus small dark" data-name="remove_item"></a>'),e(".acf-field div.choices").find("span[data-id="+a.id+"]").html(a.text);else{var i=$controls[modalLevel];i.find("div.values ul").append('<li><input type="hidden" name="'+i.find("div.selection").siblings("input").attr("name")+'[]" value="'+a.id+'" /><span data-id="'+a.id+'" class="acf-rel-item">'+a.text+'<a href="#" class="acf-icon -minus small dark" data-name="remove_item"></a></span></li>'),i.find("div.choices ul").prepend('<li><span class="acf-rel-item disabled" data-id="'+a.id+'">'+a.text+'<a href="#" class="acf-icon -pencil small dark edit-rel-post" data-name="edit_item"></a></span></li>')}}(a),t.parents(".modal").remove();else if(i.clear_form){t.data("widget");t.siblings(".acff-form-posts").remove();var n=t.attr("id");i.step?t.parents(".acff-tabs").replaceWith(i.clear_form):t.replaceWith(i.clear_form),t=e("#"+n),acf.doAction("append",t),i.saved_message&&(t.find(".save-progress-button").after('<p class="draft-saved">'+i.saved_message+"</p>"),setTimeout((function(){e("body").find(".draft-saved").remove()}),3e3)),i.success_message&&t.prepend(successMessage),e("body, html").animate({scrollTop:t.offset().top-50},"slow"),void 0!==(s=t.closest("div.edit-modal"))&&e(s).animate({scrollTop:t.offset().top-50},"slow")}t.find(".acff-submit-button").attr("disabled",!1).removeClass("acf-hidden disabled"),t.find(".acf-loading").remove()}}else{var s;t.before('<div style="margin-top:10px" class="acff-message"><div class="acf-notice -error acf-error-message"><p class="error-msg">'+t.find(".acf-form-data").data("error")+'</p><span class="acff-dismiss close-msg acf-notice-dismiss acf-icon -cancel small"></span></div></div>'),t.remove(),e("body, html").animate({scrollTop:t.offset().top-50},"slow"),void 0!==(s=t.closest("div.edit-modal"))&&e(s).animate({scrollTop:t.offset().top-50},"slow")}}})}e.extend({updateNumberTo:function(e,t,a){var i=a.text().replace(t,""),n=setInterval((function(){a.text((function(){for(var e="",t=0;t<i.length;t++)e+=Math.floor(10*Math.random()).toString();return e}))}),50);setTimeout((function(){clearInterval(n),a.text(e+t)}),100)},redirectPost:function(t,a){var i=e("<form></form>");i.attr("method","post"),i.attr("action",t),e.each(a,(function(t,a){var n=e("<input></input>");n.attr("type","hidden"),n.attr("name",t),n.attr("value",a),i.append(n)})),e(i).appendTo("body").submit()}}),acf.addFilter("relationship_ajax_data",(function(e,t){return""!=t.$control().data("product_id")&&(e.product_id=t.$control().data("product_id")),e})),e("body").on("click","a[data-name=remove]",(function(t){null!=typeof imagePreview&&e(this).parents(".show-if-value").removeClass("show").siblings(".hide-if-value").removeClass("acff-hidden").find("input.image-preview").val("")})),e(document).on("elementor/popup/show",((t,a,i)=>{acf.doAction("append",e("#elementor-popup-modal-"+a))})),e("body").on("input",".pa-custom-name input",(function(t){e(this).closest(".acf-fields").siblings(".acf-fc-layout-handle").find(".attr_name").text(e(this).val())})),e("body").on("change",".posts-select",(function(t){var a=e(this),i=a.parents(".acff-form-posts").siblings("form");a.parents(".acff-form-posts").append('<span class="acf-loading"></span>');var n=i.data("widget"),s=i.find("input[name=_acf_form]").val(),o={action:"acff/forms/change_form",draft:e(this).val(),form_data:s};e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(o),type:"post",dataType:"json",cache:!1,success:function(t){t.data.reload_form&&(e("body, html").animate({scrollTop:i.offset().top},"slow"),i.siblings(".acff-form-posts").remove(),i.replaceWith(t.data.reload_form),acf.doAction("append",e(".elementor-element-"+n)),e(".acf-loading").remove())}})})),e("body").on("click","span.close-msg",(function(t){e(this).parents(".acff-message").remove()})),e("body").on("input click",".acf-fields,.acf-form-submit",(function(t){e(".acff-message").remove()})),e("body").on("click","a.add-rel-post",(function(){$el=e(this).parents(".acf-field"),container=acf.showModal($el.data("key"),$el.data("form_width")-narrowfy),$controls[modalLevel]=e(this).parents(".acf-actions").siblings(".acf-relationship"),modalLevel++,narrowfy+=20,acf.getForm($el,"add_post")})),e("body").on("mouseenter",".choices a.edit-rel-post",(function(t){var a=e(this).parents(".acf-rel-item");a.hasClass("disabled")||a.addClass("disabled temporary")})),e("body").on("mouseleave",".choices a.edit-rel-post",(function(t){var a=e(this).parents(".acf-rel-item");a.hasClass("temporary")&&a.removeClass("disabled temporary")})),e("body").on("click","a.edit-rel-post",(function(t){t.preventDefault(),$el=e(this).parents(".acf-field"),container=acf.showModal($el.data("key"),$el.data("form_width")-narrowfy);var a=e(this).parents(".acf-rel-item").data("id");$controls[modalLevel]=e(this).parents(".acf-actions").siblings(".acf-relationship"),modalLevel++,narrowfy+=20,acf.getForm($el,a)})),e(".post-slug-field input").on("input keyup",(function(){var t=this.selectionStart,a=e(this).val();e(this).val(a.replace(/[`~!@#$%^&*()|+=?;:..’“'"<>,€£¥•،٫؟»«\s\{\}\[\]\\\/]+/gi,"").toLowerCase()),this.setSelectionRange(t,t)})),e("body").on("click","button.edit-password",(function(){e(this).addClass("acff-hidden").parents(".acf-field-user-password").removeClass("edit_password").addClass("editing_password").siblings(".acf-field-user-password-confirm").removeClass("acff-hidden"),e(this).after('<input type="hidden" name="edit_user_password" value="1"/>'),e(this).siblings(".pass-strength-result").removeClass("acff-hidden")})),e("body").on("click","button.cancel-edit",(function(){e(this).siblings("button.edit-password").removeClass("acff-hidden").parents(".acf-field-user-password").addClass("edit_password").removeClass("editing_password").siblings(".acf-field-user-password-confirm").addClass("acff-hidden"),e(this).parents("acf-input-wrap").siblings("acf-notice"),e(this).siblings("input[name=edit_user_password]").remove(),e(this).siblings(".pass-strength-result").addClass("acff-hidden")})),e((function(){e(".acf-field-user-password-confirm").siblings(".acf-field-user-password").hasClass("edit_password")||e(".acf-field-user-password-confirm").removeClass("acff-hidden")})),acf.showModal=function(t,a){var i=9+modalLevel,n=e("#modal_"+(t=t+"-"+modalLevel));return n.length?n.removeClass("hide").addClass("show"):(n=e('<div id="modal_'+t+'" class="modal edit-modal show" data-clear="1"><div class="modal-content" style="margin:'+i+"% auto;width:"+parseInt(a)+'px;max-width:80%"><div class="modal-inner"><span class="acf-icon -cancel close"></span><div class="content-container"><div class="loading"><span class="acf-loading"></span></div></div></div></div></div>'),e("body").append(n)),n},e("body").on("click",".modal .close",(function(t){var a=e(this).parents(".modal");1==a.data("clear")&&(a.remove(),modalLevel--,narrowfy-=20)})),acf.getForm=function(a,i){var n={action:"acf_frontend/forms/add_form",field_key:a.data("key"),parent_form:a.parents("form").attr("id"),form_action:i};e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(n),type:"post",dataType:"html",success:t})},acf.add_filter("validation_complete",(function(t,a){if(t.errors){e(".acf-loading").remove(),a.find("input[type=submit]").removeClass("disabled");var i=a.closest("div.edit-modal");void 0!==i&&e(i).animate({scrollTop:a.offset().top-50},"slow")}return t})),e("body").on("submit","form.-delete",(function(t){t.preventDefault(),$form=e(this),$form.find("button[type=submit]").addClass("disabled").after('<span class="acf-loading"></span>');var a=new FormData($form[0]);a.append("action","acff/delete_object"),e.ajax({url:acf.get("ajaxurl"),type:"post",data:a,cache:!1,processData:!1,contentType:!1,success:function(t){t.success&&t.data.redirect&&(t.data.delete_message?e.redirectPost(t.data.redirect,t.data):window.location=t.data.redirect)}})})),e("body").on("click","form.-submit input[type=submit]",(function(t){t.preventDefault(),$form=e(this).parents("form"),$form.find("input[name=_acf_status]").val(e(this).data("state")),e(this).hasClass("disabled")||(e(this).after('<span class="acf-loading"></span>').addClass("disabled"),$form=acf.applyFilters("acff/submit_form",$form),$form&&"undefined"!=typeof $form&&$form.submit())})),e("body").on("submit","form.-submit",(function(t){t.preventDefault(),$form=e(this),args={form:$form,reset:!1,success:a},acf.validateForm(args)}));var i=e("div[data-default]");e.each(i,(function(t,a){var i=e(a),n=i.data("default"),s=i.data("dynamic_value"),o=i.find("input[type=text]");if(n.length>0){var r=s;function l(e,t,a){var i="["+t[0]+"]";if(""!=a.val()){var n=a.val();if("text"==t[1])n=f(t[0]);e=e.replace(i,n)}return e}function d(e,t){var a=i.siblings("div[data-name="+e+"]"),n=a.find("input");return"radio"==a.data("type")&&(n=1==t?a.find("input"):a.find("input:selected")),"select"==a.data("type")&&(n=a.find("select")),n}function c(e){var t=[e,"value"];if(~e.indexOf(":"))t=e.split(":");return t}function f(e){var t=i.siblings("div[data-name="+e+"]");return"radio"==t.data("type")&&(sourceInput=t.find(".selected").text()),"select"==t.data("type")&&(sourceInput=t.find(":selected").text()),sourceInput}e.each(n,(function(t,a){var i=c(a),f=d(i[0],!1);r=l(r,i,f),(f=d(i[0],!0)).on("input",(function(){var t=s;e.each(n,(function(e,a){var i=c(a),n=d(i[0],!1);t=l(t,i,n)})),o.val(t)}))})),o.val(r)}}));var n=acf.Field.extend({type:"upload_files",events:{"click .acf-gallery-add":"onClickAdd","click div.acf-gallery-upload":"onClickUpload","click .acf-gallery-edit":"onClickEdit","click .acf-gallery-remove":"onClickRemove","click .acf-gallery-attachment":"onClickSelect","click .acf-gallery-close":"onClickClose","change .acf-gallery-sort":"onChangeSort","click .acf-gallery-update":"onUpdate",mouseover:"onHover",showField:"render","input .images-preview":"imagesPreview"},actions:{validation_begin:"onValidationBegin",validation_failure:"onValidationFailure",resize:"onResize"},onValidationBegin:function(){acf.disable(this.$sideData(),this.cid)},onValidationFailure:function(){acf.enable(this.$sideData(),this.cid)},$control:function(){return this.$(".acf-gallery")},$collection:function(){return this.$(".acf-gallery-attachments")},$attachments:function(){return this.$(".acf-gallery-attachment:not(.not-valid)")},$clone:function(){return this.$(".image-preview-clone")},$attachment:function(e){return this.$('.acf-gallery-attachment[data-id="'+e+'"]')},$active:function(){return this.$(".acf-gallery-attachment.active")},$inValid:function(){return this.$(".acf-gallery-attachment.not-valid")},$main:function(){return this.$(".acf-gallery-main")},$side:function(){return this.$(".acf-gallery-side")},$sideData:function(){return this.$(".acf-gallery-side-data")},isFull:function(){var e=parseInt(this.get("max")),t=this.$attachments().length;return e&&t>=e},getValue:function(){var t=[];return this.$attachments().each((function(){t.push(e(this).data("id"))})),!!t.length&&t},addUnscopedEvents:function(t){this.on("change",".acf-gallery-side",(function(a){t.onUpdate(a,e(this))}))},addSortable:function(e){this.$collection().sortable({items:".acf-gallery-attachment",forceHelperSize:!0,forcePlaceholderSize:!0,scroll:!0,start:function(e,t){t.placeholder.html(t.item.html()),t.placeholder.removeAttr("style")},update:function(t,a){e.$input().trigger("change")}}),this.$control().resizable({handles:"s",minHeight:200,stop:function(e,t){acf.update_user_setting("gallery_height",t.size.height)}})},initialize:function(){this.addUnscopedEvents(this),this.render()},render:function(){var e=this.$(".acf-gallery-sort"),t=this.$(".acf-gallery-add"),a=this.$attachments().length;this.isFull()?t.addClass("disabled"):t.removeClass("disabled"),a?e.removeClass("disabled"):e.addClass("disabled"),this.resize()},resize:function(){var e=this.$control().width(),t=Math.round(e/150);t=Math.min(t,8),this.$control().attr("data-columns",t)},onResize:function(){this.resize()},openSidebar:function(){this.$control().addClass("-open");var e=this.$control().width()/3;e=parseInt(e),e=Math.max(e,350),this.$(".acf-gallery-side-inner").css({width:e-1}),this.$side().animate({width:e-1},250),this.$main().animate({right:e},250)},closeSidebar:function(){this.$control().removeClass("-open"),this.$active().removeClass("active"),acf.disable(this.$side());var e=this.$(".acf-gallery-side-data");this.$main().animate({right:0},250),this.$side().animate({width:0},250,(function(){e.html("")}))},onClickAdd:function(t,a){if(this.$control().css("height","400"),this.isFull())this.showNotice({text:acf.__("Maximum selection reached"),type:"warning"});else acf.newMediaPopup({mode:"select",title:acf.__("Add Image to Gallery"),field:this.get("key"),multiple:"add",library:this.get("library"),allowedTypes:this.get("mime_types"),selected:this.val(),select:e.proxy((function(e,t){this.appendAttachment(e,t)}),this)})},imagesPreview:function(e,t){this.$control().css("height","400");var a=this.$control().parents("form");a.find("input[type=submit]").addClass("disabled");var i=this.$attachments().length,n=this.$control().data("max");const s=e.currentTarget.files;Object.keys(s).forEach((t=>{if(n>0&&i>=n)return!1;const o=s[t],r=new FileReader;r.onload=e=>{var t=this.$clone().clone();t.removeClass("acf-hidden image-preview-clone").addClass("acf-gallery-attachment acf-uploading").find("img").attr("src",r.result),t.appendTo(this.$collection()),"application/pdf"==o.type&&t.find(".margin").append('<span class="gi-file-name">'+o.name+"</span>"),this.uploadImage(o,t,a)},i++,r.readAsDataURL(e.target.files[t])})),i>=n&&n>0&&this.$("input.images-preview").prop("disabled",!0)},uploadImage:function(t,a,i){var n=this,s=a.find(".uploads-progress .percent"),o=a.find(".uploads-progress .bar");e.updateNumberTo("33","%",s),o.animate({width:"33%"},"slow");var r=this.$el.parents("form").find("input[name=_acf_nonce]").val(),l=this.get("key"),d=new FormData;d.append("action","acf/fields/upload_files/add_attachment"),d.append("file",t),d.append("field_key",l),d.append("nonce",r),i.find("input[type=submit]").addClass("disabled"),e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(d),type:"post",processData:!1,contentType:!1,cache:!1}).done((function(t){if(i.find("input[type=submit]").removeClass("disabled"),t.success){e.updateNumberTo("100","%",s),o.animate({width:"100%"},"slow"),t.data.src&&a.find("img").attr("src",t.data.src),a.attr("data-id",t.data.id).find(".acf-gallery-remove").attr("data-id",t.data.id);var r=e("<input>").attr({type:"hidden",name:n.$input().attr("name")+"[]",value:t.data.id});a.prepend(r).removeClass("acf-uploading"),setTimeout((function(){a.find(".uploads-progress").remove()}),100)}else a.find(".uploads-progress").remove(),a.addClass("not-valid").append('<p class="errors">'+t.data+"</p>").find(".margin").append('<p class="upload-fail">x</p>')}))},onClickUpload:function(e,t){this.isFull()?this.showNotice({text:acf.__("Maximum selection reached: "+this.$control().data("max")),type:"warning"}):this.$inValid()&&(this.$inValid().remove(),this.$("input.images-preview").prop("disabled",!1))},appendAttachment:function(t,a){if(t=this.validateAttachment(t),!this.isFull()&&!this.$attachment(t.id).length){var i=['<div class="acf-gallery-attachment" data-id="'+t.id+'">','<input type="hidden" value="'+t.id+'" name="'+this.getInputName()+'[]">','<div class="margin" title="">','<div class="thumbnail">','<img src="" alt="">',"</div>",'<div class="filename"></div>',"</div>",'<div class="actions">','<a href="#" class="acf-icon -cancel dark acf-gallery-remove" data-id="'+t.id+'"></a>',"</div>","</div>"].join(""),n=e(i);if(this.$collection().append(n),"prepend"===this.get("insert")){var s=this.$attachments().eq(a);s.length&&s.before(n)}this.renderAttachment(t),this.render(),this.$input().trigger("change")}},validateAttachment:function(e){if((e=acf.parseArgs(e,{id:"",url:"",alt:"",title:"",filename:"",type:"image"})).attributes){e=e.attributes;var t=acf.isget(e,"sizes",this.get("preview_size"),"url");null!==t&&(e.url=t)}return e},renderAttachment:function(e){e=this.validateAttachment(e);var t=this.$attachment(e.id);if("image"==e.type)t.find(".filename").remove();else{var a=acf.isget(e,"image","src");null!==a&&(e.url=a),t.find(".filename").text(e.filename)}e.url||(e.url=acf.get("mimeTypeIcon"),t.addClass("-icon")),t.find("img").attr({src:e.url,alt:e.alt,title:e.title}),acf.val(t.find("input"),e.id)},editAttachment:function(t){acf.newMediaPopup({mode:"edit",title:acf.__("Edit Image"),button:acf.__("Update Image"),attachment:t,field:this.get("key"),select:e.proxy((function(e,t){this.renderAttachment(e)}),this)})},onClickEdit:function(e,t){var a=t.data("id");a&&this.editAttachment(a)},removeAttachment:function(e){this.closeSidebar(),this.$attachment(e).remove(),this.render(),this.$input().trigger("change")},onClickRemove:function(e,t){e.preventDefault(),e.stopPropagation();var a=t.data("id");a?this.removeAttachment(a):t.parents(".acf-gallery-attachment").remove(),this.$attachments().length<this.$control().data("max")&&this.$("input.images-preview").prop("disabled",!1)},selectAttachment:function(t){var a=this.$attachment(t);if(!a.hasClass("active")){var i=this.proxy((function(){this.$side().find(":focus").trigger("blur"),this.$active().removeClass("active"),a.addClass("active"),this.openSidebar(),n()})),n=this.proxy((function(){var a={action:"acf/fields/gallery/get_attachment",field_key:this.get("key"),id:t};this.has("xhr")&&this.get("xhr").abort(),acf.showLoading(this.$sideData());var i=e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(a),type:"post",dataType:"html",cache:!1,success:s});this.set("xhr",i)})),s=this.proxy((function(e){if(e){var t=this.$sideData();t.html(e),t.find(".compat-field-acf-form-data").remove(),t.find("> table.form-table > tbody").append(t.find("> .compat-attachment-fields > tbody > tr")),acf.doAction("append",t)}}));i()}},onClickSelect:function(e,t){var a=t.data("id");a&&this.selectAttachment(a)},onClickClose:function(e,t){this.closeSidebar()},onChangeSort:function(t,a){if(!a.hasClass("disabled")){var i=a.val();if(i){var n=[];this.$attachments().each((function(){n.push(e(this).data("id"))}));var s=this.proxy((function(){var t={action:"acf/fields/gallery/get_sort_order",field_key:this.get("key"),ids:n,sort:i};e.ajax({url:acf.get("ajaxurl"),dataType:"json",type:"post",cache:!1,data:acf.prepareForAjax(t),success:o})})),o=this.proxy((function(e){acf.isAjaxSuccess(e)&&(e.data.reverse(),e.data.map((function(e){this.$collection().prepend(this.$attachment(e))}),this))}));s()}}},onUpdate:function(t,a){var i=this.$(".acf-gallery-update");if(!i.hasClass("disabled")){var n=acf.serialize(this.$sideData());i.addClass("disabled"),i.before('<i class="acf-loading"></i> '),n.action="acf/fields/gallery/update_attachment",e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(n),type:"post",dataType:"json",complete:function(){i.removeClass("disabled"),i.prev(".acf-loading").remove()}})}},onHover:function(){this.addSortable(this),this.off("mouseover")}});acf.registerFieldType(n),acf.registerConditionForFieldType("hasValue","upload_files"),acf.registerConditionForFieldType("hasNoValue","upload_files"),acf.registerConditionForFieldType("selectionLessThan","upload_files"),acf.registerConditionForFieldType("selectionGreaterThan","upload_files");n=acf.models.RelationshipField.extend({type:"product_grouped"});acf.registerFieldType(n);n=acf.models.RelationshipField.extend({type:"product_cross_sells"});acf.registerFieldType(n);n=acf.models.RelationshipField.extend({type:"product_upsells"});acf.registerFieldType(n);n=acf.models.ImageField.extend({type:"upload_file",$control:function(){return this.$(".acf-"+this.get("field_type")+"-uploader")},$input:function(){return this.$('input[type="hidden"]')},events:{'click a[data-name="add"]':"onClickAdd",'click a[data-name="edit"]':"onClickEdit",'click a[data-name="remove"]':"onClickRemove",'change input[type="file"]':"onChange","input .image-preview":"imagePreview"},getRelatedType:function(){return this.get("field_type")},getRelatedPrototype:function(){return acf.getFieldType(this.getRelatedType()).prototype},imagePreview:function(e,t){var a=new FileReader,i=this.$control();i.find("p,errors").remove(),a.onload=function(){i.find(".hide-if-value").addClass("acff-hidden").siblings(".show-if-value").addClass("show").find("img").attr("src",a.result)},imagePreview=!0,a.readAsDataURL(e.target.files[0]),this.uploadImage(e.target.files[0])},uploadImage:function(t){var a=this.$control(),i=a.parents("form");a.find(".uploads-progress").removeClass("acff-hidden");var n=a.find(".uploads-progress .percent"),s=a.find(".uploads-progress .bar");e.updateNumberTo("33","%",n),s.animate({width:"33%"},"slow");var o=this.$el.parents("form").find("input[name=_acf_nonce]").val(),r=this.get("key"),l=new FormData;l.append("action","acf/fields/upload_file/add_attachment"),l.append("file",t),l.append("field_key",r),l.append("nonce",o),i.find("input[type=submit]").addClass("disabled"),a.find(".acf-actions").addClass("acff-hidden"),e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(l),type:"post",processData:!1,contentType:!1,cache:!1}).done((function(t){t.success?(e.updateNumberTo("100","%",n),s.animate({width:"100%"},"slow"),t.data.src&&a.find("img").attr("src",t.data.src).after("<p>"+t.data.title+"</p>"),a.children('input[type="hidden"]').val(t.data.id),i.find("input[type=submit]").removeClass("disabled"),setTimeout((function(){a.find(".uploads-progress").addClass("acff-hidden"),n.text("0%"),s.css("width","0"),a.find(".acf-actions").removeClass("acff-hidden")}),1e3)):(a.find(".hide-if-value").removeClass("acff-hidden").siblings(".show-if-value").removeClass("show").find("img").attr("src",""),a.addClass("not-valid").append('<p class="errors">'+t.data+"</p>").find(".margin").append('<p class="upload-fail">x</p>'))}))}});acf.registerFieldType(n);e.each(["featured_image","main_image","site_logo","upload_file"],(function(e,t){if("upload_file"!=t){var a=acf.models.UploadFileField.extend({type:t});acf.registerFieldType(a)}acf.registerConditionForFieldType("hasValue",t),acf.registerConditionForFieldType("hasNoValue",t)}))}(jQuery),function(e,t){var a=acf.Field.extend({type:"related_terms",data:{ftype:"select"},select2:!1,wait:"load",events:{'click a[data-name="add"]':"onClickAdd",'click input[type="radio"]':"onClickRadio"},$control:function(){return this.$(".acf-related-terms-field")},$input:function(){return this.getRelatedPrototype().$input.apply(this,arguments)},getRelatedType:function(){var e=this.get("ftype");return"multi_select"==e&&(e="select"),e},getRelatedPrototype:function(){return acf.getFieldType(this.getRelatedType()).prototype},getValue:function(){return this.getRelatedPrototype().getValue.apply(this,arguments)},setValue:function(){return this.getRelatedPrototype().setValue.apply(this,arguments)},initialize:function(){var e=this.$input();this.inherit(e),this.get("ui")&&(ajaxAction="acf/fields/related_terms/query",this.select2=acf.newSelect2(e,{field:this,ajax:this.get("ajax"),multiple:this.get("multiple"),placeholder:this.get("placeholder"),allowNull:this.get("allow_null"),ajaxAction:ajaxAction}))},onRemove:function(){this.select2&&this.select2.destroy()},onClickAdd:function(t,a){var i=this,n=!1,s=!1,o=!1,r=!1,l=!1,d=!1,c=function(e){n.loading(!1),n.content(e),s=n.$("form"),o=n.$('input[name="term_name"]'),r=n.$('select[name="term_parent"]'),l=n.$(".acf-submit-button"),o.focus(),n.on("submit","form",f)},f=function(t,a){if(t.preventDefault(),t.stopImmediatePropagation(),""===o.val())return o.focus(),!1;acf.startButtonLoading(l);var n={action:"acf/fields/related_terms/add_term",field_key:i.get("key"),taxonomy:i.get("taxonomy"),term_name:o.val(),term_parent:r.length?r.val():0};e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(n),type:"post",dataType:"json",success:p})},p=function(e){acf.stopButtonLoading(l),d&&d.remove(),acf.isAjaxSuccess(e)?(o.val(""),u(e.data),d=acf.newNotice({type:"success",text:acf.getAjaxMessage(e),target:s,timeout:2e3,dismiss:!1})):d=acf.newNotice({type:"error",text:acf.getAjaxError(e),target:s,timeout:2e3,dismiss:!1}),o.focus()},u=function(t){var a=e('<option value="'+t.term_id+'">'+t.term_label+"</option>");t.term_parent?r.children('option[value="'+t.term_parent+'"]').after(a):r.append(a),acf.getFields({type:"related_terms"}).map((function(e){e.get("taxonomy")==i.get("taxonomy")&&e.appendTerm(t)})),i.selectTerm(t.term_id)};!function(){n=acf.newPopup({title:a.attr("title"),loading:!0,width:"300px"});var t={action:"acf/fields/related_terms/add_term",field_key:i.get("key"),taxonomy:i.get("taxonomy")};e.ajax({url:acf.get("ajaxurl"),data:acf.prepareForAjax(t),type:"post",dataType:"html",success:c})}()},appendTerm:function(e){"select"==this.getRelatedType()?this.appendTermSelect(e):this.appendTermCheckbox(e)},appendTermSelect:function(e){this.select2.addOption({id:e.term_id,text:e.term_label})},appendTermCheckbox:function(t){var a=this.$("[name]:first").attr("name"),i=this.$("ul:first");"checkbox"==this.getRelatedType()&&(a+="[]");var n=e(['<li data-id="'+t.term_id+'">',"<label>",'<input type="'+this.get("ftype")+'" value="'+t.term_id+'" name="'+a+'" /> ',"<span>"+t.term_name+"</span>","</label>","</li>"].join(""));if(t.term_parent){var s=i.find('li[data-id="'+t.term_parent+'"]');(i=s.children("ul")).exists()||(i=e('<ul class="children acf-bl"></ul>'),s.append(i))}i.append(n)},selectTerm:function(e){"select"==this.getRelatedType()?this.select2.selectOption(e):this.$('input[value="'+e+'"]').prop("checked",!0).trigger("change")},onClickRadio:function(e,t){var a=t.parent("label"),i=a.hasClass("selected");this.$(".selected").removeClass("selected"),a.addClass("selected"),this.get("allow_null")&&i&&(a.removeClass("selected"),t.prop("checked",!1).trigger("change"))}});acf.registerFieldType(a),acf.registerConditionForFieldType("hasValue","related_terms"),acf.registerConditionForFieldType("hasNoValue","related_terms"),acf.registerConditionForFieldType("equalTo","related_terms"),acf.registerConditionForFieldType("notEqualTo","related_terms"),acf.registerConditionForFieldType("patternMatch","related_terms"),acf.registerConditionForFieldType("contains","related_terms"),acf.registerConditionForFieldType("selectionLessThan","related_terms"),acf.registerConditionForFieldType("selectionGreaterThan","related_terms")}(jQuery),acf.add_filter("select2_ajax_data",(function(e,t,a,i,n){return 0!=i&&($field_taxonomy=i.find(".acf-related-terms-field").data("taxonomy"),e.taxonomy=$field_taxonomy),e})),function(e,t){var a=acf.Field.extend({type:"display_name",select2:!1,wait:"load",events:{removeField:"onRemove",duplicateField:"onDuplicate"},$input:function(){return this.$("select")},initialize:function(){var e=this.$input();if(this.inherit(e),this.get("ui")){var t=this.get("ajax_action");t||(t="acf/fields/"+this.get("type")+"/query"),this.select2=acf.newSelect2(e,{field:this,ajax:this.get("ajax"),multiple:this.get("multiple"),placeholder:this.get("placeholder"),allowNull:this.get("allow_null"),ajaxAction:t})}},onRemove:function(){this.select2&&this.select2.destroy()},onDuplicate:function(e,t,a){this.select2&&(a.find(".select2-container").remove(),a.find("select").removeClass("select2-hidden-accessible"))}});acf.registerFieldType(a);e.each(["allow_comments"],(function(e,t){var a=acf.models.TrueFalseField.extend({type:t});acf.registerFieldType(a),acf.registerConditionForFieldType("equalTo",t),acf.registerConditionForFieldType("notEqualTo",t)}));a=acf.Field.extend({type:"list_items",wait:"",events:{'click a[data-event="add-row"]':"onClickAdd",'click a[data-event="duplicate-row"]':"onClickDuplicate",'click a[data-event="remove-row"]':"onClickRemove",'click a[data-event="collapse-row"]':"onClickCollapse",showField:"onShow",unloadField:"onUnload",mouseover:"onHover"},$control:function(){return this.$(".acf-list-items:first")},$table:function(){return this.$("table:first")},$tbody:function(){return this.$("tbody:first")},$rows:function(){return this.$("tbody:first > tr").not(".acf-clone")},$row:function(e){return this.$("tbody:first > tr:eq("+e+")")},$clone:function(){return this.$("tbody:first > tr.acf-clone")},$actions:function(){return this.$(".acf-actions:last")},$button:function(){return this.$(".acf-actions:last .button")},getValue:function(){return this.$rows().length},allowRemove:function(){var e=parseInt(this.get("min"));return!e||e<this.val()},allowAdd:function(){var e=parseInt(this.get("max"));return!e||e>this.val()},addSortable:function(e){1!=this.get("max")&&this.$tbody().sortable({items:"> tr",handle:"> td.order",forceHelperSize:!0,forcePlaceholderSize:!0,scroll:!0,stop:function(t,a){e.render()},update:function(t,a){e.$input().trigger("change")}})},addCollapsed:function(){var t=preference.load(this.get("key"));if(!t)return!1;this.$rows().each((function(a){t.indexOf(a)>-1&&e(this).addClass("-collapsed")}))},addUnscopedEvents:function(t){this.on("invalidField",".acf-row",(function(a){var i=e(this);t.isCollapsed(i)&&t.expand(i)}))},initialize:function(){this.addUnscopedEvents(this),acf.disable(this.$clone(),this.cid),this.render()},render:function(){this.$rows().each((function(t){e(this).find("> .order:not(.ids) > span").html(t+1)}));var t=this.$control(),a=this.$button();0==this.val()?t.addClass("-empty"):t.removeClass("-empty"),this.allowAdd()?(t.removeClass("-max"),a.removeClass("disabled")):(t.addClass("-max"),a.addClass("disabled"))},validateAdd:function(){if(this.allowAdd())return!0;var e=this.get("max"),t=acf.__("Maximum rows reached ({max} rows)");return t=t.replace("{max}",e),this.showNotice({text:t,type:"warning"}),!1},onClickAdd:function(e,t){if(!this.validateAdd())return!1;t.hasClass("acf-icon")?this.add({before:t.closest(".acf-row")}):this.add()},add:function(e){if(!this.allowAdd())return!1;e=acf.parseArgs(e,{before:!1});var t=acf.duplicate({target:this.$clone(),append:this.proxy((function(t,a){e.before?e.before.before(a):t.before(a),a.removeClass("acf-clone"),acf.enable(a,this.cid),this.render()}))});return this.$input().trigger("change"),t},onClickDuplicate:function(e,t){if(!this.validateAdd())return!1;var a=t.closest(".acf-row");this.duplicateRow(a)},duplicateRow:function(e){if(!this.allowAdd())return!1;var t=this.get("key"),a=acf.duplicate({target:e,rename:function(e,a,i,n){return"id"===e?a.replace(t+"-"+i,t+"-"+n):a.replace(t+"]["+i,t+"]["+n)},before:function(e){acf.doAction("unmount",e)},after:function(e,t){acf.doAction("remount",e)}});return this.$input().trigger("change"),this.render(),acf.focusAttention(a),a},validateRemove:function(){if(this.allowRemove())return!0;var e=this.get("min"),t=acf.__("Minimum rows reached ({min} rows)");return t=t.replace("{min}",e),this.showNotice({text:t,type:"warning"}),!1},onClickRemove:function(e,t){var a=t.closest(".acf-row");if(e.shiftKey)return this.remove(a);a.addClass("-hover");acf.newTooltip({confirmRemove:!0,target:t,context:this,confirm:function(){this.remove(a)},cancel:function(){a.removeClass("-hover")}})},remove:function(e){var t=this;acf.remove({target:e,endHeight:0,complete:function(){t.$input().trigger("change"),t.render()}})},isCollapsed:function(e){return e.hasClass("-collapsed")},collapse:function(e){e.addClass("-collapsed"),acf.doAction("hide",e,"collapse")},expand:function(e){e.removeClass("-collapsed"),acf.doAction("show",e,"collapse")},onClickCollapse:function(e,t){var a=t.closest(".acf-row"),i=this.isCollapsed(a);e.shiftKey&&(a=this.$rows()),i?this.expand(a):this.collapse(a)},onShow:function(e,t,a){var i=acf.getFields({is:":visible",parent:this.$el});acf.doAction("show_fields",i)},onUnload:function(){var t=[];this.$rows().each((function(a){e(this).hasClass("-collapsed")&&t.push(a)})),t=t.length?t:null,preference.save(this.get("key"),t)},onHover:function(){this.addSortable(this),this.off("mouseover")}});acf.registerFieldType(a),acf.registerConditionForFieldType("hasValue","list_items"),acf.registerConditionForFieldType("hasNoValue","list_items"),acf.registerConditionForFieldType("lessThan","list_items"),acf.registerConditionForFieldType("greaterThan","list_items")}(jQuery),function(e,t){var a=acf.models.ImageField.extend({type:"url_upload",$control:function(){return this.$(".acf-file-uploader")},$input:function(){return this.$('input[type="hidden"]')},validateAttachment:function(e){return undefined!==(e=e||{}).id&&(e=e.attributes),e=acf.parseArgs(e,{url:"",alt:"",title:"",filename:"",filesizeHumanReadable:"",icon:"/wp-includes/images/media/default.png"})},render:function(e){e=this.validateAttachment(e);var t=this.$el.parents("form"),a=this.$el.parent(".acf-row");void 0!==a&&(t=a),t.find('[data-key="'+this.get("destination")+'"').find(".acf-url").addClass("-valid").find("input").val(e.url)},selectAttachment:function(){var t=this.parent(),a=t&&"repeater"===t.get("type");acf.newMediaPopup({mode:"select",title:acf.__("Select File"),field:this.get("key"),multiple:a,library:this.get("library"),allowedTypes:this.get("mime_types"),select:e.proxy((function(e,a){a>0?this.append(e,t):this.render(e)}),this)})},editAttachment:function(){var t=this.val();if(!t)return!1;acf.newMediaPopup({mode:"edit",title:acf.__("Edit File"),button:acf.__("Update File"),attachment:t,field:this.get("key"),select:e.proxy((function(e,t){this.render(e)}),this)})}});acf.registerFieldType(a);var i=["hasValue","hasNoValue","equalTo","notEqualTo","patternMatch","contains"];e.each(["post_title","product_title","site_title","site_tagline","term_name","username","first_name","last_name","nickname"],(function(t,a){e.each(i,(function(e,t){acf.registerConditionForFieldType(t,a)}))}))}(jQuery);
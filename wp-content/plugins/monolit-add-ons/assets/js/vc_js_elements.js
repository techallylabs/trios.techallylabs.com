

function monolit_do_ajax_get_vc_attach_images(images, holder, wrapper){
  jQuery.post({
      dataType: "json",
      url: ajaxurl,
      data: {action: 'monolit_get_vc_attach_images', images: images},
      success:function(result){
            //wrapper.find('i.vc_element-icon').remove();
            holder.html(result);
          
      }
  });
}


window.MonolitImagesView = vc.shortcode_view.extend({
  $wrapper: !1
  , changeShortcodeParams: function (model) {
    var params;
    if (window.MonolitImagesView.__super__.changeShortcodeParams.call(this, model), params = _.extend({}, model.get("params")), this.$wrapper || (this.$wrapper = this.$el.find(".wpb_element_wrapper")), _.isObject(params)){
      var wrapper_jq = this.$wrapper;
      this.$wrapper.find('.wpb_vc_param_value.ajax-vc-img').each(function(){

        var singleimgHolder = jQuery(this);

        var param_name = singleimgHolder.attr('name') ;

        if(param_name !== 'undefined' && "undefined" !== params[param_name] && '' !== params[param_name]){
          monolit_do_ajax_get_vc_attach_images(params[param_name], singleimgHolder, wrapper_jq);
        }

      });
      
    }
  }
});
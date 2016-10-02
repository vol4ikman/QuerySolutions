# wp-qs-theme

### Wordpress starter theme

##### Basic templates for Wordpress play nice with Foundation Zurb Framework

### Wordpress Ajax ###

```js
var doSsmething = function(response,ajaxData){
    console.log(response);
};
function wpAjax(url,action,data,callback){

    var ajaxData = jQuery.merge({"action":action},data);

    jQuery.post(
         url,
         ajaxData,
         function( response ) {
            if(typeof(callback != "undefined")){
                window[callback](response,ajaxData);
            }
         }
    );
}
```

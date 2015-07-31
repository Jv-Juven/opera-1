
function encryption(){

    var base64EncodeChars = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789+/";
    var base64DecodeChars = new Array(-1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, -1, 62, -1, -1, -1, 63, 52, 53, 54, 55, 56, 57, 58, 59, 60, 61, -1, -1, -1, -1, -1, -1, -1, 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23, 24, 25, -1, -1, -1, -1, -1, -1, 26, 27, 28, 29, 30, 31, 32, 33, 34, 35, 36, 37, 38, 39, 40, 41, 42, 43, 44, 45, 46, 47, 48, 49, 50, 51, -1, -1, -1, -1, -1);
    /**
     * base64编码
     * @param {Object} str
     */
    window.base64encode = function(str){
        var out, i, len;
        var c1, c2, c3;
        len = str.length;
        i = 0;
        out = "";
        while (i < len) {
            c1 = str.charCodeAt(i++) & 0xff;
            if (i == len) {
                out += base64EncodeChars.charAt(c1 >> 2);
                out += base64EncodeChars.charAt((c1 & 0x3) << 4);
                out += "==";
                break;
            }
            c2 = str.charCodeAt(i++);
            if (i == len) {
                out += base64EncodeChars.charAt(c1 >> 2);
                out += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
                out += base64EncodeChars.charAt((c2 & 0xF) << 2);
                out += "=";
                break;
            }
            c3 = str.charCodeAt(i++);
            out += base64EncodeChars.charAt(c1 >> 2);
            out += base64EncodeChars.charAt(((c1 & 0x3) << 4) | ((c2 & 0xF0) >> 4));
            out += base64EncodeChars.charAt(((c2 & 0xF) << 2) | ((c3 & 0xC0) >> 6));
            out += base64EncodeChars.charAt(c3 & 0x3F);
        }
        return out;
    }
    /**
     * base64解码
     * @param {Object} str
     */
    window.base64decode = function(str){
        var c1, c2, c3, c4;
        var i, len, out;
        len = str.length;
        i = 0;
        out = "";
        while (i < len) {
            /* c1 */
            do {
                c1 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
            }
            while (i < len && c1 == -1);
            if (c1 == -1) 
                break;
            /* c2 */
            do {
                c2 = base64DecodeChars[str.charCodeAt(i++) & 0xff];
            }
            while (i < len && c2 == -1);
            if (c2 == -1) 
                break;
            out += String.fromCharCode((c1 << 2) | ((c2 & 0x30) >> 4));
            /* c3 */
            do {
                c3 = str.charCodeAt(i++) & 0xff;
                if (c3 == 61) 
                    return out;
                c3 = base64DecodeChars[c3];
            }
            while (i < len && c3 == -1);
            if (c3 == -1) 
                break;
            out += String.fromCharCode(((c2 & 0XF) << 4) | ((c3 & 0x3C) >> 2));
            /* c4 */
            do {
                c4 = str.charCodeAt(i++) & 0xff;
                if (c4 == 61) 
                    return out;
                c4 = base64DecodeChars[c4];
            }
            while (i < len && c4 == -1);
            if (c4 == -1) 
                break;
            out += String.fromCharCode(((c3 & 0x03) << 6) | c4);
        }
        return out;
    }
    /**
     * utf16转utf8
     * @param {Object} str
     */
    window.utf16to8 = function(str){
        var out, i, len, c;
        out = "";
        len = str.length;
        for (i = 0; i < len; i++) {
            c = str.charCodeAt(i);
            if ((c >= 0x0001) && (c <= 0x007F)) {
                out += str.charAt(i);
            }
            else 
                if (c > 0x07FF) {
                    out += String.fromCharCode(0xE0 | ((c >> 12) & 0x0F));
                    out += String.fromCharCode(0x80 | ((c >> 6) & 0x3F));
                    out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
                }
                else {
                    out += String.fromCharCode(0xC0 | ((c >> 6) & 0x1F));
                    out += String.fromCharCode(0x80 | ((c >> 0) & 0x3F));
                }
        }
        return out;
    }
    /**
     * utf8转utf16
     * @param {Object} str
     */
    window.utf8to16 = function(str){
        var out, i, len, c;
        var char2, char3;
        out = "";
        len = str.length;
        i = 0;
        while (i < len) {
            c = str.charCodeAt(i++);
            switch (c >> 4) {
                case 0:
                case 1:
                case 2:
                case 3:
                case 4:
                case 5:
                case 6:
                case 7:
                    // 0xxxxxxx
                    out += str.charAt(i - 1);
                    break;
                case 12:
                case 13:
                    // 110x xxxx 10xx xxxx
                    char2 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x1F) << 6) | (char2 & 0x3F));
                    break;
                case 14:
                    // 1110 xxxx10xx xxxx10xx xxxx
                    char2 = str.charCodeAt(i++);
                    char3 = str.charCodeAt(i++);
                    out += String.fromCharCode(((c & 0x0F) << 12) | ((char2 & 0x3F) << 6) | ((char3 & 0x3F) << 0));
                    break;
            }
        }
        return out;
    }



    //demo
    //function doit(){
    //    var f = document.f;
    //    f.output.value = base64encode(utf16to8(f.source.value));
    //    f.decode.value = utf8to16(base64decode(f.output.value));
    //}
}


window.navigation = (function() {
    var urlStr = window.location.pathname,
        urlArr = [],
        headNav = $("#header .nav li");
        leftNav = $(".left-nav-list li"),
        certication_li = $(".certificate-nav-container>ul>li"),
        arg = [],
        index = 0;

    urlArr = urlStr.split("/");
    arg = urlArr.length - 1;
    if(isNaN(urlArr[arg])){
        index = urlArr[arg].charCodeAt();

        if(index<100){
            index = index - 64;
        }
        else{
            index = 0;
        }
    }
    else{
        index = urlArr[arg];
    }
    if(urlArr[arg] == "city"){
        index = -1;
    }
    else if(urlArr[arg] == "identity"){
        index = 0;
    }
    
    console.log(index);

    // alert(urlArr[0]+"|"+urlArr[1]);
    if(urlArr[1] == ""){
        headNav.removeClass("active").eq(0).addClass("active");
    }
    else if(urlArr[1] == "customer"){
        if(urlArr[2] == "performance"){

            headNav.removeClass("active").eq(0).addClass("active");

            if(/^teacher/.test(urlArr[3])){
                leftNav.removeClass("active").eq(0).addClass("active");
            }
            else if(/^backstage/.test(urlArr[3])){
                leftNav.removeClass("active").eq(1).addClass("active");
            }
            else{
                leftNav.removeClass("active").eq(2).addClass("active");
            }
        }
        else if(urlArr[2] == "news"){

            headNav.removeClass("active").eq(1).addClass("active");

            if(urlArr[3] == "one_topic"){
                leftNav.removeClass("active").eq(0).addClass("active");
            }
            else if(/^column/.test(urlArr[3])){
                leftNav.removeClass("active").eq(1).addClass("active");
            }
            else if(/^society/.test(urlArr[3])){
                leftNav.removeClass("active").eq(2).addClass("active");
            }
            else if(/^association/.test(urlArr[3])){
                leftNav.removeClass("active").eq(3).addClass("active");
            }
        }
        else if(urlArr[2] == "authentication"){

            headNav.removeClass("active").eq(2).addClass("active");

            if(urlArr[3] == "identity"){
                leftNav.removeClass("active").eq(0).addClass("active");
                certication_li.removeClass("active").eq(index).addClass("active");
            }
            else if(urlArr[3] == "city"){
                leftNav.removeClass("active").eq(1).addClass("active");
                certication_li.removeClass("active").eq( ++ index).addClass("active");
            }
            else if(urlArr[3] == "username"){
                leftNav.removeClass("active").eq(2).addClass("active");
                certication_li.removeClass("active").eq(index).addClass("active");
            }

        }
        else if(urlArr[2] == "employment"){

            headNav.removeClass("active").eq(4).addClass("active");

        }

    }
    else if(urlArr[1] == "user"){
        
        if(urlArr[2] == "auth"){
            leftNav.removeClass("active").eq(0).addClass("active");
            headNav.removeClass("active").eq(5).addClass("active");
        }
        else if(urlArr[2] == "inquiry"){
            leftNav.removeClass("active").eq(1).addClass("active");
            headNav.removeClass("active").eq(5).addClass("active");
        }
        else if(urlArr[2] == "space_home"){
            leftNav.removeClass("active").eq(0).addClass("active");
        }
        else if(urlArr[2] == "topic"){
            leftNav.removeClass("active").eq(1).addClass("active");
        }
        else if(urlArr[2] == "album"){
            leftNav.removeClass("active").eq(2).addClass("active");
        }
        else if(urlArr[2] == "message"){
            leftNav.removeClass("active").eq(3).addClass("active");
        }
        else{
            leftNav.removeClass("active").eq(4).addClass("active");
        }
    }
    else{
        
    }
    
})();

(function ($){
    // jQuery实例对象方法扩展
    $.fn.extend({
        //使元素全屏显示
        fullscreen: function() {
            var width = $(window).width(),
                height = $(window).height();
            $(this).css({
                "width": width,
                "height": height,
                "position": "fixed",
                "top": "0px",
                "left": "0px"
            });
            // console.log("高："+height+"\n宽："+width);
            return $(this);
        },
        // 使元素基于父一级元素居中显示
        centerscreen: function(opts) {
            var fatherEle = $(this).parent(),
                ele = $(this),
                width = opts.width||"auto",
                height = opts.height||"auto";

            if(!/^(absolute)|(relative)/.test(fatherEle.css("position"))){
                fatherEle.css({
                    "position": "relative"
                });
            }

            ele.css({
                "position": "absolute",
                "top": "50%",
                "left": "50%",
                "width": width,
                "height": height,
                "margin": (-height/2)+"px "+(-width/2)+"px"
            });

            return ele;
        }

    });

    //jQuery全局静态方法扩展
    $.extend({
        upload: function() {
            return function (options, handlers){
                var callback, config, name, uploader;
                config = $.extend({},{
                    runtimes: 'html5,flash,html4',
                    browse_button: 'click-file',
                    uptoken_url: '/qiniu/getUpToken',
                    domain: "http://7sbxao.com1.z0.glb.clouddn.com/",
                    container: 'container',
                    max_file_size: '5mb',
                    flash_swf_url: '/lib/plupload/Moxie.swf',
                    max_retries: 3,
                    dragdrop: false,
                    drop_element: 'container',
                    chunk_size: '4mb',
                    auto_start: true,
                    unique_names: true,
                    save_key: true,
                    statusTip: '.image-upload-tips',
                    init: {
                      'Error': function(up, err, errTip) {
                        return console.log(errTip);
                      },
                      'BeforeUpload': function(up, file) {
                        return $(this.getOption().statusTip).text('准备上传图片');
                      },
                      'UploadProgress': function(up, file) {
                        return $(this.getOption().statusTip).text('正在上传图片');
                      },
                      'FileUploaded': function(up, file, info) {
                        var domain;
                        info = $.parseJSON(info);
                        return domain = up.getOption('domain');
                      },
                      'UploadComplete': function() {
                        return $(this.getOption().statusTip).text('图片上传成功');
                      }
                    }
                }, options);
                for (name in handlers) {
                  callback = handlers[name];
                  config.init[name] = callback;
                }
                uploader = Qiniu.uploader(config);
            }
        }
    });

})(jQuery);






albumSwiper = new Swiper ".photo-album-swiper", {
	mode: "horizontal",
	speed: 400,
	#spaceBetween: 100,
	#nextButton: ".swiper-button-next",
	#prevButton: ".swiper-button-prev",
	onSwiperCreated: (swiper)->
		$(".swiper-button-prev").click ()->
			albumSwiper.swipePrev()
		$(".swiper-button-next").click ()->
			albumSwiper.swipeNext()
}

showCloseBtn = (e)->
	$elem = $(e.currentTarget)

	$elem.find(".delete-btn").show()

hideCloseBtn = (e)->
	$elem = $(e.currentTarget)

	$elem.find(".delete-btn").hide()

deletePhoto = (e)->
	$parent = $(e.currentTarget).parent()

	photo_id = $parent.find(".id").val()

	if not confirm('确实要删除该相片吗?')
		return false

	$.post "/user/personal/delete_image", {photo_id: photo_id}, (res)->
		if res.errCode is 0
			alert "相片删除成功"
			$parent.fadeOut();
		else
			alert res.message

	return false

showPhotos = (e)->
	$elem = $(e.currentTarget)

	if $elem.hasClass("delete-btn")
		console.log "sss"
		return false

	$photos = $elem.parent()
	$("#photo-album-swiper").fadeIn()

	currentIndex = 0
	$photos.find(".photo").each (index, elem)->
		if elem == $elem[0]
			currentIndex = index
			return false

	#albumSwiper.update()
	#albumSwiper.reInit()
	albumSwiper.swipeTo(currentIndex)

	$("#mask").fadeIn()

hideMask = (e)->
	$("#photo-album-swiper").fadeOut()
	$("#mask").fadeOut()

$ ->
	$(document).on "mouseenter", ".photo", showCloseBtn
	$(document).on "mouseleave", ".photo", hideCloseBtn
	$(document).on "click", ".delete-btn", deletePhoto
	$(document).on "click", ".photo", showPhotos
	$(document).on "click", "#mask", hideMask

# 上传相片
url_arr = []
window.uploader {
    browse_button: "photo_add_btn",
    container: "photo_add",
    uptoken_url: "/qiniu/getUpToken"
},{
    FileUploaded: (up,file,info)->
	    info = $.parseJSON info
	    domain = up.getOption "domain"
	    url = domain + info.key
	    console.log url + $(".gallary-page .photos").attr "data-album-id"
	    url_arr.push url
    UploadComplete: ()->
	    #队列文件处理完毕后,处理相关的事情
	    console.log url_arr.length
	    $.post "/user/personal/upload_image", {
		    img_urls: url_arr,
		    album_id: $(".gallary-page .photos").attr "data-album-id"
		    }, (data)->
			    if data["errCode"] == 0 
				    alert "图片上传成功"
				    window.location.href = window.location.href
			    else
				    alert data["message"]
}
	
    
    
    
   














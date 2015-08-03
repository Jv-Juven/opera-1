
albumSwiper = new Swiper ".photo-album-swiper", {
	direction: "horizontal",
	speed: 400,
	spaceBetween: 100,
	nextButton: ".swiper-button-next",
	prevButton: ".swiper-button-prev"
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

	albumSwiper.update()
	albumSwiper.slideTo(currentIndex)

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



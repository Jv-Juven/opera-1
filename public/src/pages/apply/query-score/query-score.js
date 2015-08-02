;(function(window){

	var query = function (){

		var queryNum = $("#query_num");
		var queryName = $("#query_name");

		var num = queryNum.val();
		var name = queryName.val();

		if(!/[0-9]+/.test(num)){
			alert("请输入你的编号");
			queryNum.focus();
			return ;
		}
		if(name.length == 0){
			alert("请输入你的姓名");
			queryName.focus();
			return ;
		}

		$.post('/user/score_inquiry',{
			scorenumber : num,
			name        : name
		},function(data){
			if(data["errCode"] == 0){

				$('.query-form').hide();
				$(".query-result").fadeIn(300);

				$(".query-result .line-one").text(data[1]["name"]);
				$(".query-result .line-two").text(data[1]["scorenumber"]);
				$(".query-result .line-three").text(data[1]["score"]);

			}
			else{
				alert(data["message"]);
			}
		},'json');

	}

	$("#query_btn").click(query);

})(window);
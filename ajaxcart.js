$(document).ready(function () {
		$(".addItemBtn").click(function(e){
			e.preventDefault();
			var $form = $(this).closest(".form-submit");
			var id = $form.find(".cid").val();
			var pname = $form.find(".pname").val();
			var pprice = $form.find(".pprice").val();
			var pimage = $form.find(".pimage").val();
			var pcode = $form.find(".pcode").val();
			$.ajax({
				url: 'action.php',
				method: 'post',
				data: {id:id,pname:pname,pprice:pprice,pimage:pimage,pcode:pcode},
				success: function(response){
					$("#message").html(response);

				}

			});


		});
	});
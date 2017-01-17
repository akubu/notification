$(document).ready(function(){

						$("#menu-toggle").click(function(){
    $("#toggleArrowRight").toggleClass("fa-angle-right");
	$("#toggleArrowRight").toggleClass("fa-angle-left");
});			
		
		
		$("#file1").on("change paste keyup", function() {
			$("#browse1").addClass("inactiveGrey");
			$("#upload1").addClass("uploadLabelGreen");
			$("#upload1").removeClass("uploadLabelBlue");
			$("#smallCTA1").css("display", "inline-block");
			document.getElementById("upload1").disabled = false;
			$('#browse1').attr('for','nothing');
		});
	
	$("#smallCTA1").click(function(){
		
		$("#browse1").removeClass("inactiveGrey");
		$("#file_1").val('');
		$("#smallCTA1").css("display", "none");
		$("#upload1").removeClass("uploadLabelGreen");
		$("#upload1").addClass("uploadLabelBlue");
		$("#smallCTA2").css("display", "none");
		$("#upload1").removeClass("inactiveGreen");
		document.getElementById("upload1").disabled = true;
		$('#browse1').attr('for','file1');
		
		});
		
		$("#upload1").click(function(){ 
		$("#smallCTA2").css("display", "inline-block");
		$("#upload1").addClass("inactiveGreen");
		document.getElementById("upload1").disabled = true;
		 });
		/*1 ends*/
			$("#file2").on("change paste keyup", function() {
			$("#browse2").addClass("inactiveGrey");
			$("#upload2").addClass("uploadLabelGreen");
			$("#upload2").removeClass("uploadLabelBlue");
			$("#smallCTA3").css("display", "inline-block");
			document.getElementById("upload2").disabled = false;
			$('#browse2').attr('for','nothing');
		});
	
	$("#smallCTA3").click(function(){
		
		$("#browse2").removeClass("inactiveGrey");
		$("#file_2").val('');
		$("#smallCTA3").css("display", "none");
		$("#upload2").removeClass("uploadLabelGreen");
		$("#upload2").addClass("uploadLabelBlue");
		$("#smallCTA4").css("display", "none");
		$("#upload2").removeClass("inactiveGreen");
		document.getElementById("upload2").disabled = true;
		$('#browse2').attr('for','file2');
		
		});
		
		$("#upload2").click(function(){ 
		$("#smallCTA4").css("display", "inline-block");
		$("#upload2").addClass("inactiveGreen");
		document.getElementById("upload2").disabled = true;
		 });
		/*2 ends*/
			$("#file3").on("change paste keyup", function() {
			$("#browse3").addClass("inactiveGrey");
			$("#upload3").addClass("uploadLabelGreen");
			$("#upload3").removeClass("uploadLabelBlue");
			$("#smallCTA5").css("display", "inline-block");
			document.getElementById("upload3").disabled = false;
			$('#browse3').attr('for','nothing');
		});
	
	$("#smallCTA5").click(function(){
		
		$("#browse3").removeClass("inactiveGrey");
		$("#file_3").val('');
		$("#smallCT53").css("display", "none");
		$("#upload3").removeClass("uploadLabelGreen");
		$("#upload3").addClass("uploadLabelBlue");
		$("#smallCTA6").css("display", "none");
		$("#upload3").removeClass("inactiveGreen");
		document.getElementById("upload3").disabled = true;
		$('#browse3').attr('for','file3');
		
		});
		
		$("#upload3").click(function(){ 
		$(".panelTrigger").show();
			$(".newDocPanel").hide();
		
			$("#browse3").removeClass("inactiveGrey");
		$("#file_3").val('');
		$("#smallCT53").css("display", "none");
		$("#upload3").removeClass("uploadLabelGreen");
		$("#upload3").addClass("uploadLabelBlue");
		$("#smallCTA6").css("display", "none");
		$("#upload3").removeClass("inactiveGreen");
		document.getElementById("upload3").disabled = true;
		$('#browse3').attr('for','file3');
		$("#smallCTA5").css("display", "none");
		 });
		 
		 $("#addNewDoc").click(function(){
			$(".panelTrigger").hide();
			$(".newDocPanel").show();
			});
			
	
		/*3 ends*/
				$("#file4").on("change paste keyup", function() {
			$("#browse4").addClass("inactiveGrey");
			$("#upload4").addClass("uploadLabelGreen");
			$("#upload4").removeClass("uploadLabelBlue");
			$("#smallCTA7").css("display", "inline-block");
			document.getElementById("upload4").disabled = false;
			$('#browse4').attr('for','nothing');
		});
	
	$("#smallCTA7").click(function(){
		
		$("#browse4").removeClass("inactiveGrey");
		$("#file_4").val('');
		$("#smallCTA7").css("display", "none");
		$("#upload4").removeClass("uploadLabelGreen");
		$("#upload4").addClass("uploadLabelBlue");
		$("#smallCTA8").css("display", "none");
		$("#upload4").removeClass("inactiveGreen");
		document.getElementById("upload4").disabled = true;
		$('#browse4').attr('for','file4');
		
		});
		
		$("#upload4").click(function(){ 
		$("#smallCTA8").css("display", "inline-block");
		$("#upload4").addClass("inactiveGreen");
		document.getElementById("upload4").disabled = true;
		 });
		 /*4 ends*/
								

});

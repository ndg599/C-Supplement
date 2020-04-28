var std_speed  = 1000;
var delay_speed = 2000;
var change_speed = false;
var pause_animation = false;
var resume_pos = 1;

$(document).ready(function(){
	$("#Pause").attr("disabled","disabled");
	$("#Resume").attr("disabled","disabled");
	$("#Pause i").css("color","#212529");
	$("#Resume i").css("color","#212529");
	$("#Play").click(function($e){
		$e.preventDefault();
		$("#Pause").removeAttr("disabled","disabled");
		$("#Play").attr("disabled","disabled");
		$("#Slow").attr("disabled","disabled");
		$("#Fast").attr("disabled","disabled");
		$("#Resume").attr("disabled","disabled");
		$("#Pause i").css("color","#b31b1b");
		$("#Play i").css("color","#212529");
		$("#Slow i").css("color","#212529");
		$("#Fast i").css("color","#212529");
		$("#Resume i").css("color","#212529");
		pause_animation = false;
		var x = window.scrollX;
		var y = window.scrollY;
		stepOne(x,y);
	});
	
	function sleep (time) {
	  return new Promise((resolve) => setTimeout(resolve, time));
	}
	
	function stepOne(x,y) 
	{
		changeText(0,4);
		$("#pseudo").remove();
		$("#pseudo").append('<p class="green mt-2"><span class="yellow">Loop:</span> number-of-elements / 2 times \
		                     <br><span class="yellow"> Swap:</span> first element with last element \
		                     <br><span class="yellow"> Swap:</span> second element with second-to-last element</p>');
		window.scrollTo(x,y);
		$("#box0").animate({bottom: '177px'},std_speed)
				  .animate({left:   '140px'},std_speed);
		$("#box4").animate({bottom: '133px'},std_speed)
				  .animate({right:  '260px'},std_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepTwo();
		});
	}
	function stepTwo() 
	{
		$("#box0").delay(std_speed)
				  .animate({bottom:  '87px'},std_speed);
		$("#box4").delay(delay_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepThree();
		});
	}	
	function stepThree() 
	{
		$("#box0").delay(std_speed)
				  .animate({bottom: '133px'},std_speed);
		$("#box4").animate({bottom: '177px'},std_speed)
				  .delay(std_speed);	  
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepFour();
		});
	}
	function stepFour() 
	{					
		$("#box0").delay(std_speed)
				  .animate({left:   '400px'},std_speed)
				  .animate({top:        '0'},std_speed);
		$("#box4").delay(std_speed)
				  .animate({right:  '400px'},std_speed)
				  .animate({top:        '0'},std_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepFive();
		});
	}
	function stepFive() 
	{
		changeText(1,3);
		$("#box1").animate({bottom: '177px'},std_speed)
				  .animate({left:    '40px'},std_speed);
		$("#box3").animate({bottom: '133px'},std_speed)
				  .animate({right:  '160px'},std_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepSix();
		});
	}
	function stepSix() 
	{
		$("#box1").delay(std_speed)
				  .animate({bottom:  '87px'},std_speed);
		$("#box3").delay(delay_speed)
				  .animate({bottom: '177px'},std_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepSeven();
		});
	}
	function stepSeven() 
	{
		$("#box1").delay(std_speed)
				  .animate({bottom: '133px'},std_speed);
		++resume_pos;
		sleep(3000).then(()=> {
			if(pause_animation === false)
				stepEight();
		});
	}
	function stepEight() 
	{
		$("#box1").delay(std_speed)
				  .animate({left:   '200px'},std_speed)
				  .animate({top:        '0'},std_speed);
		$("#box3").delay(std_speed)
				  .animate({right:  '200px'},std_speed)
				  .animate({top:        '0'},std_speed);
		++resume_pos; 
	}
 
	function changeText(x,y)
	{
		$("#eleX").html("Element[" + x + "]:");
		$("#eleY").html("Element[" + y + "]:");
	}
	
	$("#Restart").click(function($e){
		$e.preventDefault();
		$("#box0").stop(true).removeAttr("style");
		$("#box1").stop(true).removeAttr("style");
		$("#box3").stop(true).removeAttr("style");
		$("#box4").stop(true).removeAttr("style");
		$("#Play").removeAttr("disabled","disabled");
		$("#Play i").css("color","#2ab31b");
		$("#Slow").removeAttr("disabled","disabled");
		$("#Slow i").css("color","white");
		$("#Fast").removeAttr("disabled","disabled");
		$("#Fast i").css("color","white");				
		$("#eleX").html("Element[X]:");
		$("#eleY").html("Element[Y]:");
		resume_pos = 0;
		pause_animation = true;
	});
	
	$("#Pause").click(function($e){
		$e.preventDefault();
		pause_animation = true;
		$("#Pause").attr("disabled","disabled");
		$("#Pause i").css("color","#212529");
		$("#Slow").removeAttr("disabled","disabled");
		$("#Slow i").css("color","white");
		$("#Fast").removeAttr("disabled","disabled");
		$("#Fast i").css("color","white");
		$("#Resume").removeAttr("disabled","disabled");
		$("#Resume i").css("color","#29a670");
	});
	
	$("#Slow").click(function($e){
		$e.preventDefault();
		if(std_speed == 1000) {
			std_speed = 2000;
			delay_speed = 4000;
		}
		else if(std_speed == 800) {
			std_speed = 1000;
			delay_speed = 2000;
		}
	});
	
	$("#Fast").click(function($e){
		$e.preventDefault();
		if(std_speed == 1000) {
			std_speed = 700;
			delay_speed = 1700;
		}
		else if(std_speed == 2000) {
			std_speed = 1000;
			delay_speed = 2000;
		}
	});
	
	$("#Resume").click(function($e){
		$e.preventDefault();
		pause_animation = false;
		$("#Pause").removeAttr("disabled","disabled");
		$("#Pause i").css("color","#b31b1b");
		$("#Play").attr("disabled","disabled");
		$("#Slow").attr("disabled","disabled");
		$("#Slow i").css("color","#212529");
		$("#Fast i").css("color","#212529");
		switch(resume_pos) {
			case 1:
				stepOne();
				break;
			case 2:
				stepTwo();
				break;
			case 3:
				stepThree();
				break;
			case 4:
				stepFour();
				break;
			case 5:
				stepFive();
				break;
			case 6:
				stepSix();
				break;
			case 7:
				stepSeven();
				break;
			case 8:
				stepEight();
		}
	});
});
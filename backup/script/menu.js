var menu_slideSpeed = 7;	// Higher value = faster
var menu_timer = 10;	// Lower value = faster

var objectIdToSlideDown = false;
var menu_activeId = false;
var menu_slideInProgress = false;
function showHideContent(e,inputId)
{
	if(menu_slideInProgress)return;
	menu_slideInProgress = true;
	if(!inputId)inputId = this.id;
	inputId = inputId + '';
	var numericId = inputId.replace(/[^0-9]/g,'');
	var answerDiv = document.getElementById('menu_a' + numericId);

	objectIdToSlideDown = false;
	
	if(!answerDiv.style.display || answerDiv.style.display=='none'){		
		if(menu_activeId &&  menu_activeId!=numericId){			
			objectIdToSlideDown = numericId;
			slideContent(menu_activeId,(menu_slideSpeed*-1));
		}else{
			
			answerDiv.style.display='block';
			answerDiv.style.visibility = 'visible';
			
			slideContent(numericId,menu_slideSpeed);
		}
	}else{
		slideContent(numericId,(menu_slideSpeed*-1));
		menu_activeId = false;
	}	
}

function slideContent(inputId,direction)
{
	
	var obj =document.getElementById('menu_a' + inputId);
	var contentObj = document.getElementById('menu_ac' + inputId);
	height = obj.clientHeight;
	if(height==0)height = obj.offsetHeight;
	height = height + direction;
	rerunFunction = true;
	if(height>contentObj.offsetHeight){
		height = contentObj.offsetHeight;
		rerunFunction = false;
	}
	if(height<=1){
		height = 1;
		rerunFunction = false;
	}

	obj.style.height = height + 'px';
	var topPos = height - contentObj.offsetHeight;
	if(topPos>0)topPos=0;
	contentObj.style.top = topPos + 'px';
	if(rerunFunction){
		setTimeout('slideContent(' + inputId + ',' + direction + ')',menu_timer);
	}else{
		if(height<=1){
			obj.style.display='none'; 
			if(objectIdToSlideDown && objectIdToSlideDown!=inputId){
				document.getElementById('menu_a' + objectIdToSlideDown).style.display='block';
				document.getElementById('menu_a' + objectIdToSlideDown).style.visibility='visible';
				slideContent(objectIdToSlideDown,menu_slideSpeed);				
			}else{
				menu_slideInProgress = false;
			}
		}else{
			menu_activeId = inputId;
			menu_slideInProgress = false;
		}
	}
}



function initShowHideDivs()
{
	var divs = document.getElementsByTagName('DIV');
	var divCounter = 1;
	for(var no=0;no<divs.length;no++){
		if(divs[no].className=='menu_question'){
			divs[no].onclick = showHideContent;
			divs[no].id = 'menu_q'+divCounter;
			var answer = divs[no].nextSibling;
			while(answer && answer.tagName!='DIV'){
				answer = answer.nextSibling;
			}
			answer.id = 'menu_a'+divCounter;	
			contentDiv = answer.getElementsByTagName('DIV')[0];
			contentDiv.style.top = 0 - contentDiv.offsetHeight + 'px'; 	
			contentDiv.className='menu_answer_content';
			contentDiv.id = 'menu_ac' + divCounter;
			answer.style.display='none';
			answer.style.height='1px';
			divCounter++;
		}		
	}	
}
window.onload = initShowHideDivs;
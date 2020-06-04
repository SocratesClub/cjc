var rpPel = null;
var Commentarea = null;

function $s(){
	if(arguments.length == 1)
		return get$(arguments[0]);
	
	var elements = [];
	$c(arguments).each(function(el){elements.push(get$(el));});

	return elements;
}

function get$(el){
	if(typeof el == 'string')
		el = document.getElementById(el);
	return el;
}

function $c(array){
	var nArray = [];
	for (i=0;el=array[i];i++) nArray.push(el);
	return nArray;
}

function commentarea(){
	var fi = $s(commentformid).getElementsByTagName('textarea');
	for(var i=0; i<fi.length; i++ ){
			if(fi[i].name == 'comment'){
				return fi[i];
			}
	}
	return null;
}

function movecfm(event,Id,dp,author){
	var cfm = $s(commentformid);

	if(cfm == null){
	  	alert("ERROR:\nCan't find the 'commentformid' div.");
		return false;
	}

	var reRootElement = $s("cancel_reply");

	if(reRootElement == null){
		alert("Error:\nNo anchor tag called 'cancel_reply'.");
		return false;
	}
	
	var replyId = $s("comment_reply_ID");
	
	if(replyId == null){
		alert("Error:\nNo form field called 'comment_reply_ID'.");
		return false;
	}

	var dpId = $s("comment_reply_dp");

	if(Commentarea == null)
		Commentarea = commentarea();

	if(parseInt(Id)){
		if(cfm.style.display == "none"){
			alert("New Comment is submiting, please wait a moment");
			return false;
		}

		if(event == null)
              event = window.event;

		rpPel = event.srcElement? event.srcElement : event.target;
		rpPel = rpPel.parentNode.parentNode;

		var OId = $s("comment-"+Id);
		if(OId == null){
			//alert("Error:\nNo comment called 'comment-xxx'.");
			//return false;
			OId = rpPel;
		}

		replyId.value = Id;
		if(dpId)
			dpId.value = dp;
		reRootElement.style.display = "block";

		if($s("cfmguid") == null){
			var c = document.createElement("div");
			c.id = "cfmguid";
			c.style.display = "none";
			cfm.parentNode.insertBefore(c,cfm);
		}
		cfm.parentNode.removeChild(cfm);
		OId.appendChild(cfm);

		if(Commentarea && Commentarea.display != "none"){
			Commentarea.focus();
			if(atreply == 'author')
				Commentarea.value = '@' + author + ', ';
			else if(atreply == 'authorlink')
				Commentarea.value = '<a href="#comment-' + Id + '">@' + author + '</a>, ';
		}

		cfm.style.display = "block";
	}else{
		replyId.value = "0";
		if(dpId)
			dpId.value = "0";
		reRootElement.style.display = "none";
			
		var c = $s("cfmguid");
		if(c){
			cfm.parentNode.removeChild(cfm);
			c.parentNode.insertBefore(cfm,c);
		}

		if(parseInt(dp) && Commentarea && Commentarea.display != "none"){
			Commentarea.focus();
			//Commentarea.value = '';
		}
	}
	return true;
}

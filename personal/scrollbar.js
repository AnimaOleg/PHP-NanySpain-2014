function P7_VScroller(el,dr,ty,oy,spd) {
	var g, gg, fr, sp, pa='', slw=true, m=false, h, ly;
	ty=parseInt(ty);

	if((g=MM_findObj(el))!=null){
		gg=(document.layers)?g:g.style;
	}else{
		return;
	}
	
	if(dr=="Stop"){
		if(g.toMove){
			clearTimeout(g.p7Magic);
		}
		g.toMove=false;
	}
	
	if((parseInt(navigator.appVersion)>4 || navigator.userAgent.indexOf("MSIE")>-1)&& !window.opera){
		pa="px";
	}
	
	if(navigator.userAgent.indexOf("NT")>-1 || navigator.userAgent.indexOf("Windows 2000")>-1){
		slw=false;
	}
	
	if(spd=="Slow"){
		sp=(slw)?2:1;
		fr=(slw)?40:30;
	}else if(spd=="Medium"){
		sp=(slw)?4:1;
		fr=(slw)?40:10;
	}else{
		sp=(slw)?8:4;fr=(slw)?40:10;
	}if(spd=="Warp"){
		sp=5000;
	}
	
	var yy=parseInt(gg.top);
	if(isNaN(yy)){
		if(g.currentStyle){
			yy=parseInt(g.currentStyle.top);
		}else if(document.defaultView&&document.defaultView.getComputedStyle){
			yy=parseInt(document.defaultView.getComputedStyle(g,"").getPropertyValue("top"));
		}else{
			yy=0;
		}
	}
	
	if(document.all || document.getElementById){
		h=parseInt(g.offsetHeight);
		if(!h){
			h=parseInt(g.style.pixelHeight);
		}
	}else if(document.layers){
		h=parseInt(g.clip.height);
	}
	
	ly=ty+parseInt(oy)-h;
	if(dr=="Down"){
		if(yy>ly){
			m=true;yy-=sp;
			if(yy<ly){
				yy=ly;
			}
		}
	}
	
	f(dr=="Up"){
		if(yy<ty){
			m=true;
			yy+=sp;
			if(yy>ty){
				yy=ty;
			}
		}
	}
	if(dr=="Reset"){
		gg.top=ty+pa;if(g.toMove){
		clearTimeout(g.p7Magic);
		}
		g.toMove=false;
	}
	
	f(m){
		gg.top=yy+pa;
		if(g.toMove){
			clearTimeout(g.p7Magic);
		}
		g.toMove=true;
		eval("g.p7Magic=setTimeout(\"P7_VScroller('"+el+"','"+dr+"',"+ty+","+oy+",'"+spd+"')\","+fr+")");
	}else{
		g.toMove=false;
	}
}
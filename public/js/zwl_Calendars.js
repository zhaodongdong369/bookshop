// JavaScript Document
function zwl_setdates(y,m,d){
		this.startDate;
		this.year=y;
		this.month=m;
		this.day=d;
		this.startYear=0;
		this.endYear=0;
		this.X=0;
		this.Y=0;
		this.setInput='';
		this.itemBar=function(i){
			newObj=document.createElement('li');
			newObj.style.width='27px';
			newObj.style.height='20px';
			newObj.style.lineHeight='20px';
			newObj.style.lineHeight='20px';
			newObj.style.textAlign='center';
			newObj.style.margin='1px';
				newObj.style.styleFloat='left';
				newObj.style.cssFloat='left';
		
			if(parseInt(i)>0){newObj.innerHTML=i;
				newObj.style.cursor='pointer';
				if(i!=this.day){
					newObj.onmouseover=function(){this.style.backgroundColor='#01a252';}
					newObj.onmouseout=function(){this.style.backgroundColor='';}					
				}else{
					newObj.style.backgroundColor='#01a252';
				}
				if(this.setInput!='' && document.getElementById(this.setInput)) var getDateInput=document.getElementById(this.setInput);
				newObj.onclick=function(){
					if(getDateInput){
						m=parseInt(document.getElementById('zwl_select_month').options[document.getElementById('zwl_select_month').selectedIndex].value);
						y=parseInt(document.getElementById('zwl_select_year').options[document.getElementById('zwl_select_year').selectedIndex].value);
						
						m=m<10?'0'+String(m):m;
						d=i;
						zwl_setdate_obj.day=i;
						d=d<10?'0'+String(d):d;
						setV=y+'-'+m+'-'+d;
						if(getDateInput.tagName.toLowerCase()=='input') getDateInput.value=setV;
						else getDateInput.innerText=setV;
						document.getElementById('zwl_date_panel').style.display='none';
					}
				}
				
			}
			return newObj;
		}
		this.loadDiv=function(){
			pD= document.createElement('div');
			pD.id='zwl_date_panel';
			pD.style.width='210px';
			pD.style.height='200px';
			pD.style.paddingTop='10px';
			pD.style.border='1px';
			pD.style.borderStyle='solid';
			pD.style.borderColor='#01a252';
			pD.style.styleFloat='left';
			pD.style.cssFloat='left';
			pD.style.display='none';
			pD.style.position='absolute';
			pD.style.backgroundColor='#01a252';
			var MiniSite=new Object();
			MiniSite.Browser={
				ie:/msie/.test(window.navigator.userAgent.toLowerCase()),
				moz:/gecko/.test(window.navigator.userAgent.toLowerCase()),
				opera:/opera/.test(window.navigator.userAgent.toLowerCase()),
				safari:/safari/.test(window.navigator.userAgent.toLowerCase())
			};
			pD.innerHTML='';
			if(!MiniSite.Browser.opera)
			pD.innerHTML='<iframe frameborder="0" style="border:0px; width:100%; height:100%;FILTER: progid:DXImageTransform.Microsoft.Alpha(style=0,opacity=0);z-index:0px;">';
			
			pD.innerHTML+='<div style="width:100%;position:absolute;z-index:5px;left:0px;top:0px;padding-bottom:10px;font-size:12px;border:1px solid black;background-color: #01a252;"><div style="width:100%;font-size:12px; text-align:center; border-bottom:#507493 1px solid; padding-top:10px;padding-bottom:10px;background:#01a252"><a style="float:right;margin-top:4px;margin-right:4px;" href="javascript:void(0)" onclick="zwl_setdate_hiddShow();return false;">关闭</a><select name="zwl_select_year" id="zwl_select_year" onchange="zwl_setdate_onchange()"></select>年<select name="zwl_select_month" id="zwl_select_month"  onchange="zwl_setdate_onchange()"></select>月</div><div style="width:100%;background:#eaeaea"><ul style=" list-style:none; margin:0px; padding:0px;"><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;" onmouseover="">Sun</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Mon</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Tue</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Wed</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Thu</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Fri</li><li style=" width:27px; height:20px; text-align:center; line-height:20px; margin:1px; float:left;">Sat</li></ul><ul style="margin:0px; padding:0px; clear:left; width:100%; list-style:none;font-size:12px;" id="zwl_date_list"></ul></div><div>';
			//var head = document.getElementsByTagName("head").item(0);
			document.body.appendChild(pD);
			
		}
		this.monthDays=function(iYear,iMonth) 	{   
			var   DayNumber=new   Array(11)     //Array   to   save   every   month   days   
			DayNumber[0]=DayNumber[2]=DayNumber[4]=DayNumber[6]=DayNumber[7]=DayNumber[9]=DayNumber[11]=31;   
			DayNumber[3]=DayNumber[5]=DayNumber[8]=DayNumber[10]=30;   
			if   (iYear%4==0&&((iYear%100!=0)||(iYear%400==0)))   
			DayNumber[1]   =   29;   
			else   
			DayNumber[1]   =   28;   
			
			return   DayNumber[iMonth];   
		}
		this.beforLoad=function(){
			this.loadDiv();
			//document.getElementById('zwl_date_panel').style.display='';
			if(this.year>0 && this.month>0 && this.day>0){
				this.startDate=new Date(this.year,this.month,this.day);
			}
			else{
				this.startDate=new Date();
				this.year=this.startDate.getUTCFullYear();
				this.month=this.startDate.getUTCMonth();
				this.day=this.startDate.getUTCDate();
			}
			if(this.startYear==0) this.startYear=this.year;
			if(this.endYear==0) this.endYear=this.year;
			for(loop=this.startYear;loop<=this.endYear;loop++){
				document.getElementById('zwl_select_year').options.add(new Option(loop,loop));
				if(loop==this.year) document.getElementById('zwl_select_year').selectedIndex=document.getElementById('zwl_select_year').options.length-1;
			}
			for(loop=1;loop<=12;loop++){
				document.getElementById('zwl_select_month').options.add(new Option(loop,loop));
				if(loop==(this.month+1)) {document.getElementById('zwl_select_month').selectedIndex=loop-1;}
			
			}
				
		}
		this.loading=function(){
			this.beforLoad();
		}
		this.change=function(){
			
				this.month=parseInt(document.getElementById('zwl_select_month').options[document.getElementById('zwl_select_month').selectedIndex].value)-1;			
				this.year=parseInt(document.getElementById('zwl_select_year').options[document.getElementById('zwl_select_year').selectedIndex].value);
				
				if(this.year>0 && this.month>=0 && this.day>0){
					this.startDate=new Date(this.year,this.month,this.day);
				}
				else{
					this.startDate=new Date();
					this.year=this.startDate.getUTCFullYear();
					this.month=this.startDate.getUTCMonth();
					this.day=this.startDate.getUTCDate();
				}
				
				document.getElementById('zwl_date_list').innerHTML='';
				oneDay=new Date(this.year,this.month,1);
				emptyDay=oneDay.getUTCDay();
				if(emptyDay<6){
					for(var loop=0;loop<=emptyDay;loop++){
						myChild=this.itemBar(0);
						document.getElementById('zwl_date_list').appendChild(myChild);
					}
				}
				days=this.monthDays(this.year,this.month);
				for(i=1;i<=days;i++){
					myChild=this.itemBar(i);
					document.getElementById('zwl_date_list').appendChild(myChild);
				}
		}
		this.move=function(){
			if(document.getElementById('zwl_date_panel')){
			if(this.year>0 && this.month>=0 && this.day>0){
					this.startDate=new Date(this.year,this.month,this.day);
				}
				else{
					this.startDate=new Date();
					this.year=this.startDate.getUTCFullYear();
					this.month=this.startDate.getUTCMonth();
					this.day=this.startDate.getUTCDate();
				}
				document.getElementById('zwl_date_list').innerHTML='';
				oneDay=new Date(this.year,this.month,1);
				emptyDay=oneDay.getUTCDay();
				if(emptyDay<6){
					for(var loop=0;loop<=emptyDay;loop++){
						myChild=this.itemBar(0);
						document.getElementById('zwl_date_list').appendChild(myChild);
					}
				}
				days=this.monthDays(this.year,this.month);
				for(i=1;i<=days;i++){
					myChild=this.itemBar(i);
					document.getElementById('zwl_date_list').appendChild(myChild);
				}
				l=document.getElementById('zwl_select_year').options.length;
				for(i=0;i<l;i++){
					if(document.getElementById('zwl_select_year').options[i].value==this.year) document.getElementById('zwl_select_year').selectedIndex=i;
				}
				l=document.getElementById('zwl_select_month').options.length;
				for(i=0;i<l;i++){
					if(document.getElementById('zwl_select_month').options[i].value==(this.month+1)) document.getElementById('zwl_select_month').selectedIndex=i;
				}
			document.getElementById('zwl_date_panel').style.display='';
			document.getElementById('zwl_date_panel').style.left=this.X+'px';
			document.getElementById('zwl_date_panel').style.top=this.Y+'px';
			}
			else{alert('loading');}
		}
	}

	var zwl_setdate_obj;
	function zwl_setdate_panel(){
		this.startYear=0;
		this.setdate=new zwl_setdates();
		this.endYear=0;
		this.loadding=function(){
			zwl_setdate_obj=this.setdate;
			zwl_setdate_obj.startYear=this.startYear;
			zwl_setdate_obj.endYear=this.endYear;
			zwl_setdate_obj.loading();
		}
		
	}
	function zwl_setdate_onchange(){
		if(zwl_setdate_obj){
			zwl_setdate_obj.change();
		}
	}
	function zwl_setdate_moveShow(e,i,y,m,d){
		var ev = window.event || e;
		var evX= ev.clientX ;
		var evY=ev.clientY;	
		zwl_setdate_obj.year=parseInt(y)>0?parseInt(y):zwl_setdate_obj.year;
		zwl_setdate_obj.month=parseInt(m)>0?parseInt(m)-1:zwl_setdate_obj.month;		
		zwl_setdate_obj.day=parseInt(d)>0?parseInt(d):zwl_setdate_obj.day;
		zwl_setdate_obj.setInput=i;
		//zwl_setdate_onchange()
		zwl_setdate_obj.X=evX;
		zwl_setdate_obj.Y=evY;
		zwl_setdate_obj.move();
	}
	function zwl_setdate_hiddShow()
	{
		document.getElementById('zwl_date_panel').style.display='none';
	}
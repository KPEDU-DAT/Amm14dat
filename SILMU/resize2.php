<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>Kuva muoka</title>
</head>
<body>
<script>

var isIE = (document.all) ? true : false;


   function $(id) {
    if (typeof jQuery == 'undefined' || (typeof id == 'string' && document.getElementById(id))) {
    return document.getElementById(id);
    } else if (typeof id == 'object' || !/^w*$/.exec(id) ||
    /^(body|div|span|a|input|textarea|button|img|ul|li|ol|table|tr|th|td)$/.exec(id)){
    return jQuery(id);
    }
    return null;
    }


var Class = {
	create: function() {
		return function() { this.initialize.apply(this, arguments); }
	}
}

var Extend = function(destination, source) {
	for (var property in source) {
		destination[property] = source[property];
	}
}

var Bind = function(object, fun) {
	return function() {
		return fun.apply(object, arguments);
	}
}

var BindAsEventListener = function(object, fun) {
	var args = Array.prototype.slice.call(arguments).slice(2);
	return function(event) {
		return fun.apply(object, [event || window.event].concat(args));
	}
}

var CurrentStyle = function(element){
	return element.currentStyle || document.defaultView.getComputedStyle(element, null);
}

function addEventHandler(oTarget, sEventType, fnHandler) {
	if (oTarget.addEventListener) {
		oTarget.addEventListener(sEventType, fnHandler, false);
	} else if (oTarget.attachEvent) {
		oTarget.attachEvent("on" + sEventType, fnHandler);
	} else {
		oTarget["on" + sEventType] = fnHandler;
	}
};

function removeEventHandler(oTarget, sEventType, fnHandler) {
    if (oTarget.removeEventListener) {
        oTarget.removeEventListener(sEventType, fnHandler, false);
    } else if (oTarget.detachEvent) {
        oTarget.detachEvent("on" + sEventType, fnHandler);
    } else { 
        oTarget["on" + sEventType] = null;
    }
};



var SimpleResize = Class.create();
SimpleResize.prototype = {
  initialize: function(obj, options) {
	this._obj = $(obj);
	
	this._fR = BindAsEventListener(this, this.Resize);
	this._fS = Bind(this, this.Stop);
	
	this._obj.style.position = "absolute";
  },

  Set: function(resize, side) {
	var resize = $(resize), fun;
	if(!resize) return;
	switch (side.toLowerCase()) {
	case "up" :
		fun = this.Up;
		break;
	case "down" :
		fun = this.Down;
		break;
	case "left" :
		fun = this.Left;
		break;
	case "right" :
		fun = this.Right;
		break;
	case "left-up" :
		fun = this.LeftUp;
		break;
	case "right-up" :
		fun = this.RightUp;
		break;
	case "left-down" :
		fun = this.LeftDown;
		break;
	case "right-down" :
	default :
		fun = this.RightDown;
	};
	addEventHandler(resize, "mousedown", BindAsEventListener(this, this.Start, fun));
  },

  Start: function(e, fun) {
	this._fun = fun;
	
	this._styleWidth =  this._obj.clientWidth;
	this._styleHeight = this._obj.clientHeight;
	this._styleLeft = this._obj.offsetLeft;
	this._styleTop = this._obj.offsetTop;
	
	this._sideLeft = e.clientX - this._styleWidth;
	this._sideRight = e.clientX + this._styleWidth;
	this._sideUp = e.clientY - this._styleHeight;
	this._sideDown = e.clientY + this._styleHeight;
	
	this._fixLeft = this._styleWidth + this._styleLeft;
	this._fixTop = this._styleHeight + this._styleTop;
	
	addEventHandler(document, "mousemove", this._fR);
	addEventHandler(document, "mouseup", this._fS);
  },  

  Resize: function(e) {
	this._fun(e);
	with(this._obj.style){
		width = this._styleWidth + "px"; height = this._styleHeight + "px";
		top = this._styleTop + "px"; left = this._styleLeft + "px";
	}
  },
  Up: function(e) {
	this._styleHeight = Math.max(this._sideDown - e.clientY, 0);
	this._styleTop = this._fixTop - this._styleHeight;
  },
  Down: function(e) {
	this._styleHeight = Math.max(e.clientY - this._sideUp, 0);
  },
  Right: function(e) {
	this._styleWidth = Math.max(e.clientX - this._sideLeft, 0);
  },
  Left: function(e) {
	this._styleWidth = Math.max(this._sideRight - e.clientX, 0);
	this._styleLeft = this._fixLeft - this._styleWidth;
  },
  RightDown: function(e) {
	this.Right(e); this.Down(e);
  },
  RightUp: function(e) {
	this.Right(e); this.Up(e);
  },
  LeftDown: function(e) {
	this.Left(e); this.Down(e);
  },
  LeftUp: function(e) {
	this.Left(e); this.Up(e);
  },
  Stop: function() {
	removeEventHandler(document, "mousemove", this._fR);
	removeEventHandler(document, "mouseup", this._fS);
  }
};

</script>
<style type="text/css">
#rRightDown,#rLeftDown,#rLeftUp,#rRightUp,#rRight,#rLeft,#rUp,#rDown{
	position:absolute;
	background:#C00;
	width:7px;
	height:7px;
	z-index:5;
	font-size:0;
}

#rLeftDown,#rRightUp{cursor:ne-resize;}
#rRightDown,#rLeftUp{cursor:nw-resize;}
#rRight,#rLeft{cursor:e-resize;}
#rUp,#rDown{cursor:n-resize;}

#rLeftDown{left:-4px;bottom:-4px;}
#rRightUp{right:-4px;top:-4px;}
#rRightDown{right:-4px;bottom:-4px;background-color:#00F;}
#rLeftUp{left:-4px;top:-4px;}
#rRight{right:-4px;top:50%;margin-top:-4px;}
#rLeft{left:-4px;top:50%;margin-top:-4px;}
#rUp{top:-4px;left:50%;margin-left:-4px;}
#rDown{bottom:-4px;left:50%;margin-left:-4px;}

#dragDiv{border:1px solid #000000; width:100px; height:60px; top:50px; left:50px; background:#fff;}
</style>
<div id="dragDiv">
  <div id="rRightDown"> </div>
  <div id="rLeftDown"> </div>
  <div id="rRightUp"> </div>
  <div id="rLeftUp"> </div>
  <div id="rRight"> </div>
  <div id="rLeft"> </div>
  <div id="rUp"> </div>
  <div id="rDown"></div>
  <img src="http://pic.shop.lenovo.com.cn/g1/M00/01/F9/CmPJilWJBqCAR7wMAACLd0JghxA789.jpg" style="width:100%;height:100%;position:relative;">
</div>
<script>
var rs = new SimpleResize("dragDiv");

rs.Set("rRightDown", "right-down");
rs.Set("rLeftDown", "left-down");

rs.Set("rRightUp", "right-up");
rs.Set("rLeftUp", "left-up");

rs.Set("rRight", "right");
rs.Set("rLeft", "left");

rs.Set("rUp", "up");
rs.Set("rDown", "down");
</script>
</body>
</html>

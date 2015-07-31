//the canvas contex to be drawn on
var ctx;


function setCtx(c){
	var e = document.getElementById(c);
	ctx = e.getContext("2d");

}

function setFillStyle(f){
	ctx.fillStyle = f;
}

function setStrokeStyle(s){
	ctx.strokeStyle = s;
}


function drawRectangleAt(vx,vy){
	ctx.fillRect(vx[0],vx[1],vy[0],vy[1]);
}

function drawCircle(x,y,r){
	ctx.beginPath();
	ctx.arc(x,y,r,0,2*Math.PI);
	ctx.closePath();
	ctx.stroke();
	ctx.fill();
}


function drawImg(isrc, x, y){
	var img = new Image();
	img.src = isrc;
	ctx.drawImage(img, x, y, 100, 100);
}




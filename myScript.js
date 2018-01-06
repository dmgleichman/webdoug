// myScript.js

function changeAParagraph(p1) {
   document.getElementById(p1).innerHTML = "Paragraph changed.";
}

function drawSquare(id, x, y, color) {
	var canvas = document.getElementById(id);
	var ctx = canvas.getContext("2d");
	ctx.fillStyle = color;
	ctx.fillRect(x,y,50,50);
}	

function drawHexagon(id, x, y, color) {
	var canvas = document.getElementById(id);
	var ctx = canvas.getContext("2d");
	var size = 50.0;
	ctx.fillStyle = color;
	

	ctx.beginPath();
	ctx.moveTo(x+(size*0.5), y+(size*0));
	ctx.lineTo(x+(size*1.5), y+(size*0));
	ctx.lineTo(x+(size*2.0), y+(size*0.8660254));
	ctx.lineTo(x+(size*1.5), y+(size*1.7320508));
	ctx.lineTo(x+(size*0.5), y+(size*1.7320508));
	ctx.lineTo(x+(size*0), y+(size*0.8660254));
	ctx.lineTo(x+(size*0.5), y+(size*0));
	ctx.closePath();
	ctx.fill();
	
}

function rgbColor(r, g, b){
  r = Math.floor(r);
  g = Math.floor(g);
  b = Math.floor(b);
  return ["rgb(",r,",",g,",",b,")"].join("");
}

function rgbScaled(r, g, b){
	if (r > 1.0)
		r = 1.0;
	else if (r < 0.0)
		r = 0.0;
	if (g > 1.0)
		g = 1.0;
	else if (g < 0.0)
		g = 0.0;
	if (b > 1.0)
		b = 1.0;
	else if (b < 0.0)
		b = 0.0;
	r = 255.0 * r;
	g = 255.0 * g;
	b = 255.0 * b;
	return rgbColor(r,g,b);
}

	
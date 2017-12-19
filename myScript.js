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

	
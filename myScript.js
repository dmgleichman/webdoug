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

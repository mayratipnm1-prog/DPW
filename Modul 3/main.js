var c = document.getElementById("canvas");
var ctx = c.getContext("2d");

ctx.fillStyle = "yellow";
ctx.fillRect(50, 50, 150, 100);
ctx.strokeStyle = "black";
ctx.lineWidth = 3;
ctx.strokeRect(50, 50, 150, 100);

ctx.beginPath();
ctx.arc(300, 100, 50, 0, 2 * Math.PI);
ctx.fillStyle = "red";
ctx.fill();
ctx.stroke();

ctx.beginPath();
ctx.moveTo(150, 200);
ctx.lineTo(320, 200);
ctx.lineTo(185, 250);
ctx.closePath();
ctx.fillStyle = "blue";
ctx.fill();
ctx.stroke();
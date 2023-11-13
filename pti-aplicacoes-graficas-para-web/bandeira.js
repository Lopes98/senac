var canvas = document.querySelector("canvas")
var ctx = canvas.getContext("2d")

ctx.strokeRect(0, 0, 300, 200)

ctx.fillStyle = "#BD2031"
ctx.beginPath()
ctx.arc(150, 100, 50, 0, 2 * 3.14)

ctx.fill()

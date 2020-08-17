//let pen;
function setup()
{
    
}
function mouseDragged()
{
    pen=new pen(mouseX,mouseY,pmouseX,pmouseY);
    pen.penwrite();
}
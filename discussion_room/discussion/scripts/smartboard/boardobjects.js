class pen{
    constructor(x=0,y=0,px=0,py=0)
    {
      this.mousex=x;
      this.mousey=y;
      this.pmousex=px;
      this.pmousey=py;
    }
    penwrite()
    {
        canvasgraph.line(this.mousex,this.mousey,this.pmousex,this.pmousey);
    }
}
export default class CanvasGrid {

    /**
     * 
     */
    constructor() {
        this.cnv = document.getElementById("application-container");
        this.ctx = this.cnv.getContext("2d");

        this.cnv_w = $("#application-container").width();
        this.cnv_h = this.cnv_w * 0.5;

        this.ctx.canvas.width = this.cnv_w;
        this.ctx.canvas.height = this.cnv_h;

        this.ctx.clearRect(0, 0, this.cnv.width, this.cnv.height);
    }

    /**
     * 
     */
    fRect(x, y, r, c) {
        x = parseInt(x);
        y = parseInt(y);
        this.ctx.fillStyle = this.rgbToHex(c[0], c[1], c[2]);
        this.ctx.fillRect(x, y, r, r);
        this.ctx.fillStyle = this.rgbToHex(c[0] - 20, c[1] - 20, c[2] - 20);
        this.ctx.fillRect(x + 1, y + 1, r - 2, r - 2);
    }

    /**
     * 
     */
    componentToHex(c) {
        var hex = c.toString(16);
        return hex.length == 1 ? "0" + hex : hex;
    }

    /**
     * 
     */
    rgbToHex(r, g, b) {
        return "#" + this.componentToHex(r) + this.componentToHex(g) + this.componentToHex(b);
    }
}
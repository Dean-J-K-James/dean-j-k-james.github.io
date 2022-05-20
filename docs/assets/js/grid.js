import CanvasGrid      from '/assets/js/canvasgrid.js';
import create_2d_array from '/assets/js/create_2d_array.js';

export default class Grid {

    /**
     * 
     */
    constructor(cell_size) {
        this.canvas = new CanvasGrid();
        this.cell_size = cell_size;
        this.sizex = Math.floor(this.canvas.cnv_w / this.cell_size) - 1;
        this.sizey = Math.floor(this.canvas.cnv_h / this.cell_size) - 1;
        this.offsx = (this.canvas.cnv_w - this.sizex * this.cell_size) / 2;
        this.offsy = (this.canvas.cnv_h - this.sizey * this.cell_size) / 2;
        this.cells = create_2d_array(this.sizex, this.sizey, 0);
    }

    /**
     * 
     */
    set_cell(x, y, c) {
        this.cells[x][y] = c;
        this.canvas.fRect(x * this.cell_size + this.offsx, y * this.cell_size + this.offsy, this.cell_size, c);
    }

    /**
     * 
     */
    get_cell(x, y) {
        return this.is_valid(x, y) ? this.cells[x][y] : null;
    }

    /**
     * 
     */
    set_all_cells(c) {
        for (let x = 0; x < this.sizex; x++)
            for (let y = 0; y < this.sizey; y++) {
                this.set_cell(x, y, c);
            }
    }

    /**
     * 
     */
    is_valid(x, y) {
        return x > 0 && x < this.sizex - 1 && y > 0 && y < this.sizey - 1;
    }
}
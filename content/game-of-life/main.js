import initialise      from '/js/initialise.js';
import Grid            from '/js/grid.js';
import create_2d_array from '/js/create_2d_array.js';

initialise(class extends Grid {

    /**
     * 
     */
    constructor() {
        super(8);
        this.dead = [41, 41, 41];
        this.live = [191, 111, 101];
    }

    /**
     * 
     */
    * algorithm() {
        this.randomise_grid();

        for (let i = 0; i < 1000; i++) {
            let buffer = this.generate();
            this.apply_buffer(buffer);
            yield;
        }
    }

    /**
     * 
     */
    randomise_grid() {
        for (let x = 0; x < this.sizex; x++)
            for (let y = 0; y < this.sizey; y++) {
                this.set_cell(x, y, Math.random() > 0.5 ? this.dead : this.live);
            }
    }

    /**
     * 
     */
    apply_buffer(buffer) {
        for (let x = 0; x < this.sizex; x++)
            for (let y = 0; y < this.sizey; y++) {
                this.set_cell(x, y, buffer[x][y]);
            }
    }

    /**
     * 
     */
    generate() {
        let buffer = create_2d_array(this.sizex, this.sizey, this.dead);

        for (let x = 0; x < this.sizex; x++)
            for (let y = 0; y < this.sizey; y++) {

                let c = this.get_live_neighbours(x, y);

                if (this.get_cell(x, y) == this.live && c <= 1) { buffer[x][y] = this.dead; }
                if (this.get_cell(x, y) == this.live && c >= 4) { buffer[x][y] = this.dead; }
                if (this.get_cell(x, y) == this.live && c == 2) { buffer[x][y] = this.live; }
                if (this.get_cell(x, y) == this.live && c == 3) { buffer[x][y] = this.live; }
                if (this.get_cell(x, y) == this.dead && c == 3) { buffer[x][y] = this.live; }
            }

        return buffer;
    }

    /**
     * 
     */
    get_live_neighbours(x, y) {
        let count = 0;

        if (this.get_cell(x + 0, y - 1) == this.live) { count++; }
        if (this.get_cell(x + 1, y - 1) == this.live) { count++; }
        if (this.get_cell(x + 1, y + 0) == this.live) { count++; }
        if (this.get_cell(x + 1, y + 1) == this.live) { count++; }
        if (this.get_cell(x + 0, y + 1) == this.live) { count++; }
        if (this.get_cell(x - 1, y + 1) == this.live) { count++; }
        if (this.get_cell(x - 1, y + 0) == this.live) { count++; }
        if (this.get_cell(x - 1, y - 1) == this.live) { count++; }

        return count;
    }
});
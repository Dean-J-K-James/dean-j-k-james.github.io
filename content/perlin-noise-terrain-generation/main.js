import initialise      from '/js/initialise.js';
import Grid            from '/js/grid.js';
import create_2d_array from '/js/create_2d_array.js';
import inverse_lerp    from '/js/inverse_lerp.js';

initialise(class extends Grid {

    /**
     * 
     */
    constructor() {
        super(8);
        this.grid = create_2d_array(this.sizex, this.sizey, 0);
        noise.seed(Math.random());
    }

    /**
     * 
     */
    * algorithm() {
        let max_n = 0;
        let min_n = 9;

        for (let x = 0; x < this.sizex; x++)
            for (let y = 0; y < this.sizey; y++) {

                let scale = 0.05;
                let value = 0.00;

                for (let octave = 1; octave <= 4; octave++) {
                    let ox = x * (scale * octave);
                    let oy = y * (scale * octave);

                    value += (this.perlin_noise(ox, oy)) * (1 / (octave + 1));
                }

                this.grid[x][y] = value;

                max_n = Math.max(max_n, value);
                min_n = Math.min(min_n, value);
            }

        this.normalise_and_apply_terrain(min_n, max_n);
    }

    /**
     * 
     */
    normalise_and_apply_terrain(min_n, max_n) {
        for (let x = 0; x < this.sizex; x++) {
            for (let y = 0; y < this.sizey; y++) {
                this.set_cell_type(x, y, inverse_lerp(min_n, max_n, this.grid[x][y]));
            }
        }
    }

    /**
     * 
     */
    perlin_noise(x, y) {
        return (noise.perlin2(x, y) + 1) / 2;
    }

    /**
     * 
     */
    set_cell_type(x, y, h) {
        //Deep Water
        if (h < 0.40)
            return this.set_cell(x, y, [21, 61, 181]);

        //Shallow Water
        if (h < 0.50)
            return this.set_cell(x, y, [81, 111, 241]);

        //Sand
        if (h < 0.6)
            return this.set_cell(x, y, [251, 211, 161]);

        //Grass
        if (h < 0.9)
            return this.set_cell(x, y, [31, 131, 31]);

        //Mountain
        if (h < 1.0)
            return this.set_cell(x, y, [51, 51, 51]);
    }
});
import initialise from '../../js/initialise.js';
import Grid       from '../../js/grid.js';

initialise(class extends Grid {

    /**
     * 
     */
    constructor() {
        super(8);
        this.path = [191, 111, 101];
        this.wall = [41, 41, 41];
    }

    /**
     * 
     */
    * algorithm() {
        this.initialise();

        for (let i = 0; i < 2000; i++) {
            this.iterate_random_walk();
            yield;
        }
    }

    /**
     * 
     */
    initialise() {
        this.x = Math.floor(this.sizex / 2);
        this.y = Math.floor(this.sizey / 2);

        this.set_all_cells(this.wall);
    }

    /**
     * 
     */
    iterate_random_walk() {
        this.set_cell(this.x, this.y, this.path);

        switch (Math.floor(Math.random() * 4)) {
            case 0: this.y--; break;
            case 1: this.x++; break;
            case 2: this.y++; break;
            case 3: this.x--; break;
        }

        this.x = Math.max(1, Math.min(this.x, this.sizex - 2));
        this.y = Math.max(1, Math.min(this.y, this.sizey - 2));
    }
});